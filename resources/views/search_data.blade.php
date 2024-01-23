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
        <div class="tableContainer">
            <table class="mainTable">
                <thead>
                    <tr class="head-row">
                        <th class="head-data left-round">S.NO</th>
                        <th class="head-data">Name</th>
                        <th class="head-data">gender</th>
                        <th class="head-data">Standard</th>
                        <th class="head-data">institute</th>
                        <th class="head-data right-round">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($searched_users as $user)
                    <tr class="body-row">
                        <td class="body-data left-round">
                            <span>{{$loop->iteration + (request('page')>1?((request('page')-1)*10):0)}}</span>
                        </td>
                        <td class="body-data">
                            <span>{{$user->name}}</span>
                        </td>
                        <td class="body-data">
                            <span>
                                @if($user->gender == 1)
                                Male
                                @else
                                Female
                                @endif
                            </span>
                        </td>
                        <td class="body-data">
                            <span>{{$user->standard}}</span>
                        </td>
                        <td class="body-data">
                            <span>{{$user->institute}}</span>
                        </td>
                        <td class="body-data right-round">
                            @if($user->expressReport)
                            <span>
                                <a href="{{route('express.reportOne',$user->id)}}" class="" target="_blank">Report</a>
                            </span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr class="body-row">
                        <td class="body-data" colspan="6" style="border-radius: 30px;">
                            <span>No Record Found</span>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="mt-3">
                {{$searched_users->appends(request()->query())->links('pagination::bootstrap-5')}}
            </div>
        </div>
    </div>
</div>

@endsection

@push('script')

@endpush