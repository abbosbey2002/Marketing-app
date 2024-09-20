<style>
    .select2-selection__rendered .select2-selection__choice {
        width: max-content;
    }
</style>

<!-- Select2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<!-- Select2 JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


@foreach($services as $service)
    <!-- Modal for Editing Service -->
    <div class="offcanvas offcanvas-end w-50" id="editServiceModal{{ $service->id }}" tabindex="-1">
        <div class="offcanvas-header border-bottom" style="padding-top: 20px; padding-bottom: 20px">
            <div class="d-flex align-items-center">
                <div class="avatar-text avatar-md items-details-close-trigger" data-bs-dismiss="offcanvas" data-bs-toggle="tooltip" data-bs-trigger="hover" title="Close">
                    <i class="feather-arrow-left"></i>
                </div>
                <span class="vr text-muted mx-4"></span>
                <h2 class="fs-14 fw-bold text-truncate-1-line">Edit Service</h2>
            </div>
        </div>
        <div class="offcanvas-body">
            <form action="{{ route('services-admin.update', $service->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <!-- Name (uz) -->
                    <div class="col-12">
                        <div class="form-group mb-4">
                            <label class="form-label">Name (uz):</label>
                            <input class="form-control" name="name_uz" value="{{ $service->name_uz }}" required>
                        </div>
                    </div>

                    <!-- Name (ru) -->
                    <div class="col-12">
                        <div class="form-group mb-4">
                            <label class="form-label">Name (ru):</label>
                            <input class="form-control" name="name_ru" value="{{ $service->name_ru }}" required>
                        </div>
                    </div>

                    <!-- Name (en) -->
                    <div class="col-12">
                        <div class="form-group mb-4">
                            <label class="form-label">Name (en):</label>
                            <input class="form-control" name="name_en" value="{{ $service->name_en }}" required>
                        </div>
                    </div>

                    <!-- Category (Select2) -->
                    <div class="col-12">
                        <div class="form-group mb-4">
                            <label class="form-label">Category:</label>
                            <select class="form-control select2" name="category_id" required>
                                <option value="">Select a category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id', $service->category_id) == $category->id ? 'selected' : '' }}>
                                        {{ $category->name_en }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Skills Section -->
                    <div class="col-12">
                        <label class="form-label">Skills (Multiple languages):</label>
                        <div id="skillsContainer{{ $service->id }}">
                            <!-- Mavjud skillslarni ko'rsatish -->
                            @foreach($service->skills as $skill)
                                <div class="skill-item d-flex mb-2">
                                    <input class="form-control me-2" name="skills_uz[{{ $skill->id }}]" value="{{ $skill->name_uz }}" placeholder="Skill in Uzbek">
                                    <input class="form-control me-2" name="skills_ru[{{ $skill->id }}]" value="{{ $skill->name_ru }}" placeholder="Skill in Russian">
                                    <input class="form-control me-2" name="skills_en[{{ $skill->id }}]" value="{{ $skill->name_en }}" placeholder="Skill in English">
                                    <!-- O'chirish tugmasi -->
                                    <button type="button" class="btn btn-danger btn-sm remove-skill" data-skill-id="{{ $skill->id }}">Remove</button>
                                </div>
                            @endforeach
                        </div>

                        <!-- Yangi skill qo'shish -->
                        <button type="button" class="btn btn-outline-primary" id="addSkillBtn{{ $service->id }}">Add More Skill</button>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="row">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-submit">Update</button>
                    </div>
                </div>
            </form>

        </div>
    </div>

    <!-- Script for Adding and Removing Skills -->
    <script>
        document.getElementById('addSkillBtn{{ $service->id }}').addEventListener('click', function() {
            var newSkillInput = `
                <div class="skill-item d-flex mb-2">
                    <input class="form-control me-2" name="skills_uz_new[]" placeholder="Skill in Uzbek">
                    <input class="form-control me-2" name="skills_ru_new[]" placeholder="Skill in Russian">
                    <input class="form-control me-2" name="skills_en_new[]" placeholder="Skill in English">
                    <button type="button" class="btn btn-danger btn-sm remove-skill">Remove</button>
                </div>`;
            document.getElementById('skillsContainer{{ $service->id }}').insertAdjacentHTML('beforeend', newSkillInput);
        });

        // Remove skill input on click
        document.querySelectorAll('.remove-skill').forEach(button => {
            button.addEventListener('click', function() {
                this.closest('.skill-item').remove();
            });
        });
    </script>

@endforeach


