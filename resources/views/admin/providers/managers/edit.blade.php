@extends('admin.layouts.main')

@section('content')
    <!-- Main Content -->
    <div class="nxl-content">
        <!-- [ page-header ] start -->
        <div class="page-header">
            <div class="page-header-left d-flex align-items-center">
                <div class="page-header-title">
                    <h5 class="m-b-10">Manager</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
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
                        <a href="javascript:void(0);" class="btn btn-light-brand successAlertMessage">
                            <i class="feather-layers me-2"></i>
                            <span>Save as Draft</span>
                        </a>
                        <a href="javascript:void(0);" onclick="updateMangerProfile()"
                            class="btn btn-primary successAlertMessage">
                            <i class="feather-user me-2"></i>
                            <span>Save changes</span>
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
        <script>
            function updateMangerProfile() {
                document.getElementById("managerUpdateProfile").submit();
            }
        </script>
        <!-- [ page-header ] end -->
        <!-- [ Main Content ] start -->
        <div class="main-content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card border-top-0">
                        <div class="card-header p-0">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs flex-wrap w-100 text-center customers-nav-tabs" id="myTab"
                                role="tablist">
                                <li class="nav-item flex-fill border-top" role="presentation">
                                    <a href="javascript:void(0);" class="nav-link active" data-bs-toggle="tab"
                                        data-bs-target="#profileTab" role="tab">Profile</a>
                                </li>
                                <li class="nav-item flex-fill border-top" role="presentation">
                                    <a href="javascript:void(0);" class="nav-link" data-bs-toggle="tab"
                                        data-bs-target="#passwordTab" role="tab">Password</a>
                                </li>
                                <li class="nav-item flex-fill border-top" role="presentation">
                                    <a href="javascript:void(0);" class="nav-link" data-bs-toggle="tab"
                                        data-bs-target="#billingTab" role="tab">Billing &amp; Shipping</a>
                                </li>
                                <li class="nav-item flex-fill border-top" role="presentation">
                                    <a href="javascript:void(0);" class="nav-link" data-bs-toggle="tab"
                                        data-bs-target="#subscriptionTab" role="tab">Subscription</a>
                                </li>
                                <li class="nav-item flex-fill border-top" role="presentation">
                                    <a href="javascript:void(0);" class="nav-link" data-bs-toggle="tab"
                                        data-bs-target="#notificationsTab" role="tab">Notifications</a>
                                </li>
                                <li class="nav-item flex-fill border-top" role="presentation">
                                    <a href="javascript:void(0);" class="nav-link" data-bs-toggle="tab"
                                        data-bs-target="#connectionTab" role="tab">Connection</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="profileTab" role="tabpanel">
                                <form method="POST" id="managerUpdateProfile"
                                    action="{{ route('users.update', $manager->user_id) }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="card-body personal-info">
                                        <div class="mb-4 d-flex align-items-center justify-content-between">
                                            <h5 class="fw-bold mb-0 me-4">
                                                <span class="d-block mb-2">Personal Information:</span>
                                                <span class="fs-12 fw-normal text-muted text-truncate-1-line">Following
                                                    information is publicly displayed, be careful! </span>
                                            </h5>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-light-brand">Add New</a>
                                        </div>
                                        <div class="row mb-4 align-items-center">

                                            <div class="col-lg-4">
                                                <label class="fw-semibold">Avatar: </label>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="mb-4 mb-md-0 d-flex gap-4 your-brand">
                                                    <div
                                                        class="wd-100 ht-100 position-relative overflow-hidden border border-gray-2 rounded">
                                                        @if ($manager->user->avatar)
                                                            <img src="{{ asset('storage/' . $manager->user->avatar) }}"
                                                                id="avatarInput"
                                                                class="upload-pic custom-upload-image img-fluid rounded h-100 w-100"
                                                                alt="">
                                                        @else
                                                            <img src="{{ asset('/assets/imgs/default/default.webp') }}"
                                                                class="upload-pic custom-upload-image img-fluid rounded h-100 w-100"
                                                                alt="">
                                                        @endif
                                                        <div
                                                            class="position-absolute start-50 top-50 end-0 bottom-0 translate-middle h-100 w-100 hstack align-items-center justify-content-center c-pointer upload-button">
                                                            <i class="feather feather-camera" aria-hidden="true"></i>
                                                        </div>
                                                        <input class="file-upload" name="avatar" type="file"
                                                            accept="image/*">
                                                    </div>
                                                    <div class="d-flex flex-column gap-1">
                                                        <div class="fs-11 text-gray-500 mt-2"># Upload your prifile</div>
                                                        <div class="fs-11 text-gray-500"># Avatar size 150x150</div>
                                                        <div class="fs-11 text-gray-500"># Max upload size 2mb</div>
                                                        <div class="fs-11 text-gray-500"># Allowed file types: png, jpg,
                                                            jpeg
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="fullnameInput" class="fw-semibold">Image: </label>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="feather-user"></i></div>
                                                    <input type="file" accept="image/*" name="avatar" class="form-control" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="fullnameInput" class="fw-semibold">Name: </label>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="feather-user"></i></div>
                                                    <input type="text" name="name"
                                                        value=" {{ $manager->user->name }}" class="form-control"
                                                        id="fullnameInput" placeholder="Name">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="mailInput" class="fw-semibold">Email: </label>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="feather-mail"></i></div>
                                                    <input type="text" name="email"
                                                        value="{{ $manager->user->email }}" class="form-control"
                                                        id="mailInput" placeholder="Email">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="phoneInput" class="fw-semibold">Phone: </label>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="feather-phone"></i></div>
                                                    <input type="text" name="phone"
                                                        value="{{ $manager->user->phone }}" class="form-control"
                                                        id="phoneInput" placeholder="Phone">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="companyInput" class="fw-semibold">Company: </label>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="feather-compass"></i></div>
                                                    <input type="text" value=" {{ $manager->provider->name }}"
                                                        class="form-control" id="companyInput" placeholder="Company">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="designationInput" class="fw-semibold">Designation: </label>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="feather-briefcase"></i></div>
                                                    <input type="text" name="address"
                                                        value="{{ $manager->user->address ?? '' }}" class="form-control"
                                                        id="designationInput" placeholder="Designation">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="aboutInput" class="fw-semibold">About: </label>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="feather-type"></i></div>
                                                    <textarea name="bio" class="form-control" id="bioInput" cols="30" rows="5" placeholder="About">{{ old('bio', $manager->user->bio) }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        {{--  --}}
                                        <hr />
                                        <span class="border rounded border-danger px-3 py-1 text-danger text">Tez kunda
                                            :)</span>
                                        <hr />
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="websiteInput" class="fw-semibold">Website: </label>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="feather-link"></i></div>
                                                    <input type="text" class="form-control" id="websiteInput"
                                                        placeholder="Website">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="VATInput" class="fw-semibold">VAT: </label>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="feather-dollar-sign"></i>
                                                    </div>
                                                    <input type="text" class="form-control" id="VATInput"
                                                        placeholder="VAT">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4 align-items-center">
                                            <div class="col-lg-4">
                                                <label for="addressInput_2" class="fw-semibold">Address: </label>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="feather-map-pin"></i></div>
                                                    <textarea class="form-control" id="addressInput_2" cols="30" rows="3" placeholder="Address"></textarea>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="passwordTab" role="tabpanel">
                                <div class="card-body pass-info">
                                    <div class="mb-4 d-flex align-items-center justify-content-between">
                                        <h5 class="fw-bold mb-0 me-4">
                                            <span class="d-block mb-2">Password Information:</span>
                                            <span class="fs-12 fw-normal text-muted text-truncate-1-line">You can only
                                                change your password twice within 24 hours! </span>
                                        </h5>
                                        <a href="javascript:void(0);" class="btn btn-sm btn-light-brand">Reset</a>
                                    </div>
                                    <div class="row mb-4 align-items-center">
                                        <div class="col-lg-4">
                                            <label for="Input" class="fw-semibold">Password: </label>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="input-group">
                                                <div class="input-group-text"><i class="feather-key"></i></div>
                                                <input type="password" class="form-control" id="Input"
                                                    placeholder="Password">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-4 align-items-center">
                                        <div class="col-lg-4">
                                            <label for="Input" class="fw-semibold">Password Confirm: </label>
                                        </div>
                                        <div class="col-lg-8 generate-pass">
                                            <div class="input-group field">
                                                <div class="input-group-text"><i class="feather-key"></i></div>
                                                <input type="password" class="form-control password" id="newPassword"
                                                    placeholder="Password Confirm">
                                                <div class="input-group-text c-pointer gen-pass"><i
                                                        class="feather-hash"></i></div>
                                                <div class="input-group-text border-start bg-gray-2 c-pointer show-pass">
                                                    <i></i>
                                                </div>
                                            </div>
                                            <div class="progress-bar mt-2">
                                                <div></div>
                                                <div></div>
                                                <div></div>
                                                <div></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pass-hint">
                                        <p class="fw-bold">Password Requirements:</p>
                                        <ul class="fs-12 ps-1 ms-2 text-muted">
                                            <li class="mb-1">At least one lowercase character</li>
                                            <li class="mb-1">Minimum 8 characters long - the more, the better</li>
                                            <li>At least one number, symbol, or whitespace character</li>
                                        </ul>
                                    </div>
                                </div>
                                <hr class="my-0">
                                <div class="card-body pass-security">
                                    <div class="mb-4 d-flex align-items-center justify-content-between">
                                        <h5 class="fw-bold mb-0 me-4">
                                            <span class="d-block mb-2">Security preferences:</span>
                                            <span class="fs-12 fw-normal text-muted text-truncate-1-line">Keep your account
                                                more secure with following preferences. </span>
                                        </h5>
                                        <a href="javascript:void(0);" class="btn btn-sm btn-light-brand">Check Auth</a>
                                    </div>
                                    <div
                                        class="hstack justify-content-between p-4 mb-3 border border-dashed border-gray-3 rounded-1">
                                        <div class="hstack me-4">
                                            <div class="avatar-text">
                                                <i class="feather-eye"></i>
                                            </div>
                                            <div class="ms-4">
                                                <a href="javascript:void(0);"
                                                    class="fw-bold mb-1 text-truncate-1-line">Enable 2-step
                                                    authentication</a>
                                                <div class="fs-12 text-muted text-truncate-1-line">Protects you against
                                                    password theft by requesting an authentication code via SMS on every
                                                    login.</div>
                                            </div>
                                        </div>
                                        <div class="form-check form-switch form-switch-sm">
                                            <label class="form-check-label fw-500 text-dark c-pointer"
                                                for="formSwitch2FA"></label>
                                            <input class="form-check-input c-pointer" type="checkbox" id="formSwitch2FA">
                                        </div>
                                    </div>
                                    <div
                                        class="hstack justify-content-between p-4 mb-3 border border-dashed border-gray-3 rounded-1">
                                        <div class="hstack me-4">
                                            <div class="avatar-text">
                                                <i class="feather-shield"></i>
                                            </div>
                                            <div class="ms-4">
                                                <a href="javascript:void(0);"
                                                    class="fw-bold mb-1 text-truncate-1-line">Ask to change password on
                                                    every 6 months</a>
                                                <div class="fs-12 text-muted text-truncate-1-line">A simple but an
                                                    effective way to be protected against data leaks and password theft.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-check form-switch form-switch-sm">
                                            <label class="form-check-label fw-500 text-dark c-pointer"
                                                for="formSwitchPassChange"></label>
                                            <input class="form-check-input c-pointer" type="checkbox"
                                                id="formSwitchPassChange">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="billingTab" role="tabpanel">
                                <div class="card-body pass-info">
                                    <div class="mb-4 d-flex align-items-center justify-content-between">
                                        <h5 class="fw-bold mb-0 me-4">
                                            <span class="d-block mb-2">Billing Address:</span>
                                            <span class="fs-12 fw-normal text-muted text-truncate-1-line">A billing address
                                                is the address associated with a payment method.</span>
                                        </h5>
                                        <a href="javascript:void(0);" class="btn btn-sm btn-light-brand">Same as Customer
                                            Info</a>
                                    </div>
                                    <div class="row mb-4 align-items-center">
                                        <div class="col-lg-4">
                                            <label for="addressInput_1" class="fw-semibold">Address: </label>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="input-group">
                                                <div class="input-group-text"><i class="feather-map-pin"></i></div>
                                                <textarea class="form-control" id="addressInput_1" cols="30" rows="3" placeholder="Address"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-4 align-items-center">
                                        <div class="col-lg-4">
                                            <label for="zipCodeInput" class="fw-semibold">Zip Code: </label>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="input-group">
                                                <div class="input-group-text"><i class="feather-tag"></i></div>
                                                <input type="number" class="form-control" id="zipCodeInput"
                                                    placeholder="Zip Code">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-4 align-items-center">
                                        <div class="col-lg-4">
                                            <label class="fw-semibold">Country: </label>
                                        </div>
                                        <div class="col-lg-8">
                                            <select class="form-control select2-hidden-accessible"
                                                data-select2-selector="country" data-select2-id="select2-data-52-f114"
                                                tabindex="-1" aria-hidden="true">
                                                <option data-country="af">Afghanistan</option>
                                                <option data-country="ax">Åland Islands</option>
                                                <option data-country="al">Albania</option>
                                                <option data-country="dz">Algeria</option>
                                                <option data-country="as">American Samoa</option>
                                                <option data-country="ad">Andorra</option>
                                                <option data-country="ao">Angola</option>
                                                <option data-country="ai">Anguilla</option>
                                                <option data-country="aq">Antarctica</option>
                                                <option data-country="ag">Antigua &amp; Barbuda</option>
                                                <option data-country="ar">Argentina</option>
                                                <option data-country="am">Armenia</option>
                                                <option data-country="aw">Aruba</option>
                                                <option data-country="au">Australia</option>
                                                <option data-country="at">Austria</option>
                                                <option data-country="az">Azerbaijan</option>
                                                <option data-country="bs">Bahamas</option>
                                                <option data-country="bh">Bahrain</option>
                                                <option data-country="bd">Bangladesh</option>
                                                <option data-country="bb">Barbados</option>
                                                <option data-country="by">Belarus</option>
                                                <option data-country="be">Belgium</option>
                                                <option data-country="bz">Belize</option>
                                                <option data-country="bj">Benin</option>
                                                <option data-country="bm">Bermuda</option>
                                                <option data-country="bt">Bhutan</option>
                                                <option data-country="bo">Bolivia</option>
                                                <option data-country="bq">Caribbean Netherlands</option>
                                                <option data-country="ba">Bosnia &amp; Herzegovina</option>
                                                <option data-country="bw">Botswana</option>
                                                <option data-country="bv">Bouvet Island</option>
                                                <option data-country="br">Brazil</option>
                                                <option data-country="io">British Indian Ocean Territory</option>
                                                <option data-country="bn">Brunei</option>
                                                <option data-country="bg">Bulgaria</option>
                                                <option data-country="bf">Burkina Faso</option>
                                                <option data-country="bi">Burundi</option>
                                                <option data-country="kh">Cambodia</option>
                                                <option data-country="cm">Cameroon</option>
                                                <option data-country="ca">Canada</option>
                                                <option data-country="cv">Cape Verde</option>
                                                <option data-country="ky">Cayman Islands</option>
                                                <option data-country="cf">Central African Republic</option>
                                                <option data-country="td">Chad</option>
                                                <option data-country="cl">Chile</option>
                                                <option data-country="cn">China</option>
                                                <option data-country="cx">Christmas Island</option>
                                                <option data-country="cc">Cocos (Keeling) Islands</option>
                                                <option data-country="co">Colombia</option>
                                                <option data-country="km">Comoros</option>
                                                <option data-country="cg">Congo - Brazzaville</option>
                                                <option data-country="cd">Congo - Kinshasa</option>
                                                <option data-country="ck">Cook Islands</option>
                                                <option data-country="cr">Costa Rica</option>
                                                <option data-country="ci">Côte d'Ivoire</option>
                                                <option data-country="hr">Croatia</option>
                                                <option data-country="cu">Cuba</option>
                                                <option data-country="cu">Curaçao</option>
                                                <option data-country="cy">Cyprus</option>
                                                <option data-country="cz">Czechia</option>
                                                <option data-country="dk">Denmark</option>
                                                <option data-country="dj">Djibouti</option>
                                                <option data-country="dm">Dominica</option>
                                                <option data-country="do">Dominican Republic</option>
                                                <option data-country="ec">Ecuador</option>
                                                <option data-country="eg">Egypt</option>
                                                <option data-country="sv">El Salvador</option>
                                                <option data-country="gq">Equatorial Guinea</option>
                                                <option data-country="er">Eritrea</option>
                                                <option data-country="ee">Estonia</option>
                                                <option data-country="et">Ethiopia</option>
                                                <option data-country="fk">Falkland Islands (Islas Malvinas)</option>
                                                <option data-country="fo">Faroe Islands</option>
                                                <option data-country="fj">Fiji</option>
                                                <option data-country="fi">Finland</option>
                                                <option data-country="fr">France</option>
                                                <option data-country="gf">French Guiana</option>
                                                <option data-country="pf">French Polynesia</option>
                                                <option data-country="tf">French Southern Territories</option>
                                                <option data-country="ga">Gabon</option>
                                                <option data-country="gm">Gambia</option>
                                                <option data-country="ge">Georgia</option>
                                                <option data-country="de">Germany</option>
                                                <option data-country="gh">Ghana</option>
                                                <option data-country="gi">Gibraltar</option>
                                                <option data-country="gr">Greece</option>
                                                <option data-country="gl">Greenland</option>
                                                <option data-country="gd">Grenada</option>
                                                <option data-country="gp">Guadeloupe</option>
                                                <option data-country="gu">Guam</option>
                                                <option data-country="gt">Guatemala</option>
                                                <option data-country="gg">Guernsey</option>
                                                <option data-country="gn">Guinea</option>
                                                <option data-country="gw">Guinea-Bissau</option>
                                                <option data-country="gy">Guyana</option>
                                                <option data-country="ht">Haiti</option>
                                                <option data-country="hm">Heard &amp; McDonald Islands</option>
                                                <option data-country="va">Vatican City</option>
                                                <option data-country="hn">Honduras</option>
                                                <option data-country="hk">Hong Kong</option>
                                                <option data-country="hu">Hungary</option>
                                                <option data-country="is">Iceland</option>
                                                <option data-country="in">India</option>
                                                <option data-country="id">Indonesia</option>
                                                <option data-country="ir">Iran</option>
                                                <option data-country="iq">Iraq</option>
                                                <option data-country="ie">Ireland</option>
                                                <option data-country="im">Isle of Man</option>
                                                <option data-country="il">Israel</option>
                                                <option data-country="it">Italy</option>
                                                <option data-country="jm">Jamaica</option>
                                                <option data-country="jp">Japan</option>
                                                <option data-country="je">Jersey</option>
                                                <option data-country="jo">Jordan</option>
                                                <option data-country="kz">Kazakhstan</option>
                                                <option data-country="ke">Kenya</option>
                                                <option data-country="ki">Kiribati</option>
                                                <option data-country="kp">North Korea</option>
                                                <option data-country="kr">South Korea</option>
                                                <option data-country="xk">Kosovo</option>
                                                <option data-country="kw">Kuwait</option>
                                                <option data-country="kg">Kyrgyzstan</option>
                                                <option data-country="la">Laos</option>
                                                <option data-country="lv">Latvia</option>
                                                <option data-country="lb">Lebanon</option>
                                                <option data-country="ls">Lesotho</option>
                                                <option data-country="lr">Liberia</option>
                                                <option data-country="ly">Libya</option>
                                                <option data-country="li">Liechtenstein</option>
                                                <option data-country="lt">Lithuania</option>
                                                <option data-country="lu">Luxembourg</option>
                                                <option data-country="mo">Macao</option>
                                                <option data-country="mk">North Macedonia</option>
                                                <option data-country="mg">Madagascar</option>
                                                <option data-country="mw">Malawi</option>
                                                <option data-country="my">Malaysia</option>
                                                <option data-country="mv">Maldives</option>
                                                <option data-country="ml">Mali</option>
                                                <option data-country="mt">Malta</option>
                                                <option data-country="mh">Marshall Islands</option>
                                                <option data-country="mq">Martinique</option>
                                                <option data-country="mr">Mauritania</option>
                                                <option data-country="mu">Mauritius</option>
                                                <option data-country="yt">Mayotte</option>
                                                <option data-country="mx">Mexico</option>
                                                <option data-country="fm">Micronesia</option>
                                                <option data-country="md">Moldova</option>
                                                <option data-country="mc">Monaco</option>
                                                <option data-country="mn">Mongolia</option>
                                                <option data-country="me">Montenegro</option>
                                                <option data-country="ms">Montserrat</option>
                                                <option data-country="ma">Morocco</option>
                                                <option data-country="mz">Mozambique</option>
                                                <option data-country="mm">Myanmar (Burma)</option>
                                                <option data-country="na">Namibia</option>
                                                <option data-country="nr">Nauru</option>
                                                <option data-country="np">Nepal</option>
                                                <option data-country="nl">Netherlands</option>
                                                <option data-country="cu">Curaçao</option>
                                                <option data-country="nc">New Caledonia</option>
                                                <option data-country="nz">New Zealand</option>
                                                <option data-country="ni">Nicaragua</option>
                                                <option data-country="ne">Niger</option>
                                                <option data-country="ng">Nigeria</option>
                                                <option data-country="nu">Niue</option>
                                                <option data-country="nf">Norfolk Island</option>
                                                <option data-country="mp">Northern Mariana Islands</option>
                                                <option data-country="no">Norway</option>
                                                <option data-country="om">Oman</option>
                                                <option data-country="pk">Pakistan</option>
                                                <option data-country="pw">Palau</option>
                                                <option data-country="ps">Palestine</option>
                                                <option data-country="pa">Panama</option>
                                                <option data-country="pg">Papua New Guinea</option>
                                                <option data-country="py">Paraguay</option>
                                                <option data-country="pe">Peru</option>
                                                <option data-country="ph">Philippines</option>
                                                <option data-country="pn">Pitcairn Islands</option>
                                                <option data-country="pl">Poland</option>
                                                <option data-country="pt">Portugal</option>
                                                <option data-country="pr">Puerto Rico</option>
                                                <option data-country="qa">Qatar</option>
                                                <option data-country="re">Réunion</option>
                                                <option data-country="ro">Romania</option>
                                                <option data-country="ru">Russia</option>
                                                <option data-country="rw">Rwanda</option>
                                                <option data-country="bl">St. Barthélemy</option>
                                                <option data-country="sh">St. Helena</option>
                                                <option data-country="kn">St. Kitts &amp; Nevis</option>
                                                <option data-country="lc">St. Lucia</option>
                                                <option data-country="mf">St. Martin</option>
                                                <option data-country="pm">St. Pierre &amp; Miquelon</option>
                                                <option data-country="vc">St. Vincent &amp; Grenadines</option>
                                                <option data-country="ws">Samoa</option>
                                                <option data-country="sm">San Marino</option>
                                                <option data-country="st">São Tomé &amp; Príncipe</option>
                                                <option data-country="sa">Saudi Arabia</option>
                                                <option data-country="sn">Senegal</option>
                                                <option data-country="rs">Serbia</option>
                                                <option data-country="sr">Serbia</option>
                                                <option data-country="sc">Seychelles</option>
                                                <option data-country="sl">Sierra Leone</option>
                                                <option data-country="sg">Singapore</option>
                                                <option data-country="sx">Sint Maarten</option>
                                                <option data-country="sk">Slovakia</option>
                                                <option data-country="si">Slovenia</option>
                                                <option data-country="sb">Solomon Islands</option>
                                                <option data-country="so">Somalia</option>
                                                <option data-country="za">South Africa</option>
                                                <option data-country="gs">South Georgia &amp; South Sandwich Islands
                                                </option>
                                                <option data-country="ss">South Sudan</option>
                                                <option data-country="es">Spain</option>
                                                <option data-country="lk">Sri Lanka</option>
                                                <option data-country="sd">Sudan</option>
                                                <option data-country="sr">Suriname</option>
                                                <option data-country="sj">Svalbard &amp; Jan Mayen</option>
                                                <option data-country="sz">Eswatini</option>
                                                <option data-country="se">Sweden</option>
                                                <option data-country="ch">Switzerland</option>
                                                <option data-country="sy">Syria</option>
                                                <option data-country="tw">Taiwan</option>
                                                <option data-country="tj">Tajikistan</option>
                                                <option data-country="tz">Tanzania</option>
                                                <option data-country="th">Thailand</option>
                                                <option data-country="tl">Timor-Leste</option>
                                                <option data-country="tg">Togo</option>
                                                <option data-country="tk">Tokelau</option>
                                                <option data-country="to">Tonga</option>
                                                <option data-country="tt">Trinidad &amp; Tobago</option>
                                                <option data-country="tn">Tunisia</option>
                                                <option data-country="tr">Turkey</option>
                                                <option data-country="tm">Turkmenistan</option>
                                                <option data-country="tc">Turks &amp; Caicos Islands</option>
                                                <option data-country="tv">Tuvalu</option>
                                                <option data-country="ug">Uganda</option>
                                                <option data-country="ua">Ukraine</option>
                                                <option data-country="ae">United Arab Emirates</option>
                                                <option data-country="gb">United Kingdom</option>
                                                <option data-country="us" selected=""
                                                    data-select2-id="select2-data-54-t0z7">United States</option>
                                                <option data-country="um">U.S. Outlying Islands</option>
                                                <option data-country="uy">Uruguay</option>
                                                <option data-country="uz">Uzbekistan</option>
                                                <option data-country="vu">Vanuatu</option>
                                                <option data-country="ve">Venezuela</option>
                                                <option data-country="vn">Vietnam</option>
                                                <option data-country="vg">British Virgin Islands</option>
                                                <option data-country="vi">U.S. Virgin Islands</option>
                                                <option data-country="wf">Wallis &amp; Futuna</option>
                                                <option data-country="eh">Western Sahara</option>
                                                <option data-country="ye">Yemen</option>
                                                <option data-country="zm">Zambia</option>
                                                <option data-country="zw">Zimbabwe</option>
                                            </select><span class="select2 select2-container select2-container--bootstrap-5"
                                                dir="ltr" data-select2-id="select2-data-53-e9kc"
                                                style="width: auto;"><span class="selection"><span
                                                        class="select2-selection select2-selection--single"
                                                        role="combobox" aria-haspopup="true" aria-expanded="false"
                                                        tabindex="0" aria-disabled="false"
                                                        aria-labelledby="select2-oz6r-container"
                                                        aria-controls="select2-oz6r-container"><span
                                                            class="select2-selection__rendered"
                                                            id="select2-oz6r-container" role="textbox"
                                                            aria-readonly="true" title="United States"><span
                                                                class="hstack gap-3"> <img
                                                                    src="./../assets/vendors/img/flags/1x1/us.svg"
                                                                    class="avatar-image avatar-sm"> United
                                                                States</span></span><span class="select2-selection__arrow"
                                                            role="presentation"><b
                                                                role="presentation"></b></span></span></span><span
                                                    class="dropdown-wrapper" aria-hidden="true"></span></span>
                                        </div>
                                    </div>
                                    <div class="row mb-4 align-items-center">
                                        <div class="col-lg-4">
                                            <label class="fw-semibold">State: </label>
                                        </div>
                                        <div class="col-lg-8">
                                            <select class="form-control select2-hidden-accessible"
                                                data-select2-selector="state" data-select2-id="select2-data-64-lpdw"
                                                tabindex="-1" aria-hidden="true">
                                                <option data-state="al">Alabama</option>
                                                <option data-state="ak" selected=""
                                                    data-select2-id="select2-data-66-tg4f">Alaska</option>
                                                <option data-state="as">American Samoa</option>
                                                <option data-state="az">Arizona</option>
                                                <option data-state="ar">Arkansas</option>
                                                <option data-state="um">Baker Island</option>
                                                <option data-state="ca">California</option>
                                                <option data-state="co">Colorado</option>
                                                <option data-state="ct">Connecticut</option>
                                                <option data-state="de">Delaware</option>
                                                <option data-state="dc">District of Columbia</option>
                                                <option data-state="fl">Florida</option>
                                                <option data-state="ga">Georgia</option>
                                                <option data-state="gu">Guam</option>
                                                <option data-state="hi">Hawaii</option>
                                                <option data-state="um">Howland Island</option>
                                                <option data-state="id">Idaho</option>
                                                <option data-state="il">Illinois</option>
                                                <option data-state="in">Indiana</option>
                                                <option data-state="ia">Iowa</option>
                                                <option data-state="um">Jarvis Island</option>
                                                <option data-state="um">Johnston Atoll</option>
                                                <option data-state="ks">Kansas</option>
                                                <option data-state="ky">Kentucky</option>
                                                <option data-state="um">Kingman Reef</option>
                                                <option data-state="la">Louisiana</option>
                                                <option data-state="me">Maine</option>
                                                <option data-state="md">Maryland</option>
                                                <option data-state="ma">Massachusetts</option>
                                                <option data-state="mi">Michigan</option>
                                                <option data-state="um">Midway Atoll</option>
                                                <option data-state="mn">Minnesota</option>
                                                <option data-state="ms">Mississippi</option>
                                                <option data-state="mo">Missouri</option>
                                                <option data-state="mt">Montana</option>
                                                <option data-state="um">Navassa Island</option>
                                                <option data-state="ne">Nebraska</option>
                                                <option data-state="nv">Nevada</option>
                                                <option data-state="nh">New Hampshire</option>
                                                <option data-state="nj">New Jersey</option>
                                                <option data-state="nm">New Mexico</option>
                                                <option data-state="ny">New York</option>
                                                <option data-state="nc">North Carolina</option>
                                                <option data-state="nd">North Dakota</option>
                                                <option data-state="mp">Northern Mariana Islands</option>
                                                <option data-state="oh">Ohio</option>
                                                <option data-state="ok">Oklahoma</option>
                                                <option data-state="or">Oregon</option>
                                                <option data-state="um">Palmyra Atoll</option>
                                                <option data-state="pa">Pennsylvania</option>
                                                <option data-state="pr">Puerto Rico</option>
                                                <option data-state="ri">Rhode Island</option>
                                                <option data-state="sc">South Carolina</option>
                                                <option data-state="sd">South Dakota</option>
                                                <option data-state="tn">Tennessee</option>
                                                <option data-state="tx">Texas</option>
                                                <option data-state="um">United States Minor Outlying Islands</option>
                                                <option data-state="vi">United States Virgin Islands</option>
                                                <option data-state="ut">Utah</option>
                                                <option data-state="vt">Vermont</option>
                                                <option data-state="va">Virginia</option>
                                                <option data-state="um">Wake Island</option>
                                                <option data-state="wa">Washington</option>
                                                <option data-state="wv">West Virginia</option>
                                                <option data-state="wi">Wisconsin</option>
                                                <option data-state="wy">Wyoming</option>
                                            </select><span class="select2 select2-container select2-container--bootstrap-5"
                                                dir="ltr" data-select2-id="select2-data-65-muam"
                                                style="width: auto;"><span class="selection"><span
                                                        class="select2-selection select2-selection--single"
                                                        role="combobox" aria-haspopup="true" aria-expanded="false"
                                                        tabindex="0" aria-disabled="false"
                                                        aria-labelledby="select2-r8at-container"
                                                        aria-controls="select2-r8at-container"><span
                                                            class="select2-selection__rendered"
                                                            id="select2-r8at-container" role="textbox"
                                                            aria-readonly="true" title="Alaska"><span
                                                                class="hstack gap-3"> <img
                                                                    src="./../assets/vendors/img/flags/us/ak.png"
                                                                    class="avatar-image avatar-sm">
                                                                Alaska</span></span><span class="select2-selection__arrow"
                                                            role="presentation"><b
                                                                role="presentation"></b></span></span></span><span
                                                    class="dropdown-wrapper" aria-hidden="true"></span></span>
                                        </div>
                                    </div>
                                    <div class="row mb-4 align-items-center">
                                        <div class="col-lg-4">
                                            <label class="fw-semibold">City: </label>
                                        </div>
                                        <div class="col-lg-8">
                                            <select class="form-control select2-hidden-accessible"
                                                data-select2-selector="city" data-select2-id="select2-data-73-41xg"
                                                tabindex="-1" aria-hidden="true">
                                                <option data-city="bg-primary">Akutan</option>
                                                <option data-city="bg-secondary">Aleutians East Borough</option>
                                                <option data-city="bg-success">Aleutians West Census Area</option>
                                                <option data-city="bg-warning">Anchor Point</option>
                                                <option data-city="bg-info">Anchorage</option>
                                                <option data-city="bg-danger">Anchorage Municipality</option>
                                                <option data-city="bg-dark">Badger</option>
                                                <option data-city="bg-black">Barrow</option>
                                                <option data-city="bg-muted">Bear Creek</option>
                                                <option data-city="bg-blue">Bethel</option>
                                                <option data-city="bg-teal">Bethel Census Area</option>
                                                <option data-city="bg-cyan">Big Lake</option>
                                                <option data-city="bg-indigo">Bristol Bay Borough</option>
                                                <option data-city="bg-green">Butte</option>
                                                <option data-city="bg-red">Chevak</option>
                                                <option data-city="bg-orange">City and Borough of Wrangell</option>
                                                <option data-city="bg-darken">Cohoe</option>
                                                <option data-city="bg-primary">College</option>
                                                <option data-city="bg-warning">Cordova</option>
                                                <option data-city="bg-danger">Craig</option>
                                                <option data-city="bg-red">Deltana</option>
                                                <option data-city="bg-green">Denali Borough</option>
                                                <option data-city="bg-orange">Diamond Ridge</option>
                                                <option data-city="bg-muted">Dillingham</option>
                                                <option data-city="bg-teal">Dillingham Census Area</option>
                                                <option data-city="bg-info">Dutch Harbor</option>
                                                <option data-city="bg-indigo">Eagle River</option>
                                                <option data-city="bg-cyan">Eielson Air Force Base</option>
                                                <option data-city="bg-orange">Elmendorf Air Force Base</option>
                                                <option data-city="bg-black">Ester</option>
                                                <option data-city="bg-warning">Fairbanks</option>
                                                <option data-city="bg-green">Fairbanks North Star Borough</option>
                                                <option data-city="bg-indigo">Farm Loop</option>
                                                <option data-city="bg-danger">Farmers Loop</option>
                                                <option data-city="bg-success">Fishhook</option>
                                                <option data-city="bg-teal">Fritz Creek</option>
                                                <option data-city="bg-cyan">Gateway</option>
                                                <option data-city="bg-black">Girdwood</option>
                                                <option data-city="bg-warning">Haines</option>
                                                <option data-city="bg-green">Haines Borough</option>
                                                <option data-city="bg-indigo">Healy</option>
                                                <option data-city="bg-danger">Homer</option>
                                                <option data-city="bg-success">Hoonah-Angoon Census Area</option>
                                                <option data-city="bg-teal">Hooper Bay</option>
                                                <option data-city="bg-cyan">Houston</option>
                                                <option data-city="bg-warning">Juneau</option>
                                                <option data-city="bg-black">Kalifornsky</option>
                                                <option data-city="bg-green">Kenai</option>
                                                <option data-city="bg-danger">Kenai Peninsula Borough</option>
                                                <option data-city="bg-success">Ketchikan</option>
                                                <option data-city="bg-indigo">Ketchikan Gateway Borough</option>
                                                <option data-city="bg-teal" selected=""
                                                    data-select2-id="select2-data-75-pe93">King Cove</option>
                                                <option data-city="bg-black">Knik-Fairview</option>
                                                <option data-city="bg-green">Kodiak</option>
                                                <option data-city="bg-cyan">Kodiak Island Borough</option>
                                                <option data-city="bg-warning">Kodiak Station</option>
                                                <option data-city="bg-darken">Kotzebue</option>
                                            </select><span class="select2 select2-container select2-container--bootstrap-5"
                                                dir="ltr" data-select2-id="select2-data-74-2pgt"
                                                style="width: auto;"><span class="selection"><span
                                                        class="select2-selection select2-selection--single"
                                                        role="combobox" aria-haspopup="true" aria-expanded="false"
                                                        tabindex="0" aria-disabled="false"
                                                        aria-labelledby="select2-adkf-container"
                                                        aria-controls="select2-adkf-container"><span
                                                            class="select2-selection__rendered"
                                                            id="select2-adkf-container" role="textbox"
                                                            aria-readonly="true" title="King Cove"><span
                                                                class="hstack gap-3"> <span
                                                                    class="wd-7 ht-7 rounded-circle bg-teal"></span> King
                                                                Cove</span></span><span class="select2-selection__arrow"
                                                            role="presentation"><b
                                                                role="presentation"></b></span></span></span><span
                                                    class="dropdown-wrapper" aria-hidden="true"></span></span>
                                        </div>
                                    </div>
                                </div>
                                <hr class="my-0">
                                <div class="card-body pass-info">
                                    <div class="mb-4 d-flex align-items-center justify-content-between">
                                        <h5 class="fw-bold mb-0 me-4">
                                            <span class="d-block mb-2">Shipping Address:</span>
                                            <span class="fs-12 fw-normal text-muted text-truncate-1-line">A shipping
                                                address is the address to which a purchased item or service is to be
                                                delivered.</span>
                                        </h5>
                                        <a href="javascript:void(0);" class="btn btn-sm btn-light-brand">Copy Billing
                                            Address</a>
                                    </div>
                                    <div class="row mb-4 align-items-center">
                                        <div class="col-lg-4">
                                            <label for="addressInput_3" class="fw-semibold">Address: </label>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="input-group">
                                                <div class="input-group-text"><i class="feather-map-pin"></i></div>
                                                <textarea class="form-control" id="addressInput_3" cols="30" rows="3" placeholder="Address"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-4 align-items-center">
                                        <div class="col-lg-4">
                                            <label for="zipCodeInput_1" class="fw-semibold">Zip Code: </label>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="input-group">
                                                <div class="input-group-text"><i class="feather-tag"></i></div>
                                                <input type="number" class="form-control" id="zipCodeInput_1"
                                                    placeholder="Zip Code">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-4 align-items-center">
                                        <div class="col-lg-4">
                                            <label class="fw-semibold">Country: </label>
                                        </div>
                                        <div class="col-lg-8">
                                            <select class="form-control select2-hidden-accessible"
                                                data-select2-selector="country" data-select2-id="select2-data-55-r410"
                                                tabindex="-1" aria-hidden="true">
                                                <option data-country="af">Afghanistan</option>
                                                <option data-country="ax">Åland Islands</option>
                                                <option data-country="al">Albania</option>
                                                <option data-country="dz">Algeria</option>
                                                <option data-country="as">American Samoa</option>
                                                <option data-country="ad">Andorra</option>
                                                <option data-country="ao">Angola</option>
                                                <option data-country="ai">Anguilla</option>
                                                <option data-country="aq">Antarctica</option>
                                                <option data-country="ag">Antigua &amp; Barbuda</option>
                                                <option data-country="ar">Argentina</option>
                                                <option data-country="am">Armenia</option>
                                                <option data-country="aw">Aruba</option>
                                                <option data-country="au">Australia</option>
                                                <option data-country="at">Austria</option>
                                                <option data-country="az">Azerbaijan</option>
                                                <option data-country="bs">Bahamas</option>
                                                <option data-country="bh">Bahrain</option>
                                                <option data-country="bd">Bangladesh</option>
                                                <option data-country="bb">Barbados</option>
                                                <option data-country="by">Belarus</option>
                                                <option data-country="be">Belgium</option>
                                                <option data-country="bz">Belize</option>
                                                <option data-country="bj">Benin</option>
                                                <option data-country="bm">Bermuda</option>
                                                <option data-country="bt">Bhutan</option>
                                                <option data-country="bo">Bolivia</option>
                                                <option data-country="bq">Caribbean Netherlands</option>
                                                <option data-country="ba">Bosnia &amp; Herzegovina</option>
                                                <option data-country="bw">Botswana</option>
                                                <option data-country="bv">Bouvet Island</option>
                                                <option data-country="br">Brazil</option>
                                                <option data-country="io">British Indian Ocean Territory</option>
                                                <option data-country="bn">Brunei</option>
                                                <option data-country="bg">Bulgaria</option>
                                                <option data-country="bf">Burkina Faso</option>
                                                <option data-country="bi">Burundi</option>
                                                <option data-country="kh">Cambodia</option>
                                                <option data-country="cm">Cameroon</option>
                                                <option data-country="ca">Canada</option>
                                                <option data-country="cv">Cape Verde</option>
                                                <option data-country="ky">Cayman Islands</option>
                                                <option data-country="cf">Central African Republic</option>
                                                <option data-country="td">Chad</option>
                                                <option data-country="cl">Chile</option>
                                                <option data-country="cn">China</option>
                                                <option data-country="cx">Christmas Island</option>
                                                <option data-country="cc">Cocos (Keeling) Islands</option>
                                                <option data-country="co">Colombia</option>
                                                <option data-country="km">Comoros</option>
                                                <option data-country="cg">Congo - Brazzaville</option>
                                                <option data-country="cd">Congo - Kinshasa</option>
                                                <option data-country="ck">Cook Islands</option>
                                                <option data-country="cr">Costa Rica</option>
                                                <option data-country="ci">Côte d'Ivoire</option>
                                                <option data-country="hr">Croatia</option>
                                                <option data-country="cu">Cuba</option>
                                                <option data-country="cu">Curaçao</option>
                                                <option data-country="cy">Cyprus</option>
                                                <option data-country="cz">Czechia</option>
                                                <option data-country="dk">Denmark</option>
                                                <option data-country="dj">Djibouti</option>
                                                <option data-country="dm">Dominica</option>
                                                <option data-country="do">Dominican Republic</option>
                                                <option data-country="ec">Ecuador</option>
                                                <option data-country="eg">Egypt</option>
                                                <option data-country="sv">El Salvador</option>
                                                <option data-country="gq">Equatorial Guinea</option>
                                                <option data-country="er">Eritrea</option>
                                                <option data-country="ee">Estonia</option>
                                                <option data-country="et">Ethiopia</option>
                                                <option data-country="fk">Falkland Islands (Islas Malvinas)</option>
                                                <option data-country="fo">Faroe Islands</option>
                                                <option data-country="fj">Fiji</option>
                                                <option data-country="fi">Finland</option>
                                                <option data-country="fr">France</option>
                                                <option data-country="gf">French Guiana</option>
                                                <option data-country="pf">French Polynesia</option>
                                                <option data-country="tf">French Southern Territories</option>
                                                <option data-country="ga">Gabon</option>
                                                <option data-country="gm">Gambia</option>
                                                <option data-country="ge">Georgia</option>
                                                <option data-country="de">Germany</option>
                                                <option data-country="gh">Ghana</option>
                                                <option data-country="gi">Gibraltar</option>
                                                <option data-country="gr">Greece</option>
                                                <option data-country="gl">Greenland</option>
                                                <option data-country="gd">Grenada</option>
                                                <option data-country="gp">Guadeloupe</option>
                                                <option data-country="gu">Guam</option>
                                                <option data-country="gt">Guatemala</option>
                                                <option data-country="gg">Guernsey</option>
                                                <option data-country="gn">Guinea</option>
                                                <option data-country="gw">Guinea-Bissau</option>
                                                <option data-country="gy">Guyana</option>
                                                <option data-country="ht">Haiti</option>
                                                <option data-country="hm">Heard &amp; McDonald Islands</option>
                                                <option data-country="va">Vatican City</option>
                                                <option data-country="hn">Honduras</option>
                                                <option data-country="hk">Hong Kong</option>
                                                <option data-country="hu">Hungary</option>
                                                <option data-country="is">Iceland</option>
                                                <option data-country="in">India</option>
                                                <option data-country="id">Indonesia</option>
                                                <option data-country="ir">Iran</option>
                                                <option data-country="iq">Iraq</option>
                                                <option data-country="ie">Ireland</option>
                                                <option data-country="im">Isle of Man</option>
                                                <option data-country="il">Israel</option>
                                                <option data-country="it">Italy</option>
                                                <option data-country="jm">Jamaica</option>
                                                <option data-country="jp">Japan</option>
                                                <option data-country="je">Jersey</option>
                                                <option data-country="jo">Jordan</option>
                                                <option data-country="kz">Kazakhstan</option>
                                                <option data-country="ke">Kenya</option>
                                                <option data-country="ki">Kiribati</option>
                                                <option data-country="kp">North Korea</option>
                                                <option data-country="kr">South Korea</option>
                                                <option data-country="xk">Kosovo</option>
                                                <option data-country="kw">Kuwait</option>
                                                <option data-country="kg">Kyrgyzstan</option>
                                                <option data-country="la">Laos</option>
                                                <option data-country="lv">Latvia</option>
                                                <option data-country="lb">Lebanon</option>
                                                <option data-country="ls">Lesotho</option>
                                                <option data-country="lr">Liberia</option>
                                                <option data-country="ly">Libya</option>
                                                <option data-country="li">Liechtenstein</option>
                                                <option data-country="lt">Lithuania</option>
                                                <option data-country="lu">Luxembourg</option>
                                                <option data-country="mo">Macao</option>
                                                <option data-country="mk">North Macedonia</option>
                                                <option data-country="mg">Madagascar</option>
                                                <option data-country="mw">Malawi</option>
                                                <option data-country="my">Malaysia</option>
                                                <option data-country="mv">Maldives</option>
                                                <option data-country="ml">Mali</option>
                                                <option data-country="mt">Malta</option>
                                                <option data-country="mh">Marshall Islands</option>
                                                <option data-country="mq">Martinique</option>
                                                <option data-country="mr">Mauritania</option>
                                                <option data-country="mu">Mauritius</option>
                                                <option data-country="yt">Mayotte</option>
                                                <option data-country="mx">Mexico</option>
                                                <option data-country="fm">Micronesia</option>
                                                <option data-country="md">Moldova</option>
                                                <option data-country="mc">Monaco</option>
                                                <option data-country="mn">Mongolia</option>
                                                <option data-country="me">Montenegro</option>
                                                <option data-country="ms">Montserrat</option>
                                                <option data-country="ma">Morocco</option>
                                                <option data-country="mz">Mozambique</option>
                                                <option data-country="mm">Myanmar (Burma)</option>
                                                <option data-country="na">Namibia</option>
                                                <option data-country="nr">Nauru</option>
                                                <option data-country="np">Nepal</option>
                                                <option data-country="nl">Netherlands</option>
                                                <option data-country="cu">Curaçao</option>
                                                <option data-country="nc">New Caledonia</option>
                                                <option data-country="nz">New Zealand</option>
                                                <option data-country="ni">Nicaragua</option>
                                                <option data-country="ne">Niger</option>
                                                <option data-country="ng">Nigeria</option>
                                                <option data-country="nu">Niue</option>
                                                <option data-country="nf">Norfolk Island</option>
                                                <option data-country="mp">Northern Mariana Islands</option>
                                                <option data-country="no">Norway</option>
                                                <option data-country="om">Oman</option>
                                                <option data-country="pk">Pakistan</option>
                                                <option data-country="pw">Palau</option>
                                                <option data-country="ps">Palestine</option>
                                                <option data-country="pa">Panama</option>
                                                <option data-country="pg">Papua New Guinea</option>
                                                <option data-country="py">Paraguay</option>
                                                <option data-country="pe">Peru</option>
                                                <option data-country="ph">Philippines</option>
                                                <option data-country="pn">Pitcairn Islands</option>
                                                <option data-country="pl">Poland</option>
                                                <option data-country="pt">Portugal</option>
                                                <option data-country="pr">Puerto Rico</option>
                                                <option data-country="qa">Qatar</option>
                                                <option data-country="re">Réunion</option>
                                                <option data-country="ro">Romania</option>
                                                <option data-country="ru">Russia</option>
                                                <option data-country="rw">Rwanda</option>
                                                <option data-country="bl">St. Barthélemy</option>
                                                <option data-country="sh">St. Helena</option>
                                                <option data-country="kn">St. Kitts &amp; Nevis</option>
                                                <option data-country="lc">St. Lucia</option>
                                                <option data-country="mf">St. Martin</option>
                                                <option data-country="pm">St. Pierre &amp; Miquelon</option>
                                                <option data-country="vc">St. Vincent &amp; Grenadines</option>
                                                <option data-country="ws">Samoa</option>
                                                <option data-country="sm">San Marino</option>
                                                <option data-country="st">São Tomé &amp; Príncipe</option>
                                                <option data-country="sa">Saudi Arabia</option>
                                                <option data-country="sn">Senegal</option>
                                                <option data-country="rs">Serbia</option>
                                                <option data-country="sr">Serbia</option>
                                                <option data-country="sc">Seychelles</option>
                                                <option data-country="sl">Sierra Leone</option>
                                                <option data-country="sg">Singapore</option>
                                                <option data-country="sx">Sint Maarten</option>
                                                <option data-country="sk">Slovakia</option>
                                                <option data-country="si">Slovenia</option>
                                                <option data-country="sb">Solomon Islands</option>
                                                <option data-country="so">Somalia</option>
                                                <option data-country="za">South Africa</option>
                                                <option data-country="gs">South Georgia &amp; South Sandwich Islands
                                                </option>
                                                <option data-country="ss">South Sudan</option>
                                                <option data-country="es">Spain</option>
                                                <option data-country="lk">Sri Lanka</option>
                                                <option data-country="sd">Sudan</option>
                                                <option data-country="sr">Suriname</option>
                                                <option data-country="sj">Svalbard &amp; Jan Mayen</option>
                                                <option data-country="sz">Eswatini</option>
                                                <option data-country="se">Sweden</option>
                                                <option data-country="ch">Switzerland</option>
                                                <option data-country="sy">Syria</option>
                                                <option data-country="tw">Taiwan</option>
                                                <option data-country="tj">Tajikistan</option>
                                                <option data-country="tz">Tanzania</option>
                                                <option data-country="th">Thailand</option>
                                                <option data-country="tl">Timor-Leste</option>
                                                <option data-country="tg">Togo</option>
                                                <option data-country="tk">Tokelau</option>
                                                <option data-country="to">Tonga</option>
                                                <option data-country="tt">Trinidad &amp; Tobago</option>
                                                <option data-country="tn">Tunisia</option>
                                                <option data-country="tr">Turkey</option>
                                                <option data-country="tm">Turkmenistan</option>
                                                <option data-country="tc">Turks &amp; Caicos Islands</option>
                                                <option data-country="tv">Tuvalu</option>
                                                <option data-country="ug">Uganda</option>
                                                <option data-country="ua">Ukraine</option>
                                                <option data-country="ae">United Arab Emirates</option>
                                                <option data-country="gb">United Kingdom</option>
                                                <option data-country="us" selected=""
                                                    data-select2-id="select2-data-57-pgoy">United States</option>
                                                <option data-country="um">U.S. Outlying Islands</option>
                                                <option data-country="uy">Uruguay</option>
                                                <option data-country="uz">Uzbekistan</option>
                                                <option data-country="vu">Vanuatu</option>
                                                <option data-country="ve">Venezuela</option>
                                                <option data-country="vn">Vietnam</option>
                                                <option data-country="vg">British Virgin Islands</option>
                                                <option data-country="vi">U.S. Virgin Islands</option>
                                                <option data-country="wf">Wallis &amp; Futuna</option>
                                                <option data-country="eh">Western Sahara</option>
                                                <option data-country="ye">Yemen</option>
                                                <option data-country="zm">Zambia</option>
                                                <option data-country="zw">Zimbabwe</option>
                                            </select><span
                                                class="select2 select2-container select2-container--bootstrap-5"
                                                dir="ltr" data-select2-id="select2-data-56-rjyn"
                                                style="width: auto;"><span class="selection"><span
                                                        class="select2-selection select2-selection--single"
                                                        role="combobox" aria-haspopup="true" aria-expanded="false"
                                                        tabindex="0" aria-disabled="false"
                                                        aria-labelledby="select2-yg61-container"
                                                        aria-controls="select2-yg61-container"><span
                                                            class="select2-selection__rendered"
                                                            id="select2-yg61-container" role="textbox"
                                                            aria-readonly="true" title="United States"><span
                                                                class="hstack gap-3"> <img
                                                                    src="./../assets/vendors/img/flags/1x1/us.svg"
                                                                    class="avatar-image avatar-sm"> United
                                                                States</span></span><span class="select2-selection__arrow"
                                                            role="presentation"><b
                                                                role="presentation"></b></span></span></span><span
                                                    class="dropdown-wrapper" aria-hidden="true"></span></span>
                                        </div>
                                    </div>
                                    <div class="row mb-4 align-items-center">
                                        <div class="col-lg-4">
                                            <label class="fw-semibold">State: </label>
                                        </div>
                                        <div class="col-lg-8">
                                            <select class="form-control select2-hidden-accessible"
                                                data-select2-selector="state" data-select2-id="select2-data-67-ofzu"
                                                tabindex="-1" aria-hidden="true">
                                                <option data-state="al">Alabama</option>
                                                <option data-state="ak" selected=""
                                                    data-select2-id="select2-data-69-l6l3">Alaska</option>
                                                <option data-state="as">American Samoa</option>
                                                <option data-state="az">Arizona</option>
                                                <option data-state="ar">Arkansas</option>
                                                <option data-state="um">Baker Island</option>
                                                <option data-state="ca">California</option>
                                                <option data-state="co">Colorado</option>
                                                <option data-state="ct">Connecticut</option>
                                                <option data-state="de">Delaware</option>
                                                <option data-state="dc">District of Columbia</option>
                                                <option data-state="fl">Florida</option>
                                                <option data-state="ga">Georgia</option>
                                                <option data-state="gu">Guam</option>
                                                <option data-state="hi">Hawaii</option>
                                                <option data-state="um">Howland Island</option>
                                                <option data-state="id">Idaho</option>
                                                <option data-state="il">Illinois</option>
                                                <option data-state="in">Indiana</option>
                                                <option data-state="ia">Iowa</option>
                                                <option data-state="um">Jarvis Island</option>
                                                <option data-state="um">Johnston Atoll</option>
                                                <option data-state="ks">Kansas</option>
                                                <option data-state="ky">Kentucky</option>
                                                <option data-state="um">Kingman Reef</option>
                                                <option data-state="la">Louisiana</option>
                                                <option data-state="me">Maine</option>
                                                <option data-state="md">Maryland</option>
                                                <option data-state="ma">Massachusetts</option>
                                                <option data-state="mi">Michigan</option>
                                                <option data-state="um">Midway Atoll</option>
                                                <option data-state="mn">Minnesota</option>
                                                <option data-state="ms">Mississippi</option>
                                                <option data-state="mo">Missouri</option>
                                                <option data-state="mt">Montana</option>
                                                <option data-state="um">Navassa Island</option>
                                                <option data-state="ne">Nebraska</option>
                                                <option data-state="nv">Nevada</option>
                                                <option data-state="nh">New Hampshire</option>
                                                <option data-state="nj">New Jersey</option>
                                                <option data-state="nm">New Mexico</option>
                                                <option data-state="ny">New York</option>
                                                <option data-state="nc">North Carolina</option>
                                                <option data-state="nd">North Dakota</option>
                                                <option data-state="mp">Northern Mariana Islands</option>
                                                <option data-state="oh">Ohio</option>
                                                <option data-state="ok">Oklahoma</option>
                                                <option data-state="or">Oregon</option>
                                                <option data-state="um">Palmyra Atoll</option>
                                                <option data-state="pa">Pennsylvania</option>
                                                <option data-state="pr">Puerto Rico</option>
                                                <option data-state="ri">Rhode Island</option>
                                                <option data-state="sc">South Carolina</option>
                                                <option data-state="sd">South Dakota</option>
                                                <option data-state="tn">Tennessee</option>
                                                <option data-state="tx">Texas</option>
                                                <option data-state="um">United States Minor Outlying Islands</option>
                                                <option data-state="vi">United States Virgin Islands</option>
                                                <option data-state="ut">Utah</option>
                                                <option data-state="vt">Vermont</option>
                                                <option data-state="va">Virginia</option>
                                                <option data-state="um">Wake Island</option>
                                                <option data-state="wa">Washington</option>
                                                <option data-state="wv">West Virginia</option>
                                                <option data-state="wi">Wisconsin</option>
                                                <option data-state="wy">Wyoming</option>
                                            </select><span
                                                class="select2 select2-container select2-container--bootstrap-5"
                                                dir="ltr" data-select2-id="select2-data-68-d8zx"
                                                style="width: auto;"><span class="selection"><span
                                                        class="select2-selection select2-selection--single"
                                                        role="combobox" aria-haspopup="true" aria-expanded="false"
                                                        tabindex="0" aria-disabled="false"
                                                        aria-labelledby="select2-sm57-container"
                                                        aria-controls="select2-sm57-container"><span
                                                            class="select2-selection__rendered"
                                                            id="select2-sm57-container" role="textbox"
                                                            aria-readonly="true" title="Alaska"><span
                                                                class="hstack gap-3"> <img
                                                                    src="./../assets/vendors/img/flags/us/ak.png"
                                                                    class="avatar-image avatar-sm">
                                                                Alaska</span></span><span class="select2-selection__arrow"
                                                            role="presentation"><b
                                                                role="presentation"></b></span></span></span><span
                                                    class="dropdown-wrapper" aria-hidden="true"></span></span>
                                        </div>
                                    </div>
                                    <div class="row mb-4 align-items-center">
                                        <div class="col-lg-4">
                                            <label class="fw-semibold">City: </label>
                                        </div>
                                        <div class="col-lg-8">
                                            <select class="form-control select2-hidden-accessible"
                                                data-select2-selector="city" data-select2-id="select2-data-76-d1ji"
                                                tabindex="-1" aria-hidden="true">
                                                <option data-city="bg-primary">Akutan</option>
                                                <option data-city="bg-secondary">Aleutians East Borough</option>
                                                <option data-city="bg-success">Aleutians West Census Area</option>
                                                <option data-city="bg-warning">Anchor Point</option>
                                                <option data-city="bg-info">Anchorage</option>
                                                <option data-city="bg-danger">Anchorage Municipality</option>
                                                <option data-city="bg-dark">Badger</option>
                                                <option data-city="bg-black">Barrow</option>
                                                <option data-city="bg-muted">Bear Creek</option>
                                                <option data-city="bg-blue">Bethel</option>
                                                <option data-city="bg-teal">Bethel Census Area</option>
                                                <option data-city="bg-cyan">Big Lake</option>
                                                <option data-city="bg-indigo">Bristol Bay Borough</option>
                                                <option data-city="bg-green">Butte</option>
                                                <option data-city="bg-red">Chevak</option>
                                                <option data-city="bg-orange">City and Borough of Wrangell</option>
                                                <option data-city="bg-darken">Cohoe</option>
                                                <option data-city="bg-primary">College</option>
                                                <option data-city="bg-warning">Cordova</option>
                                                <option data-city="bg-danger">Craig</option>
                                                <option data-city="bg-red">Deltana</option>
                                                <option data-city="bg-green">Denali Borough</option>
                                                <option data-city="bg-orange">Diamond Ridge</option>
                                                <option data-city="bg-muted">Dillingham</option>
                                                <option data-city="bg-teal">Dillingham Census Area</option>
                                                <option data-city="bg-info">Dutch Harbor</option>
                                                <option data-city="bg-indigo">Eagle River</option>
                                                <option data-city="bg-cyan">Eielson Air Force Base</option>
                                                <option data-city="bg-orange">Elmendorf Air Force Base</option>
                                                <option data-city="bg-black">Ester</option>
                                                <option data-city="bg-warning">Fairbanks</option>
                                                <option data-city="bg-green">Fairbanks North Star Borough</option>
                                                <option data-city="bg-indigo">Farm Loop</option>
                                                <option data-city="bg-danger">Farmers Loop</option>
                                                <option data-city="bg-success">Fishhook</option>
                                                <option data-city="bg-teal">Fritz Creek</option>
                                                <option data-city="bg-cyan">Gateway</option>
                                                <option data-city="bg-black">Girdwood</option>
                                                <option data-city="bg-warning">Haines</option>
                                                <option data-city="bg-green">Haines Borough</option>
                                                <option data-city="bg-indigo">Healy</option>
                                                <option data-city="bg-danger">Homer</option>
                                                <option data-city="bg-success">Hoonah-Angoon Census Area</option>
                                                <option data-city="bg-teal">Hooper Bay</option>
                                                <option data-city="bg-cyan">Houston</option>
                                                <option data-city="bg-warning">Juneau</option>
                                                <option data-city="bg-black">Kalifornsky</option>
                                                <option data-city="bg-green">Kenai</option>
                                                <option data-city="bg-danger">Kenai Peninsula Borough</option>
                                                <option data-city="bg-success">Ketchikan</option>
                                                <option data-city="bg-indigo">Ketchikan Gateway Borough</option>
                                                <option data-city="bg-teal" selected=""
                                                    data-select2-id="select2-data-78-5m9p">King Cove</option>
                                                <option data-city="bg-black">Knik-Fairview</option>
                                                <option data-city="bg-green">Kodiak</option>
                                                <option data-city="bg-cyan">Kodiak Island Borough</option>
                                                <option data-city="bg-warning">Kodiak Station</option>
                                                <option data-city="bg-darken">Kotzebue</option>
                                            </select><span
                                                class="select2 select2-container select2-container--bootstrap-5"
                                                dir="ltr" data-select2-id="select2-data-77-sqdi"
                                                style="width: auto;"><span class="selection"><span
                                                        class="select2-selection select2-selection--single"
                                                        role="combobox" aria-haspopup="true" aria-expanded="false"
                                                        tabindex="0" aria-disabled="false"
                                                        aria-labelledby="select2-allr-container"
                                                        aria-controls="select2-allr-container"><span
                                                            class="select2-selection__rendered"
                                                            id="select2-allr-container" role="textbox"
                                                            aria-readonly="true" title="King Cove"><span
                                                                class="hstack gap-3"> <span
                                                                    class="wd-7 ht-7 rounded-circle bg-teal"></span> King
                                                                Cove</span></span><span class="select2-selection__arrow"
                                                            role="presentation"><b
                                                                role="presentation"></b></span></span></span><span
                                                    class="dropdown-wrapper" aria-hidden="true"></span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="subscriptionTab" role="tabpanel">
                                <div class="alert alert-dismissible m-4 p-4 d-flex alert-soft-teal-message"
                                    role="alert">
                                    <div class="me-4 d-none d-md-block">
                                        <i class="feather feather-alert-octagon fs-1"></i>
                                    </div>
                                    <div>
                                        <p class="fw-bold mb-1 text-truncate-1-line">We need your attention!</p>
                                        <p class="fs-12 fw-medium text-truncate-1-line">Your payment was declined. To
                                            start using tools, please <strong>Add Payment Method</strong></p>
                                        <a href="javascript:void(0);"
                                            class="btn btn-sm bg-soft-teal text-teal d-inline-block">Add Payment
                                            Method</a>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                </div>
                                <div class="card-body choose-plan">
                                    <div class="mb-4 d-flex align-items-center justify-content-between">
                                        <h5 class="fw-bold mb-0">Subscription &amp; Plan:</h5>
                                        <a href="javascript:void(0);" class="btn btn-sm btn-light-brand">4 days
                                            remaining</a>
                                    </div>
                                    <div
                                        class="p-4 mb-4 d-xxl-flex d-xl-block d-md-flex align-items-center justify-content-between gap-4 border border-dashed border-gray-5 rounded-1">
                                        <div>
                                            <div class="fs-14 fw-bold text-dark mb-1">Your current plan is <a
                                                    href="javascript:void(0);"
                                                    class="badge bg-primary text-white ms-2">Team Plan</a></div>
                                            <div class="fs-12 text-muted">A simple start for everyone</div>
                                        </div>
                                        <div class="my-3 my-xxl-0 my-md-3 my-md-0">
                                            <div class="fs-20 text-dark"><span class="fw-bold">$29.99</span> / <em
                                                    class="fs-11 fw-medium">Month</em></div>
                                            <div class="fs-12 text-muted mt-1">Billed Monthly / Next payment on 12/10/2023
                                                for <strong class="text-dark">$62.48</strong></div>
                                        </div>
                                        <div class="hstack gap-3">
                                            <a href="javascript:void(0);" class="text-danger">Cancel Plan</a>
                                            <a href="javascript:void(0);" class="btn btn-light-brand">Update Plan</a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <a href="javascript:void(0);"
                                                class="p-4 mb-4 d-block bg-soft-100 border border-dashed border-gray-5 rounded-1">
                                                <h6 class="fs-13 fw-bold">BASIC</h6>
                                                <p class="fs-12 fw-normal text-muted">Starter plan for individuals.</p>
                                                <p class="fs-12 fw-normal text-muted text-truncate-2-line">Lorem, ipsum
                                                    dolor sit amet consectetur adipisicing elit. Quod ipsa id corrupti modi,
                                                    impedit exercitationem harum voluptates reiciendis.</p>
                                                <div class="mt-4"><span class="fs-16 fw-bold text-dark">$12.99</span>
                                                    / <em class="fs-11 fw-medium">Month</em></div>
                                            </a>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="javascript:void(0);"
                                                class="p-4 mb-4 d-block bg-soft-200 border border-dashed border-gray-5 rounded-1 position-relative">
                                                <h6 class="fs-13 fw-bold">TEAM</h6>
                                                <p class="fs-12 fw-normal text-muted">Collaborate up to 10 people.</p>
                                                <p class="fs-12 fw-normal text-muted text-truncate-2-line">Lorem, ipsum
                                                    dolor sit amet consectetur adipisicing elit. Quod ipsa id corrupti modi,
                                                    impedit exercitationem harum voluptates reiciendis.</p>
                                                <div class="mt-4"><span class="fs-16 fw-bold text-dark">$29.99</span>
                                                    / <em class="fs-11 fw-medium">Month</em></div>
                                                <div class="position-absolute top-0 start-50 translate-middle">
                                                    <i
                                                        class="feather-check fs-12 bg-primary text-white p-1 rounded-circle"></i>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="javascript:void(0);"
                                                class="p-4 mb-4 d-block bg-soft-100 border border-dashed border-gray-5 rounded-1">
                                                <h6 class="fs-13 fw-bold">ENTERPRISE</h6>
                                                <p class="fs-12 fw-normal text-muted">For bigger businesses.</p>
                                                <p class="fs-12 fw-normal text-muted text-truncate-2-line">Lorem, ipsum
                                                    dolor sit amet consectetur adipisicing elit. Quod ipsa id corrupti modi,
                                                    impedit exercitationem harum voluptates reiciendis.</p>
                                                <div class="mt-4"><span class="fs-16 fw-bold text-dark">$49.99</span>
                                                    / <em class="fs-11 fw-medium">Month</em></div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <hr class="my-0">
                                <div class="card-body payment-methord">
                                    <div class="mb-4 d-flex align-items-center justify-content-between">
                                        <h5 class="fw-bold mb-0">Payment Methords:</h5>
                                        <a href="javascript:void(0);" class="btn btn-sm btn-light-brand">Add Methord</a>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div
                                                class="px-4 py-2 mb-4 d-sm-flex justify-content-between border border-dashed border-gray-3 rounded-1 position-relative">
                                                <div class="d-sm-flex align-items-center">
                                                    <div class="wd-100">
                                                        <img src="assets/images/payment/mastercard.svg"
                                                            class="img-fluid" alt="">
                                                    </div>
                                                    <div class="ms-0 ms-sm-3">
                                                        <div class="text-dark fw-bold mb-2">Alexandra Della</div>
                                                        <div class="mb-0 text-truncate-1-line">5155 **** **** ****</div>
                                                        <small
                                                            class="fs-10 fw-medium text-uppercase text-muted text-truncate-1-line">Card
                                                            expires at 12/24</small>
                                                    </div>
                                                </div>
                                                <div class="hstack gap-3 mt-3 mt-sm-0">
                                                    <a href="javascript:void(0);" class="text-danger">Delete</a>
                                                    <a href="javascript:void(0);" class="btn btn-sm btn-light">Edit</a>
                                                </div>
                                                <div class="position-absolute top-50 start-0 translate-middle">
                                                    <i
                                                        class="feather-check fs-12 bg-primary text-white p-1 rounded-circle"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div
                                                class="px-4 py-2 mb-4 d-sm-flex justify-content-between border border-dashed border-gray-3 rounded-1">
                                                <div class="d-sm-flex align-items-center">
                                                    <div class="wd-100">
                                                        <img src="assets/images/payment/visa.svg" class="img-fluid"
                                                            alt="">
                                                    </div>
                                                    <div class="ms-0 ms-sm-3">
                                                        <div class="text-dark fw-bold mb-2">Alexandra Della</div>
                                                        <div class="mb-0 text-truncate-1-line">4236 **** **** ****</div>
                                                        <small
                                                            class="fs-10 fw-medium text-uppercase text-muted text-truncate-1-line">Card
                                                            expires at 11/23</small>
                                                    </div>
                                                </div>
                                                <div class="hstack gap-3 mt-3 mt-sm-0">
                                                    <a href="javascript:void(0);" class="text-danger">Delete</a>
                                                    <a href="javascript:void(0);" class="btn btn-sm btn-light">Edit</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div
                                                class="px-4 py-2 mb-4 d-sm-flex justify-content-between border border-dashed border-gray-3 rounded-1">
                                                <div class="d-sm-flex align-items-center">
                                                    <div class="wd-100">
                                                        <img src="assets/images/payment/american-express.svg"
                                                            class="img-fluid" alt="">
                                                    </div>
                                                    <div class="ms-0 ms-sm-3">
                                                        <div class="text-dark fw-bold mb-2">Alexandra Della</div>
                                                        <div class="mb-0 text-truncate-1-line">3437 **** **** ****</div>
                                                        <small
                                                            class="fs-10 fw-medium text-uppercase text-muted text-truncate-1-line">Card
                                                            expires at 11/24</small>
                                                    </div>
                                                </div>
                                                <div class="hstack gap-3 mt-3 mt-sm-0">
                                                    <a href="javascript:void(0);" class="text-danger">Delete</a>
                                                    <a href="javascript:void(0);" class="btn btn-sm btn-light">Edit</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div
                                                class="px-4 py-2 mb-4 d-sm-flex justify-content-between border border-dashed border-gray-3 rounded-1">
                                                <div class="d-sm-flex align-items-center">
                                                    <div class="wd-100">
                                                        <img src="assets/images/payment/discover.svg" class="img-fluid"
                                                            alt="">
                                                    </div>
                                                    <div class="ms-0 ms-sm-3">
                                                        <div class="text-dark fw-bold mb-2">Alexandra Della</div>
                                                        <div class="mb-0 text-truncate-1-line">6011 **** **** ****</div>
                                                        <small
                                                            class="fs-10 fw-medium text-uppercase text-muted text-truncate-1-line">Card
                                                            expires at 11/25</small>
                                                    </div>
                                                </div>
                                                <div class="hstack gap-3 mt-3 mt-sm-0">
                                                    <a href="javascript:void(0);" class="text-danger">Delete</a>
                                                    <a href="javascript:void(0);" class="btn btn-sm btn-light">Edit</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="notificationsTab" role="tabpanel">
                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <thead>
                                            <tr>
                                                <th>Description</th>
                                                <th class="wd-250 text-end">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="fw-bold text-dark">Successful payments</div>
                                                    <small class="fs-12 text-muted">Receive a notification for every
                                                        successful payment.</small>
                                                </td>
                                                <td class="text-end">
                                                    <div class="form-group select-wd-lg">
                                                        <select class="form-control select2-hidden-accessible"
                                                            data-select2-selector="icon"
                                                            data-select2-id="select2-data-4-9770" tabindex="-1"
                                                            aria-hidden="true">
                                                            <option value="SMS" data-icon="feather-smartphone">SMS
                                                            </option>
                                                            <option value="Push" data-icon="feather-bell">Push
                                                            </option>
                                                            <option value="Email" data-icon="feather-mail"
                                                                selected="" data-select2-id="select2-data-6-nqni">
                                                                Email</option>
                                                            <option value="Repeat" data-icon="feather-repeat">Repeat
                                                            </option>
                                                            <option value="Deactivate" data-icon="feather-bell-off">
                                                                Deactivate</option>
                                                            <option value="SMS+Push" data-icon="feather-smartphone">SMS
                                                                + Push</option>
                                                            <option value="Email+Push" data-icon="feather-mail">Email +
                                                                Push</option>
                                                            <option value="SMS+Email" data-icon="feather-smartphone">SMS
                                                                + Email</option>
                                                            <option value="SMS+Push+Email"
                                                                data-icon="feather-smartphone">SMS + Push + Email</option>
                                                        </select><span
                                                            class="select2 select2-container select2-container--bootstrap-5"
                                                            dir="ltr" data-select2-id="select2-data-5-tkii"
                                                            style="width: auto;"><span class="selection"><span
                                                                    class="select2-selection select2-selection--single"
                                                                    role="combobox" aria-haspopup="true"
                                                                    aria-expanded="false" tabindex="0"
                                                                    aria-disabled="false"
                                                                    aria-labelledby="select2-u2yq-container"
                                                                    aria-controls="select2-u2yq-container"><span
                                                                        class="select2-selection__rendered"
                                                                        id="select2-u2yq-container" role="textbox"
                                                                        aria-readonly="true" title="Email"><span
                                                                            class="hstack gap-3"><i
                                                                                class=" feather-mail"></i>
                                                                            Email</span></span><span
                                                                        class="select2-selection__arrow"
                                                                        role="presentation"><b
                                                                            role="presentation"></b></span></span></span><span
                                                                class="dropdown-wrapper"
                                                                aria-hidden="true"></span></span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="fw-bold text-dark">Customer payment dispute</div>
                                                    <small class="fs-12 text-muted">Receive a notification if a payment is
                                                        disputed by a customer and for dispute purposes. </small>
                                                </td>
                                                <td class="text-end">
                                                    <div class="form-group select-wd-lg">
                                                        <select class="form-control select2-hidden-accessible"
                                                            data-select2-selector="icon"
                                                            data-select2-id="select2-data-7-z2j8" tabindex="-1"
                                                            aria-hidden="true">
                                                            <option value="SMS" data-icon="feather-smartphone">SMS
                                                            </option>
                                                            <option value="Push" data-icon="feather-bell">Push
                                                            </option>
                                                            <option value="Email" data-icon="feather-mail">Email
                                                            </option>
                                                            <option value="Repeat" data-icon="feather-repeat">Repeat
                                                            </option>
                                                            <option value="Deactivate" data-icon="feather-bell-off"
                                                                selected="" data-select2-id="select2-data-9-fimn">
                                                                Deactivate</option>
                                                            <option value="SMS+Push" data-icon="feather-smartphone">SMS
                                                                + Push</option>
                                                            <option value="Email+Push" data-icon="feather-mail">Email +
                                                                Push</option>
                                                            <option value="SMS+Email" data-icon="feather-smartphone">SMS
                                                                + Email</option>
                                                            <option value="SMS+Push+Email"
                                                                data-icon="feather-smartphone">SMS + Push + Email</option>
                                                        </select><span
                                                            class="select2 select2-container select2-container--bootstrap-5"
                                                            dir="ltr" data-select2-id="select2-data-8-ur5b"
                                                            style="width: auto;"><span class="selection"><span
                                                                    class="select2-selection select2-selection--single"
                                                                    role="combobox" aria-haspopup="true"
                                                                    aria-expanded="false" tabindex="0"
                                                                    aria-disabled="false"
                                                                    aria-labelledby="select2-j99t-container"
                                                                    aria-controls="select2-j99t-container"><span
                                                                        class="select2-selection__rendered"
                                                                        id="select2-j99t-container" role="textbox"
                                                                        aria-readonly="true" title="Deactivate"><span
                                                                            class="hstack gap-3"><i
                                                                                class=" feather-bell-off"></i>
                                                                            Deactivate</span></span><span
                                                                        class="select2-selection__arrow"
                                                                        role="presentation"><b
                                                                            role="presentation"></b></span></span></span><span
                                                                class="dropdown-wrapper"
                                                                aria-hidden="true"></span></span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="fw-bold text-dark">Refund alerts</div>
                                                    <small class="fs-12 text-muted">Receive a notification if a payment is
                                                        stated as risk by the Finance Department. </small>
                                                </td>
                                                <td class="text-end">
                                                    <div class="form-group select-wd-lg">
                                                        <select class="form-control select2-hidden-accessible"
                                                            data-select2-selector="icon"
                                                            data-select2-id="select2-data-10-ix8j" tabindex="-1"
                                                            aria-hidden="true">
                                                            <option value="SMS" data-icon="feather-smartphone">SMS
                                                            </option>
                                                            <option value="Push" data-icon="feather-bell"
                                                                selected="" data-select2-id="select2-data-12-iina">
                                                                Push</option>
                                                            <option value="Email" data-icon="feather-mail">Email
                                                            </option>
                                                            <option value="Repeat" data-icon="feather-repeat">Repeat
                                                            </option>
                                                            <option value="Deactivate" data-icon="feather-bell-off">
                                                                Deactivate</option>
                                                            <option value="SMS+Push" data-icon="feather-smartphone">SMS
                                                                + Push</option>
                                                            <option value="Email+Push" data-icon="feather-mail">Email +
                                                                Push</option>
                                                            <option value="SMS+Email" data-icon="feather-smartphone">SMS
                                                                + Email</option>
                                                            <option value="SMS+Push+Email"
                                                                data-icon="feather-smartphone">SMS + Push + Email</option>
                                                        </select><span
                                                            class="select2 select2-container select2-container--bootstrap-5"
                                                            dir="ltr" data-select2-id="select2-data-11-9rom"
                                                            style="width: auto;"><span class="selection"><span
                                                                    class="select2-selection select2-selection--single"
                                                                    role="combobox" aria-haspopup="true"
                                                                    aria-expanded="false" tabindex="0"
                                                                    aria-disabled="false"
                                                                    aria-labelledby="select2-damx-container"
                                                                    aria-controls="select2-damx-container"><span
                                                                        class="select2-selection__rendered"
                                                                        id="select2-damx-container" role="textbox"
                                                                        aria-readonly="true" title="Push"><span
                                                                            class="hstack gap-3"><i
                                                                                class=" feather-bell"></i>
                                                                            Push</span></span><span
                                                                        class="select2-selection__arrow"
                                                                        role="presentation"><b
                                                                            role="presentation"></b></span></span></span><span
                                                                class="dropdown-wrapper"
                                                                aria-hidden="true"></span></span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="fw-bold text-dark">Invoice payments</div>
                                                    <small class="fs-12 text-muted">Receive a notification if a customer
                                                        sends an incorrect amount to pay their invoice. </small>
                                                </td>
                                                <td class="text-end">
                                                    <div class="form-group select-wd-lg">
                                                        <select class="form-control select2-hidden-accessible"
                                                            data-select2-selector="icon"
                                                            data-select2-id="select2-data-13-hd6y" tabindex="-1"
                                                            aria-hidden="true">
                                                            <option value="SMS" data-icon="feather-smartphone">SMS
                                                            </option>
                                                            <option value="Push" data-icon="feather-bell">Push
                                                            </option>
                                                            <option value="Email" data-icon="feather-mail"
                                                                selected="" data-select2-id="select2-data-15-6okg">
                                                                Email</option>
                                                            <option value="Repeat" data-icon="feather-repeat">Repeat
                                                            </option>
                                                            <option value="Deactivate" data-icon="feather-bell-off">
                                                                Deactivate</option>
                                                            <option value="SMS+Push" data-icon="feather-smartphone">SMS
                                                                + Push</option>
                                                            <option value="Email+Push" data-icon="feather-mail">Email +
                                                                Push</option>
                                                            <option value="SMS+Email" data-icon="feather-smartphone">SMS
                                                                + Email</option>
                                                            <option value="SMS+Push+Email"
                                                                data-icon="feather-smartphone">SMS + Push + Email</option>
                                                        </select><span
                                                            class="select2 select2-container select2-container--bootstrap-5"
                                                            dir="ltr" data-select2-id="select2-data-14-ar0h"
                                                            style="width: auto;"><span class="selection"><span
                                                                    class="select2-selection select2-selection--single"
                                                                    role="combobox" aria-haspopup="true"
                                                                    aria-expanded="false" tabindex="0"
                                                                    aria-disabled="false"
                                                                    aria-labelledby="select2-c0xe-container"
                                                                    aria-controls="select2-c0xe-container"><span
                                                                        class="select2-selection__rendered"
                                                                        id="select2-c0xe-container" role="textbox"
                                                                        aria-readonly="true" title="Email"><span
                                                                            class="hstack gap-3"><i
                                                                                class=" feather-mail"></i>
                                                                            Email</span></span><span
                                                                        class="select2-selection__arrow"
                                                                        role="presentation"><b
                                                                            role="presentation"></b></span></span></span><span
                                                                class="dropdown-wrapper"
                                                                aria-hidden="true"></span></span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="fw-bold text-dark">Rating reminders</div>
                                                    <small class="fs-12 text-muted">Send an email reminding me to rate an
                                                        item a week after purchase </small>
                                                </td>
                                                <td class="text-end">
                                                    <div class="form-group select-wd-lg">
                                                        <select class="form-control select2-hidden-accessible"
                                                            data-select2-selector="icon"
                                                            data-select2-id="select2-data-16-ru7e" tabindex="-1"
                                                            aria-hidden="true">
                                                            <option value="SMS" data-icon="feather-smartphone">SMS
                                                            </option>
                                                            <option value="Push" data-icon="feather-bell">Push
                                                            </option>
                                                            <option value="Email" data-icon="feather-mail">Email
                                                            </option>
                                                            <option value="Repeat" data-icon="feather-repeat">Repeat
                                                            </option>
                                                            <option value="Deactivate" data-icon="feather-bell-off"
                                                                selected="" data-select2-id="select2-data-18-eslz">
                                                                Deactivate</option>
                                                            <option value="SMS+Push" data-icon="feather-smartphone">SMS
                                                                + Push</option>
                                                            <option value="Email+Push" data-icon="feather-mail">Email +
                                                                Push</option>
                                                            <option value="SMS+Email" data-icon="feather-smartphone">SMS
                                                                + Email</option>
                                                            <option value="SMS+Push+Email"
                                                                data-icon="feather-smartphone">SMS + Push + Email</option>
                                                        </select><span
                                                            class="select2 select2-container select2-container--bootstrap-5"
                                                            dir="ltr" data-select2-id="select2-data-17-3l02"
                                                            style="width: auto;"><span class="selection"><span
                                                                    class="select2-selection select2-selection--single"
                                                                    role="combobox" aria-haspopup="true"
                                                                    aria-expanded="false" tabindex="0"
                                                                    aria-disabled="false"
                                                                    aria-labelledby="select2-lh2x-container"
                                                                    aria-controls="select2-lh2x-container"><span
                                                                        class="select2-selection__rendered"
                                                                        id="select2-lh2x-container" role="textbox"
                                                                        aria-readonly="true" title="Deactivate"><span
                                                                            class="hstack gap-3"><i
                                                                                class=" feather-bell-off"></i>
                                                                            Deactivate</span></span><span
                                                                        class="select2-selection__arrow"
                                                                        role="presentation"><b
                                                                            role="presentation"></b></span></span></span><span
                                                                class="dropdown-wrapper"
                                                                aria-hidden="true"></span></span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="fw-bold text-dark">Item update notifications</div>
                                                    <small class="fs-12 text-muted">Send an email when an item I've
                                                        purchased is updated </small>
                                                </td>
                                                <td class="text-end">
                                                    <div class="form-group select-wd-lg">
                                                        <select class="form-control select2-hidden-accessible"
                                                            data-select2-selector="icon"
                                                            data-select2-id="select2-data-19-fpik" tabindex="-1"
                                                            aria-hidden="true">
                                                            <option value="SMS" data-icon="feather-smartphone"
                                                                selected="" data-select2-id="select2-data-21-cmyh">
                                                                SMS</option>
                                                            <option value="Push" data-icon="feather-bell">Push
                                                            </option>
                                                            <option value="Email" data-icon="feather-mail">Email
                                                            </option>
                                                            <option value="Repeat" data-icon="feather-repeat">Repeat
                                                            </option>
                                                            <option value="Deactivate" data-icon="feather-bell-off">
                                                                Deactivate</option>
                                                            <option value="SMS+Push" data-icon="feather-smartphone">SMS
                                                                + Push</option>
                                                            <option value="Email+Push" data-icon="feather-mail">Email +
                                                                Push</option>
                                                            <option value="SMS+Email" data-icon="feather-smartphone">SMS
                                                                + Email</option>
                                                            <option value="SMS+Push+Email"
                                                                data-icon="feather-smartphone">SMS + Push + Email</option>
                                                        </select><span
                                                            class="select2 select2-container select2-container--bootstrap-5"
                                                            dir="ltr" data-select2-id="select2-data-20-ghvw"
                                                            style="width: auto;"><span class="selection"><span
                                                                    class="select2-selection select2-selection--single"
                                                                    role="combobox" aria-haspopup="true"
                                                                    aria-expanded="false" tabindex="0"
                                                                    aria-disabled="false"
                                                                    aria-labelledby="select2-lpgk-container"
                                                                    aria-controls="select2-lpgk-container"><span
                                                                        class="select2-selection__rendered"
                                                                        id="select2-lpgk-container" role="textbox"
                                                                        aria-readonly="true" title="SMS"><span
                                                                            class="hstack gap-3"><i
                                                                                class=" feather-smartphone"></i>
                                                                            SMS</span></span><span
                                                                        class="select2-selection__arrow"
                                                                        role="presentation"><b
                                                                            role="presentation"></b></span></span></span><span
                                                                class="dropdown-wrapper"
                                                                aria-hidden="true"></span></span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="fw-bold text-dark">Item comment notifications</div>
                                                    <small class="fs-12 text-muted">Send me an email when someone comments
                                                        on one of my items </small>
                                                </td>
                                                <td class="text-end">
                                                    <div class="form-group select-wd-lg">
                                                        <select class="form-control select2-hidden-accessible"
                                                            data-select2-selector="icon"
                                                            data-select2-id="select2-data-22-z707" tabindex="-1"
                                                            aria-hidden="true">
                                                            <option value="SMS" data-icon="feather-smartphone">SMS
                                                            </option>
                                                            <option value="Push" data-icon="feather-bell"
                                                                selected="" data-select2-id="select2-data-24-hkih">
                                                                Push</option>
                                                            <option value="Email" data-icon="feather-mail">Email
                                                            </option>
                                                            <option value="Repeat" data-icon="feather-repeat">Repeat
                                                            </option>
                                                            <option value="Deactivate" data-icon="feather-bell-off">
                                                                Deactivate</option>
                                                            <option value="SMS+Push" data-icon="feather-smartphone">SMS
                                                                + Push</option>
                                                            <option value="Email+Push" data-icon="feather-mail">Email +
                                                                Push</option>
                                                            <option value="SMS+Email" data-icon="feather-smartphone">SMS
                                                                + Email</option>
                                                            <option value="SMS+Push+Email"
                                                                data-icon="feather-smartphone">SMS + Push + Email</option>
                                                        </select><span
                                                            class="select2 select2-container select2-container--bootstrap-5"
                                                            dir="ltr" data-select2-id="select2-data-23-citb"
                                                            style="width: auto;"><span class="selection"><span
                                                                    class="select2-selection select2-selection--single"
                                                                    role="combobox" aria-haspopup="true"
                                                                    aria-expanded="false" tabindex="0"
                                                                    aria-disabled="false"
                                                                    aria-labelledby="select2-r7za-container"
                                                                    aria-controls="select2-r7za-container"><span
                                                                        class="select2-selection__rendered"
                                                                        id="select2-r7za-container" role="textbox"
                                                                        aria-readonly="true" title="Push"><span
                                                                            class="hstack gap-3"><i
                                                                                class=" feather-bell"></i>
                                                                            Push</span></span><span
                                                                        class="select2-selection__arrow"
                                                                        role="presentation"><b
                                                                            role="presentation"></b></span></span></span><span
                                                                class="dropdown-wrapper"
                                                                aria-hidden="true"></span></span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="fw-bold text-dark">Team comment notifications</div>
                                                    <small class="fs-12 text-muted">Send me an email when someone comments
                                                        on one of my team items </small>
                                                </td>
                                                <td class="text-end">
                                                    <div class="form-group select-wd-lg">
                                                        <select class="form-control select2-hidden-accessible"
                                                            data-select2-selector="icon"
                                                            data-select2-id="select2-data-25-k1up" tabindex="-1"
                                                            aria-hidden="true">
                                                            <option value="SMS" data-icon="feather-smartphone">SMS
                                                            </option>
                                                            <option value="Push" data-icon="feather-bell">Push
                                                            </option>
                                                            <option value="Email" data-icon="feather-mail">Email
                                                            </option>
                                                            <option value="Repeat" data-icon="feather-repeat"
                                                                selected="" data-select2-id="select2-data-27-ue04">
                                                                Repeat</option>
                                                            <option value="Deactivate" data-icon="feather-bell-off">
                                                                Deactivate</option>
                                                            <option value="SMS+Push" data-icon="feather-smartphone">SMS
                                                                + Push</option>
                                                            <option value="Email+Push" data-icon="feather-mail">Email +
                                                                Push</option>
                                                            <option value="SMS+Email" data-icon="feather-smartphone">SMS
                                                                + Email</option>
                                                            <option value="SMS+Push+Email"
                                                                data-icon="feather-smartphone">SMS + Push + Email</option>
                                                        </select><span
                                                            class="select2 select2-container select2-container--bootstrap-5"
                                                            dir="ltr" data-select2-id="select2-data-26-cpp9"
                                                            style="width: auto;"><span class="selection"><span
                                                                    class="select2-selection select2-selection--single"
                                                                    role="combobox" aria-haspopup="true"
                                                                    aria-expanded="false" tabindex="0"
                                                                    aria-disabled="false"
                                                                    aria-labelledby="select2-2med-container"
                                                                    aria-controls="select2-2med-container"><span
                                                                        class="select2-selection__rendered"
                                                                        id="select2-2med-container" role="textbox"
                                                                        aria-readonly="true" title="Repeat"><span
                                                                            class="hstack gap-3"><i
                                                                                class=" feather-repeat"></i>
                                                                            Repeat</span></span><span
                                                                        class="select2-selection__arrow"
                                                                        role="presentation"><b
                                                                            role="presentation"></b></span></span></span><span
                                                                class="dropdown-wrapper"
                                                                aria-hidden="true"></span></span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="fw-bold text-dark">Item review notifications</div>
                                                    <small class="fs-12 text-muted">Send me an email when my items are
                                                        approved or rejected </small>
                                                </td>
                                                <td class="text-end">
                                                    <div class="form-group select-wd-lg">
                                                        <select class="form-control select2-hidden-accessible"
                                                            data-select2-selector="icon"
                                                            data-select2-id="select2-data-28-30w5" tabindex="-1"
                                                            aria-hidden="true">
                                                            <option value="SMS" data-icon="feather-smartphone">SMS
                                                            </option>
                                                            <option value="Push" data-icon="feather-bell">Push
                                                            </option>
                                                            <option value="Email" data-icon="feather-mail">Email
                                                            </option>
                                                            <option value="Repeat" data-icon="feather-repeat">Repeat
                                                            </option>
                                                            <option value="Deactivate" data-icon="feather-bell-off"
                                                                selected="" data-select2-id="select2-data-30-j4zk">
                                                                Deactivate</option>
                                                            <option value="SMS+Push" data-icon="feather-smartphone">SMS
                                                                + Push</option>
                                                            <option value="Email+Push" data-icon="feather-mail">Email +
                                                                Push</option>
                                                            <option value="SMS+Email" data-icon="feather-smartphone">SMS
                                                                + Email</option>
                                                            <option value="SMS+Push+Email"
                                                                data-icon="feather-smartphone">SMS + Push + Email</option>
                                                        </select><span
                                                            class="select2 select2-container select2-container--bootstrap-5"
                                                            dir="ltr" data-select2-id="select2-data-29-fpom"
                                                            style="width: auto;"><span class="selection"><span
                                                                    class="select2-selection select2-selection--single"
                                                                    role="combobox" aria-haspopup="true"
                                                                    aria-expanded="false" tabindex="0"
                                                                    aria-disabled="false"
                                                                    aria-labelledby="select2-er3r-container"
                                                                    aria-controls="select2-er3r-container"><span
                                                                        class="select2-selection__rendered"
                                                                        id="select2-er3r-container" role="textbox"
                                                                        aria-readonly="true" title="Deactivate"><span
                                                                            class="hstack gap-3"><i
                                                                                class=" feather-bell-off"></i>
                                                                            Deactivate</span></span><span
                                                                        class="select2-selection__arrow"
                                                                        role="presentation"><b
                                                                            role="presentation"></b></span></span></span><span
                                                                class="dropdown-wrapper"
                                                                aria-hidden="true"></span></span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="fw-bold text-dark">Buyer review notifications</div>
                                                    <small class="fs-12 text-muted">Send me an email when someone leaves a
                                                        review with their rating </small>
                                                </td>
                                                <td class="text-end">
                                                    <div class="form-group select-wd-lg">
                                                        <select class="form-control select2-hidden-accessible"
                                                            data-select2-selector="icon"
                                                            data-select2-id="select2-data-31-qx5u" tabindex="-1"
                                                            aria-hidden="true">
                                                            <option value="SMS" data-icon="feather-smartphone">SMS
                                                            </option>
                                                            <option value="Push" data-icon="feather-bell">Push
                                                            </option>
                                                            <option value="Email" data-icon="feather-mail">Email
                                                            </option>
                                                            <option value="Repeat" data-icon="feather-repeat">Repeat
                                                            </option>
                                                            <option value="Deactivate" data-icon="feather-bell-off"
                                                                selected="" data-select2-id="select2-data-33-d0k3">
                                                                Deactivate</option>
                                                            <option value="SMS+Push" data-icon="feather-smartphone">SMS
                                                                + Push</option>
                                                            <option value="Email+Push" data-icon="feather-mail">Email +
                                                                Push</option>
                                                            <option value="SMS+Email" data-icon="feather-smartphone">SMS
                                                                + Email</option>
                                                            <option value="SMS+Push+Email"
                                                                data-icon="feather-smartphone">SMS + Push + Email</option>
                                                        </select><span
                                                            class="select2 select2-container select2-container--bootstrap-5"
                                                            dir="ltr" data-select2-id="select2-data-32-y64d"
                                                            style="width: auto;"><span class="selection"><span
                                                                    class="select2-selection select2-selection--single"
                                                                    role="combobox" aria-haspopup="true"
                                                                    aria-expanded="false" tabindex="0"
                                                                    aria-disabled="false"
                                                                    aria-labelledby="select2-yxjp-container"
                                                                    aria-controls="select2-yxjp-container"><span
                                                                        class="select2-selection__rendered"
                                                                        id="select2-yxjp-container" role="textbox"
                                                                        aria-readonly="true" title="Deactivate"><span
                                                                            class="hstack gap-3"><i
                                                                                class=" feather-bell-off"></i>
                                                                            Deactivate</span></span><span
                                                                        class="select2-selection__arrow"
                                                                        role="presentation"><b
                                                                            role="presentation"></b></span></span></span><span
                                                                class="dropdown-wrapper"
                                                                aria-hidden="true"></span></span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="fw-bold text-dark">Expiring support notifications</div>
                                                    <small class="fs-12 text-muted">Send me emails showing my soon to
                                                        expire support entitlements </small>
                                                </td>
                                                <td class="text-end">
                                                    <div class="form-group select-wd-lg">
                                                        <select class="form-control select2-hidden-accessible"
                                                            data-select2-selector="icon"
                                                            data-select2-id="select2-data-34-7x4n" tabindex="-1"
                                                            aria-hidden="true">
                                                            <option value="SMS" data-icon="feather-smartphone">SMS
                                                            </option>
                                                            <option value="Push" data-icon="feather-bell">Push
                                                            </option>
                                                            <option value="Email" data-icon="feather-mail"
                                                                selected="" data-select2-id="select2-data-36-13up">
                                                                Email</option>
                                                            <option value="Repeat" data-icon="feather-repeat">Repeat
                                                            </option>
                                                            <option value="Deactivate" data-icon="feather-bell-off">
                                                                Deactivate</option>
                                                            <option value="SMS+Push" data-icon="feather-smartphone">SMS
                                                                + Push</option>
                                                            <option value="Email+Push" data-icon="feather-mail">Email +
                                                                Push</option>
                                                            <option value="SMS+Email" data-icon="feather-smartphone">SMS
                                                                + Email</option>
                                                            <option value="SMS+Push+Email"
                                                                data-icon="feather-smartphone">SMS + Push + Email</option>
                                                        </select><span
                                                            class="select2 select2-container select2-container--bootstrap-5"
                                                            dir="ltr" data-select2-id="select2-data-35-9lex"
                                                            style="width: auto;"><span class="selection"><span
                                                                    class="select2-selection select2-selection--single"
                                                                    role="combobox" aria-haspopup="true"
                                                                    aria-expanded="false" tabindex="0"
                                                                    aria-disabled="false"
                                                                    aria-labelledby="select2-29s3-container"
                                                                    aria-controls="select2-29s3-container"><span
                                                                        class="select2-selection__rendered"
                                                                        id="select2-29s3-container" role="textbox"
                                                                        aria-readonly="true" title="Email"><span
                                                                            class="hstack gap-3"><i
                                                                                class=" feather-mail"></i>
                                                                            Email</span></span><span
                                                                        class="select2-selection__arrow"
                                                                        role="presentation"><b
                                                                            role="presentation"></b></span></span></span><span
                                                                class="dropdown-wrapper"
                                                                aria-hidden="true"></span></span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="fw-bold text-dark">Daily summary emails</div>
                                                    <small class="fs-12 text-muted">Send me a daily summary of all items
                                                        approved or rejected </small>
                                                </td>
                                                <td class="text-end">
                                                    <div class="form-group select-wd-lg">
                                                        <select class="form-control select2-hidden-accessible"
                                                            data-select2-selector="icon"
                                                            data-select2-id="select2-data-37-wh1c" tabindex="-1"
                                                            aria-hidden="true">
                                                            <option value="SMS" data-icon="feather-smartphone">SMS
                                                            </option>
                                                            <option value="Push" data-icon="feather-bell"
                                                                selected="" data-select2-id="select2-data-39-745v">
                                                                Push</option>
                                                            <option value="Email" data-icon="feather-mail">Email
                                                            </option>
                                                            <option value="Repeat" data-icon="feather-repeat">Repeat
                                                            </option>
                                                            <option value="Deactivate" data-icon="feather-bell-off">
                                                                Deactivate</option>
                                                            <option value="SMS+Push" data-icon="feather-smartphone">SMS
                                                                + Push</option>
                                                            <option value="Email+Push" data-icon="feather-mail">Email +
                                                                Push</option>
                                                            <option value="SMS+Email" data-icon="feather-smartphone">SMS
                                                                + Email</option>
                                                            <option value="SMS+Push+Email"
                                                                data-icon="feather-smartphone">SMS + Push + Email</option>
                                                        </select><span
                                                            class="select2 select2-container select2-container--bootstrap-5"
                                                            dir="ltr" data-select2-id="select2-data-38-o1bl"
                                                            style="width: auto;"><span class="selection"><span
                                                                    class="select2-selection select2-selection--single"
                                                                    role="combobox" aria-haspopup="true"
                                                                    aria-expanded="false" tabindex="0"
                                                                    aria-disabled="false"
                                                                    aria-labelledby="select2-7enm-container"
                                                                    aria-controls="select2-7enm-container"><span
                                                                        class="select2-selection__rendered"
                                                                        id="select2-7enm-container" role="textbox"
                                                                        aria-readonly="true" title="Push"><span
                                                                            class="hstack gap-3"><i
                                                                                class=" feather-bell"></i>
                                                                            Push</span></span><span
                                                                        class="select2-selection__arrow"
                                                                        role="presentation"><b
                                                                            role="presentation"></b></span></span></span><span
                                                                class="dropdown-wrapper"
                                                                aria-hidden="true"></span></span>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <hr class="my-0">
                                <div class="card-body notify-activity-section">
                                    <div class="mb-4 d-flex align-items-center justify-content-between">
                                        <h5 class="fw-bold mb-0 me-4">
                                            <span class="d-block mb-2">Account Activity:</span>
                                            <span class="fs-12 fw-normal text-muted text-truncate-1-line">Lookup you
                                                account activity checkup.</span>
                                        </h5>
                                        <a href="javascript:void(0);" class="btn btn-sm btn-light-brand">View
                                            Activity</a>
                                    </div>
                                    <div
                                        class="hstack justify-content-between p-4 mb-3 border border-dashed border-gray-3 rounded-1">
                                        <div class="hstack me-4">
                                            <div class="avatar-text">
                                                <i class="feather-message-square"></i>
                                            </div>
                                            <div class="ms-4">
                                                <a href="javascript:void(0);"
                                                    class="fw-bold mb-1 text-truncate-1-line">Someone comments on one of
                                                    my items</a>
                                                <div class="fs-12 text-muted text-truncate-1-line">If someone comments on
                                                    one of your items, it's important to respond in a timely and appropriate
                                                    manner.</div>
                                            </div>
                                        </div>
                                        <div class="form-check form-switch form-switch-sm">
                                            <label class="form-check-label fw-500 text-dark c-pointer"
                                                for="formSwitchComment"></label>
                                            <input class="form-check-input c-pointer" type="checkbox"
                                                id="formSwitchComment">
                                        </div>
                                    </div>
                                    <div
                                        class="hstack justify-content-between p-4 mb-3 border border-dashed border-gray-3 rounded-1">
                                        <div class="hstack me-4">
                                            <div class="avatar-text">
                                                <i class="feather-briefcase"></i>
                                            </div>
                                            <div class="ms-4">
                                                <a href="javascript:void(0);"
                                                    class="fw-bold mb-1 text-truncate-1-line">Someone replies to my job
                                                    posting</a>
                                                <div class="fs-12 text-muted text-truncate-1-line">Great! It's always
                                                    exciting to hear from someone who's interested in a job posting you've
                                                    put out.</div>
                                            </div>
                                        </div>
                                        <div class="form-check form-switch form-switch-sm">
                                            <label class="form-check-label fw-500 text-dark c-pointer"
                                                for="formSwitchReplie"></label>
                                            <input class="form-check-input c-pointer" type="checkbox"
                                                id="formSwitchReplie">
                                        </div>
                                    </div>
                                    <div
                                        class="hstack justify-content-between p-4 mb-3 border border-dashed border-gray-3 rounded-1">
                                        <div class="hstack me-4">
                                            <div class="avatar-text">
                                                <i class="feather-briefcase"></i>
                                            </div>
                                            <div class="ms-4">
                                                <a href="javascript:void(0);"
                                                    class="fw-bold mb-1 text-truncate-1-line">Someone mentions or follows
                                                    me</a>
                                                <div class="fs-12 text-muted text-truncate-1-line">If you received a
                                                    notification that someone mentioned or followed you, take a moment to
                                                    read it and understand what it means.</div>
                                            </div>
                                        </div>
                                        <div class="form-check form-switch form-switch-sm">
                                            <label class="form-check-label fw-500 text-dark c-pointer"
                                                for="formSwitchFollow"></label>
                                            <input class="form-check-input c-pointer" type="checkbox"
                                                id="formSwitchFollow">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="connectionTab" role="tabpanel">
                                <div class="card-body development-connections">
                                    <div class="mb-4 d-flex align-items-center justify-content-between">
                                        <h5 class="fw-bold mb-0 me-4">
                                            <span class="d-block mb-2">Developement Connections:</span>
                                            <span class="fs-12 fw-normal text-muted text-truncate-1-line">Developement
                                                connections increase speed.</span>
                                        </h5>
                                        <a href="javascript:void(0);" class="btn btn-sm btn-light-brand">View
                                            Connection</a>
                                    </div>
                                    <div
                                        class="hstack justify-content-between p-4 mb-3 border border-dashed border-gray-3 rounded-1">
                                        <div class="hstack me-4">
                                            <div class="wd-40">
                                                <img src="assets/images/brand/google-drive.png" class="img-fluid"
                                                    alt="">
                                            </div>
                                            <div class="ms-4">
                                                <a href="javascript:void(0);"
                                                    class="fw-bold mb-1 text-truncate-1-line">Google Drive: Cloud Storage
                                                    &amp; File Sharing</a>
                                                <div class="fs-12 text-muted text-truncate-1-line">Google's powerful
                                                    search capabilities are embedded in Drive and offer speed, reliability,
                                                    and collaboration. And features like Drive search chips help your team
                                                    ...</div>
                                            </div>
                                        </div>
                                        <div class="form-check form-switch form-switch-sm">
                                            <label class="form-check-label fw-500 text-dark c-pointer"
                                                for="formSwitchGDrive"></label>
                                            <input class="form-check-input c-pointer" type="checkbox"
                                                id="formSwitchGDrive">
                                        </div>
                                    </div>
                                    <div
                                        class="hstack justify-content-between p-4 mb-3 border border-dashed border-gray-3 rounded-1">
                                        <div class="hstack me-4">
                                            <div class="wd-40">
                                                <img src="assets/images/brand/dropbox.png" class="img-fluid"
                                                    alt="">
                                            </div>
                                            <div class="ms-4">
                                                <a href="javascript:void(0);"
                                                    class="fw-bold mb-1 text-truncate-1-line">Dropbox: Cloud Storage &amp;
                                                    File Sharing</a>
                                                <div class="fs-12 text-muted text-truncate-1-line">Dropbox brings
                                                    everything—traditional files, cloud content, and web shortcuts—together
                                                    in one place. ... Save and access your files from any device, and share
                                                    ...</div>
                                            </div>
                                        </div>
                                        <div class="form-check form-switch form-switch-sm">
                                            <label class="form-check-label fw-500 text-dark c-pointer"
                                                for="formSwitchDropbox"></label>
                                            <input class="form-check-input c-pointer" type="checkbox"
                                                id="formSwitchDropbox" checked="">
                                        </div>
                                    </div>
                                    <div
                                        class="hstack justify-content-between p-4 mb-3 border border-dashed border-gray-3 rounded-1">
                                        <div class="hstack me-4">
                                            <div class="wd-40">
                                                <img src="assets/images/brand/github.png" class="img-fluid"
                                                    alt="">
                                            </div>
                                            <div class="ms-4">
                                                <a href="javascript:void(0);"
                                                    class="fw-bold mb-1 text-truncate-1-line">GitHub: Where the world
                                                    builds software</a>
                                                <div class="fs-12 text-muted text-truncate-1-line">GitHub is where over 83
                                                    million developers shape the future of software, together. Contribute to
                                                    the open source community, manage your Git repositories, ...</div>
                                            </div>
                                        </div>
                                        <div class="form-check form-switch form-switch-sm">
                                            <label class="form-check-label fw-500 text-dark c-pointer"
                                                for="formSwitchGitHub"></label>
                                            <input class="form-check-input c-pointer" type="checkbox"
                                                id="formSwitchGitHub" checked="">
                                        </div>
                                    </div>
                                    <div
                                        class="hstack justify-content-between p-4 mb-3 border border-dashed border-gray-3 rounded-1">
                                        <div class="hstack me-4">
                                            <div class="wd-40">
                                                <img src="assets/images/brand/gitlab.png" class="img-fluid"
                                                    alt="">
                                            </div>
                                            <div class="ms-4">
                                                <a href="javascript:void(0);"
                                                    class="fw-bold mb-1 text-truncate-1-line">GitLab: The One DevOps
                                                    Platform</a>
                                                <div class="fs-12 text-muted text-truncate-1-line">GitLab helps you
                                                    automate the builds, integration, and verification of your code. With
                                                    SAST, DAST, code quality analysis, plus pipelines that enable ...</div>
                                            </div>
                                        </div>
                                        <div class="form-check form-switch form-switch-sm">
                                            <label class="form-check-label fw-500 text-dark c-pointer"
                                                for="formSwitchGitLab"></label>
                                            <input class="form-check-input c-pointer" type="checkbox"
                                                id="formSwitchGitLab">
                                        </div>
                                    </div>
                                    <div
                                        class="hstack justify-content-between p-4 mb-3 border border-dashed border-gray-3 rounded-1">
                                        <div class="hstack me-4">
                                            <div class="wd-40">
                                                <img src="assets/images/brand/shopify.png" class="img-fluid"
                                                    alt="">
                                            </div>
                                            <div class="ms-4">
                                                <a href="javascript:void(0);"
                                                    class="fw-bold mb-1 text-truncate-1-line">Shopify: Ecommerce
                                                    Developers Platform</a>
                                                <div class="fs-12 text-muted text-truncate-1-line">Try Shopify free and
                                                    start a business or grow an existing one. Get more than ecommerce
                                                    software with tools to manage every part of your business.</div>
                                            </div>
                                        </div>
                                        <div class="form-check form-switch form-switch-sm">
                                            <label class="form-check-label fw-500 text-dark c-pointer"
                                                for="formSwitchShopify"></label>
                                            <input class="form-check-input c-pointer" type="checkbox"
                                                id="formSwitchShopify" checked="">
                                        </div>
                                    </div>
                                    <div
                                        class="hstack justify-content-between p-4 border border-dashed border-gray-3 rounded-1">
                                        <div class="hstack me-4">
                                            <div class="wd-40">
                                                <img src="assets/images/brand/whatsapp.png" class="img-fluid"
                                                    alt="">
                                            </div>
                                            <div class="ms-4">
                                                <a href="javascript:void(0);"
                                                    class="fw-bold mb-1 text-truncate-1-line">WhatsApp: WhatsApp from
                                                    Facebook is a FREE messaging and video calling app</a>
                                                <div class="fs-12 text-muted text-truncate-1-line">Reliable messaging.
                                                    With WhatsApp, you'll get fast, simple, secure messaging and calling for
                                                    free*, available on phones all ...</div>
                                            </div>
                                        </div>
                                        <div class="form-check form-switch form-switch-sm">
                                            <label class="form-check-label fw-500 text-dark c-pointer"
                                                for="formSwitchWhatsApp"></label>
                                            <input class="form-check-input c-pointer" type="checkbox"
                                                id="formSwitchWhatsApp">
                                        </div>
                                    </div>
                                </div>
                                <hr class="my-0">
                                <div class="card-body social-connections">
                                    <div class="mb-4 d-flex align-items-center justify-content-between">
                                        <h5 class="fw-bold mb-0 me-4">
                                            <span class="d-block mb-2">Social Connections:</span>
                                            <span class="fs-12 fw-normal text-muted text-truncate-1-line">Social
                                                connections increase your audience.</span>
                                        </h5>
                                        <a href="javascript:void(0);" class="btn btn-sm btn-light-brand">View
                                            Connection</a>
                                    </div>
                                    <div
                                        class="hstack justify-content-between p-4 mb-3 border border-dashed border-gray-3 rounded-1">
                                        <div class="hstack me-4">
                                            <div class="wd-40">
                                                <img src="assets/images/brand/facebook.png" class="img-fluid"
                                                    alt="">
                                            </div>
                                            <div class="ms-4">
                                                <a href="javascript:void(0);"
                                                    class="fw-bold mb-1 text-truncate-1-line">Facebook: The World Most
                                                    Popular Social Network</a>
                                                <div class="fs-12 text-muted text-truncate-1-line">Create an account or
                                                    log into Facebook. Connect with friends, family and other people you
                                                    know. Share photos and videos, send messages and get updates.</div>
                                            </div>
                                        </div>
                                        <div class="form-check form-switch form-switch-sm">
                                            <label class="form-check-label fw-500 text-dark c-pointer"
                                                for="formSwitchFacebook"></label>
                                            <input class="form-check-input c-pointer" type="checkbox"
                                                id="formSwitchFacebook" checked="">
                                        </div>
                                    </div>
                                    <div
                                        class="hstack justify-content-between p-4 mb-3 border border-dashed border-gray-3 rounded-1">
                                        <div class="hstack me-4">
                                            <div class="wd-40">
                                                <img src="assets/images/brand/instagram.png" class="img-fluid"
                                                    alt="">
                                            </div>
                                            <div class="ms-4">
                                                <a href="javascript:void(0);"
                                                    class="fw-bold mb-1 text-truncate-1-line">Instagram: Edit &amp; Share
                                                    photos, Videos &amp; Dessages</a>
                                                <div class="fs-12 text-muted text-truncate-1-line">Create an account or
                                                    log in to Instagram - A simple, fun &amp; creative way to capture, edit
                                                    &amp; share photos, videos &amp; messages with friends &amp; family.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-check form-switch form-switch-sm">
                                            <label class="form-check-label fw-500 text-dark c-pointer"
                                                for="formSwitchInstagram"></label>
                                            <input class="form-check-input c-pointer" type="checkbox"
                                                id="formSwitchInstagram">
                                        </div>
                                    </div>
                                    <div
                                        class="hstack justify-content-between p-4 mb-3 border border-dashed border-gray-3 rounded-1">
                                        <div class="hstack me-4">
                                            <div class="wd-40">
                                                <img src="assets/images/brand/twitter.png" class="img-fluid"
                                                    alt="">
                                            </div>
                                            <div class="ms-4">
                                                <a href="javascript:void(0);"
                                                    class="fw-bold mb-1 text-truncate-1-line">Twitter: It's what's
                                                    happening / Twitter </a>
                                                <div class="fs-12 text-muted text-truncate-1-line">From breaking news and
                                                    entertainment to sports and politics, get the full story with all the
                                                    live commentary.</div>
                                            </div>
                                        </div>
                                        <div class="form-check form-switch form-switch-sm">
                                            <label class="form-check-label fw-500 text-dark c-pointer"
                                                for="formSwitchTwitter"></label>
                                            <input class="form-check-input c-pointer" type="checkbox"
                                                id="formSwitchTwitter" checked="">
                                        </div>
                                    </div>
                                    <div
                                        class="hstack justify-content-between p-4 mb-3 border border-dashed border-gray-3 rounded-1">
                                        <div class="hstack me-4">
                                            <div class="wd-40">
                                                <img src="assets/images/brand/spotify.png" class="img-fluid"
                                                    alt="">
                                            </div>
                                            <div class="ms-4">
                                                <a href="javascript:void(0);"
                                                    class="fw-bold mb-1 text-truncate-1-line">Spotify: Web Player: Music
                                                    for everyone </a>
                                                <div class="fs-12 text-muted text-truncate-1-line">Spotify is a digital
                                                    music service that gives you access to millions of songs.</div>
                                            </div>
                                        </div>
                                        <div class="form-check form-switch form-switch-sm">
                                            <label class="form-check-label fw-500 text-dark c-pointer"
                                                for="formSwitchSpotify"></label>
                                            <input class="form-check-input c-pointer" type="checkbox"
                                                id="formSwitchSpotify" checked="">
                                        </div>
                                    </div>
                                    <div
                                        class="hstack justify-content-between p-4 mb-3 border border-dashed border-gray-3 rounded-1">
                                        <div class="hstack me-4">
                                            <div class="wd-40">
                                                <img src="assets/images/brand/youtube.png" class="img-fluid"
                                                    alt="">
                                            </div>
                                            <div class="ms-4">
                                                <a href="javascript:void(0);"
                                                    class="fw-bold mb-1 text-truncate-1-line">YouTube: The World Largest
                                                    Video Sharing Platform</a>
                                                <div class="fs-12 text-muted text-truncate-1-line">Enjoy the videos and
                                                    music you love, upload original content, and share it all with friends,
                                                    family, and the world on YouTube.</div>
                                            </div>
                                        </div>
                                        <div class="form-check form-switch form-switch-sm">
                                            <label class="form-check-label fw-500 text-dark c-pointer"
                                                for="formSwitchYouTube"></label>
                                            <input class="form-check-input c-pointer" type="checkbox"
                                                id="formSwitchYouTube">
                                        </div>
                                    </div>
                                    <div
                                        class="hstack justify-content-between p-4 mb-3 border border-dashed border-gray-3 rounded-1">
                                        <div class="hstack me-4">
                                            <div class="wd-40">
                                                <img src="assets/images/brand/pinterest.png" class="img-fluid"
                                                    alt="">
                                            </div>
                                            <div class="ms-4">
                                                <a href="javascript:void(0);"
                                                    class="fw-bold mb-1 text-truncate-1-line">Pinterest: Discover recipes,
                                                    home ideas, style inspiration and other ideas to try</a>
                                                <div class="fs-12 text-muted text-truncate-1-line">Pinterest is an image
                                                    sharing and social media service designed to enable saving and discovery
                                                    of information on the internet using images.</div>
                                            </div>
                                        </div>
                                        <div class="form-check form-switch form-switch-sm">
                                            <label class="form-check-label fw-500 text-dark c-pointer"
                                                for="formSwitchPinterest"></label>
                                            <input class="form-check-input c-pointer" type="checkbox"
                                                id="formSwitchPinterest" checked="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ Main Content ] end -->


        <!-- Select2 CSS -->
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

        <!-- Scripts -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

        <!-- Custom Script -->
        <script>
            $(document).ready(function() {
                // Initialize Select2 for role select
                $('.max-select').select2({
                    theme: 'bootstrap-5',
                    placeholder: 'Select...',
                    allowClear: true
                });
            });
        </script>
    @endsection
