@extends('layouts.app')

@section('title', 'Student Data')

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

        <div class="graph-data mt-5 mt-lg-0">
            <div class="row">
                <div class="col-sm-6">
                    <div class="d-flex justify-content-center">
                        <div>
                            <h5>Skill Distribution Chart</h5>
                            <div class="myPieChart2">
                                <canvas id="myChart"></canvas>
                                </script>
                                <script>
                                    const data = {
                                        labels: @json($skills),
                                        datasets: [{
                                            label: "",
                                            data: @json(array_values($SkillDistributionChart)),
                                            backgroundColor: ['#c00000', '#ed7d31', '#ffc000', '#70ad47', '#5b9bd5', '#2d5597'],
                                        }]
                                    };
                                    const config = {
                                        type: 'pie',
                                        data,
                                        options: {
                                            plugins: {
                                                tooltip: {
                                                    position: 'average',
                                                    bodyAlign: 'center',
                                                    backgroundColor: '#824FD2',
                                                    bodyColor: '#fff',
                                                    displayColors: false,
                                                    callbacks: {
                                                        title: () => null, //to remove title
                                                        label: function(context) {
                                                            return context.formattedValue;
                                                        }
                                                    },
                                                },
                                                legend: {
                                                    display: true,
                                                    position: 'right',
                                                    align: 'center',
                                                    responsive: true,
                                                    labels: {
                                                        font: {
                                                            size: 15,
                                                        },
                                                        textAlign: 'start',
                                                        usePointStyle: true,
                                                        pointStyle: 'rectRounded',
                                                    }
                                                }
                                            }
                                        }
                                    };

                                    const myChart = new Chart(
                                        document.getElementById('myChart'),
                                        config
                                    );
                                </script>
                            </div>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste, asperiores.
                                Tempora corrupti fugit numquam pariatur minus esse debitis ex laborum!</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="d-flex flex-column h-100">
                        <div class="d-flex flex-column align-items-center">
                            <h5 class="align-self-stretch align-self-lg-center">Dominant Skills</h5>
                            <div class="dominant-skill-charts">
                                <canvas id="myChartDomSkill"></canvas>
                                <script src="https://cdnjs.cloudfare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
                                <script>
                                    const dataDomSkill = {
                                        labels: @json(array_values($DominantSkills['labels'])),
                                        datasets: [{
                                            label: "",
                                            data: @json(array_values($DominantSkills['data'])),
                                            backgroundColor: ['#c00000', '#ed7d31', '#ffc000', '#70ad47', '#5b9bd5', '#2d5597'],
                                        }]
                                    };

                                    const configDomSkill = {
                                        type: 'doughnut',
                                        data: dataDomSkill,
                                        options: {
                                            cutout: 40,
                                            responsive: true,
                                            plugins: {
                                                tooltip: {
                                                    position: 'average',
                                                    bodyAlign: 'center',
                                                    backgroundColor: '#824FD2',
                                                    bodyColor: '#fff',
                                                    displayColors: false,
                                                    callbacks: {
                                                        title: () => null, //to remove title
                                                        label: function(context) {
                                                            return context.formattedValue;
                                                        }
                                                    },
                                                },
                                                legend: {
                                                    position: 'right',
                                                    align: 'center',
                                                    labels: {
                                                        usePointStyle: true,
                                                        pointStyle: 'rectRounded',
                                                    }
                                                },
                                            }
                                        },
                                    };
                                    const myChartDomSkill = new Chart(
                                        document.getElementById('myChartDomSkill'),
                                        configDomSkill
                                    );
                                </script>
                            </div>
                        </div>
                        <div class="d-flex flex-column align-items-center mt-auto">
                            <h5 class="align-self-stretch align-self-lg-center">Developing Skills</h5>
                            <div class="developing-skill-charts">
                                <canvas id="myChartDevSkill"></canvas>
                                <script src="https://cdnjs.cloudfare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
                                <script>
                                    const dataDevSkill = {
                                        labels: @json(array_values($DevelopingSkills['labels'])),
                                        datasets: [{
                                            label: "",
                                            data: @json(array_values($DevelopingSkills['data'])),
                                            backgroundColor: ['#c00000', '#ed7d31', '#ffc000', '#70ad47', '#5b9bd5', '#2d5597'],
                                        }]
                                    };
                                    const configDevSkill = {
                                        type: 'doughnut',
                                        data: dataDevSkill,
                                        options: {
                                            cutout: 40,
                                            plugins: {
                                                tooltip: {
                                                    position: 'average',
                                                    bodyAlign: 'center',
                                                    backgroundColor: '#824FD2',
                                                    bodyColor: '#fff',
                                                    displayColors: false,
                                                    callbacks: {
                                                        title: () => null, //to remove title
                                                        label: function(context) {
                                                            return context.formattedValue;
                                                        }
                                                    },
                                                },
                                                legend: {
                                                    position: 'right',
                                                    align: 'center',
                                                    labels: {
                                                        usePointStyle: true,
                                                        pointStyle: 'rectRounded',
                                                    }
                                                },
                                            }
                                        }
                                    };

                                    const myChartDevSkill = new Chart(
                                        document.getElementById('myChartDevSkill'),
                                        configDevSkill
                                    );
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="extra-data mt-5">
            <div class="row justify-content-between">
                <div class="col-sm-6">
                    <div class="d-flex flex-column">
                        <div class="extra-data-shadow">
                            <div class="d-flex align-items-center">
                                <div class="icon-box me-3">
                                    <i class="fa-solid fa-user-graduate icon-item"></i>
                                </div>
                                <h5 class="mb-0">Profiles Completed
                                    <span class="me-2"><i class="fa-solid fa-circle-question"></i></span>
                                    :
                                    <span>{{array_sum($genderCount)}}</span>
                                </h5>
                            </div>
                            <div class="d-flex align-items-start mt-5">
                                <h5 class="ms-5 ps-2 me-2 fw-bold">Gender <br>Breakdown:</h5>
                                <table>
                                    <tr class="mt-3">
                                        <th class="px-lg-4 px-2">
                                            <h3>{{$genderCount['male']}}</h3>
                                        </th>
                                        <th class="px-lg-4 px-2">
                                            <h3>{{$genderCount['female']}}</h3>
                                        </th>
                                    </tr>
                                    <tr>
                                        <td class="px-lg-4 px-2">Male</td>
                                        <td class="px-lg-4 px-2">Female</td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <div class="extra-data-shadow mt-4">
                            <div class="d-flex justify-content-between">
                                <h5>
                                    Top Character
                                    <span class="me-2"><i class="fa-solid fa-circle-question"></i></span>
                                </h5>
                            </div>
                            <div class="top-character">
                                <div class="owl-carousel new-carousel">
                                    <div class="item gray-box">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="character-box">
                                                    <img src="{{asset('assets/images/character.png')}}">
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="character-text">
                                                    <h4>
                                                        {{$lifevitae_characters->title}}
                                                        <!-- <span style="float: right;">32</span> -->
                                                    </h4>
                                                    <p class="owl-desc-text">{{$lifevitae_characters->class_description}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="extra-data-shadow mt-4">
                            <div class="d-flex justify-content-between">
                                <h5>
                                    Suggested Activities
                                </h5>
                            </div>

                            <div class="d-flex flex-column p-2">
                                @foreach($suggestedActivity as $key=>$sa)
                                <div class="d-flex align-items-center activity-box1 mb-3">
                                    <div class="activity-img-box1">
                                        <img src="{{asset('assets/images/activity.png')}}" alt="" class="activity-img">
                                    </div>
                                    <div>
                                        <h6 class="mb-1 ms-3 fw-bold">{{$key}}</h6>
                                        <p class="mb-0 ms-3 fw-bold activity-text">{{$sa}}</p>
                                    </div>
                                </div>
                                @endforeach
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="d-flex flex-column">
                        <div class="extra-data-shadow">
                            <div class="d-flex py-3">
                                <button class="download-btn mt-0 mx-auto">Download Summary Repor</button>
                            </div>
                        </div>
                        <div class="extra-data-shadow mt-4">
                            <div class="d-flex align-items-center">
                                <h5 class="mb-0">
                                    Top 3 Pathway
                                    <span class="me-2"><i class="fa-solid fa-circle-question"></i></span>
                                </h5>
                            </div>
                            @foreach($Top3Pathway as $t3p)
                            <div class="d-flex align-items-center mt-3">
                                <div>
                                    <img src="{{asset('assets/images/path.png')}}" alt="">
                                </div>
                                <div class="ms-3">
                                    <p class="path-text1 mb-0">{{$t3p->title}}</p>
                                    <p class="path-text2 mb-0">{{$t3p->description}}</p>
                                </div>
                            </div>
                            @endforeach

                        </div>
                        <div class="extra-data-shadow mt-4">
                            <div class="d-flex align-items-center">
                                <div class="icon-box me-3">
                                    <i class="fa-solid fa-lightbulb icon-item"></i>
                                </div>
                                <h5 class="mb-0">
                                    Top Strengths
                                    <span class="me-2"><i class="fa-solid fa-circle-question"></i></span>
                                </h5>
                            </div>
                            <div class="strength-box">
                                <div class="p-3">
                                    <div class="row">
                                        @foreach($Top10Strengths as $key=>$s)
                                        <div class="col-md-12">
                                            <div class="gray-box">
                                                <span class="p-2 d-inline-block">{{ucfirst($s)}}</span>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
<!-- owl -->
<script>
    $('.new-carousel').owlCarousel({
        responsiveClass: true,
        margin: 10,
        items: 1,
        nav: true,
        navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
    })
</script>
@endpush