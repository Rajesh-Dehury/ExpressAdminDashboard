@extends('layouts.app')

@section('title', 'Search Data')

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
                <p class="mb-0 heading-text">Search Data</p>
            </div>
            <form method="get" action="{{route('express.search')}}" class="position-relative d-none d-lg-block">
                <i class="bi bi-search position-absolute position-absolute top-50 translate-middle-y top-search-icon"></i>
                <input type="search" class="main-search" name="student_name" placeholder="Search for student name...">
            </form>
            <img src="https://via.placeholder.com/350" alt="" class="user-image-small d-block d-lg-none">
        </div>
    </div>
    <div class="inner-container">
        <form method="get" action="{{route('express.search')}}" class="position-relative d-block d-lg-none mt-3">
            <i class="bi bi-search position-absolute position-absolute top-50 translate-middle-y top-search-icon"></i>
            <input type="search" class="main-search" name="student_name" placeholder="Search for student name...">
        </form>
        <!-- New Table Section -->
        <div class="report-table tableContainer">
            <table class="mainTable table table-striped table-bordered">
                <thead>
                    <tr class="head-row">
                        <th class="head-data py-3">S.NO</th>
                        <th class="head-data py-3">Name</th>
                        <th class="head-data py-3">Institute</th>
                        <th class="head-data py-3">Student Summary</th>
                        <th class="head-data py-3">LifeVitae Express Report</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($searched_users as $user)
                    <tr class="body-row">
                        <td class="body-data">
                            <span>{{ $loop->iteration + (request('page') > 1 ? ((request('page') - 1) * 10) : 0) }}</span>
                        </td>
                        <td class="body-data">
                            <span>{{ $user->name }}</span>
                        </td>
                        <td class="body-data">
                            <span>{{ $user->institute }}</span>
                        </td>
                        <td class="body-data">
                            @if($user->expressReport)
                            <span>
                                <a href="{{ route('express.reportOne', $user->id) }}" class="" target="_blank">View</a>
                            </span>
                            @endif
                        </td>
                        <td class="body-data">
                            @if($user->expressReport)
                            <span>
                                <a href="{{ route('express.reportTwo', $user->id) }}" class="" target="_blank">View</a>
                            </span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr class="body-row">
                        <td class="body-data" colspan="5" style="border-radius: 30px;">
                            <span>No Record Found</span>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

            <!-- Pagination Controls -->
            <div class="">
                {{ $searched_users->appends(request()->query())->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
</div>

@endsection

@push('script')

@endpush