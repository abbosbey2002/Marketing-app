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
                                data-bs-target="#">
                                <i class="feather-plus me-2"></i>
                                <span>Add New</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="content-area-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="card mb-0">
                        <form action="{{ route('providers.update', $provider->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-xxl-4 col-xl-6">
                                    <div class="card stretch stretch-full">
                                        <div class="card-body">
                                            <div class="mb-4 text-center">
                                                <div class="wd-150 ht-150 mx-auto mb-3 position-relative">
                                                    <div
                                                        class="avatar-image wd-150 ht-150 border border-5 border-gray-3 position-relative">
                                                        <img id="avatarPreview"
                                                        src="{{ $provider->logo ? asset('storage/' . $provider->logo) : $defaultimage }}" alt=""
                                                        style="height: 18em; width: 100%; object-fit: cover;" 
                                                            class="img-fluid" />
                                                    </div>
                                                    <div class="wd-10 ht-10 text-success rounded-circle position-absolute translate-middle"
                                                        style="top: 68%; right: 18px">
                                                        <label for="logoInput" class="overflow-hidden">
                                                            <i class="fa-solid fa-pen-to-square border rounded-circle p-3 bg-light"
                                                                style="cursor: pointer;"></i>
                                                            <input type="file" class="form-control" id="logoInput"
                                                                name="logo" style="opacity: 0; visibility: hidden;"
                                                                accept="image/*">
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="mb-4">

                                                    <a href="javascript:void(0);" class="fs-14 fw-bold d-block">
                                                        {{ old('name', $provider->name) }}</a>
                                                    <a href="javascript:void(0);"
                                                        class="fs-12 fw-normal text-muted d-block">{{ old('email', $provider->email) }}</a>
                                                </div>
                                                <div
                                                    class="fs-12 fw-normal text-muted text-center d-flex flex-wrap gap-3 mb-4">
                                                    <div
                                                        class="flex-fill py-3 px-4 rounded-1 d-none d-sm-block border border-dashed border-gray-5">
                                                        <h6 class="fs-15 fw-bolder">28.65K</h6>
                                                        <p class="fs-12 text-muted mb-0">Obunachilar</p>
                                                    </div>
                                                    <div
                                                        class="flex-fill py-3 px-4 rounded-1 d-none d-sm-block border border-dashed border-gray-5">
                                                        <h6 class="fs-15 fw-bolder">38.85K</h6>
                                                        <p class="fs-12 text-muted mb-0">Kuzatish</p>
                                                    </div>
                                                    <div
                                                        class="flex-fill py-3 px-4 rounded-1 d-none d-sm-block border border-dashed border-gray-5">
                                                        <h6 class="fs-15 fw-bolder">43.67K</h6>
                                                        <p class="fs-12 text-muted mb-0">Izoxlar</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <ul class="list-unstyled mb-4">
                                                <li class="hstack justify-content-between mb-4">
                                                    <span class="text-muted fw-medium hstack gap-3"><i
                                                            class="feather-phone"></i>Phone</span>
                                                    <a href="javascript:void(0);"
                                                        class="float-end">{{ old('tagline', $provider->phone) }}</a>
                                                </li>

                                                <li class="hstack justify-content-between mb-4">
                                                    <span class="text-muted fw-medium hstack gap-3"><i
                                                            class="feather-mail"></i>Email</span>
                                                    <a href="javascript:void(0);"
                                                        class="float-end">{{ old('email', $provider->email) }}</a>
                                                </li>
                                                <li class="hstack justify-content-between mb-4">
                                                    <span class="text-muted fw-medium hstack gap-3"><i
                                                            class="feather-map-pin"></i>Location</span>
                                                            <a href="javascript:void(0);" title="{{old('tagline', $provider->address)}}" class="float-end long-text" onclick="toggleAddress(this)">
                                                                {{ Str::limit(old('tagline', $provider->address), 20) }} <!-- Laravel yordamida matnni cheklash -->
                                                            </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-8 col-xl-6">
                                    <div class="col-12">
                                        <div class="card stretch stretch-full border-0 rounded">
                                            <div class="position-relative">
                                                    <img id="coverPreview"
                                                    src="{{ $provider->cover ? asset('storage/' . $provider->cover) : $defaultimage }}"
                                                        alt="Cover"
                                                        style="height: 18em; width: 100%; object-fit: cover;" />
                                                <div class="wd-10 ht-10 text-success rounded-circle position-absolute translate-middle"
                                                    style="bottom: 10%; right: 3%;">
                                                    <label for="coverInput" class="overflow-hidden">
                                                        <i class="fa-solid fa-pen-to-square border rounded-circle p-3 bg-light"
                                                            style="cursor: pointer;"></i>
                                                        <input type="file" class="form-control" id="coverInput"
                                                            name="cover" style="opacity: 0; visibility: hidden;"
                                                            accept="image/*">
                                                    </label>
                                                    @error('cover')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card border-top-0">

                                        {{-- <div class="card-header p-0">
                                            <!-- Nav tabs -->
                                            <ul class="nav nav-tabs flex-wrap w-100 text-center customers-nav-tabs"
                                                id="myTab" role="tablist">
                                                <li class="nav-item flex-fill border-top" role="presentation">
                                                    <a href="javascript:void(0);" class="nav-link active"
                                                        data-bs-toggle="tab" data-bs-target="#overviewTab"
                                                        role="tab">{{ old('name', $provider->name) ?: 'Kompaniya' }}</a>
                                                </li>
                                               
                                            </ul>
                                        </div> --}}

                                        <div class="tab-content">

                                            <div class="tab-pane fade show active p-4" id="overviewTab" role="tabpanel">
                                                <div class="about-section mb-5">
                                                    <div class="mb-4 d-flex align-items-center justify-content-between">
                                                        <h5 class="fw-bold mb-0">
                                                            {{ old('name', $provider->name) ?: 'Kompaniya' }}
                                                            haqida:</h5>
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
                                                            <input type="text" class="form-control" id="nameInput"
                                                                placeholder="Name" name="name"
                                                                value="{{ old('name', $provider->name) }}">
                                                        </div>
                                                    </div>

                                                    <div class="row g-0 mb-4">
                                                        <div class="col-sm-6 text-muted">Shior:</div>
                                                        <div class="col-sm-6 fw-semibold">
                                                            <input type="text" class="form-control" id="taglineInput"
                                                                placeholder="Tagline" name="tagline"
                                                                value="{{ old('tagline', $provider->tagline) }}">
                                                        </div>
                                                    </div>

                                                    <div class="row g-0 mb-4">
                                                        <div class="col-sm-6 text-muted">Manzil:</div>
                                                        <div class="col-sm-6 fw-semibold">
                                                            <input type="text" class="form-control" id="addressInput"
                                                                placeholder="Address" name="address"
                                                                value="{{ old('tagline', $provider->address) }}">
                                                        </div>
                                                    </div>

                                                    <div class="row g-0 mb-4">
                                                        <div class="col-sm-6 text-muted">Telefon raqam:</div>
                                                        <div class="col-sm-6 fw-semibold">
                                                            <input type="tel" class="form-control" id="phoneInput"
                                                                placeholder="Phone number" name="phone"
                                                                value="{{ old('phone', $provider->phone) }}">
                                                        </div>
                                                    </div>

                                                    <div class="row g-0 mb-4">
                                                        <div class="col-sm-6 text-muted">Email:</div>
                                                        <div class="col-sm-6 fw-semibold">
                                                            <input type="email" class="form-control" id="emailInput"
                                                                placeholder="Email" name="email"
                                                                value="{{ old('email', $provider->email) }}">
                                                        </div>
                                                    </div>

                                                    <div class="row g-0 mb-4">
                                                        <div class="col-sm-6 text-muted">Languages:</div>
                                                        <div class="col-sm-6 fw-semibold">

                                                            <select class="form-select form-control max-select"
                                                                name="languages[]" data-select2-selector="tag" multiple>
                                                                @foreach ($languages as $language)
                                                                    <option value="{{ $language->code }}"
                                                                        @if (in_array($language->code, $providerLanguageCodes)) selected @endif>
                                                                        {{ $language->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="row g-0 mb-4">
                                                        <div class="col-sm-6 text-muted">Tashkil etilgan sana:</div>
                                                        <div class="col-sm-6 fw-semibold">
                                                            <input type="date" class="form-control"
                                                                id="foundedAtInput" name="foundedAt"
                                                                value="{{ old('foundedAt', $provider->foundedAt) }}">
                                                        </div>
                                                    </div>

                                                    <div class="row g-0 mb-4">
                                                        <div class="col-sm-6 text-muted">Xizmat narxi:</div>
                                                        <div class="col-sm-6 fw-semibold">
                                                            <input type="text" class="form-control" id="turnoverInput"
                                                                placeholder="Turnover" name="turnover"
                                                                value="{{ old('turnover', $provider->turnover) }}">
                                                        </div>
                                                    </div>


                                                    <div class="row g-0 mb-4">
                                                        <div class="col-sm-6 text-muted">Jamoa hajmi:</div>
                                                        <div class="col-sm-6 fw-semibold">
                                                            <input type="number" class="form-control" id="teamSizeInput"
                                                                name="teamSize"
                                                                value="{{ old('foundedAt', $provider->teamSize) }}">
                                                        </div>
                                                    </div>

                                                    <div class="row g-0 mb-4 providerSubmit" id="providerSubmit"
                                                        style="display: none;">
                                                        <button type="submit" class="btn btn-primary">Saqlash</button>
                                                    </div>

                                                </div>
                                                <div class="alert alert-dismissible mb-4 p-4 d-flex alert-soft-warning-message profile-overview-alert"
                                                    role="alert">
                                                    <div class="me-4 d-none d-md-block">
                                                        <i class="feather feather-alert-triangle fs-1"></i>
                                                    </div>
                                                    <div>
                                                        <p class="fw-bold mb-1 text-truncate-1-line">Hisobingizni doimiy
                                                            yurutib
                                                            borishingiz kerak</p>
                                                        <p class="fs-10 fw-medium text-uppercase text-truncate-1-line">
                                                            So'ngi
                                                            yangilanish: <strong>31 Avg, 2024</strong></p>
                                                        <a href="javascript:void(0);"
                                                            class="btn btn-sm bg-soft-warning text-warning d-inline-block">Batafsil
                                                            o'qish</a>
                                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                            aria-label="Close"></button>
                                                    </div>
                                                </div>
                                            </div>

                                            

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <!-- [ Content Area ] end -->
        </div>
        <!-- [ Main Content ] end -->
    </div>

    {{-- @include('admin.components.portfolios.provider-portfolio-modal') --}}
    {{-- @include('admin.components.managers.provider-manager-modal') --}}
    {{-- @include('admin.components..awards.provider-award-modal') --}}
    {{-- @include('admin.components.reviews.provider-review-modal') --}}

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
