<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous"> -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/chart.js@3"></script>



    <link rel="stylesheet" href="{{asset('assets/css/summary_student_report_one.css')}}">
</head>

<body>
    <div class="main-container">
        <div class="main-box">
            <img src="{{asset('assets/images/report/top-bg.png')}}" class="top-bg">
            <div class="heading-box">
                <div class="title-box">
                    <span class="title-side"></span>
                    <span class="main-title">{{$user->name}}</span>
                </div>
                <div class="img-container">
                    <!-- <div class="img_holder">
                        <img class="user-image" src="https://placehold.co/600x400" alt="">
                        <span class="user-badge">Silver</span>
                    </div> -->
                </div>
            </div>
            <div>

            </div>
            <div class="container">
                <div class="left-side">
                    <div class="triangle-left-box">
                        <span class="triangle-left-text">LifeStrengths</span>
                        <span class="triangle-left-left"></span>
                    </div>
                    <div class="content">
                        <div class="box one">
                            <div class="img">
                                <img src="{{asset('assets/images/report')}}/hex-{{$life_strengths_bg[0]}}.png" alt="">
                                <img src="{{asset('assets/images/Design assets/')}}/{{$life_strengths_images[0]}}" alt="" class="img-inner">
                                <p class="text-inner">{{$life_strengths[0]}}</p>
                            </div>
                        </div>
                        <div class="box two">
                            <div class="img">
                                <img src="{{asset('assets/images/report')}}/hex-{{$life_strengths_bg[1]}}.png" alt="">
                                <img src="{{asset('assets/images/Design assets/')}}/{{$life_strengths_images[1]}}" alt="" class="img-inner">
                                <p class="text-inner">{{$life_strengths[1]}}</p>
                            </div>
                        </div>
                        <div class="box three">
                            <div class="img">
                                <img src="{{asset('assets/images/report')}}/hex-{{$life_strengths_bg[2]}}.png" alt="">
                                <img src="{{asset('assets/images/Design assets/')}}/{{$life_strengths_images[2]}}" alt="" class="img-inner">
                                <p class="text-inner">{{$life_strengths[2]}}</p>
                            </div>
                        </div>
                        <div class="box four">
                        </div>
                        <div class="box five"></div>
                        <div class="box six">
                            <div class="img">
                                <img src="{{asset('assets/images/report')}}/hex-{{$life_strengths_bg[3]}}.png" alt="">
                                <img src="{{asset('assets/images/Design assets/')}}/{{$life_strengths_images[3]}}" alt="" class="img-inner">
                                <p class="text-inner">{{$life_strengths[3]}}</p>
                            </div>
                        </div>
                        <div class="box seven">
                            <div class="img">
                                <img src="{{asset('assets/images/report')}}/hex-{{$life_strengths_bg[4]}}.png" alt="">
                                <img src="{{asset('assets/images/Design assets/')}}/{{$life_strengths_images[4]}}" alt="" class="img-inner">
                                <p class="text-inner">{{$life_strengths[4]}}</p>
                            </div>
                        </div>
                        <div class="box eight"></div>
                        <div class="box nine"></div>
                        <div class="box ten">
                            <div class="img">
                                <img src="{{asset('assets/images/report')}}/hex-{{$life_strengths_bg[5]}}.png" alt="">
                                <img src="{{asset('assets/images/Design assets/')}}/{{$life_strengths_images[5]}}" alt="" class="img-inner">
                                <p class="text-inner">{{$life_strengths[5]}}</p>
                            </div>
                        </div>
                        <div class="box eleven">
                            <div class="img">
                                <img src="{{asset('assets/images/report')}}/hex-{{$life_strengths_bg[6]}}.png" alt="">
                                <img src="{{asset('assets/images/Design assets/')}}/{{$life_strengths_images[6]}}" alt="" class="img-inner">
                                <p class="text-inner">{{$life_strengths[6]}}</p>
                            </div>
                        </div>
                        <div class="box twelev"></div>
                        <div class="box thirteen"></div>
                        <div class="box forteen">
                            <div class="img">
                                <img src="{{asset('assets/images/report')}}/hex-{{$life_strengths_bg[7]}}.png" alt="">
                                <img src="{{asset('assets/images/Design assets/')}}/{{$life_strengths_images[7]}}" alt="" class="img-inner">
                                <p class="text-inner">{{$life_strengths[7]}}</p>
                            </div>
                        </div>
                        <div class="box fifteen">
                            <div class="img">
                                <img src="{{asset('assets/images/report')}}/hex-{{$life_strengths_bg[8]}}.png" alt="">
                                <img src="{{asset('assets/images/Design assets/')}}/{{$life_strengths_images[8]}}" alt="" class="img-inner">
                                <p class="text-inner">{{$life_strengths[8]}}</p>
                            </div>
                        </div>
                        <div class="box sixteen"></div>
                        <div class="box sevteen"></div>
                        <div class="box eitteen">
                            <div class="img">
                                <img src="{{asset('assets/images/report')}}/hex-{{$life_strengths_bg[9]}}.png" alt="">
                                <img src="{{asset('assets/images/Design assets/')}}/{{$life_strengths_images[9]}}" alt="" class="img-inner">
                                <p class="text-inner">{{$life_strengths[9]}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="triangle-left-box">
                        <span class="triangle-left-text">TopCharacter</span>
                        <span class="triangle-left-left"></span>
                    </div>
                    <div class="TopCharacter-text">
                        <div class="TopCharacter-inner">
                            <img src="{{asset('assets/images/report/Clip path group.png')}}" alt="">
                            <div>
                                <h2>Lorem ipsum dolor sit.</h2>
                                <p class="text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum,
                                    et.
                                    Atque expedita est,
                                    exercitationem magnam maiores maxime sapiente unde.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="right-side">
                    <div class="">
                        <div class="triangle-right-box">
                            <span class="triangle-right-right"></span>
                            <span class="triangle-right-text">LifePower</span>
                        </div>
                    </div>
                    <div class="chart">
                        <canvas id="myChart"></canvas>
                    </div>
                    <div class="">
                        <div class="triangle-right-box">
                            <span class="triangle-right-right"></span>
                            <span class="triangle-right-text">Dominant Skills</span>
                        </div>
                    </div>
                    <div class="DominantSkills-text">
                        <p class="text-justify">{{$dominant_data['dominant_skills_text']}}</p>
                    </div>
                    <div class="dominantskill">
                        <div class="">
                            <div class="left-haxagon" style="background-color: {{$dominant_data['dominant_skill_color1']}};">
                                <img class="img-left" src="{{$dominant_data['dominant_skill_img1']}}" alt="">
                                <img src="{{$dominant_data['dominant_skill_inner_img1']}}" alt="" class="left-hex-inner">
                            </div>
                            <p class="left-hexagon-text" style="color: {{$dominant_data['dominant_skill_text_color1']}};">{{$dominant_data['dominant_skill1']}}</p>
                        </div>
                        <div class="">
                            <div class="right-hexagon" style="background-color: {{$dominant_data['dominant_skill_color2']}};">
                                <img class="img-right" src="{{$dominant_data['dominant_skill_img2']}}" alt="">
                                <img src="{{$dominant_data['dominant_skill_inner_img2']}}" alt="" class="right-hex-inner">
                            </div>
                            <p class="right-hexagon-text" style="color: {{$dominant_data['dominant_skill_text_color2']}};">{{$dominant_data['dominant_skill2']}}</p>
                        </div>
                    </div>
                    <div class="">
                        <div class="triangle-right-box">
                            <span class="triangle-right-right"></span>
                            <span class="triangle-right-text">Developing Skills</span>
                        </div>
                    </div>
                    <div class="DominantSkills-text">
                        <p class="text-justify">{{$developing_data['developing_skills_text']}}</p>
                    </div>
                    <div class="dominantskill">
                        <div class="">
                            <div class="left-haxagon" style="background-color: {{$developing_data['developing_skill_color1']}};">
                                <img class="img-left" src="{{$developing_data['developing_skill_img1']}}" alt="">
                                <img src="{{$developing_data['developing_skill_inner_img1']}}" alt="" class="left-hex-inner">
                            </div>
                            <p class="left-hexagon-text" style="color: {{$developing_data['developing_skill_text_color1']}};">{{$developing_data['developing_skill1']}}</p>
                        </div>
                        <div class="">
                            <div class="right-hexagon" style="background-color: {{$developing_data['developing_skill_color2']}};">
                                <img class="img-right" src="{{$developing_data['developing_skill_img2']}}" alt="">
                                <img src="{{$developing_data['developing_skill_inner_img2']}}" alt="" class="right-hex-inner">
                            </div>
                            <p class="right-hexagon-text" style="color: {{$developing_data['developing_skill_text_color2']}};">{{$developing_data['developing_skill2']}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bottom-box">
                <img src="{{asset('assets/images/report/lifevitae_purple.png')}}" alt="">
                <p>&copy; 2023, LifeVitae Pte Ltd. All rights reserved.</p>
            </div>

            <!-- 2nd page -->
            <div class="second-section">
                <div class="heading-box mt-30">
                    <div class="title-box">
                        <span class="title-side"></span>
                        <span class="main-title">Suggested Activities</span>
                    </div>
                </div>

                <div class="container">
                    <div class="fill-width" style="padding: 0 10px;">
                        <div class="triangle-left-box">
                            <span class="triangle-left-text">Suggested Activites</span>
                            <span class="triangle-left-left"></span>
                        </div>
                    </div>
                </div>
                <div class="flex mt-30">
                    <div class="mt-20" class="suggested-img-box">
                        <img class="suggested-activites-img" src="{{asset('assets/images/report/Group.png')}}" alt="">
                    </div>
                    @foreach($suggestedActivity as $key=>$sA)
                    <div class="suggested-box">
                        <h2>{{$key}}</h2>
                        <ul class="mt-20">
                            @foreach($sA as $sAData)
                            <li>{{$sAData}}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endforeach
                </div>
                <div class="end-section mt-30">
                    <div class="triangle-left-box">
                        <span class="triangle-right-right"></span>
                        <span class="triangle-center-text">End or report</span>
                        <span class="triangle-left-left"></span>
                    </div>
                </div>
                <div class="bottom-box-footer">
                    <div class="bottom-box">
                        <img src="{{asset('assets/images/report/lifevitae_purple.png')}}" alt="">
                        <p>&copy; 2023, LifeVitae Pte Ltd. All rights reserved.</p>
                    </div>

                    <img src="{{asset('assets/images/report/bottom-bg.png')}}" alt="" class="bottom-bg">
                </div>

            </div>
        </div>
    </div>

    <script>
        const data = {
            labels: @json($skills),
            datasets: [{
                label: 'My First Dataset',
                data: @json($skills_data),
                fill: true,
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgb(255, 99, 132)',
                pointBackgroundColor: 'rgb(255, 99, 132)',
                pointBorderColor: '#fff',
                pointHoverBackgroundColor: '#fff',
                pointHoverBorderColor: 'rgb(255, 99, 132)'
            }]
        };

        const config = {
            type: 'radar',
            data: data,
            options: {
                elements: {
                    line: {
                        borderWidth: 3
                    }
                },
            },
        };

        const ctx = document.getElementById('myChart').getContext('2d');

        new Chart(ctx, config);
    </script>
</body>

</html>