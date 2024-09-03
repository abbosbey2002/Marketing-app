    @extends('layouts.admin')
    @section('content')

    <!--! ================================================================ !-->
    <!--! [Start] Main Content !-->
    <!--! ================================================================ !-->
    <main class="nxl-container">
        <div class="nxl-content">
            <!-- [ page-header ] start -->
            <div class="page-header">
                <div class="page-header-left d-flex align-items-center">
                    <div class="page-header-left d-flex align-items-center">
                        <div class="page-header-title">
                            <h5 class="m-b-10">{{ __('sidebar.general.dashboard') }}</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="">{{ __('sidebar.general.home') }}</a></li>
                        </ul>
                    </div>
                    
                </div>
                <div class="page-header-right ms-auto">
                    <div class="page-header-right-items">
                        <div class="d-flex d-md-none">
                            <a href="javascript:void(0)" class="page-header-right-close-toggle">
                                <i class="feather-arrow-left me-2"></i>
                                <span>Back</span>
                            </a>
                        </div>
                        <div class="d-none d-flex align-items-center gap-2 page-header-right-items-wrapper">
                            <div class="dropdown filter-dropdown">
                                <a class="btn btn-light-brand" data-bs-toggle="dropdown" data-bs-offset="0, 10" data-bs-auto-close="outside">
                                    <i class="feather-filter me-2"></i>
                                    <span>Filter</span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <div class="dropdown-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="Role" checked="checked">
                                            <label class="custom-control-label c-pointer" for="Role">Role</label>
                                        </div>
                                    </div>
                                    <div class="dropdown-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="Team" checked="checked">
                                            <label class="custom-control-label c-pointer" for="Team">Team</label>
                                        </div>
                                    </div>
                                    <div class="dropdown-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="Email" checked="checked">
                                            <label class="custom-control-label c-pointer" for="Email">Email</label>
                                        </div>
                                    </div>
                                    <div class="dropdown-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="Member" checked="checked">
                                            <label class="custom-control-label c-pointer" for="Member">Member</label>
                                        </div>
                                    </div>
                                    <div class="dropdown-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="Recommendation" checked="checked">
                                            <label class="custom-control-label c-pointer" for="Recommendation">Recommendation</label>
                                        </div>
                                    </div>
                                    <div class="dropdown-divider"></div>
                                    <a href="javascript:void(0);" class="dropdown-item">
                                        <i class="feather-plus me-3"></i>
                                        <span>Create New</span>
                                    </a>
                                    <a href="javascript:void(0);" class="dropdown-item">
                                        <i class="feather-filter me-3"></i>
                                        <span>Manage Filter</span>
                                    </a>
                                </div>
                            </div>
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
                <div class="row">

                <div class="col-xxl-2 col-lg-4 col-md-6">
                        <div class="card stretch stretch-full">
                            <a href="{{ route('employee.index')}}">
                                <div class="card-body">
                                    <div class="fs-12 fw-medium text-muted mb-3">{{ __('sidebar.general.employees') }}</div>
                                    <div class="hstack justify-content-between lh-base">
                                        <h3><span class="counter">{{$totalCounts['amount_of_teacher']}} </span>ta</h3>
                                        <div class="hstack gap-2 fs-11 {{ $percentageChanges['amount_of_teacher'] >= 0 ? 'text-success' : 'text-danger' }}">
                                            <i class="feather-arrow-{{ $percentageChanges['amount_of_teacher'] >= 0 ? 'up' : 'down' }}-circle fs-12"></i>
                                            <span>{{ number_format($percentageChanges['amount_of_teacher'], 2) }}%</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-xxl-2 col-lg-4 col-md-6">
                        <div class="card stretch stretch-full">
                            <a href="{{ route('courses.index')}}">
                                <div class="card-body">
                                    <div class="fs-12 fw-medium text-muted mb-3">{{ __('sidebar.general.courses') }}</div>
                                    <div class="hstack justify-content-between lh-base">
                                        <h3><span class="counter">{{$totalCounts['amount_of_course']}} </span>ta</h3>
                                        <div class="hstack gap-2 fs-11 {{ $percentageChanges['amount_of_course'] >= 0 ? 'text-success' : 'text-danger' }}">
                                            <i class="feather-arrow-{{ $percentageChanges['amount_of_course'] >= 0 ? 'up' : 'down' }}-circle fs-12"></i>
                                            <span>{{ number_format($percentageChanges['amount_of_course'], 2) }}%</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-xxl-2 col-lg-4 col-md-6">
                        <div class="card stretch stretch-full">
                            <a href="{{ route('groups.index')}}">
                                <div class="card-body">
                                    <div class="fs-12 fw-medium text-muted mb-3">{{ __('sidebar.general.groups') }}</div>
                                    <div class="hstack justify-content-between lh-base">
                                        <h3><span class="counter">{{$totalCounts['amount_of_group']}} </span>ta</h3>
                                        <div class="hstack gap-2 fs-11 {{ $percentageChanges['amount_of_group'] >= 0 ? 'text-success' : 'text-danger' }}">
                                            <i class="feather-arrow-{{ $percentageChanges['amount_of_group'] >= 0 ? 'up' : 'down' }}-circle fs-12"></i>
                                            <span>{{ number_format($percentageChanges['amount_of_group'], 2) }}%</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-xxl-2 col-lg-4 col-md-6">
                        <div class="card stretch stretch-full">
                            <a href="{{ route('branch.index')}}">
                                <div class="card-body">
                                    <div class="fs-12 fw-medium text-muted mb-3">{{ __('sidebar.general.branches') }}</div>
                                    <div class="hstack justify-content-between lh-base">
                                        <h3><span class="counter">{{$totalCounts['amount_of_branch']}} </span>ta</h3>
                                        <div class="hstack gap-2 fs-11 {{ $percentageChanges['amount_of_branch'] >= 0 ? 'text-success' : 'text-danger' }}">
                                            <i class="feather-arrow-{{ $percentageChanges['amount_of_branch'] >= 0 ? 'up' : 'down' }}-circle fs-12"></i>
                                            <span>{{ number_format($percentageChanges['amount_of_branch'], 2) }}%</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-xxl-2 col-lg-4 col-md-6">
                        <div class="card stretch stretch-full">
                            <a href="{{ route('employee.index')}}">
                                <div class="card-body">
                                    <div class="fs-12 fw-medium text-muted mb-3">{{ __('sidebar.general.employees') }}</div>
                                    <div class="hstack justify-content-between lh-base">
                                        <h3><span class="counter">{{$totalCounts['amount_of_staff']}} </span>ta</h3>
                                        <div class="hstack gap-2 fs-11 {{ $percentageChanges['amount_of_staff'] >= 0 ? 'text-success' : 'text-danger' }}">
                                            <i class="feather-arrow-{{ $percentageChanges['amount_of_staff'] >= 0 ? 'up' : 'down' }}-circle fs-12"></i>
                                            <span>{{ number_format($percentageChanges['amount_of_staff'], 2) }}%</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-xxl-2 col-lg-4 col-md-6">
                        <div class="card stretch stretch-full">
                            <a href="{{ route('students.index')}}">
                                <div class="card-body">
                                    <div class="fs-12 fw-medium text-muted mb-3">{{ __('sidebar.general.students') }}</div>
                                    <div class="hstack justify-content-between lh-base">
                                        <h3><span class="counter">{{$totalCounts['amount_of_student']}} </span>ta</h3>
                                        <div class="hstack gap-2 fs-11 {{ $percentageChanges['amount_of_student'] >= 0 ? 'text-success' : 'text-danger' }}">
                                            <i class="feather-arrow-{{ $percentageChanges['amount_of_student'] >= 0 ? 'up' : 'down' }}-circle fs-12"></i>
                                            <span>{{ number_format($percentageChanges['amount_of_student'], 2) }}%</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <!-- [TOP Branch] start -->
                    <div class="col-xxl-6">
                        <div class="card stretch stretch-full">
                            <div class="card-header">
                                <h5 class="card-title">{{ __('home.general.top_branches') }}</h5>
                                <div class="card-header-action">
                                    <div class="card-header-btn">
                                        <div data-bs-toggle="tooltip" title="Delete" class="">
                                            <a href="javascript:void(0);" class="avatar-text avatar-xs bg-danger" data-bs-toggle="remove"></a>
                                        </div>
                                        <div data-bs-toggle="tooltip" title="Refresh">
                                            <a href="javascript:void(0);" class="avatar-text avatar-xs bg-warning" data-bs-toggle="refresh"></a>
                                        </div>
                                        <div data-bs-toggle="tooltip" title="Maximize/Minimize" class="">
                                            <a href="javascript:void(0);" class="avatar-text avatar-xs bg-success" data-bs-toggle="expand"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="table-responsive mb-3">
                                    <table class="table table-hover mb-0">
                                        <tbody>
                                            @foreach($sortedBranches as $data)
                                            <tr>
                                                <td>
                                                    <div class="hstack gap-3">
                                                        <div class="wd-30">
                                                            <!-- Building icon representation -->
                                                            <span class="nxl-micon"><i class="fa-solid fa-building"></i></span>
                                                        </div>
                                                        <div>
                                                            <!-- Branch name with a link to its details page -->
                                                            <a href="{{ route('branch.show', ['branch' => $data['branch']->id ]) }}" class="d-block">
                                                                {{ $data['branch']->name ?? 'N/A' }}
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="{{ $data['percentage_change'] >= 0 ? 'text-success' : 'text-danger' }}">
                                                    <!-- Conditional chevron icon based on percentage change -->
                                                    <i class="feather-chevron-{{ $data['percentage_change'] >= 0 ? 'up' : 'down' }} fs-12 me-1"></i>
                                                    {{ number_format($data['percentage_change'], 2) }}%
                                                </td>
                                                <td class="fw-bold">{{ $data['student_count'] ?? '0' }} ta</td>
                                            </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- [TOP Branch Status] end -->

                    <!-- [TOP COURCE] start -->
                    <div class="col-xxl-6">
                        <div class="card stretch stretch-full">
                            <div class="card-header">
                                <h5 class="card-title">{{ __('home.general.top_courses') }}</h5>
                                <div class="card-header-action">
                                    <div class="card-header-btn">
                                        <div data-bs-toggle="tooltip" title="" data-bs-original-title="Delete">
                                            <a href="javascript:void(0);" class="avatar-text avatar-xs bg-danger" data-bs-toggle="remove"> </a>
                                        </div>
                                        <div data-bs-toggle="tooltip" title="" data-bs-original-title="Refresh">
                                            <a href="javascript:void(0);" class="avatar-text avatar-xs bg-warning" data-bs-toggle="refresh"> </a>
                                        </div>
                                        <div data-bs-toggle="tooltip" title="" data-bs-original-title="Maximize/Minimize">
                                            <a href="javascript:void(0);" class="avatar-text avatar-xs bg-success" data-bs-toggle="expand"> </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="table-responsive mb-3">
                                    <table class="table mb-0">
                                        <tbody>
                        @foreach($coursesWithStudentCount as $course)
    <tr>
        <td>
            <div class="hstack gap-3">
                <div class="wd-30">
                    <span class="nxl-micon"><i class="feather-users"></i></span>
                </div>
                <div>
                    <a href="{{ route('courses.show', ['course' => $course->id])}}" class="d-block">{{ $course->course_name }}</a>
                </div>
            </div>
        </td>
        <td class="{{ $course->percentage_change >= 0 ? 'text-success' : 'text-danger' }}">
            <i class="feather-chevron-{{ $course->percentage_change >= 0 ? 'up' : 'down' }} fs-12 me-1"></i> 
            {{ number_format($course->percentage_change, 2) }}%
        </td>
        <td class="fw-bold">{{ $course->current_student_count }} ta</td>
    </tr>
@endforeach

                                            

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>  
                    <!-- [TOP COURCE] end -->                 

                    <!-- [GROUP] start -->
                    <div class="col-xxl-12">
                        <div class="card stretch stretch-full">
                            <div class="card-header">
                                <h5 class="card-title">{{ __('sidebar.general.groups') }}</h5>
                                <div class="card-header-action">
                                    <div class="card-header-btn">
                                        <div data-bs-toggle="tooltip" title="" data-bs-original-title="Delete">
                                            <a href="javascript:void(0);" class="avatar-text avatar-xs bg-danger" data-bs-toggle="remove"> </a>
                                        </div>
                                        <div data-bs-toggle="tooltip" title="" data-bs-original-title="Refresh">
                                            <a href="javascript:void(0);" class="avatar-text avatar-xs bg-warning" data-bs-toggle="refresh"> </a>
                                        </div>
                                        <div data-bs-toggle="tooltip" title="" data-bs-original-title="Maximize/Minimize">
                                            <a href="javascript:void(0);" class="avatar-text avatar-xs bg-success" data-bs-toggle="expand"> </a>
                                        </div>
                                    </div>
                                    <div class="dropdown">
                                        <a href="javascript:void(0);" class="avatar-text avatar-sm" data-bs-toggle="dropdown" data-bs-offset="25, 25">
                                            <div data-bs-toggle="tooltip" title="" data-bs-original-title="Options">
                                                <i class="feather-more-vertical"></i>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="feather-at-sign"></i>New</a>
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="feather-calendar"></i>Event</a>
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="feather-bell"></i>Snoozed</a>
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="feather-trash-2"></i>Deleted</a>
                                            <div class="dropdown-divider"></div>
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="feather-settings"></i>Settings</a>
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="feather-life-buoy"></i>Tips &amp; Tricks</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body custom-card-action p-0">
                                <div class="table-responsive">
                                    <table class="table table-hover mb-0">
                                        <thead>
                                            <tr>
                                                <th>{{ __('home.general.group_info') }}</th>
                                                <th>{{ __('home.general.branch_name') }}</th>
                                                <th>{{ __('home.general.student_count') }}</th>
                                                <th>{{ __('home.general.duration') }}</th>
                                                <th>{{ __('home.general.status') }}</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach($last_groups as $group)
                                            <tr class="time-tracker-item">
                                                <td>
                                                    <div class="fw-semibold mb-1"><a href="{{ route('groups.show',['group' => $group->id])}}">{{ $group->group_name }}</a></div>
                                                    <div class="d-flex gap-3">
                                                        <a href="{{ route('groups.index')}}" class="hstack gap-1 fs-11 fw-normal text-muted">
                                                            <i class="feather-clock fs-10"></i>
                                                            <span>{{ \Carbon\Carbon::parse($group->start_time)->format('H:i') }} - {{ \Carbon\Carbon::parse($group->end_time)->format('H:i') }}</span>
                                                        </a>
                                                        <a href="{{ route('courses.index')}}" class="badge bg-soft-primary text-primary gap-1 fs-11 fw-normal text-muted">
                                                            <i class="fa-solid fa-book fs-10"></i>
                                                            <span> {{ $group->courses->course_name }}</span>
                                                        </a>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="fw-semibold mb-1">{{ $group->branch->name }}</div>
                                                </td>
                                                <td>
                                                    <div class="fs-11 d-flex justify-content-between mb-1">
                                                        <span>{{ $group->enrollments->count() }}ta </span>
                                                        <span>{{ $groupsWithLimit[$group->id] ?? 'N/A' }}ta </span>
                                                    </div>
                                                    <div class="progress ht-3">
                                                        @php
                                                            $enrollmentsCount = $group->enrollments->count();
                                                            $limit = $groupsWithLimit[$group->id] ?? 0;
                                                            $progress = $limit > 0 ? ($enrollmentsCount / $limit) * 100 : 0;

                                                            // Rang tanlash uchun shart
                                                            $progressBarClass = 'bg-primary'; // Default color
                                                            if ($progress >= 75) {
                                                                $progressBarClass = 'bg-success';
                                                            } elseif ($progress >= 50) {
                                                                $progressBarClass = 'bg-warning';
                                                            }
                                                        @endphp
                                                        <div class="progress-bar {{ $progressBarClass }}" role="progressbar" aria-valuenow="{{ $progress }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $progress }}%"></div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="fw-semibold mb-1">{{ $group->courses->duration }} Oylik</div>
                                                    <div class="d-flex gap-3">
                                                        <a href="{{ route('groups.index')}}" class="hstack gap-1 fs-11 fw-normal text-muted">
                                                            <i class="fa-solid fa-calendar-days fs-10"></i>
                                                            <span>12.07.2024 - 12.12.2024</span>
                                                        </a>
                                                    </div>
                                                </td>
                                                <td>
                                                    @if($group->status == 'active')
                                                        <span class="badge bg-soft-primary text-success mb-1">Faol</span>
                                                    @elseif($group->status == 'paused')
                                                        <span class="badge bg-soft-primary text-warning mb-1">Vaqtinchalik To'xtatilgan</span>
                                                    @elseif($group->status == 'completed')
                                                        <span class="badge bg-soft-primary text-info mb-1">Yakunlangan</span>
                                                    @elseif($group->status == 'recruiting')
                                                        <span class="badge bg-soft-primary text-primary mb-1">Qabul Jarayonida</span>
                                                    @elseif($group->status == 'cancelled')
                                                        <span class="badge bg-soft-primary text-danger mb-1">Bekor qilingan</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="hstack gap-2 justify-content-end">
                                                        <a href="{{ route('groups.show', $group->id) }}" class="avatar-text avatar-md">
                                                            <i class="feather-eye"></i>
                                                        </a>

                                                        @if($group->status != 'cancelled') {{-- Guruh "Bekor qilingan" bo'lsa, edit va student qo'shish yopilsin --}}
                                                            <a href="{{ route('groups.edit', $group->id) }}" class="avatar-text avatar-md">
                                                                <i class="feather-edit"></i>
                                                            </a>
                                                        @endif

                                                        @if($group->status != 'active' && $group->status != 'cancelled' && $group->status != 'paused' && $group->status != 'completed') {{-- Guruh "Faol", "Bekor qilingan", "Vaqtinchalik To'xtatilgan" yoki "Yakunlangan" bo'lsa, student qo'shish yopilsin --}}
                                                            <a href="{{ route('studentStoreGet', $group->id) }}" class="avatar-text avatar-md">
                                                                <i class="fa-solid fa-user-plus"></i>
                                                            </a>
                                                        @endif
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- [GROUP] end -->

                    
                    <!-- [No active Student] start -->
                    <div class="col-xxl-12">
                        <div class="card stretch stretch-full">
                            <div class="card-header">
                                <h5 class="card-title">No actice Student</h5>
                                <div class="card-header-action">
                                    <div class="card-header-btn">
                                        <div data-bs-toggle="tooltip" title="" data-bs-original-title="Delete">
                                            <a href="javascript:void(0);" class="avatar-text avatar-xs bg-danger" data-bs-toggle="remove"> </a>
                                        </div>
                                        <div data-bs-toggle="tooltip" title="" data-bs-original-title="Refresh">
                                            <a href="javascript:void(0);" class="avatar-text avatar-xs bg-warning" data-bs-toggle="refresh"> </a>
                                        </div>
                                        <div data-bs-toggle="tooltip" title="" data-bs-original-title="Maximize/Minimize">
                                            <a href="javascript:void(0);" class="avatar-text avatar-xs bg-success" data-bs-toggle="expand"> </a>
                                        </div>
                                    </div>
                                    <div class="dropdown">
                                        <a href="javascript:void(0);" class="avatar-text avatar-sm" data-bs-toggle="dropdown" data-bs-offset="25, 25">
                                            <div data-bs-toggle="tooltip" title="" data-bs-original-title="Options">
                                                <i class="feather-more-vertical"></i>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="feather-at-sign"></i>New</a>
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="feather-calendar"></i>Event</a>
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="feather-bell"></i>Snoozed</a>
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="feather-trash-2"></i>Deleted</a>
                                            <div class="dropdown-divider"></div>
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="feather-settings"></i>Settings</a>
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="feather-life-buoy"></i>Tips &amp; Tricks</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body custom-card-action p-0">
                                <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th>Full name</th>
                                            <th>Branch name</th>
                                            <th>Phone number</th>
                                            <th>Status</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($students as $student)
                                            @if($student->status !== 'active' && $student->status !== 'faol')
                                                <tr class="time-tracker-item">
                                                    <td>
                                                        <div class="fw-semibold mb-1">{{ $student->first_name }} {{ $student->last_name }}</div>
                                                    </td>
                                                    <td>
                                                        <div class="fw-semibold mb-1">{{ $student->branch->name ?? null }}</div>
                                                    </td>
                                                    <td>
                                                        {{ $student->phone ?? '00000000000000' }}
                                                    </td>
                                                    <td>
                                                        @if($student->status == 'active')
                                                            <span class="badge bg-soft-primary text-success mb-1">Faol</span>
                                                        @elseif($student->status == 'paused')
                                                            <span class="badge bg-soft-primary text-warning mb-1">Vaqtinchalik To'xtatilgan</span>
                                                        @elseif($student->status == 'completed')
                                                            <span class="badge bg-soft-primary text-info mb-1">Yakunlangan</span>
                                                        @elseif($student->status == 'recruiting')
                                                            <span class="badge bg-soft-primary text-primary mb-1">Qabul Jarayonida</span>
                                                        @elseif($student->status == 'cancelled')
                                                            <span class="badge bg-soft-primary text-danger mb-1">Bekor qilingan</span>
                                                        @else
                                                            <span class="badge bg-soft-primary text-secondary mb-1">No active</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="hstack gap-2 justify-content-end">
                                                            <a href="{{ route('students.show', $student->id) }}" class="avatar-text avatar-md">
                                                                <i class="feather-eye"></i>
                                                            </a>

                                                            
                                                                <a href="{{ route('students.edit', $student->id) }}" class="avatar-text avatar-md">
                                                                    <i class="feather-edit"></i>
                                                                </a>
                                                        

                                                            @if($group->status != 'active' && $group->status != 'cancelled' && $group->status != 'paused' && $group->status != 'completed')
                                                                <a href="{{ route('studentStoreGet', $group->id) }}" class="avatar-text avatar-md">
                                                                    <i class="fa-solid fa-user-plus"></i>
                                                                </a>
                                                            @endif
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- [No active Student] end -->

                    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
                    <script>
                        document.addEventListener('DOMContentLoaded', (event) => {
                            document.querySelector('.printBTN').addEventListener('click', function() {
                                var element = document.getElementById('printable-area');
                                html2canvas(element, {
                                    onrendered: function(canvas) {
                                        var imgData = canvas.toDataURL('image/png');
                                        var link = document.createElement('a');
                                        link.href = imgData;
                                        link.download = 'screenshot.png';
                                        link.click();
                                    }
                                });
                            });
                        });
                    </script>

                </div>
            </div>
            <!-- [ Main Content ] end -->
        </div>
    <x-footer></x-footer>
    </main>

 
    <!--! ================================================================ !-->
    <!--! [End] Main Content !-->
    <!--! ================================================================ !-->

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
    background-color: #0f172a; /* Black background */
    color: #fff; /* White text */
    border-color: #000; /* Black border */
}

.pagination .page-link:hover {
    background-color: #555; /* Darker shade on hover */
    color: #fff; /* White text on hover */
    border-color: #000; /* Black border on hover */
}

.pagination .page-item.active .page-link {
    background-color: #000; /* Darker shade for active page */
    border-color: #000; /* Black border for active page */
}
</style>
    @endsection
