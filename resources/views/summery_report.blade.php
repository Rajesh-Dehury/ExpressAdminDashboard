<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Summery Report</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <!-- chart js -->
    <script src="https://unpkg.com/chart.js@3"></script>
    <script src="https://unpkg.com/@sgratzl/chartjs-chart-boxplot@3"></script>

    <!-- owl -->
    <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/owl.theme.default.min.css')}}" />
    <script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>

    <!-- bs icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{asset('assets/css/summery_report.css')}}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
</head>

<body>
    <div class="main-container">
        <div class="main-box" size="A4">
            <div class="graph-data mt-lg-0">
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

            <div class="extra-data">
                <div class="row justify-content-between">
                    <div class="col-sm-7">
                        <div class="d-flex flex-column">
                            <div class="extra-data-shadow">
                                <div class="d-flex align-items-center">
                                    <div class="icon-box me-3">
                                        <i class="fa-solid fa-user-graduate icon-item"></i>
                                    </div>
                                    <h5 class="mb-0">Profiles Completed
                                        :
                                        <span>{{array_sum($genderCount)}}</span>
                                    </h5>
                                </div>
                                <div class="d-flex align-items-start">
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
                                    </h5>
                                </div>
                                <div class="top-character">
                                    <div class="">
                                        <div class="item gray-box">
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="character-box w-100">
                                                        <img src="{{asset('assets/images/character.png')}}">
                                                    </div>
                                                </div>
                                                <div class="col-8">
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
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="d-flex flex-column">
                            <div class="extra-data-shadow">
                                <div class="d-flex align-items-center">
                                    <h5 class="mb-0">
                                        Top 3 Pathway
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-box" size="A4">
            <div class="extra-data">
                <div class="row justify-content-between">
                    <div class="col-sm-7">
                        <div class="d-flex flex-column">
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
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="d-flex flex-column">
                            <div class="extra-data-shadow mt-4">
                                <div class="d-flex align-items-center">
                                    <div class="icon-box me-3">
                                        <i class="fa-solid fa-lightbulb icon-item"></i>
                                    </div>
                                    <h5 class="mb-0">
                                        Top Strengths
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


    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Add a delay before converting to PDF to ensure proper rendering
            setTimeout(function() {
                html2pdf().set({
                    html2canvas: {
                        scale: 1
                    },
                    filename: 'summery_report.pdf',
                    jsPDF: {
                        format: 'a4',
                        orientation: 'portrait'
                    }
                }).from(document.body).save();
            }, 1000); // Adjust the delay as needed (in milliseconds)
        });
    </script>

</body>

</html>