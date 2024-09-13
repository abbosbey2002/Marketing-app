@extends('layouts.layout')

@section('content')

    <main class="nxl-container">
        <div class="nxl-content without-header nxl-full-content">
        <!-- [ Main Content ] start -->
        <div class="main-content  ">
            <div class="content-area" data-scrollbar-target="#psScrollbarInit">
                <div class="content-area-header bg-white sticky-top">
                    <div class="page-header-right ms-auto">
                        <div class="d-flex align-items-center gap-3 page-header-right-items-wrapper">
                            <a href="javascript:void(0);" class="btn btn-primary"
                               data-bs-toggle="offcanvas" data-bs-target="#serviceProviderOffcanvas">
                                <i class="feather-plus me-2"></i>
                                <span>Add New</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="content-area-body">
                    <div class="card mb-0">
                        <div class="card-body">
                            <!--! BEGIN: [Users] !-->
                            <div class="card stretch stretch-full mb-0">
                                <div class="card-header">
                                    <h5 class="card-title">Category</h5>
                                </div>
                                @foreach ($categories as $category)
                                    <div class="card-body custom-card-action">
                                        <div class="w-100 d-flex align-items-center justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <div>
                                                    <!-- Display Service List Name -->
                                                    <a href="javascript:void(0)" class="d-flex align-items-center mb-1" data-bs-toggle="offcanvas" data-bs-target="#editServiceModal{{ $category->id }}">
                                                        {{ $category->name_en ?? 'No Category List' }}
                                                    </a>

                                                </div>
                                            </div>

                                            <div class="hstack gap-2 justify-content-end">
                                                <!-- Edit Button -->
                                                <a href="javascript:void(0);" class="avatar-text avatar-md" data-bs-toggle="offcanvas" data-bs-target="#editServiceModal{{ $category->id }}">
                                                    <i class="feather feather-edit-3"></i>
                                                </a>

                                                <!-- Delete Button -->
                                                <form class="avatar-text avatar-md" method="POST" onsubmit="confirmDelete(event)" action="{{ route('categories.destroy', $category->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn text-dark p-0 border-0" style="background: none;">
                                                        <i class="feather feather-trash-2"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                        <hr class="border-dashed my-3">
                                    </div>
                                @endforeach

                                <a href="javascript:void(0);" class="card-footer fs-11 fw-bold text-uppercase text-center"
                                   data-bs-toggle="offcanvas" data-bs-target="#serviceProviderOffcanvas">Add New
                                </a>

                            </div>

                            <!--! END: [Users] !-->

                        </div>
                    </div>
                </div>

            </div>
            <!-- [ Content Area ] end -->
        </div>
        </div>
        <!-- [ Main Content ] end -->
    </main>
<script>
    document.write(new Date().getFullYear());
</script>

<style>
    .card {
        transition: transform 0.2s, box-shadow 0.2s;
        border: none;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .card-title {
        font-size: 1.3rem;
        color: #007bff;
        /* Bootstrap primary color */
    }

    .card-text strong {
        color: #6c757d;
        /* Bootstrap secondary color */
    }

    .btn-primary {
        background-color: #007bff;
        /* Bootstrap primary color */
        border-color: #007bff;
        /* Bootstrap primary color */
    }

    .btn-primary:hover {
        background-color: #0056b3;
        /* Slightly darker shade of primary color on hover */
        border-color: #0056b3;
        /* Slightly darker shade of primary color on hover */
    }

    .pagination .page-link {
        background-color: #0f172a;
        /* Black background */
        color: #fff;
        /* White text */
        border-color: #000;
        /* Black border */
    }

    .pagination .page-link:hover {
        background-color: #555;
        /* Darker shade on hover */
        color: #fff;
        /* White text on hover */
        border-color: #000;
        /* Black border on hover */
    }

    .pagination .page-item.active .page-link {
        background-color: #000;
        /* Darker shade for active page */
        border-color: #000;
        /* Black border for active page */
    }
</style>

<script>
function confirmDelete(event) {
    event.preventDefault();
    var num1 = Math.floor(Math.random() * 10) + 1;
    var num2 = Math.floor(Math.random() * 10) + 1;
    var answer = prompt(`Iltimos, quyidagi amalni bajaring: ${num1} + ${num2} = ?`);

    if (answer == (num1 + num2)) {
        event.target.submit();
    } else {
        alert('Notogri javob. O\'chirish uchun to\'g\'ri javob kiritilishi kerak.');
    }
}
</script>


@include('admin.components.categories.category-modal' )
@include('admin.components.categories.category-edit-modal',$categories)
@endsection
