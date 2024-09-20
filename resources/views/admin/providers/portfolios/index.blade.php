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
                <div class="content-area-header bg-white sticky-top">
                    <div class="page-header-right ms-auto">
                        <div class="d-flex align-items-center gap-3 page-header-right-items-wrapper">
                            <a href="javascript:void(0);" class="btn btn-primary" data-bs-toggle="offcanvas"
                                data-bs-target="#portfolioProviderOffcanvas">
                                <i class="feather-plus me-2"></i>
                                <span>Add New</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="content-area-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if (session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                    <div class="card mb-0">
                        <div class="card-body">
                            <!--! BEGIN: [Users] !-->
                            <div class="card stretch stretch-full">
                                <div class="card-header">
                                    <h5 class="card-title">Portfolio</h5>
                                </div>
                                @foreach ($portfolios as $portfolio)
                                    <div class="card-body custom-card-action">
                                        <div class="w-100 d-flex align-items-center justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <div>
                                                    <a href="javascript:void(0)" class="d-flex align-items-center mb-1"
                                                        data-bs-toggle="offcanvas"
                                                        data-bs-target="#portfolioProviderEditOffcanvas{{ $portfolio->id }}">{{ $portfolio->name }}</a>
                                                    <div class="fs-12 fw-normal text-muted">{{ $portfolio->sector }}</div>
                                                </div>
                                            </div>
                                            <div class="hstack gap-2 justify-content-end">
                                                <a href="javascript:void(0);" class="avatar-text avatar-md"
                                                    data-bs-toggle="offcanvas"
                                                    data-bs-target="#portfolioProviderEditOffcanvas{{ $portfolio->id }}">
                                                    <i class="feather feather-edit-3 "></i>
                                                </a>
                                                <form class="avatar-text avatar-md" method="POST"
                                                    onsubmit="confirmDelete(event)"
                                                    action="{{ route('portfolios.destroy', $portfolio->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn text-dark p-0 border-0"
                                                        style="background: none;">
                                                        <i class="feather feather-trash-2"></i>
                                                    </button>
                                                </form>

                                            </div>
                                        </div>
                                        <hr class="border-dashed my-3">
                                    </div>
                                @endforeach
                                <a href="javascript:void(0);" class="card-footer fs-11 fw-bold text-uppercase text-center"
                                    data-bs-toggle="offcanvas" data-bs-target="#portfolioProviderOffcanvas">Add New</a>
                            </div>
                            <!--! END: [Users] !-->
                        </div>
                    </div>
                </div>

            </div>
            <!-- [ Content Area ] end -->
        </div>
        <!-- [ Main Content ] end -->
    </div>



    @include('admin.components.portfolios.provider-portfolio-modal', ['services' => $services])
    @include('admin.components.portfolios.provider-portfolio-edit-modal', $portfolios)
    @include('admin.components.portfolios.provider-portfolio-view-modal')



    <script>
        function confirmDelete(event) {
            event.preventDefault();
            var num1 = Math.floor(Math.random() * 10) + 1;
            var num2 = Math.floor(Math.random() * 10) + 1;
            var correctAnswer = num1 + num2;

            Swal.fire({
                title: 'Matematik amalni bajaring',
                text: `${num1} + ${num2} = ?`,
                input: 'text',
                inputPlaceholder: 'Javobni kiriting',
                showCancelButton: true,
                confirmButtonText: 'Tasdiqlash',
                cancelButtonText: 'Bekor qilish',
                preConfirm: (answer) => {
                    if (parseInt(answer) === correctAnswer) {
                        return true;
                    } else {
                        Swal.showValidationMessage(
                            'Notog\'ri javob. O\'chirish uchun to\'g\'ri javob kiritilishi kerak.'
                        );
                        return false;
                    }
                }
            }).then((result) => {
                if (result.value) {
                    Swal.fire({
                        title: 'O\'chirishni tasdiqlaysizmi?',
                        text: "Bu amalni bekor qilib bo'lmaydi!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Ha, o\'chirilsin!',
                        cancelButtonText: 'Bekor qilish'
                    }).then((result) => {
                        if (result.value) {
                            event.target.submit();
                        }
                    });
                }
            });
        }

        // 
        document.getElementById('myForm').addEventListener('submit', function(e) {
            var urlField = document.getElementById('urlField').value;
            var errorMessage = document.getElementById('error-message');

            // URL formatini tekshirish uchun regex
            var urlPattern = /^(https?:\/\/)?([\w\-]+)+[\w\-]+(\.[a-z]{2,})+([/?].*)?$/i;

            // Agar URL noto'g'ri formatda bo'lsa, xatolikni ko'rsatish
            if (!urlPattern.test(urlField)) {
                errorMessage.style.display = 'inline';
                e.preventDefault(); // Formani yuborishni to'xtatadi
            } else {
                errorMessage.style.display = 'none';
            }
        });
    </script>

<script>
    document.getElementById('imageFile').addEventListener('change', function(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('imageDisplay');
            output.src = reader.result;
            output.style.display = 'block';
            document.querySelector('.no-content').display = "none"
        };
        reader.readAsDataURL(event.target.files[0]);
    });
</script>


<script>
    var dropZone = document.getElementById('dropZone');
    var imageFileInput = document.getElementById('imageFile');

    dropZone.addEventListener('dragover', function(e) {
        e.preventDefault();
        dropZone.style.borderColor = 'green';
    });

    dropZone.addEventListener('dragleave', function() {
        dropZone.style.borderColor = '#000';
    });

    dropZone.addEventListener('drop', function(e) {
        e.preventDefault();
        
        // Faylni olish
        var file = e.dataTransfer.files[0];
        if (!file) {
            alert("No file dropped.");
            return;
        }

        // Fayl formati rasm ekanligini tekshirish
        if (!file.type.startsWith('image/')) {
            alert("Only images are allowed.");
            return;
        }

        // Faylni <input type="file"> ga yuklash
        var dataTransfer = new DataTransfer();
        dataTransfer.items.add(file);
        imageFileInput.files = dataTransfer.files;

        // Konsolda fayl yuklanganligini tekshirish
        console.log(imageFileInput.files);

        // Rasmni ekranda ko'rsatish
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('imageDisplay');
            output.src = reader.result;
            output.style.display = 'block';
        };
        reader.readAsDataURL(file);
    });
</script>

@endsection
