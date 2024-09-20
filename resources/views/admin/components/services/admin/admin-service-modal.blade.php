<style>
    .select2-selection__rendered .select2-selection__choice {
        width: max-content;
    }
</style>


<!--! ================================================================ !-->
<!--! [Start] Tasks Details Offcanvas !-->
<!--! ================================================================ !-->
<form action="{{ route('services-admin.store') }}" method="post">
    @csrf
    <div class="offcanvas offcanvas-end w-50" tabindex="-1" id="serviceOffcanvas">
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
                <!-- Name (uz) -->
                <div class="col-12">
                    <div class="form-group mb-4">
                        <label class="form-label">Name (uz):</label>
                        <input class="form-control" name="name_uz">
                    </div>
                </div>

                <!-- Name (ru) -->
                <div class="col-12">
                    <div class="form-group mb-4">
                        <label class="form-label">Name (ru):</label>
                        <input class="form-control" name="name_ru">
                    </div>
                </div>

                <!-- Name (en) -->
                <div class="col-12">
                    <div class="form-group mb-4">
                        <label class="form-label">Name (en):</label>
                        <input class="form-control" name="name_en">
                    </div>
                </div>

                <!-- Category select -->
                <div class="col-12">
                    <div class="form-group mb-4">
                        <label class="form-label">Category:</label>
                        <select class="form-control" name="category_id">
                            <option value="">Select a category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name_en }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Skills (dinamik qo'shish) -->
                <div class="col-12">
                    <div class="form-group mb-4">
                        <label class="form-label">Skills (Multiple languages):</label>
                        <div id="skillsContainer">
                            <div class="skill-item">
                                <input class="form-control mb-2" name="skills_uz[]" placeholder="Skill in Uzbek">
                                <input class="form-control mb-2" name="skills_ru[]" placeholder="Skill in Russian">
                                <input class="form-control mb-2" name="skills_en[]" placeholder="Skill in English">
                            </div>
                        </div>
                        <button type="button" class="btn btn-outline-primary" id="addSkillBtn">Add More Skill</button>
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
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

<!-- Dinamik "Skills" qo'shish uchun JavaScript -->
<script>
    document.getElementById('addSkillBtn').addEventListener('click', function() {
        // Yangi skill maydonlari yaratish
        var newSkillInput = document.createElement('div');
        newSkillInput.classList.add('skill-item');
        newSkillInput.innerHTML = `
            <input class="form-control mb-2" name="skills_uz[]" placeholder="Skill in Uzbek">
            <input class="form-control mb-2" name="skills_ru[]" placeholder="Skill in Russian">
            <input class="form-control mb-2" name="skills_en[]" placeholder="Skill in English">
        `;
        
        // Skilllarni containerga qo'shish
        document.getElementById('skillsContainer').appendChild(newSkillInput);
    });
</script>



<!--! ================================================================ !-->
<!--! [End] Tasks Details Offcanvas !-->
<!--! ================================================================ !-->
