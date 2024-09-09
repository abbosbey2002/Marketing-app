@extends('admin.layouts.main')

@section('content')

<div class="nxl-content without-header nxl-full-content">
    <!-- [ Main Content ] start -->
    <div class="main-content d-flex">
        <!-- [ Content Sidebar ] start -->
        @include('admin.components.single-sidebar')
        <!-- [ Content Sidebar  ] end -->
        <!-- [ Main Area  ] start -->
        <div class="content-area" data-scrollbar-target="#psScrollbarInit">
            <div class="content-area-body">
                <div class="card mb-0">
                    <div class="card-body">
                        <!--! BEGIN: [Users] !-->
                        @if ( isset($team))
                        <div class="card stretch stretch-full">
                            <div class="card-header">
                                <h5 class="card-title">Team</h5>
                            </div>
                            <form action="{{ route('teams.update', $team->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf 
                                @method("PUT")
                                <div class="card-body custom-card-action">

                                    
                                        <div class="card-body">
                                            <div class="col-12 position-relative">
                                                @if($team->image)
                                                    <img id="teamPreview" src="{{ asset('storage/' . $team->image) }}" alt="Cover" 
                                                        style="height: 18em; width: 100%; object-fit: cover;"/>
                                                @else
                                                    <img id="teamPreview" src="" alt="Cover" 
                                                        style="height: 18em; width: 100%; object-fit: cover; display: none;"/>
                                                @endif
                                                <div class="wd-10 ht-10 text-success rounded-circle position-absolute translate-middle" style="bottom: 21%; right: 3%;">
                                                    <label for="imageInput" class="overflow-hidden">
                                                        <i class="fa-solid fa-pen-to-square border rounded-circle p-3 bg-light" 
                                                        style="cursor: pointer;"></i>
                                                        <input type="file" class="form-control" id="imageInput" name="image" style="opacity: 0; visibility: hidden;" accept="image/*">
                                                    </label>
                                                </div>
                                            </div>  
                                            
                                            <div class="col-12 my-4">
                                                <h4>Label:</h4>
                                                <textarea class="form-control" id="descriptionInput" name="description" style="height: 18em;">{{ old('description', $team->description) }}</textarea>
                                            </div>
                                            <input type="hidden" name="provider_id" value="{{ $team->provider_id }}">

                                            <div class="col-12 mb-3">
                                                <button type="submit" class="btn btn-primary card-footer fs-11 fw-bold text-uppercase text-center">
                                                    <i class="feather-layers me-2"></i>
                                                    Save
                                                </button>
                                            </div>
                                            
                                        </div>
                                    
                                </div>
                                
                            </form>
                           
                        </div>
                        @else
                            <div class="card container py-3">
                                    <h3 class="h3 text-center">Sizda hali jamoa  yo'q</h3>
                            </div>
                        @endif
                        <!--! END: [Users] !-->
                    </div>
                </div>
            </div>
            
        </div>
        <!-- [ Content Area ] end -->
    </div>
    <!-- [ Main Content ] end -->
</div>

<script>
    const imageInput = document.getElementById('imageInput');
    const teamPreview = document.getElementById('teamPreview');

    imageInput.addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            // Yangi yuklangan rasm URL'ini yaratish va img elementiga o'rnatish
            teamPreview.src = URL.createObjectURL(file);
            teamPreview.style.display = 'block'; // Agar rasm avval mavjud bo'lmagan bo'lsa, ko'rsatish
        }
    });
</script>
@endsection
