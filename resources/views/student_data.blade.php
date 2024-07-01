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
            <img src="{{$express_client_admin->logo ?? 'https://ui-avatars.com/api/?name=' . $express_client_admin->name}}" alt="" class="user-image-small d-block d-lg-none">
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
                            <h5>Skill Distribution Chart
                                <span class="me-2" id="SkillDistributionChart"><i class="fa-solid fa-circle-question"></i></span>
                            </h5>
                            <div class="myPieChart2">
                                <canvas id="myChart"></canvas>
                                </script>
                                <script>
                                    const data = {
                                        labels: @json($skills),
                                        datasets: [{
                                            label: "",
                                            data: @json(array_values($SkillDistributionChart)),
                                            backgroundColor: ['#2d5497', '#5b9bd5', '#6fac45', '#ffbe00', '#ff9000', '#c00000'],
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
                            <!-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste, asperiores.
                                Tempora corrupti fugit numquam pariatur minus esse debitis ex laborum!</p> -->
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="d-flex flex-column h-100">
                        <div class="d-flex flex-column align-items-center">
                            <h5 class="align-self-stretch align-self-lg-center">Dominant Skills
                                <span class="me-2" id="DominantSkills"><i class="fa-solid fa-circle-question"></i></span>
                            </h5>
                            <div class="dominant-skill-charts">
                                <canvas id="myChartDomSkill"></canvas>
                                <script src="https://cdnjs.cloudfare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
                                <script>
                                    const dataDomSkill = {
                                        labels: @json(array_values($DominantSkills['labels'])),
                                        datasets: [{
                                            label: "",
                                            data: @json(array_values($DominantSkills['data'])),
                                            backgroundColor: ['#2d5497', '#5b9bd5', '#6fac45', '#ffbe00', '#ff9000', '#c00000'],
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
                            <h5 class="align-self-stretch align-self-lg-center">Developing Skills
                                <span class="me-2" id="DevelopingSkills"><i class="fa-solid fa-circle-question"></i></span>
                            </h5>
                            <div class="developing-skill-charts">
                                <canvas id="myChartDevSkill"></canvas>
                                <script src="https://cdnjs.cloudfare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
                                <script>
                                    const dataDevSkill = {
                                        labels: @json(array_values($DevelopingSkills['labels'])),
                                        datasets: [{
                                            label: "",
                                            data: @json(array_values($DevelopingSkills['data'])),
                                            backgroundColor: ['#2d5497', '#5b9bd5', '#6fac45', '#ffbe00', '#ff9000', '#c00000'],
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
                <div class="col-sm-7">
                    <div class="d-flex flex-column">
                        <div class="extra-data-shadow">
                            <div class="d-flex align-items-center">
                                <div class="icon-box me-3">
                                    <i class="fa-solid fa-user-graduate icon-item"></i>
                                </div>
                                <h5 class="mb-0">Profiles Completed
                                    <span class="me-2" id="ProfilesCompleted"><i class="fa-solid fa-circle-question"></i></span>
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
                                    <span class="me-2" id="TopCharacter"><i class="fa-solid fa-circle-question"></i></span>
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
                                @foreach($suggestedActivity as $key => $sa)
                                <div class="d-flex align-items-center activity-box1 mb-3">
                                    <div class="activity-img-box1 me-3">
                                        <img src="{{ asset('assets/images/activity.png') }}" alt="" class="activity-img">
                                    </div>
                                    <div class="d-flex flex-column">
                                        <h6 class="mb-1 ms-3 fw-bold w-full">{{ $key }}</h6>
                                        <div class="d-flex align-items-center">
                                            <div>
                                                <ul class="list-unstyled ms-3 fw-bold activity-text" style="list-style-type: disc;">
                                                    @php $activities = explode(',', $sa); @endphp
                                                    @foreach($activities as $index => $activity)
                                                    @if($index % 3 == 0 && $index != 0)
                                                </ul>
                                            </div>
                                            <div class="col-md-4">
                                                <ul class="list-unstyled ms-3 fw-bold activity-text" style="list-style-type: disc;">
                                                    @endif
                                                    <li>{{ $activity }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>

                        </div>
                        <div class="extra-data-shadow mt-4 d-none">
                            <div class="d-flex justify-content-between">
                                <h5>
                                    Courses
                                </h5>
                            </div>
                            <div class="course-main-box px-3">
                                <div class="row mt-4">
                                    <div class="col-6 mb-4">
                                        <div class="courses-box p-2">
                                            <p class="course-heading">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                                            <div class="row">
                                                <div class="col-4">
                                                    <div>
                                                        <p class="course-sub-heading">Course by</p>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div>
                                                        <p class="course-sub-heading">Provider</p>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div>
                                                        <p class="course-sub-heading">Duration</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    <div>
                                                        <p class="course-sub-data">Kevin Gilbert</p>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div>
                                                        <p class="course-sub-data">Coursera</p>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div>
                                                        <p class="course-sub-data"><i class="fa-regular fa-clock icon-green"></i> 6 hour</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr class="mt-2 mb-3 hr-gray">
                                            <div>
                                                <p class="mb-1 course-heading">Description:</p>
                                                <p class="mb-0 course-sub-heading">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nostrum explicabo placeat minus cupiditate adipisci sed, omnis ea, a provident tempora voluptas vero nam recusandae quo quos. Recusandae nisi nobis nam?</p>
                                            </div>
                                            <hr class="my-3 hr-gray">

                                            <a href="#" class="btn smallBtn">Find Out More</a>
                                        </div>
                                    </div>
                                    <div class="col-6 mb-4">
                                        <div class="courses-box p-2">
                                            <p class="course-heading">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                                            <div class="row">
                                                <div class="col-4">
                                                    <div>
                                                        <p class="course-sub-heading">Course by</p>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div>
                                                        <p class="course-sub-heading">Provider</p>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div>
                                                        <p class="course-sub-heading">Duration</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    <div>
                                                        <p class="course-sub-data">Kevin Gilbert</p>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div>
                                                        <p class="course-sub-data">Coursera</p>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div>
                                                        <p class="course-sub-data"><i class="fa-regular fa-clock icon-green"></i> 6 hour</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr class="mt-2 mb-3 hr-gray">
                                            <div>
                                                <p class="mb-1 course-heading">Description:</p>
                                                <p class="mb-0 course-sub-heading">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nostrum explicabo placeat minus cupiditate adipisci sed, omnis ea, a provident tempora voluptas vero nam recusandae quo quos. Recusandae nisi nobis nam?</p>
                                            </div>
                                            <hr class="my-3 hr-gray">

                                            <a href="#" class="btn smallBtn">Find Out More</a>
                                        </div>
                                    </div>
                                    <div class="col-6 mb-4">
                                        <div class="courses-box p-2">
                                            <p class="course-heading">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                                            <div class="row">
                                                <div class="col-4">
                                                    <div>
                                                        <p class="course-sub-heading">Course by</p>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div>
                                                        <p class="course-sub-heading">Provider</p>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div>
                                                        <p class="course-sub-heading">Duration</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    <div>
                                                        <p class="course-sub-data">Kevin Gilbert</p>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div>
                                                        <p class="course-sub-data">Coursera</p>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div>
                                                        <p class="course-sub-data"><i class="fa-regular fa-clock icon-green"></i> 6 hour</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr class="mt-2 mb-3 hr-gray">
                                            <div>
                                                <p class="mb-1 course-heading">Description:</p>
                                                <p class="mb-0 course-sub-heading">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nostrum explicabo placeat minus cupiditate adipisci sed, omnis ea, a provident tempora voluptas vero nam recusandae quo quos. Recusandae nisi nobis nam?</p>
                                            </div>
                                            <hr class="my-3 hr-gray">

                                            <a href="#" class="btn smallBtn">Find Out More</a>
                                        </div>
                                    </div>
                                    <div class="col-6 mb-4">
                                        <div class="courses-box p-2">
                                            <p class="course-heading">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                                            <div class="row">
                                                <div class="col-4">
                                                    <div>
                                                        <p class="course-sub-heading">Course by</p>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div>
                                                        <p class="course-sub-heading">Provider</p>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div>
                                                        <p class="course-sub-heading">Duration</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    <div>
                                                        <p class="course-sub-data">Kevin Gilbert</p>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div>
                                                        <p class="course-sub-data">Coursera</p>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div>
                                                        <p class="course-sub-data"><i class="fa-regular fa-clock icon-green"></i> 6 hour</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr class="mt-2 mb-3 hr-gray">
                                            <div>
                                                <p class="mb-1 course-heading">Description:</p>
                                                <p class="mb-0 course-sub-heading">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nostrum explicabo placeat minus cupiditate adipisci sed, omnis ea, a provident tempora voluptas vero nam recusandae quo quos. Recusandae nisi nobis nam?</p>
                                            </div>
                                            <hr class="my-3 hr-gray">

                                            <a href="#" class="btn smallBtn">Find Out More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="d-flex flex-column">
                        <div class="extra-data-shadow">
                            <div class="d-flex py-3">
                                <a href="{{route('express.summery.report')}}" target="_blank" class="download-btn mt-0 mx-auto">Download Summary Report</a>
                            </div>
                        </div>
                        <div class="extra-data-shadow mt-4">
                            <div class="d-flex align-items-center">
                                <h5 class="mb-0">
                                    Top 3 Pathway
                                    <span class="me-2" id="Top3Pathway"><i class="fa-solid fa-circle-question"></i></span>
                                </h5>
                            </div>
                            @foreach($Top3Pathway as $t3p)
                            <div class="d-flex align-items-center mt-3">
                                <div>
                                    <img src="{{asset('assets/images/path.png')}}" alt="">
                                </div>
                                <div class="ms-3">
                                    <p class="path-text1 mb-0">{{$t3p->title}}</p>
                                    <!-- <p class="path-text2 mb-0">{{$t3p->description}}</p> -->
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
                                    <span class="me-2" id="TopStrengths"><i class="fa-solid fa-circle-question"></i></span>
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

                        <div class="extra-data-shadow mt-4 d-none">
                            <div class="d-flex align-items-center">
                                <div class="icon-box-outliner me-3">
                                    <i class="fa-solid fa-user-graduate icon-item-outliner"></i>
                                </div>
                                <h5 class="mb-0">
                                    Outliners
                                    <span class="me-2"><i class="fa-solid fa-circle-question"></i></span>
                                </h5>
                            </div>
                            <div class="strength-box">
                                <div class="p-3">
                                    <div class="row">
                                        @foreach($Top10Strengths as $key=>$s)
                                        <div class="col-md-12">
                                            <div class="gray-box-outliner">
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

    // popovers
    $(document).ready(function() {
        $('#ProfilesCompleted').popover({
            html: true,
            placement: 'top',
            trigger: 'hover',
            content: 'This indicates the total number of profiles that have been completed by students on the platform.'
        });
        $('#Top3Pathway').popover({
            html: true,
            placement: 'top',
            trigger: 'hover',
            content: 'This section lists the top three career pathways that are best suited for the selected group based on their profile information.'
        });
        $('#TopCharacter').popover({
            html: true,
            placement: 'top',
            trigger: 'hover',
            content: 'This highlights the most common character trait among students in the selected group.'
        });
        $('#TopStrengths').popover({
            html: true,
            placement: 'top',
            trigger: 'hover',
            content: 'This highlights the top Life Strengths of the selected group of students based on their profile information.'
        });
        $('#SkillDistributionChart').popover({
            html: true,
            placement: 'top',
            trigger: 'hover',
            content: 'This chart represents the distribution of different skill categories for the selected group.'
        });
        $('#DevelopingSkills').popover({
            html: true,
            placement: 'top',
            trigger: 'hover',
            content: 'This group of students has potential for growth in these skills, and improvement can help them achieve a more balanced skill set.'
        });
        $('#DominantSkills').popover({
            html: true,
            placement: 'top',
            trigger: 'hover',
            content: 'This group of students excels in these skills and can leverage them for their future career and personal development.'
        });
    })
</script>
@endpush