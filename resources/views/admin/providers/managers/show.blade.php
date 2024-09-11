@extends('layouts.layout')

@section('content')

    <!-- Main Content -->
    <main class="nxl-container" style="display: flex; flex-direction: column; justify-content: space-between;">
        <div class="nxl-content">
            <!-- Page Header -->
            <div class="page-header">
                <!-- Breadcrumb -->
                <div class="page-header-left d-flex align-items-center">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Provider Manager Details</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
                        <li class="breadcrumb-item"><a href="/admin/managers">Provider Managers</a></li>
                        <li class="breadcrumb-item">Details</li>
                    </ul>
                </div>
                <!-- Page Header Right -->
                <div class="page-header-right ms-auto">
                    <div class="page-header-right-items">
                        <div class="d-flex d-md-none">
                            <a href="javascript:void(0)" class="page-header-right-close-toggle">
                                <i class="feather-arrow-left me-2"></i>
                                <span>{{ __('managers.back') }}</span>
                            </a>
                        </div>
                        <div class="d-flex align-items-center gap-2 page-header-right-items-wrapper">
                            <a href="{{ route('managers.edit', $manager->id) }}" class="btn btn-primary">
                                <i class="feather-edit me-2"></i>
                                <span>Edit</span>
                            </a>
                            <form action="{{ route('managers.destroy', $manager->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this record?');">
                                    <i class="feather-trash-2 me-2"></i>
                                    <span>Delete</span>
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="d-md-none d-flex align-items-center">
                        <a href="javascript:void(0)" class="page-header-right-open-toggle">
                            <i class="feather-align-right fs-20"></i>
                        </a>
                    </div>
                </div>
            </div>
            <!-- End Page Header -->

            <!-- Main Content -->
            <div class="main-content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card border-top-0">
                            <div class="card-header p-0">
                                <!-- Nav Tabs -->
                                <ul class="nav nav-tabs flex-wrap w-100 text-center customers-nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item flex-fill border-top" role="presentation">
                                        <a href="#" class="nav-link text-start">Provider Manager Details:</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="tab-content">
                                <!-- Profile Tab -->
                                <div class="tab-pane fade show active" id="profileTab" role="tabpanel">
                                    <div class="card-body personal-info">
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="name" class="fw-semibold">Name:</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <p>{{ $manager->manager_name }}</p>
                                            </div>
                                        </div>
                                        
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="email" class="fw-semibold">Email:</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <p>{{ $manager->manager_email }}</p>
                                            </div>
                                        </div>
                                        
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="role" class="fw-semibold">Role:</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <p>{{ ucfirst($manager->role) }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Main Content -->
        </div>
        <!-- Footer -->

        <!-- End Footer -->
    </main>
    <!-- End Main Content -->

@endsection
