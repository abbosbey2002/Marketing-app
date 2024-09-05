@extends('admin.layouts.main')

@section('content')
    <link rel="stylesheet" type="text/css" href="assets/vendors/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="assets/vendors/css/select2-theme.min.css">
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
                                data-bs-target="#serviceProviderOffcanvas">
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
                            <div class="card stretch stretch-full mb-0">
                                <div class="card-header">
                                    <h5 class="card-title">Service</h5>
                                </div>
                                @foreach ($services as $service)
                                    <div class="card-body custom-card-action">
                                        <div class="w-100 d-flex align-items-center justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <div>
                                                    <!-- Display Service List Name -->
                                                    <a href="javascript:void(0)" class="d-flex align-items-center mb-1"
                                                        data-bs-toggle="offcanvas"
                                                        data-bs-target="#editServiceModal{{ $service->id }}">
                                                        {{ $service->name_en ?? 'No Service List' }}
                                                        {{-- @dd($service->id)   --}}
                                                    </a>
                                                    <div class="fs-12 fw-normal text-muted">
                                                        <!-- Display Skills -->
                                                        @if ($service->providerSkills()->get()->isNotEmpty())
                                                            <ul>
                                                                @foreach ($service->providerSkills()->get() as $skill)
                                                                    <li>{{ $skill->skill->name_en ?? $skill->skill->name_en }}
                                                                    </li>
                                                                    <!-- Displaying each skill in English or fallback -->
                                                                @endforeach
                                                            </ul>
                                                        @else
                                                            No skills assigned
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="hstack gap-2 justify-content-end">
                                                <!-- Edit Button -->
                                                <a href="javascript:void(0);" class="avatar-text avatar-md"
                                                    data-bs-toggle="offcanvas"
                                                    data-bs-target="#editServiceModal{{ $service->id }}">
                                                    <i class="feather feather-edit-3"></i>
                                                </a>

                                                <!-- Delete Button -->
                                                <form class="avatar-text avatar-md" action="{{ route('deleteService') }}" method="POST"
                                                    onsubmit="confirmDelete(event)"
                                                    action="{{ route('services.destroy', $service->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="hidden" name="service-type" value="{{ $service->id }}">
                                                    <input type="hidden" name="provider_id" value="{{ auth()->user()->manager->provider->id }}">
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
        <!-- [ Main Content ] end -->
    </div>

    @include('admin.components.services.provider-service-modal')
    @include('admin.components.services.provider-service-edit-modal', $services)

    <script src="assets/vendors/js/select2.min.js"></script>
    <script src="assets/vendors/js/select2-active.min.js"></script>

    <script>
        $(document).ready(function() {
            // Initialize Select2 on the Skills dropdown
            $('#skills-list').select2({
                placeholder: "Select skills",
                allowClear: true,
                theme: 'bootstrap-5'
            });
        });
    </script>


@endsection
