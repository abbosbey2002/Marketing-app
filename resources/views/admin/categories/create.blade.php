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
                    <h5 class="m-b-10">Categories</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
                    <li class="breadcrumb-item"><a href="/admin/category">Category List</a></li>
                    <li class="breadcrumb-item active">Add New Category</li>
                </ul>
            </div>
        </div>
        <!-- End Page Header -->

        <!-- Main Content -->
        <div class="main-content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card border-top-0">
                        <div class="card-header p-0">
                            <ul class="nav nav-tabs flex-wrap w-100 text-center customers-nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item flex-fill border-top" role="presentation">
                                    <a href="#" class="nav-link text-start">New Category Data:</a>
                                </li>
                            </ul>
                        </div>

                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="profileTab" role="tabpanel">
                                <div class="card-body personal-info">
                                    <form action="{{ route('categories.store') }}" method="POST">
                                        @csrf

                                        <!-- Provider ID -->
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="providerSelect" class="fw-semibold">Select Provider:</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <select class="form-control" id="providerSelect" name="provider_id" required>
                                                    <option value="" disabled selected>Choose a Provider</option>
                                                    @foreach ($providers as $provider)
                                                        <option value="{{ $provider->id }}">{{ $provider->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('provider_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Category Name -->
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="nameInput" class="fw-semibold">Enter Category Name:</label>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="feather-tag"></i></div>
                                                    <input type="text" class="form-control" id="nameInput" placeholder="Enter category name" name="name" required>
                                                </div>
                                                @error('name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Main Content -->
    </div>
</main>
@endsection
