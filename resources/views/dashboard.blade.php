@extends('layouts.app')

@section('title', 'Dashboard')

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
                <p class="mb-0 heading-text">{{$express_client_admin->organisation_name}}</p>
            </div>
            <form method="get" action="{{route('express.search')}}" class="position-relative d-none d-lg-block">
                <i class="bi bi-search position-absolute position-absolute top-50 translate-middle-y top-search-icon"></i>
                <input type="search" class="main-search" name="student_name" placeholder="Search for student name...">
            </form>
            <img src="{{$express_client_admin->logo ?? 'https://ui-avatars.com/api/?name=' . $express_client_admin->name}}" alt="" class="user-image-small d-block d-lg-none">
        </div>
    </div>
    <div class="inner-container">
        <div class="user-details d-flex">
            <img src="{{$express_client_admin->logo ?? 'https://ui-avatars.com/api/?name=' . $express_client_admin->name}}" alt="" class="user-image d-none d-lg-block">
            <div class="d-flex align-items-center ms-3">
                <div>
                    <h3 class="user-name ">Hello<strong class="d-none">, {{$express_client_admin->name}}</strong></h3>
                    <p class="user-below-text">Currently, you are on {{$express_client_admin->organisation_name}}'s LifeVitae Express Admin Dashboard</p>
                </div>
            </div>
        </div>
        <form method="get" action="{{route('express.search')}}" class="position-relative d-block d-lg-none mt-3">
            <i class="bi bi-search position-absolute position-absolute top-50 translate-middle-y top-search-icon"></i>
            <input type="search" class="main-search" name="student_name" placeholder="Search for student name...">
        </form>

        <div class="stats mt-5">
            <div class="row">
                <div class="col-6 col-sm-4 mb-3">
                    <div class="card">
                        <div class="d-flex px-1 py-2 align-items-center justify-content-between ">
                            <div class="stats-image col-4 mx-auto">
                                <img src="{{asset('assets/images/stats1.svg')}}" alt="">
                            </div>
                            <div class="ps-1 col-8">
                                <p class="stats-text">Total Licenses Issued</p>
                                <p class="stats-value">{{$total_registered_user_count}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-sm-4 mb-3">
                    <div class="card">
                        <div class="d-flex px-1 py-2 align-items-center justify-content-between ">
                            <div class="stats-image col-4 mx-auto">
                                <img src="{{asset('assets/images/stats1.svg')}}" alt="">
                            </div>
                            <div class="ps-1 col-8">
                                <p class="stats-text">Total Available Licenses</p>
                                <p class="stats-value">{{$express_client_admin->total_available_licenses}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-sm-4 mb-3">
                    <div class="card">
                        <div class="d-flex px-1 py-2 align-items-center justify-content-between ">
                            <div class="stats-image col-4 mx-auto">
                                <img src="{{asset('assets/images/stats2.svg')}}" alt="">
                            </div>
                            <div class="ps-1 col-8">
                                <p class="stats-text">Total Reports Generated</p>
                                <p class="stats-value">{{$reportCount}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-sm-4 mb-3">
                    <div class="card">
                        <div class="d-flex px-1 py-2 align-items-center justify-content-between ">
                            <div class="stats-image col-4 mx-auto">
                                <img src="{{asset('assets/images/stats2.svg')}}" alt="">
                            </div>
                            <div class="ps-1 col-8">
                                <p class="stats-text">Total Pending Reports</p>
                                <p class="stats-value">{{$pendingReports}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-sm-4 mb-3">
                    <div class="card">
                        <div class="d-flex px-1 py-2 align-items-center justify-content-between ">
                            <div class="stats-image col-4 mx-auto">
                                <img src="{{asset('assets/images/stats3.svg')}}" alt="">
                            </div>
                            <div class="ps-1 col-8">
                                <p class="stats-text">Total Registered User</p>
                                <p class="stats-value">{{$total_registered_user_count}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="download-box mt-5">
            <div class="d-flex align-items-center">
                <div class="col-md-9 col-12">
                    <p class="download-box-text">You can download your quarterly report below</p>
                    <button class="download-btn">Download</button>
                </div>
                <div class="col-md-3 d-none d-md-block">
                    <img src="{{asset('assets/images/download-box.svg')}}" alt="" class="ms-auto">
                </div>
            </div>
        </div>

        <div class="report-container mt-5 d-none">
            <div class="report-container-inner">
                <div class="report-header">
                    <div>
                        <img src="{{asset('assets/images/purple_logo.png')}}" alt="" class="purple_logo">
                    </div>
                    <div>
                        <h4 class="mt-3 fw-bold mb-0">LIFEVITAE EXPRESS QUARTERLY USAGE REPORT</h4>
                        <p class="fw-bold mb-0">PERIOD: {{$start_month}}-{{$end_month}} {{$year}}</p>

                        <h5 class="client-name mb-0">CLIENT NAME: <span>{{$express_client->name}}</span></h5>
                    </div>
                </div>

                <div class="data-summary mt-5">
                    <h5 class="mt-3 fw-bold mb-0">DATA SUMMARY:</h5>
                    <span class="purple-btm"></span>
                </div>

                <div class="mt-5">
                    <table id="tbl1">
                        <thead>
                            <tr>
                                <th class="table-head head1">PARTICULARS</th>
                                <th class="table-head head2">NUMBER</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="table-data">Total Licenses Issued</td>
                                <td class="table-data">{{$total_registered_user_quater_count}}</td>
                            </tr>
                            <tr>
                                <td class="table-data">Total OMR Sheets Generated</td>
                                <td class="table-data">{{$total_registered_user_quater_count}}</td>
                            </tr>
                            <tr>
                                <td class="table-data">Reports Generated</td>
                                <td class="table-data">{{$reportCountQuater}}</td>
                            </tr>
                            <!-- <tr>
                                <td class="table-data">&nbsp;</td>
                                <td class="table-data">&nbsp;</td>
                            </tr>
                            <tr>
                                <td class="table-data">&nbsp;</td>
                                <td class="table-data">&nbsp;</td>
                            </tr> -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')

@endpush