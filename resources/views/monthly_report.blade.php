<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <link rel="stylesheet" href="{{asset('assets/css/new_express_report.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/monthly_summary.css')}}">

    <style>
        @page {
            size: A4;
            margin: 0;
        }

        page[size="A4"] {
            background: white;
            width: 21cm;
            height: 29.7cm;
            display: block;
            margin: 0 auto;
            margin-bottom: 0.5cm;
            padding: 2cm;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        /* For print preview purposes */
        @media print {

            body,
            page {
                margin: 0;
                box-shadow: none;
            }
        }

        /* Ensure pages don't overlap */
        .page-break {
            page-break-before: always;
        }
    </style>
</head>

<body>

    <!-- First Page -->
    <page size="A4" class="container">
        <div class="page-container">

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
                                    <br><span style="font-size: 20px;">Period: Sep 2023</span>
                                </p>
                                <p style="font-size: 28px; font-weight: 700; text-transform: uppercase; color: #40C4C1; margin-bottom: 0;">Client Name: Deeksha Learning
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
                                        <td style="color: #191919; font-weight: 700;">4002</td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: left;">Total Licenses Used</td>
                                        <td style="color: #191919; font-weight: 700;">1232</td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: left;">Reports Generated</td>
                                        <td style="color: #191919; font-weight: 700;">419</td>
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
    </page>

    <!-- Second Page -->
    <page size="A4" class="container page-break">
        <div class="page-container">

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
                                <img src="/assets/monthly_summary_report/top_char.png">
                            </div>
                        </div>
                        <div class="col-sm-9">
                            <div class="black_header text-left">
                                <p>High Emoter / Dominant Emoter:</p>
                            </div>
                            <div class="page_para justify-text">
                                <p>You are highly emotive, and have a storng understanding of your feelings. You are able to recognise and effectively manage your emotions.</p>
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
                                                <div class="hex-strength" style="background-image: url('/assets/sahabat_siswa_report/d_adaptive_hexa.png');width: 100px; height: 100px;">
                                                    <img src="/assets/sahabat_siswa_report/adaptive.png" style="width: 50%;">
                                                </div>
                                                <p class="skill" style="color:#FFBE00;">Adaptive</p>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="hex-strength" style="background-image: url('/assets/sahabat_siswa_report/d_cognitive_hexa.png');width: 100px; height: 100px;">
                                                    <img src="/assets/sahabat_siswa_report/cognitive.png" style="width: 50%;">
                                                </div>
                                                <p class="skill" style="color: #2D5497;">Cognitive</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="page_para">
                                            <p>You are able to adjust to new surroundings with great success and find solutions based on what’s available to you. You can cope in new environments without causing conflict with others. This helps you to not be rigid and demonstrate resilience in less than ideal situations. You are also able to think logically and rationally, without emotional bias. You are able to rely on your thinking capacity, using facts and reasons to come to a conclusion. Due to this, you can make decisions quicker and more efficiently.</p>
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
                                                <div class="hex-strength" style="background-image: url('/assets/sahabat_siswa_report/d_creative_hexa.png');width: 100px; height: 100px;">
                                                    <img src="/assets/sahabat_siswa_report/creative.png" style="width: 50%;">
                                                </div>
                                                <p class="skill" style="color:#ED7D31;">Creative</p>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="hex-strength" style="background-image: url('/assets/sahabat_siswa_report/d_interactive_hexa.png');width: 100px; height: 100px;">
                                                    <img src="/assets/sahabat_siswa_report/interactive.png" style="width: 50%;">
                                                </div>
                                                <p class="skill" style="color: #5C9AD5;">Interactive</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="page_para">
                                            <p>Having trouble engaging the right side of your brain? Creativity doesn't come easy to many of us. Additionally, active listening and expressive interaction may be areas where you get stumped often. Don't worry. You can try pursuing an accessible artistic activity like photography. You can also work on your interactive skills by participating in social activities and joining team-bonding events.</p>
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
                                    <div class="col-sm-5 text-left">
                                        <li class="py-1">Self Awareness</li>
                                        <li class="py-1">Social Flexibility</li>
                                        <li class="py-1">Self Discipline</li>
                                        <li class="py-1">Resilience</li>
                                        <li class="py-1">Engagement</li>
                                    </div>
                                    <div class="col-sm-6 text-left">
                                        <li class="py-1">Will Power</li>
                                        <li class="py-1">Passion</li>
                                        <li class="py-1">Patience</li>
                                        <li class="py-1">Valuing Relationships</li>
                                        <li class="py-1">Dependability</li>
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
    </page>

    <!-- Third Page -->
    <page size="A4" class="container page-break">
        <div class="page-container">

            <div class="page3-content">
                <div class="right-grey"></div>
                <div class="left-grey"></div>
                <div class="dom mt-2">
                    <div class="row mb-5">
                        <div class="col-sm-12">
                            <div class="page_header_ul">
                                <span>Typical Respondent co-curricural Profile:</span>
                                <div class="under-line"></div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="grey_box" style="text-align:start; font-size: 18px;">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <span style="font-weight: 700;">Championing the Outdoors</span>
                                    </div>
                                    <div class="col-sm-9">
                                        <span style="font-size: 15px;">Most respondents expressed a strong interest in outdoor sports like cricket, football, tennis, badminton, kho kho, with the majority responding 'Absolutely.'</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="grey_box" style="text-align:start; font-size: 18px;">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <span style="font-weight: 700;">Engaging in Community Activities</span>
                                    </div>
                                    <div class="col-sm-9">
                                        <span style="font-size: 15px;">When asked how often they participate in community activities, the highest number of respondents answered 'Sometimes.'</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="page_header_ul">
                                <span>Typical Respondent Social Profile:</span>
                                <div class="under-line"></div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="grey_box" style="text-align:start; font-size: 18px;">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <span style="font-weight: 700;">Embracing the Power of Helpfulness</span>
                                    </div>
                                    <div class="col-sm-9">
                                        <span style="font-size: 15px;">When asked if respondents helped a friend with something difficult, the highest number of respondentd answers 'I have faced this situation multiple times in the past.'</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="grey_box" style="text-align:start; font-size: 18px;">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <span style="font-weight: 700;">Bouncing Back from Adversity</span>
                                    </div>
                                    <div class="col-sm-9">
                                        <span style="font-size: 15px;">Regarding recovery after something bad happened to them, the highest number of respondents also answered 'I have faced this situation multiple times in the past.'</span>
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
                            <p>3</p>
                        </div>
                        <div class="px-4 py-2" style="margin-right: 10rem;">This is a system-generated report. For any inquiries, please contact your Account Manager or reach out to us at info@mylifevitae.com . </div>

                    </div>
                    <div class="footer-end"></div>
                </div>
            </div>
        </div>
    </page>

</body>

</html>