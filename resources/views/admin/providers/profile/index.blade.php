@extends('layouts.layout')

@section('content')

<div class="nxl-content">
    <!-- [ page-header ] start -->
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">Profile</h5>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item">Profile</li>
            </ul>
        </div>
        <div class="page-header-right ms-auto">
            <div class="page-header-right-items">
                <div class="d-flex d-md-none">
                    <a href="javascript:void(0)" class="page-header-right-close-toggle">
                        <i class="feather-arrow-left me-2"></i>
                        <span>Back</span>
                    </a>
                </div>
                <div class="d-flex align-items-center gap-2 page-header-right-items-wrapper">
                    <a href="javascript:void(0);" class="btn btn-icon btn-light-brand successAlertMessage">
                        <i class="feather-star"></i>
                    </a>
                    <a href="javascript:void(0);" class="btn btn-icon btn-light-brand">
                        <i class="feather-eye me-2"></i>
                        <span>Follow</span>
                    </a>
                    <a href="customers-create.html" class="btn btn-primary">
                        <i class="feather-plus me-2"></i>
                        <span>Create Customer</span>
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
    <!-- [ page-header ] end -->
    <!-- [ Main Content ] start -->
    <div class="main-content">
        <form action="{{ route('providers.update', $provider->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">

                <div class="col-xxl-4 col-xl-6">
                    <div class="card stretch stretch-full">
                        <div class="card-body">
                            <div class="mb-4 text-center">
                                <div class="wd-150 ht-150 mx-auto mb-3 position-relative">
                                    <div class="avatar-image wd-150 ht-150 border border-5 border-gray-3 position-relative">
                                        <img id="avatarPreview" src="{{ asset('storage/' . $provider->logo) }}" alt="" class="img-fluid" />
                                    </div>
                                    <div class="wd-10 ht-10 text-success rounded-circle position-absolute translate-middle" style="top: 68%; right: 18px">
                                        <label for="logoInput" class="overflow-hidden">
                                            <i class="fa-solid fa-pen-to-square border rounded-circle p-3 bg-light"
                                            style="cursor: pointer;"></i>
                                            <input type="file" class="form-control" id="logoInput" name="logo" style="opacity: 0; visibility: hidden;" accept="image/*">
                                        </label>
                                    </div>
                                </div>
                                <div class="mb-4">

                                    <a href="javascript:void(0);" class="fs-14 fw-bold d-block"> {{ old('name', $provider->name) }}</a>
                                    <a href="javascript:void(0);" class="fs-12 fw-normal text-muted d-block">{{ old('email', $provider->email) }}</a>
                                </div>
                                <div class="fs-12 fw-normal text-muted text-center d-flex flex-wrap gap-3 mb-4">
                                    <div class="flex-fill py-3 px-4 rounded-1 d-none d-sm-block border border-dashed border-gray-5">
                                        <h6 class="fs-15 fw-bolder">28.65K</h6>
                                        <p class="fs-12 text-muted mb-0">Obunachilar</p>
                                    </div>
                                    <div class="flex-fill py-3 px-4 rounded-1 d-none d-sm-block border border-dashed border-gray-5">
                                        <h6 class="fs-15 fw-bolder">38.85K</h6>
                                        <p class="fs-12 text-muted mb-0">Kuzatish</p>
                                    </div>
                                    <div class="flex-fill py-3 px-4 rounded-1 d-none d-sm-block border border-dashed border-gray-5">
                                        <h6 class="fs-15 fw-bolder">43.67K</h6>
                                        <p class="fs-12 text-muted mb-0">Izoxlar</p>
                                    </div>
                                </div>
                            </div>
                            <ul class="list-unstyled mb-4">
                                <li class="hstack justify-content-between mb-4">
                                    <span class="text-muted fw-medium hstack gap-3"><i class="feather-map-pin"></i>Location</span>
                                    <a href="javascript:void(0);" class="float-end">California, USA</a>
                                </li>
                                <li class="hstack justify-content-between mb-4">
                                    <span class="text-muted fw-medium hstack gap-3"><i class="feather-phone"></i>Phone</span>
                                    <a href="javascript:void(0);" class="float-end">+01 (375) 2589 645</a>
                                </li>
                                <li class="hstack justify-content-between mb-0">
                                    <span class="text-muted fw-medium hstack gap-3"><i class="feather-mail"></i>Email</span>
                                    <a href="javascript:void(0);" class="float-end">{{ old('email', $provider->email) }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
                <div class="col-xxl-8 col-xl-6">
                    <div class="col-12">
                        <div class="card stretch stretch-full border-0 rounded">
                            <div class="position-relative">
                                @if($provider->cover)
                                    <img id="coverPreview" src="{{ asset('storage/' . $provider->cover) }}" alt="Cover"
                                        style="height: 18em; width: 100%; object-fit: cover;"/>
                                @else
                                    <img id="coverPreview" src="" alt="Cover"
                                        style="height: 18em; width: 100%; object-fit: cover; display: none;"/>
                                @endif
                                <div class="wd-10 ht-10 text-success rounded-circle position-absolute translate-middle" style="bottom: 10%; right: 3%;">
                                    <label for="coverInput" class="overflow-hidden">
                                        <i class="fa-solid fa-pen-to-square border rounded-circle p-3 bg-light"
                                        style="cursor: pointer;"></i>
                                        <input type="file" class="form-control" id="coverInput" name="cover" style="opacity: 0; visibility: hidden;" accept="image/*">
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card border-top-0">

                        <div class="card-header p-0">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs flex-wrap w-100 text-center customers-nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item flex-fill border-top" role="presentation">
                                    <a href="javascript:void(0);" class="nav-link active" data-bs-toggle="tab" data-bs-target="#overviewTab" role="tab">{{ old('name', $provider->name) ?: 'Kompaniya' }}</a>
                                </li>
                                <li class="nav-item flex-fill border-top" role="presentation">
                                    <a href="javascript:void(0);" class="nav-link" data-bs-toggle="tab" data-bs-target="#portfolioTab" role="tab">Portfolio</a>
                                </li>
                                <li class="nav-item flex-fill border-top" role="presentation">
                                    <a href="javascript:void(0);" class="nav-link" data-bs-toggle="tab" data-bs-target="#awardsTab" role="tab">Mukofot</a>
                                </li>
                                <li class="nav-item flex-fill border-top" role="presentation">
                                    <a href="javascript:void(0);" class="nav-link" data-bs-toggle="tab" data-bs-target="#menenjerTab" role="tab">Menenjer</a>
                                </li>
                                <li class="nav-item flex-fill border-top" role="presentation">
                                    <a href="javascript:void(0);" class="nav-link" data-bs-toggle="tab" data-bs-target="#badgesTab" role="tab">Hamkorlik havolalari</a>
                                </li>
                                <li class="nav-item flex-fill border-top" role="presentation">
                                    <a href="javascript:void(0);" class="nav-link" data-bs-toggle="tab" data-bs-target="#reviewsTab" role="tab">Sharhlar</a>
                                </li>
                            </ul>
                        </div>

                        <div class="tab-content">

                            <div class="tab-pane fade show active p-4" id="overviewTab" role="tabpanel">
                                <div class="about-section mb-5">
                                    <div class="mb-4 d-flex align-items-center justify-content-between">
                                        <h5 class="fw-bold mb-0">{{ old('name', $provider->name) ?: 'Kompaniya' }} haqida:</h5>
                                    </div>
                                    <div class="col-12">
                                        <textarea class="form-control" name="description" style="height: 18em;">{{ old('description', $provider->description) }}</textarea>
                                    </div>
                                </div>
                                <div class="profile-details mb-5">
                                    <div class="mb-4 d-flex align-items-center justify-content-between">
                                        <h5 class="fw-bold mb-0">Profile:</h5>
                                    </div>

                                    <div class="row g-0 mb-4">
                                        <div class="col-sm-6 text-muted">Kompaniya nomi:</div>
                                        <div class="col-sm-6 fw-semibold">
                                            <input type="text" class="form-control" id="nameInput" placeholder="Name" name="name" value="{{ old('name', $provider->name) }}">
                                        </div>
                                    </div>

                                    <div class="row g-0 mb-4">
                                        <div class="col-sm-6 text-muted">Shior:</div>
                                        <div class="col-sm-6 fw-semibold">
                                            <input type="text" class="form-control" id="taglineInput" placeholder="Tagline" name="tagline" value="{{ old('tagline', $provider->tagline) }}">
                                        </div>
                                    </div>

                                    <div class="row g-0 mb-4">
                                        <div class="col-sm-6 text-muted">Manzil:</div>
                                        <div class="col-sm-6 fw-semibold">
                                            <input type="text" class="form-control" id="addressInput" placeholder="Address" name="address" value="California, United States">
                                        </div>
                                    </div>

                                    <div class="row g-0 mb-4">
                                        <div class="col-sm-6 text-muted">Telefon raqam:</div>
                                        <div class="col-sm-6 fw-semibold">
                                            <input type="tel" class="form-control" id="phoneInput" placeholder="Email" name="phone" value="+998 (93) 932 12 12">
                                        </div>
                                    </div>

                                    <div class="row g-0 mb-4">
                                        <div class="col-sm-6 text-muted">Email:</div>
                                        <div class="col-sm-6 fw-semibold">
                                            <input type="email" class="form-control" id="emailInput" placeholder="Email" name="email" value="{{ old('email', $provider->email) }}">
                                        </div>
                                    </div>

                                    <div class="row g-0 mb-4">
                                        <div class="col-sm-6 text-muted">Xizmatlar:</div>
                                        <div class="col-sm-6 fw-semibold">
                                            <select class="form-select form-control max-select" data-select2-selector="tag" multiple>
                                                <option value="success" data-bg="bg-success">Tanlang</option>
                                                @foreach($services as $service)
                                                    <option value="{{ $service->id }}" {{ $provider->service_id == $service->id ? 'selected' : '' }}>
                                                        {{ $service->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row g-0 mb-4">
                                        <div class="col-sm-6 text-muted">Tashkil etilgan sana:</div>
                                        <div class="col-sm-6 fw-semibold">
                                                <input type="date" class="form-control" id="foundedAtInput" name="foundedAt" value="{{ old('foundedAt', $provider->foundedAt) }}">
                                        </div>
                                    </div>

                                    <div class="row g-0 mb-4">
                                        <div class="col-sm-6 text-muted">Xizmat narxi:</div>
                                        <div class="col-sm-6 fw-semibold">
                                            <input type="text" class="form-control" id="turnoverInput" placeholder="Turnover" name="turnover" value="{{ old('turnover', $provider->turnover) }}">
                                        </div>
                                    </div>

                                    <div class="row g-0 mb-4">
                                        <div class="col-sm-6 text-muted">Jamoa hajmi:</div>
                                        <div class="col-sm-6 fw-semibold">
                                            <select class="form-select form-control" id="teamSizeInput"  name="teamSize">
                                                <option value="success" data-bg="bg-success">Tanlang</option>
                                                <option value="1-5" data-bg="bg-success">1-5</option>
                                                <option value="5-10" data-bg="bg-success">5-10</option>
                                                <option value="11-20" data-bg="bg-success">11-20</option>
                                                <option value="20-30" data-bg="bg-success">20-30</option>
                                                <option value="50-100" data-bg="bg-success">50-100</option>
                                                <option value="100-1000" data-bg="bg-success">100-1000</option>
                                            </select>

                                        </div>
                                    </div>

                                    <div class="row g-0 mb-4 providerSubmit" id="providerSubmit" style="display: none;">
                                        <button type="submit" class="btn btn-primary">Saqlash</button>
                                    </div>

                                </div>
                                <div class="alert alert-dismissible mb-4 p-4 d-flex alert-soft-warning-message profile-overview-alert" role="alert">
                                    <div class="me-4 d-none d-md-block">
                                        <i class="feather feather-alert-triangle fs-1"></i>
                                    </div>
                                    <div>
                                        <p class="fw-bold mb-1 text-truncate-1-line">Hisobingizni doimiy yurutib borishingiz kerak</p>
                                        <p class="fs-10 fw-medium text-uppercase text-truncate-1-line">So'ngi yangilanish: <strong>31 Avg, 2024</strong></p>
                                        <a href="javascript:void(0);" class="btn btn-sm bg-soft-warning text-warning d-inline-block">Batafsil o'qish</a>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade p-4" id="portfolioTab" role="tabpanel">
                                <div class="col-12">
                                    <div class="card stretch stretch-full">
                                        <div class="card-header">
                                            <h5 class="card-title">Portfolio</h5>
                                        </div>
                                        <div class="card-body p-0">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <tbody>

                                                        <tr>
                                                            <td>
                                                                <div class="hstack gap-3">
                                                                    <div class="avatar-image avatar-lg rounded">
                                                                        <img class="img-fluid" src="assets/images/gallery/1.png" alt="">
                                                                    </div>
                                                                    <div>
                                                                        <a href="javascript:void(0);" class="d-block">Headphones JBL</a>
                                                                        <span class="fs-12 text-muted">Electronics </span>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>23 Avg 2024</td>
                                                            <td class="text-end">Suhrob manager</td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <a href="javascript:void(0);" class="card-footer fs-11 fw-bold text-uppercase text-center"
                                            data-bs-toggle="offcanvas" data-bs-target="#portfolioProviderOffcanvas">Add New</a>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade p-4" id="awardsTab" role="tabpanel">
                                <div class="col-12">
                                    <div class="card stretch stretch-full">
                                        <div class="card-header">
                                            <h5 class="card-title">Awards</h5>
                                        </div>
                                        <div class="card-body custom-card-action p-0">
                                            <div class="table-responsive">
                                                <table class="table table-hover mb-0">
                                                    <thead>
                                                        <tr class="border-b">
                                                            <th scope="row">Users</th>
                                                            <th>Proposal</th>
                                                            <th>Date</th>
                                                            <th>Status</th>
                                                            <th class="text-end">Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        <tr>
                                                            <td>
                                                                <div class="d-flex align-items-center gap-3">
                                                                    <div class="avatar-image rounded">
                                                                        <img src="assets/images/avatar/2.png" alt="" class="img-fluid">
                                                                    </div>
                                                                    <a href="javascript:void(0);">
                                                                        <span class="d-block">Archie Cantones</span>
                                                                        <span class="fs-12 d-block fw-normal text-muted">arcie.tones@gmail.com</span>
                                                                    </a>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <span class="badge bg-gray-200 text-dark">Sent</span>
                                                            </td>
                                                            <td>11/06/2023 10:53</td>
                                                            <td>
                                                                <span class="badge bg-soft-success text-success">Completed</span>
                                                            </td>
                                                            <td class="text-end">
                                                                <a href="javascript:void(0);"><i class="feather-more-vertical"></i></a>
                                                            </td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <a href="javascript:void(0);" class="card-footer fs-11 fw-bold text-uppercase text-center"
                                            data-bs-toggle="offcanvas" data-bs-target="#awardProviderOffcanvas">Add New</a>

                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade p-4" id="menenjerTab" role="tabpanel">
                                <div class="col-12">
                                    <div class="card stretch stretch-full">
                                        <div class="card-header">
                                            <h5 class="card-title">Menenjer</h5>
                                        </div>
                                        <div class="card-body custom-card-action p-0">
                                            <div class="table-responsive">
                                                <table class="table table-hover mb-0">
                                                    <thead>
                                                        <tr class="border-b">
                                                            <th scope="row">Users</th>
                                                            <th>Proposal</th>
                                                            <th>Date</th>
                                                            <th>Status</th>
                                                            <th class="text-end">Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach( $providers as $provider)
                                                        <tr>
                                                            <td>
                                                                <div class="d-flex align-items-center gap-3">
                                                                    <div class="avatar-image">
                                                                        <img src="assets/images/avatar/2.png" alt="" class="img-fluid">
                                                                    </div>
                                                                    <a href="javascript:void(0);">
                                                                        <span class="d-block">{{ $provider->manager_name}}</span>
                                                                        <span class="fs-12 d-block fw-normal text-muted">{{ $provider->manager_email}}</span>
                                                                    </a>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <span class="badge bg-gray-200 text-dark">Sent</span>
                                                            </td>
                                                            <td>11/06/2023 10:53</td>
                                                            <td>
                                                                <span class="badge bg-soft-success text-success">Completed</span>
                                                            </td>
                                                            <td class="text-end">
                                                                <a href="javascript:void(0);"><i class="feather-more-vertical"></i></a>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <a href="javascript:void(0);" class="card-footer fs-11 fw-bold text-uppercase text-center"
                                            data-bs-toggle="offcanvas" data-bs-target="#managerProviderOffcanvas">Add New</a>

                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade p-4" id="badgesTab" role="tabpanel">
                                <h4>
                                    Badges
                                </h4>
                            </div>

                            <div class="tab-pane fade p-4" id="reviewsTab" role="tabpanel">
                                <div class="col-12">
                                    <div class="card stretch stretch-full">
                                        <div class="card-header">
                                            <h5 class="card-title">Reviews</h5>
                                        </div>
                                        <div class="card-body custom-card-action p-0">
                                            <div class="table-responsive">
                                                <table class="table table-hover mb-0">
                                                    <thead>
                                                        <tr class="border-b">
                                                            <th scope="row">Users</th>
                                                            <th>Proposal</th>
                                                            <th>Date</th>
                                                            <th>Status</th>
                                                            <th class="text-end">Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        <tr>
                                                            <td>
                                                                <div class="d-flex align-items-center gap-3">
                                                                    <div class="avatar-image rounded">
                                                                        <img src="assets/images/avatar/2.png" alt="" class="img-fluid">
                                                                    </div>
                                                                    <a href="javascript:void(0);">
                                                                        <span class="d-block">Archie Cantones</span>
                                                                        <span class="fs-12 d-block fw-normal text-muted">arcie.tones@gmail.com</span>
                                                                    </a>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <span class="badge bg-gray-200 text-dark">Sent</span>
                                                            </td>
                                                            <td>11/06/2023 10:53</td>
                                                            <td>
                                                                <span class="badge bg-soft-success text-success">Completed</span>
                                                            </td>
                                                            <td class="text-end">
                                                                <a href="javascript:void(0);"><i class="feather-more-vertical"></i></a>
                                                            </td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <a href="javascript:void(0);" class="card-footer fs-11 fw-bold text-uppercase text-center"
                                            data-bs-toggle="offcanvas" data-bs-target="#reviewProviderOffcanvas">Add New</a>

                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- [ Main Content ] end -->
</div>

@include('admin.components.portfolios.provider-portfolio-modal')
@include('admin.components.managers.provider-manager-modal')
@include('admin.components..awards.provider-award-modal')
@include('admin.components.reviews.provider-review-modal')

<script>
    const coverInput = document.getElementById('coverInput');
    const coverPreview = document.getElementById('coverPreview');

    coverInput.addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            // Yangi yuklangan rasm URL'ini yaratish va img elementiga o'rnatish
            coverPreview.src = URL.createObjectURL(file);
            coverPreview.style.display = 'block'; // Agar rasm avval mavjud bo'lmagan bo'lsa, ko'rsatish
        }
    });

    const logoInput = document.getElementById('logoInput');
    const avatarPreview = document.getElementById('avatarPreview');

    logoInput.addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            // Yangi yuklangan rasm URL'ini yaratish va img elementiga o'rnatish
            avatarPreview.src = URL.createObjectURL(file);
        }
    });

    // name atributiga ega barcha input, textarea va select elementlarini qidiramiz
    const formInputs = document.querySelectorAll('form [name]');
    const submitButtonRow = document.getElementById('providerSubmit');

    formInputs.forEach(input => {
        input.addEventListener('input', function() {
            // Agar inputda o'zgarish bo'lsa, submit tugmasini ko'rsatamiz
            submitButtonRow.style.display = 'block';
        });
    });
</script>

@endsection
