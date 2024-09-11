<style>
    .select2-selection__rendered .select2-selection__choice {
        width: max-content;
    }
</style>


<!--! ================================================================ !-->
<!--! [Start] Tasks Details Offcanvas !-->
<!--! ================================================================ !-->
<form action="<?php echo e(route('services.store')); ?>" method="post">
    <?php echo csrf_field(); ?>
    <div class="offcanvas offcanvas-end w-50" tabindex="-1" id="serviceProviderOffcanvas">
        <div class="offcanvas-header border-bottom" style="padding-top: 20px; padding-bottom: 20px">
            <div class="d-flex align-items-center">
                <div class="avatar-text avatar-md items-details-close-trigger" data-bs-dismiss="offcanvas"
                     data-bs-toggle="tooltip" data-bs-trigger="hover" title="Close">
                    <i class="feather-arrow-left"></i>
                </div>
                <span class="vr text-muted mx-4"></span>
                <h2 class="fs-14 fw-bold text-truncate-1-line">Create Service</h2>
            </div>
        </div>
        <div class="offcanvas-body">
            <div class="row">
                <!-- Service Type Selection -->
                <div class="col-sm-12 col-lg-12">
                    <div class="form-group mb-4">
                        <label class="form-label">Service Type:</label>
                        <select name="service-type" id="service-type" class="form-control select2">
                            <!-- Options will be populated via JavaScript -->
                        </select>
                    </div>
                </div>
           
                <div class="col-sm-12 col-lg-12">
                    <div class="form-group mb-4">
                        <label class="form-label">Skills:</label>
                        <select name="skills[]" id="skills-list" class="form-control select2"  multiple="multiple" > 
                            <?php $__currentLoopData = $skills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($skill->id); ?>"><?php echo e($skill->name_en); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>

                <!-- Starting Price -->
                <div class="col-sm-12 col-lg-12">
                    <div class="form-group mb-4">
                        <label class="form-label">Starting Price:</label>
                        <div class="row mt-2">
                            <div class="col d-flex align-items-center">
                                <label for="price-1000" class="d-flex align-items-center">
                                    <input type="radio" id="price-1000" name="startingPrice" value="1000">
                                    <span class="ms-2">€1000</span>
                                </label>
                            </div>
                            <div class="col d-flex align-items-center">
                                <label for="price-2000" class="d-flex align-items-center">
                                    <input type="radio" id="price-2000" name="startingPrice" value="2000">
                                    <span class="ms-2">€2000</span>
                                </label>
                            </div>
                            <div class="col d-flex align-items-center">
                                <label for="price-5000" class="d-flex align-items-center">
                                    <input type="radio" id="price-5000" name="startingPrice" value="5000">
                                    <span class="ms-2">€5000</span>
                                </label>
                            </div>
                            <div class="col d-flex align-items-center">
                                <label for="price-10000" class="d-flex align-items-center">
                                    <input type="radio" id="price-10000" name="startingPrice" value="10000">
                                    <span class="ms-2">€10000</span>
                                </label>
                            </div>
                            <div class="col d-flex align-items-center">
                                <label for="custom-price" class="d-flex align-items-center">
                                    <input type="radio" id="custom-price" name="startingPrice" value="custom">
                                    <input type="number" class="ms-2 p-1" name="custom-price" id="custom-price-input" placeholder="€20000"/>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Description -->
                <div class="col-12">
                    <div class="form-group mb-4">
                        <label class="form-label">Description (optional):</label>
                        <textarea class="form-control" name="description" style="height: 18em;"></textarea>
                    </div>
                </div>
            </div>
            <input type="hidden" value="<?php echo e(auth()->user()->provider_id); ?>" name="provider_id">
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <button class="btn btn-primary btn-submit" type="submit">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function () {
    // Populate Service Type options
    const serviceTypeSelect = $('#service-type');

    $.ajax({
        url: 'https://marketing.dora.uz/api/service-lists',
        method: 'GET',
        success: function (data) {
            console.log('Service Lists Data:', data); // Check what is being returned
            if (data.status === 'success' && Array.isArray(data.data)) {
                data.data.forEach(function (service) {
                    const option = $('<option class="text-black"></option>').val(service.id).text(service.name_en);
                    serviceTypeSelect.append(option);
                });
            } else {
                console.error('Unexpected data format:', data);
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.error('Error fetching service types:', textStatus, errorThrown);
        }
    });

    // Populate Skills based on selected Service Type
    $('#service-type').on('change', function () {
        const selectedServiceId = $(this).val();

        $.ajax({
            url: 'https://marketing.dora.uz/api/skills',
            method: 'GET',
            success: function (data) {
                console.log('Skills Data:', data); // Check what is being returned
                const skillsList = $('#skills-list');
                skillsList.empty(); // Clear existing options

                if (Array.isArray(data)) {
                    const filteredSkills = data.filter(skill => parseInt(skill.service_list_id) === parseInt(selectedServiceId));
                    console.log(filteredSkills);
                    filteredSkills.forEach(function (skill) {
                        console.log(skill.name_en);
                        const option = $('<option></option>').val(skill.id).text(skill.name_en);
                        skillsList.append(option);
                    });
                } else {
                    console.error('Unexpected data format:', data);
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.error('Error fetching skills:', textStatus, errorThrown);
            }
        });
    });
});

</script>
</script>




<!--! ================================================================ !-->
<!--! [End] Tasks Details Offcanvas !-->
<!--! ================================================================ !-->
<?php /**PATH D:\projects\MARKETING\resources\views/admin/components/services/provider-service-modal.blade.php ENDPATH**/ ?>