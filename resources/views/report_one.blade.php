<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://unpkg.com/chart.js@3"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
    <link rel="stylesheet" href="{{asset('assets/css/report_one.css')}}">

    <title>Report One</title>
</head>

<body>

    <div class="main-container">
        <div class="main-box" size="A4">
            <div class="report-header">
                <div>
                    <img src="{{asset('assets/images/purple_logo.png')}}" alt="" class="purple_logo">
                </div>
                <div>
                    <h4 class="mt-3 fw-bold mb-0">LIFEVITAE EXPRESS QUARTERLY USAGE REPORT</h4>
                    <p class="fw-bold mb-0">PERIOD: JULY-SEP 2023</p>

                    <h5 class="client-name mb-0">CLIENT NAME: <span>Name</span></h5>
                </div>
            </div>

            <div class="data-summary mt-5">
                <h5 class="mt-3 fw-bold mb-0">DATA SUMMARY:</h5>
                <span class="purple-btm"></span>
            </div>

            <div class="mt-2">
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
                            <td class="table-data">20</td>
                        </tr>
                        <tr>
                            <td class="table-data">Total OMR Sheets Generated</td>
                            <td class="table-data">20</td>
                        </tr>
                        <tr>
                            <td class="table-data">Reports Generated</td>
                            <td class="table-data">11</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="data-summary mt-5">
                <h5 class="mt-3 fw-bold mb-0">TYPICAL RESPONDENT CURRICULAR PROFILE:</h5>
                <span class="purple-btm"></span>
                <h6 class="fw-bold my-2">MOST MATCHED CAREER PATHWAYS:</h6>
            </div>

            <div class="mt-3">
                <div class="row">
                    <div class="col-6">
                        <table id="tbl2">
                            <thead>
                                <tr>
                                    <th class="table-head head1">AREER PATHWAY</th>
                                    <th class="table-head head2">NO. OF REPORTS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="table-data">Information Technology</td>
                                    <td class="table-data">28.0%</td>
                                </tr>
                                <tr>
                                    <td class="table-data">Engineering</td>
                                    <td class="table-data">28.0%</td>
                                </tr>
                                <tr>
                                    <td class="table-data">Medical Professionals</td>
                                    <td class="table-data">14.9%</td>
                                </tr>
                                <tr>
                                    <td class="table-data">Creative Design</td>
                                    <td class="table-data">12.0%</td>
                                </tr>
                                <tr>
                                    <td class="table-data">Analytics</td>
                                    <td class="table-data">11.0%</td>
                                </tr>
                                <tr>
                                    <td class="table-data">Accounting 8 Finance</td>
                                    <td class="table-data">5.5%</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-6">
                        <canvas id="myChart" height="200"></canvas>
                    </div>
                </div>
            </div>
            <div class="bottom  mt-5">
                <div class="bottom-layer-one">
                    <p class="mb-0">This is a system-generated report for any Inquiries, please contact your Account Manager or reach out to us at <a class="text-white" href="mailto:contact@mylifevitae.com">contact@mylifevitae.com</a></p>
                </div>
                <div class="bottom-layer">
                </div>
            </div>
        </div>
        <div class="main-box" size="A4">
            <div class="report-header">
                <div>
                    <img src="{{asset('assets/images/purple_logo.png')}}" alt="" class="purple_logo">
                </div>
                <div>
                    <h4 class="mt-3 fw-bold mb-0">LIFEVITAE EXPRESS QUARTERLY USAGE REPORT</h4>
                    <p class="fw-bold mb-0">PERIOD: JULY-SEP 2023</p>

                    <h6 class="client-name mb-0">CLIENT NAME: <span>Name</span></h6>
                </div>
            </div>

            <div class="data-summary">
                <h6 class="mt-3 fw-bold mb-0">SKILL CATEGORIES RANKING:</h6>
                <span class="purple-btm"></span>
            </div>

            <div class="mt-2">
                <div class="row justify-content-between">
                    <div class="col-4">
                        <h6>HIGHEST-RANKING SKILLS:</h6>
                        <div class="d-flex justify-content-between">
                            <div class="d-flex">
                                <div>
                                    <div class="skill-container">
                                        <img src="/assets/images/report/hex-MOTIVE.png" alt="" class="skill_img">
                                        <img src="/assets/images/report/hax-inner-MOTIVE.png" alt="" class="skill_img_inner">
                                    </div>
                                    <p class="mb-0 text-center fw-bold">MOTIVE</p>
                                </div>
                            </div>
                            <div class="d-flex">
                                <div>
                                    <div class="skill-container">
                                        <img src="/assets/images/report/hex-MOTIVE.png" alt="" class="skill_img">
                                        <img src="/assets/images/report/hax-inner-MOTIVE.png" alt="" class="skill_img_inner">
                                    </div>
                                    <p class="mb-0 text-center fw-bold">MOTIVE</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <h6>WEAKEST SKILLS:</h6>
                        <div class="d-flex ">
                            <div>
                                <div class="skill-container">
                                    <img src="/assets/images/report/hex-MOTIVE.png" alt="" class="skill_img">
                                    <img src="/assets/images/report/hax-inner-MOTIVE.png" alt="" class="skill_img_inner">
                                </div>
                                <p class="mb-0 text-center fw-bold">MOTIVE</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="data-summary">
                <h6 class="mt-3 fw-bold mb-0">TYPICAL RESPONDENT CO-CURRICULAR PROFILE:</h6>
                <span class="purple-btm"></span>
            </div>

            <div class="mt-2">
                <div class="row justify-content-between align-items-stretch">
                    <div class="col-6">
                        <div class="p-border p-3">
                            <div class="d-flex mb-3">
                                <img class="report-img mx-auto" src="{{asset('assets/images/report-two/ChampioningtheOutdoors.png')}}" alt="">
                            </div>
                            <h6 class="report-h6">Championing the Outdoors</h6>
                            <p class="report-p">Most respondents expressed a Strong interest in participating in outdoor sports like cricket, football, tennis, badminton, kho kho, and kabaddi, with the majority responding 'Absolutely.'</p>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="p-border p-3">
                            <div class="d-flex mb-3">
                                <img class="report-img mx-auto" src="{{asset('assets/images/report-two/ChampioningtheOutdoors.png')}}" alt="">
                            </div>
                            <h6 class="report-h6">Engaging in Community Activities</h6>
                            <p class="report-p">When asked how often they participate in community activities, the highest number of respondents answæcl 'Sometimes.'</p>
                        </div>
                    </div>
                </div>

            </div>


            <div class="data-summary">
                <h6 class="mt-3 fw-bold mb-0">TYPICAL RESPONDENT SOCIAL PROFILE:</h6>
                <span class="purple-btm"></span>
            </div>

            <div class="mt-2">
                <div class="row justify-content-between align-items-stretch">
                    <div class="col-6">
                        <div class="p-border p-3">
                            <div class="d-flex mb-3">
                                <img class="report-img mx-auto" src="{{asset('assets/images/report-two/ChampioningtheOutdoors.png')}}" alt="">
                            </div>
                            <h6 class="report-h6">Championing the Outdoors</h6>
                            <p class="report-p">Most respondents expressed a Strong interest in participating in outdoor sports like cricket, football, tennis, badminton, kho kho, and kabaddi, with the majority responding 'Absolutely.'</p>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="p-border p-3">
                            <div class="d-flex mb-3">
                                <img class="report-img mx-auto" src="{{asset('assets/images/report-two/ChampioningtheOutdoors.png')}}" alt="">
                            </div>
                            <h6 class="report-h6">Engaging in Community Activities</h6>
                            <p class="report-p">When asked how often they participate in community activities, the highest number of respondents answæcl 'Sometimes.'</p>
                        </div>
                    </div>
                </div>

            </div>

            <div class="bottom  mt-5">
                <div class="bottom-layer-one">
                    <p class="mb-0">This is a system-generated report for any Inquiries, please contact your Account Manager or reach out to us at <a class="text-white" href="mailto:contact@mylifevitae.com">contact@mylifevitae.com</a></p>
                </div>
                <div class="bottom-layer">
                </div>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var ctx = document.getElementById('myChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: ['Information Technology', 'Engineering', 'Medical Professionals', 'Creative Design', 'Analytics', 'Accounting & Finance'],
                    datasets: [{
                        label: 'Percentage',
                        data: [28.0, 28.0, 14.9, 12.0, 11.0, 5.5],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.7)',
                            'rgba(54, 162, 235, 0.7)',
                            'rgba(255, 206, 86, 0.7)',
                            'rgba(75, 192, 192, 0.7)',
                            'rgba(153, 102, 255, 0.7)',
                            'rgba(255, 159, 64, 0.7)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    // console.log(context);
                                    let label = context.label || '';
                                    let value = context.parsed;
                                    let percentage = value + ' %';

                                    return label + ': ' + percentage;
                                }
                            },
                            bodyFontSize: 14,
                        },
                        datalabels: {
                            color: '#fff',
                            formatter: (value, ctx) => {
                                return value.toFixed(1) + '%';
                            },
                            anchor: 'end',
                            align: 'end',
                            offset: 10
                        }
                    },
                }
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Add a delay before converting to PDF to ensure proper rendering
            setTimeout(function() {
                html2pdf().set({
                    html2canvas: {
                        scale: 3
                    },
                    filename: 'report_one.pdf',
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