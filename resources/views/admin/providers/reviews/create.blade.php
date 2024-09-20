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
                        <h5 class="m-b-10">Yangi Fikr Qo'shish</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin/dashboard">Bosh sahifa</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('reviews.index') }}">Fikrlar</a></li>
                        <li class="breadcrumb-item active">Yangi</li>
                    </ul>
                </div>
                <!-- Page Header Right -->
                <div class="page-header-right ms-auto">
                    <div class="page-header-right-items">
                        <div class="d-flex d-md-none">
                            <a href="javascript:void(0)" class="page-header-right-close-toggle">
                                <i class="feather-arrow-left me-2"></i>
                                <span>Orqaga</span>
                            </a>
                        </div>
                        <div class="d-flex align-items-center gap-2 page-header-right-items-wrapper">
                            <a href="{{ route('reviews.index') }}" class="btn btn-primary">
                                <i class="feather-list me-2"></i>
                                <span>Fikrlar ro'yxati</span>
                            </a>
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
                                        <a href="#" class="nav-link text-start">Yangi Fikr Yaratish :</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="tab-content">
                                <!-- Profile Tab -->
                                <div class="tab-pane fade show active" id="profileTab" role="tabpanel">
                                    <div class="card-body personal-info">
                                    
                                        <form action="{{ route('reviews.store') }}" method="POST">
                                            @csrf
                                            <div class="row mb-4 align-items-center">
                                                <div class="col-lg-4">
                                                    <label for="rating" class="fw-semibold">Baho :</label>
                                                </div>
                                                <div class="col-lg-8">
                                                    <select class="form-control max-select" id="rating" name="rating">
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-4 align-items-center">
                                                <div class="col-lg-4">
                                                    <label for="description_summary" class="fw-semibold">Ta'rif :</label>
                                                </div>
                                                <div class="col-lg-8">
                                                    <div class="input-group">
                                                        <div class="input-group-text"><i class="feather-edit"></i></div>
                                                        <input type="text" class="form-control" id="description_summary" placeholder="Ta'rif" name="description_summary">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-4 align-items-center">
                                                <div class="col-lg-4">
                                                    <label for="origin" class="fw-semibold">Kelib chiqishi :</label>
                                                </div>
                                                <div class="col-lg-8">
                                                    <div class="input-group">
                                                        <div class="input-group-text"><i class="feather-map-pin"></i></div>
                                                        <input type="text" class="form-control" id="origin" placeholder="Kelib chiqishi" name="origin">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-4 align-items-center">
                                                <div class="col-lg-4">
                                                    <label for="user_full_name" class="fw-semibold">Foydalanuvchi Ism :</label>
                                                </div>
                                                <div class="col-lg-8">
                                                    <div class="input-group">
                                                        <div class="input-group-text"><i class="feather-user"></i></div>
                                                        <input type="text" class="form-control" id="user_full_name" placeholder="Ism" name="user_full_name">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-4 align-items-center">
                                                <div class="col-lg-4">
                                                    <label for="email" class="fw-semibold">Email :</label>
                                                </div>
                                                <div class="col-lg-8">
                                                    <div class="input-group">
                                                        <div class="input-group-text"><i class="feather-mail"></i></div>
                                                        <input type="email" class="form-control" id="email" placeholder="Email" name="email">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-4 align-items-center">
                                                <div class="col-lg-4">
                                                    <label for="user_job_title" class="fw-semibold">Ish lavozimi :</label>
                                                </div>
                                                <div class="col-lg-8">
                                                    <div class="input-group">
                                                        <div class="input-group-text"><i class="feather-briefcase"></i></div>
                                                        <input type="text" class="form-control" id="user_job_title" placeholder="Ish lavozimi" name="user_job_title">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-4 align-items-center">
                                                <div class="col-lg-4">
                                                    <label for="user_company_name" class="fw-semibold">Kompaniya Nomi :</label>
                                                </div>
                                                <div class="col-lg-8">
                                                    <div class="input-group">
                                                        <div class="input-group-text"><i class="feather-briefcase"></i></div>
                                                        <input type="text" class="form-control" id="user_company_name" placeholder="Kompaniya Nomi" name="user_company_name">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-4 align-items-center">
                                                <div class="col-lg-4">
                                                    <label for="company_industry" class="fw-semibold">Kompaniya Sanoati :</label>
                                                </div>
                                                <div class="col-lg-8">
                                                    <div class="input-group">
                                                        <div class="input-group-text"><i class="feather-layers"></i></div>
                                                        <input type="text" class="form-control" id="company_industry" placeholder="Kompaniya Sanoati" name="company_industry">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-4 align-items-center">
                                                <div class="col-lg-4">
                                                    <label for="company_size" class="fw-semibold">Kompaniya Hajmi :</label>
                                                </div>
                                                <div class="col-lg-8">
                                                    <div class="input-group">
                                                        <div class="input-group-text"><i class="feather-users"></i></div>
                                                        <input type="text" class="form-control" id="company_size" placeholder="Kompaniya Hajmi" name="company_size">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-4 align-items-center">
                                                <div class="col-lg-4">
                                                    <label for="providing_service" class="fw-semibold">Xizmat Ko'rsatish :</label>
                                                </div>
                                                <div class="col-lg-8">
                                                    <div class="input-group">
                                                        <div class="input-group-text"><i class="feather-briefcase"></i></div>
                                                        <input type="text" class="form-control" id="providing_service" placeholder="Xizmat Ko'rsatish" name="providing_service">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-4 align-items-center">
                                                <div class="col-lg-4">
                                                    <label for="language_id" class="fw-semibold">Til :</label>
                                                </div>
                                                <div class="col-lg-8">
                                                    <select class="form-control max-select" id="language_id" name="language_id">
                                                        @foreach($languages as $language)
                                                            <option value="{{ $language->id }}">{{ $language->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            
                                            
                                            <div class="row mb-4 align-items-center">
                                                <div class="col-lg-4">
                                                    <label for="published_at" class="fw-semibold">Nashr Qilingan Vaqt :</label>
                                                </div>
                                                <div class="col-lg-8">
                                                    <div class="input-group">
                                                        <div class="input-group-text"><i class="feather-calendar"></i></div>
                                                        <input type="datetime-local" class="form-control" id="published_at" name="published_at">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="d-flex justify-content-end gap-2">
                                                <button type="reset" class="btn btn-secondary">Tozalash</button>
                                                <button type="submit" class="btn btn-primary">Save</button>
                                            </div>
                                        </form>
                                    
                                    </div>
                                </div>
                                <!-- End Profile Tab -->
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- End Main Content -->

        </div>
        <div class="nxl-footer"></div>
    </main>
    <!-- End Main Content -->
@endsection
