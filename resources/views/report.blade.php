@extends('layouts.app')

@section('title', 'Reports')

@push('css')

@endpush

@section('content')
<div class="main-content pt-2 pt-lg-4 px-lg-4">
    <div class="top-bar">
        <div class="d-flex align-items-center justify-content-between">
            <div>
                <button class="btn-nav d-lg-none d-md-inline-block" id="toggleButtonOpen">
                    <i class="bi bi-list"></i>
                </button>
                <p class="mb-0 heading-text">Student Key Data</p>
            </div>
            <form method="get" action="{{route('express.search')}}" class="position-relative d-none d-lg-block">
                <i class="bi bi-search position-absolute top-50 translate-middle-y top-search-icon"></i>
                <input type="search" class="main-search" name="student_name" placeholder="Search for student name...">
            </form>
            <img src="https://via.placeholder.com/350" alt="" class="user-image-small d-block d-lg-none">
        </div>
    </div>
    <div class="inner-container">
        <form method="get" action="{{route('express.search')}}" class="position-relative d-block d-lg-none mt-3">
            <i class="bi bi-search position-absolute top-50 translate-middle-y top-search-icon"></i>
            <input type="search" class="main-search" name="student_name" placeholder="Search for student name...">
        </form>

        <div class="row mt-5 mt-lg-0">
            <div class="col-sm-6 mb-4">
                <div class="student-search-box">
                    <div>
                        <div>
                            <h4 class="text-center fw-bold">Class XII</h4>
                            <h6 class="text-center">Number of students: 32</h6>
                        </div>
                        <div class="mt-4 px-5 position-relative">
                            <i class="bi bi-search position-absolute top-50 translate-middle-y report-search-icon"></i>
                            <input type="search" value="" class="w-100 student-search" placeholder="Search Student">
                        </div>
                        <div class="d-flex justify-content-center my-4">
                            <button class="download-btn">Download Report</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 mb-4">
                <div class="student-search-box">
                    <div>
                        <div>
                            <h4 class="text-center fw-bold">Class XI</h4>
                            <h6 class="text-center">Number of students: 32</h6>
                        </div>
                        <div class="mt-4 px-5 position-relative">
                            <i class="bi bi-search position-absolute top-50 translate-middle-y report-search-icon"></i>
                            <input type="search" value="" class="w-100 student-search" placeholder="Search Student">
                        </div>
                        <div class="d-flex justify-content-center my-4">
                            <button class="download-btn">Download Report</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 mb-4">
                <div class="student-search-box">
                    <div>
                        <div>
                            <h4 class="text-center fw-bold">Class X</h4>
                            <h6 class="text-center">Number of students: 32</h6>
                        </div>
                        <div class="mt-4 px-5 position-relative">
                            <i class="bi bi-search position-absolute top-50 translate-middle-y report-search-icon"></i>
                            <input type="search" value="" class="w-100 student-search" placeholder="Search Student">
                        </div>
                        <div class="d-flex justify-content-center my-4">
                            <button class="download-btn">Download Report</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 mb-4">
                <div class="student-search-box">
                    <div>
                        <div>
                            <h4 class="text-center fw-bold">Class IX</h4>
                            <h6 class="text-center">Number of students: 32</h6>
                        </div>
                        <div class="mt-4 px-5 position-relative">
                            <i class="bi bi-search position-absolute top-50 translate-middle-y report-search-icon"></i>
                            <input type="search" value="" class="w-100 student-search" placeholder="Search Student">
                        </div>
                        <div class="d-flex justify-content-center my-4">
                            <button class="download-btn">Download Report</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection

@push('script')

@endpush