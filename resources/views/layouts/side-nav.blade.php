<div class="sidebar pt-2 pt-lg-4 overflow-hidden position-fixed">
    <div class="d-flex align-items-center justify-content-between justify-content-lg-center">
        <img src="{{asset('assets/images/logo.svg')}}" alt="">
        <button class="btn-nav d-lg-none d-md-inline-block" id="toggleButtonClose">
            <i class="bi bi-x-lg close-icon"></i>
        </button>
    </div>
    <div class="mt-5 h-100">
        <div class="vh-100">
            <div class="d-flex flex-column h-100 justify-content-between">
                <div>
                    <a href="{{route('express.dashboard')}}" class="text-white mb-1 navLink d-block d-flex {{request()->routeIs('express.dashboard')?'active':''}}">
                        <span class="d-inline-block me-4">
                            <i class="bi bi-speedometer2"></i>
                        </span>
                        <span class="d-inline-block">Dashboard</span>
                    </a>
                    <a href="{{route('express.student_data')}}" class="text-white mb-1 navLink d-block d-flex {{request()->routeIs('student_data')?'active':''}}">
                        <span class="d-inline-block me-4">
                            <i class="bi bi-person"></i>
                        </span>
                        <span class="d-inline-block">Student Data</span>
                    </a>
                    <a href="{{route('report')}}" class="text-white mb-1 navLink d-block d-flex {{request()->routeIs('report')?'active':''}}">
                        <span class="d-inline-block me-4">
                            <i class="bi bi-graph-up"></i>
                        </span>
                        <span class="d-inline-block">Report</span>
                    </a>
                </div>
                <div class="mb-5 pb-5">
                    <a href="" class="text-white mb-1 navLink d-block d-flex">
                        <span class="d-inline-block me-4">
                            <i class="bi bi-gear"></i>
                        </span>
                        <span class="d-inline-block">Settings</span>
                    </a>
                    <a href="" class="text-white mb-1 navLink d-block d-flex">
                        <span class="d-inline-block me-4">
                            <i class="bi bi-info-circle"></i>
                        </span>
                        <span class="d-inline-block">Info</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>