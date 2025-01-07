<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

    <title>{{ $monthly_report->school_name }}_{{ \Carbon\Carbon::parse($monthly_report->year_month)->format('M_Y') }} </title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <link rel="stylesheet" href="{{asset('assets/css/new_express_report.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/monthly_summary.css')}}">
</head>

<body>

    <div id="pdf-content" class="container">
        <!-- page - 1 -->
        <div class="page-container page-break" size="A4">

            <div class="page1-content">
                <div class="right-grey"></div>
                <div class="left-grey"></div>
                <div class="dom mt-2">
                    <div class="row mb-4">
                        <div class="col-sm-12">
                            <div style="text-align:start; border-radius: 0; margin-right: 2rem; border: 8px solid #D5BAFF; padding: 10px 20px;">
                                <div class="logo_lv_purple mb-4">
                                    <img src="{{asset('assets/images/purple_logo.png')}}">
                                </div>
                                <p class="page_header_ul" style="color: #373A3C;">LifeVitae Express Monthly Usage Report
                                    <br><span style="font-size: 20px;">Period: {{ \Carbon\Carbon::createFromFormat('Y-m', $monthly_report->year_month)->format('M Y') }}</span>
                                </p>
                                <p style="font-size: 28px; font-weight: 700; text-transform: uppercase; color: #40C4C1; margin-bottom: 0;">Client Name: {{$monthly_report->school_name}}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-sm-12">
                            <div class="page_header_ul">
                                <span>Data Summary:</span>
                                <div class="under-line"></div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="summary_table">
                                <table style="width: 55%;">
                                    <tr>
                                        <th style="color: #FFFFFF; background-color: #40C4C1;">PARTICULARS</th>
                                        <th style="color: #373A3C; background-color: #F8E71C;">NUMBER</th>
                                    </tr>
                                    <tr>
                                        <td style="text-align: left;">Total Licenses Issued</td>
                                        <td style="color: #191919; font-weight: 700;">{{$total_licenses_issued}}</td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: left;">Total Licenses Used</td>
                                        <td style="color: #191919; font-weight: 700;">{{$total_licenses_issued}}</td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: left;">Reports Generated</td>
                                        <td style="color: #191919; font-weight: 700;">{{$reports_generated}}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-sm-12">
                            <div class="page_header_ul">
                                <span>Most Matched Career Pathways:</span>
                                <div class="under-line"></div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <canvas id="barChart"></canvas>
                        </div>
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="footer">
                        <div class="round-page page_no">
                            <p>1</p>
                        </div>
                        <div class="px-4 py-2" style="margin-right: 10rem;">This is a system-generated report. For any inquiries, please contact your Account Manager or reach out to us at info@mylifevitae.com . </div>

                    </div>
                    <div class="footer-end"></div>
                </div>
            </div>
        </div>

        <!-- page - 2 -->

        <div class="page-container page-break" size="A4">

            <div class="page2-content">
                <div class="right-grey"></div>
                <div class="left-grey"></div>
                <div class="dom mt-2">
                    <div class="row mb-4">
                        <div class="col-sm-12">
                            <div class="page_header_ul">
                                <span>Top Character:</span>
                                <div class="under-line"></div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="text-center m-4">
                                <img src="{{asset('assets/images/character.png')}}">
                            </div>
                        </div>
                        <div class="col-sm-9">
                            <div class="black_header text-left">
                                <p>{{$monthly_report->topCharacter->title}}</p>
                            </div>
                            <div class="page_para justify-text">
                                <p>{{$monthly_report->topCharacter->class_description}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-sm-12">
                            <div class="page_header_ul">
                                <span>Skill Categories Ranking:</span>
                                <div class="under-line"></div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="grey_box">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="black_header text-left">
                                            <p style="text-transform: uppercase;">Dominant Skills:</p>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="hex-strength"
                                                    style="background-image: url('{{ asset("assets/images/hex/hex-" . $dominant_skills['skills'][0]['name'] . ".png") }}'); width: 100px; height: 100px;">
                                                    <img src="{{ asset("assets/images/hex/" . strtoupper($dominant_skills['skills'][0]['name']) . ".png") }}" style="width: 50%;">
                                                </div>
                                                <p class="skill" style="color: {{$dominant_skills['skills'][0]['color']}};">{{ $dominant_skills['skills'][0]['name'] }}</p>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="hex-strength"
                                                    style="background-image: url('{{ asset("assets/images/hex/hex-" . strtoupper($dominant_skills['skills'][1]['name']) . ".png") }}'); width: 100px; height: 100px;">
                                                    <img src="{{ asset("assets/images/hex/" . $dominant_skills['skills'][1]['name'] . ".png") }}" style="width: 50%;">
                                                </div>
                                                <p class="skill" style="color: {{$dominant_skills['skills'][1]['color']}};">{{ $dominant_skills['skills'][1]['name'] }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="page_para">
                                            <p>{{ $dominant_skills['text'] }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="grey_box">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="black_header text-left">
                                            <p style="text-transform: uppercase;">Dominant Skills:</p>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="hex-strength"
                                                    style="background-image: url('{{ asset("assets/images/hex/hex-" . strtolower($developing_skills['skills'][0]['name']) . ".png") }}'); width: 100px; height: 100px;">
                                                    <img src="{{ asset("assets/images/hex/" . strtoupper($developing_skills['skills'][0]['name']) . ".png") }}" style="width: 50%;">
                                                </div>
                                                <p class="skill" style="color:{{$developing_skills['skills'][0]['color']}};">{{ $developing_skills['skills'][0]['name'] }}</p>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="hex-strength"
                                                    style="background-image: url('{{ asset("assets/images/hex/hex-" . strtolower($developing_skills['skills'][1]['name']) . ".png") }}'); width: 100px; height: 100px;">
                                                    <img src="{{ asset("assets/images/hex/" . strtoupper($developing_skills['skills'][1]['name']) . ".png") }}" style="width: 50%;">
                                                </div>
                                                <p class="skill" style="color: {{$developing_skills['skills'][1]['color']}};">{{ $developing_skills['skills'][1]['name'] }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="page_para">
                                            <p>{{ $developing_skills['text'] }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="page_header_ul">
                                <span>Top 10 LifeStrengths:</span>
                                <div class="under-line"></div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="grey_box" style="text-transform: uppercase; font-size: 18px; font-weight: 500;">
                                <div class="row">
                                    <div class="col-sm-1"></div>
                                    @php
                                    $half = ceil(count($top_strengths) / 2);
                                    $first_half = array_slice($top_strengths, 0, $half);
                                    $second_half = array_slice($top_strengths, $half);
                                    @endphp

                                    <div class="col-sm-5 text-left">
                                        @foreach ($first_half as $strength)
                                        <li class="py-1">{{ $strength }}</li>
                                        @endforeach
                                    </div>

                                    <div class="col-sm-6 text-left">
                                        @foreach ($second_half as $strength)
                                        <li class="py-1">{{ $strength }}</li>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="footer">
                        <div class="round-page page_no">
                            <p>2</p>
                        </div>
                        <div class="px-4 py-2" style="margin-right: 10rem;">This is a system-generated report. For any inquiries, please contact your Account Manager or reach out to us at info@mylifevitae.com . </div>

                    </div>
                    <div class="footer-end"></div>
                </div>
            </div>
        </div>

        <!-- page - 3 -->
        <div class="page-container page-break" size="A4">

            <div class="page3-content">
                <div class="right-grey"></div>
                <div class="left-grey"></div>
                <div class="dom mt-2">
                    <div class="row mb-5">
                        <div class="col-sm-12">
                            <div class="page_header_ul">
                                <span>Typical Respondent Co-Curricular Profile:</span>
                                <div class="under-line"></div>
                            </div>
                        </div>

                        @foreach ($co_curricular_patterns as $pattern)
                        <div class="col-sm-12">
                            <div class="grey_box" style="text-align:start; font-size: 18px;">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <span style="font-weight: 700;">{{ $pattern['title'] }}</span>
                                    </div>
                                    <div class="col-sm-9">
                                        <span style="font-size: 15px;">{{ $pattern['text'] }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="page_header_ul">
                                <span>Typical Respondent Social Profile:</span>
                                <div class="under-line"></div>
                            </div>
                        </div>
                        @foreach ($social_patterns as $pattern)
                        <div class="col-sm-12">
                            <div class="grey_box" style="text-align:start; font-size: 18px;">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <span style="font-weight: 700;">{{ $pattern['title'] }}</span>
                                    </div>
                                    <div class="col-sm-9">
                                        <span style="font-size: 15px;">{{ $pattern['text'] }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="row footer-content">
                <div class="col-lg-12">
                    <div class="footer">
                        <div class="round-page page_no">
                            <p>3</p>
                        </div>
                        <div class="px-4 py-2" style="margin-right: 10rem;">This is a system-generated report. For any inquiries, please contact your Account Manager or reach out to us at info@mylifevitae.com . </div>

                    </div>
                    <div class="footer-end"></div>
                </div>
            </div>
        </div>

    </div>
</body>

<script>
    var ctx = document.getElementById("barChart").getContext('2d');
    var barChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: @json($top_lp_labels), // Labels from the controller
            datasets: [{
                label: 'Top LP Values',
                borderRadius: 12,
                data: @json($top_lp_values), // Values from the controller
                backgroundColor: "#824FD2"
            }]
        },
        options: {
            indexAxis: 'y', // Horizontal bar chart
            responsive: true,
            plugins: {
                tooltip: {
                    enabled: true,
                },
                legend: {
                    display: false,
                },
            },
            scales: {
                y: {
                    ticks: {
                        font: {
                            weight: 'bold',
                        },
                    },
                }
            }
        }
    });
</script>
@if(request()->routeIs('express.monthly.report'))
<script>
    function generatePDF() {
        window.print();
    }
    window.addEventListener('load', function() {
        setTimeout(generatePDF, 2000);
    });
</script>
@endif

</html>