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
            <div class="position-relative d-none d-lg-block">
                <i class="bi bi-search position-absolute position-absolute top-50 translate-middle-y top-search-icon"></i>
                <input type="search" class="main-search" placeholder="Search for student name...">
            </div>
            <img src="https://via.placeholder.com/350" alt="" class="user-image-small d-block d-lg-none">
        </div>
    </div>
    <div class="inner-container">
        <div class="position-relative d-block d-lg-none mt-3">
            <i class="bi bi-search position-absolute position-absolute top-50 translate-middle-y top-search-icon"></i>
            <input type="search" class="main-search" placeholder="Search for student name...">
        </div>

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
                                        labels: ["Motive", "Creative", "Adaptive", "Emotive", "Interactive",
                                            "Cognitive"
                                        ],
                                        datasets: [{
                                            label: "",
                                            data: [25, 5, 27, 20, 18, 5],
                                            backgroundColor: ['#c00000', '#ed7d31', '#ffc000', '#70ad47',
                                                '#5b9bd5', '#2d5597'
                                            ],
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
                                                            return context.formattedValue + '%';
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
                                        labels: ["Motive", "Creative", "Adaptive", "Emotive", "Interactive", "Cognitive"],
                                        datasets: [{
                                            label: "",
                                            data: [25, 5, 27, 20, 18, 5],
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
                                                            return context.formattedValue + '%';
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
                                        labels: ["Motive", "Creative", "Adaptive", "Emotive", "Interactive", "Cognitive"],
                                        datasets: [{
                                            label: "",
                                            data: [25, 5, 27, 20, 18, 5],
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
                                                            return context.formattedValue + '%';
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
                                    <span>40</span>
                                </h5>
                            </div>
                            <div class="d-flex align-items-start mt-5">
                                <h5 class="ms-5 ps-2 me-2 fw-bold">Gender <br>Breakdown:</h5>
                                <table>
                                    <tr class="mt-3">
                                        <th class="px-lg-4 px-2">
                                            <h3>20</h3>
                                        </th>
                                        <th class="px-lg-4 px-2">
                                            <h3>20</h3>
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
                                                    <img src="assets/images/character.png">
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="character-text">
                                                    <h4>Dreamer <span style="float: right;">32</span></h4>
                                                    <p class="owl-desc-text">Students in this class are both
                                                        emotive and creative.
                                                        They have a
                                                        strong understanding of their feelings and are able to
                                                        recognise
                                                        and effectively manage their emotions. They are also
                                                        able to
                                                        generate ideas and solutions for unique problems through
                                                        new,
                                                        out of the box perspectives.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item gray-box">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="character-box">
                                                    <img src="assets/images/character.png">
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="character-text">
                                                    <h4>Dreamer <span style="float: right;">32</span></h4>
                                                    <p class="owl-desc-text">Students in this class are both
                                                        emotive and creative.
                                                        They have a
                                                        strong understanding of their feelings and are able to
                                                        recognise
                                                        and effectively manage their emotions. They are also
                                                        able to
                                                        generate ideas and solutions for unique problems through
                                                        new,
                                                        out of the box perspectives.</p>
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
                                <div class="d-flex align-items-center activity-box1 mb-3">
                                    <div class="activity-img-box1">
                                        <img src="assets/images/activity.png" alt="" class="activity-img">
                                    </div>
                                    <div>
                                        <h6 class="mb-1 ms-3 fw-bold">Cognitive</h6>
                                        <p class="mb-0 ms-3 fw-bold activity-text">Sudoku, Chess, Card games,
                                            Puzzles, Reading</p>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center activity-box2 mb-3">
                                    <div class="activity-img-box2">
                                        <img src="assets/images/activity.png" alt="" class="activity-img">
                                    </div>
                                    <div>
                                        <h6 class="mb-1 ms-3 fw-bold">Interactive</h6>
                                        <p class="mb-0 ms-3 fw-bold activity-text">Listen to radio, Play team
                                            based-sports</p>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center activity-box3 mb-3">
                                    <div class="activity-img-box3">
                                        <img src="assets/images/activity.png" alt="" class="activity-img">
                                    </div>
                                    <div>
                                        <h6 class="mb-1 ms-3 fw-bold">Emotive</h6>
                                        <p class="mb-0 ms-3 fw-bold activity-text">Listen to radio, Have a pet,
                                            play with children</p>
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

                            <div class="d-flex align-items-center mt-3">
                                <div>
                                    <img src="assets/images/path.png" alt="">
                                </div>
                                <div class="ms-3">
                                    <p class="path-text1 mb-0">Business Administration</p>
                                    <p class="path-text2 mb-0">Lorem Ipsum Descriptions Business Administration
                                    </p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mt-3">
                                <div>
                                    <img src="assets/images/path.png" alt="">
                                </div>
                                <div class="ms-3">
                                    <p class="path-text1 mb-0">Business Administration</p>
                                    <p class="path-text2 mb-0">Lorem Ipsum Descriptions Business Administration
                                    </p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mt-3">
                                <div>
                                    <img src="assets/images/path.png" alt="">
                                </div>
                                <div class="ms-3">
                                    <p class="path-text1 mb-0">Business Administration</p>
                                    <p class="path-text2 mb-0">Lorem Ipsum Descriptions Business Administration
                                    </p>
                                </div>
                            </div>
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
                                        <div class="col-md-12">
                                            <div class="gray-box">
                                                <span class="p-2 d-inline-block">Passion</span>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="gray-box">
                                                <span class="p-2 d-inline-block">Curiosity</span>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="gray-box">
                                                <span class="p-2 d-inline-block">Agility</span>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="gray-box">
                                                <span class="p-2 d-inline-block">Persistence</span>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="gray-box">
                                                <span class="p-2 d-inline-block">Exploring</span>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="gray-box">
                                                <span class="p-2 d-inline-block">Originality</span>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="gray-box">
                                                <span class="p-2 d-inline-block">Originality</span>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="gray-box">
                                                <span class="p-2 d-inline-block">Originality</span>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="gray-box">
                                                <span class="p-2 d-inline-block">Originality</span>
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