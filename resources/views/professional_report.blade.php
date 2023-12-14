<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profrssional Report</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


    <script src="https://unpkg.com/chart.js@3"></script>
    <link rel="stylesheet" href="assets/css/professional_report.css">
</head>

<body>

    <page size="A4">
        <div class="position-relative">
            <div class="top-header">

            </div>
            <div class="page-content">
                <div class="cover-text-container">
                    <img src="./assets/images/purple_logo.png" alt="" class="top-purple-logo">
                    <p class="cover-main-text">Professional Report</p>
                    <p class="cover-name">Alfredo Valentino</p>
                    <p class="cover-date">Created date : 23/02/2023</p>
                </div>
                <img src="assets/images/professional_report/cc_cover.png" alt="" class="cover-img">
            </div>
            <div class="footer-content">
                <img src="assets/images/professional_report/mask_group_bg.png" alt="" class="mask-img">
                <img src="assets/images/professional_report/logo_LV_polos.png" alt="" class="mask-img2">
                <img src="assets/images/professional_report/letter_head_footer_simple.png" alt="" class="footer-img">
                <p class="footer-text"><span>&copy;</span> 2023, LifeVitae Pte Ltd. All rights reserved.</p>
            </div>
        </div>
    </page>
    <page size="A4">
        <div class="position-relative">
            <div class="page-header d-flex align-items-center">
                <img src="./assets/images/purple_logo.png" alt="" class="header-logo">
                <p class="mb-0 w-100 text-center">This report is specially curated for Alfredo Valentino</p>
            </div>
            <div class="page-content1">
                <div class="header-content">
                    <p class="header-content-text">Introduction</p>
                </div>
                <div class="body-content">
                    <p class="body-text">Thank you for completing your profile. This is the first step towards gaining
                        insights into your
                        unique skillset and exploring career opportunities that align with your abilities. We have
                        prepared a comprehensive report to help you understand yourself better.
                    </p>
                    <p class="body-heading">About LifeVitae</p>
                    <p class="body-text">LifeVitae is an innovative ed-tech company based in Singapore. We have
                        developed the world's
                        first AI-backed Life Skills Platform designed to unlock individuals' full potential. Our vision
                        is to support today's working professionals in upskilling and navigating the future of work. We
                        believe that every person is unique, and career decisions should not be solely based on grades.
                    </p>
                    <p class="body-text">At LifeVitae, we understand that the learning journey doesn't end in school or
                        university. There is always room for gd-flexth and self-exploration. Our ultimate goal is to
                        help
                        you find the perfect career fit based on your abilities</p>
                    <p class="body-text">While our roots lie in ed-tech, LifeVitae's platform extends beyond students.
                        We also provide value as an HR-tech solution, assisting companies in finding the right
                        candidates and helping working professionals discover careers that align with their skillsets.
                    </p>
                    <p class="body-heading">How we generate this report</p>
                    <p class="body-text">LifeVitae Express analyzes your potential by focusing on three main sections:
                        LifeAchievements, LifePassions, and LifeMoments. We have carefully curated a set of questions
                        with input from organizational behavior psychologists, talent consultants, and admissions
                        officers. Through AI/ML algorithms, we analyze your responses to gain insights into your soft
                        skills in various situations.
                    </p>
                    <p class="body-text">The LifeVitae Express Report utilizes your personality traits to match you with
                        suitable career pathways. By leveraging the comprehensive 6-point framework based on UN WHO Life
                        Skills, we highlight your dominant skills and areas for development based on your provided
                        answers.
                    </p>
                    <p class="body-text">The Express Report serves as a glimpse into your life skills. If you wish to
                        dive deeper, you can explore our full version, which requires you to provide detailed
                        experiences within the same three sections. This additional information allows our algorithm to
                        provide a more elaborate and accurate analysis.
                    </p>
                    <p class="body-heading">How this report can help users</p>
                    <p class="body-text">This report enables you to gain knowledge about your core skillset and areas
                        where you can improve. This knowledge is valuable for personal and professional gd-flexth. As
                        working professionals, you have a wealth of experiences, which enhances the accuracy of your
                        report.
                    </p>
                    <p class="body-text">Whether you are seeking a career change or aiming for self-improvement, we
                        offer a variety of career pathways to explore. Additionally, we provide access to relevant
                        courses and books to support your journey.
                    </p>
                    <p class="body-text">Our platform caters to users from all walks of life, providing valuable
                        insights and guidance for personal and professional development.
                    </p>
                </div>
            </div>
            <div class="footer-content">
                <img src="assets/images/professional_report/mask_group_bg.png" alt="" class="mask-img">
                <img src="assets/images/professional_report/logo LV polos 1.png" alt="" class="mask-img2">
                <p class="page-number">1</p>
                <img src="assets/images/professional_report/letter_head_footer_simple.png" alt="" class="footer-img">
                <p class="footer-text"><span>&copy;</span> 2023, LifeVitae Pte Ltd. All rights reserved.</p>
            </div>
        </div>
    </page>
    <page size="A4">
        <div class="position-relative">

            <div class="page-header d-flex align-items-center">
                <img src="./assets/images/purple_logo.png" alt="" class="header-logo">
                <p class="mb-0 w-100 text-center">This report is specially curated for Alfredo Valentino</p>
            </div>
            <div class="page-content1">
                <div class="header-content">
                    <p class="header-content-text">Your LifePowers</p>
                </div>

                <div class="chart-section mx-5">
                    <div class="d-flex">
                        <div class="col-6 d-flex">
                            <div class="chart mx-auto">
                                <canvas id="myChart"></canvas>
                            </div>
                        </div>
                        <div class="col-6">
                            <div>
                                <p class="body-text">LifePowers are based on the UN WHO Life Skills framework. They are
                                    the output
                                    generated by the platform based on the information given by you in the
                                    LifeAchievements, LifePassions, LifeMoments and LifeStrengths sections. LifePowers
                                    give you an understanding of your dominant and developing skills.</p>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="skills-section mt-3 mx-5">
                    <div class="d-flex align-items-center cognitive-border mb-2">
                        <div class="col-3 cognitive-bg d-flex">
                            <img src="assets/images/professional_report/Cognitive logo 1.png" alt=""
                                class="skill-logo mx-auto py-1">
                        </div>
                        <div class="col-9">
                            <p class="mb-0 body-text fw-bold">Cognitive</p>
                            <p class="mb-0 body-text">
                                Relating to the mental process involved in knowing, learning, and understanding things.
                            </p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center interactive-border mb-2">
                        <div class="col-3 interactive-bg d-flex">
                            <img src="assets/images/professional_report/interactive logo 2.png" alt=""
                                class="skill-logo mx-auto py-1">
                        </div>
                        <div class="col-9">
                            <p class="mb-0 body-text fw-bold">Interactive</p>
                            <p class="mb-0 body-text">
                                Interactive skills refer to the general ability to interact with the external world to
                                accomplish a task.
                            </p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center emotive-border mb-2">
                        <div class="col-3 emotive-bg d-flex">
                            <img src="assets/images/professional_report/emotive logo 4.png" alt=""
                                class="skill-logo mx-auto py-1">
                        </div>
                        <div class="col-9">
                            <p class="mb-0 body-text fw-bold">Emotive</p>
                            <p class="mb-0 body-text">
                                Recognising your own feelings and those of others, and developing effective ways for
                                managing those feelings.
                            </p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center adaptive-border mb-2">
                        <div class="col-3 adaptive-bg d-flex">
                            <img src="assets/images/professional_report/adaptive logo 1.png" alt=""
                                class="skill-logo mx-auto py-1">
                        </div>
                        <div class="col-9">
                            <p class="mb-0 body-text fw-bold">Adaptive</p>
                            <p class="mb-0 body-text">
                                Enables a person to cope in their environment with greatest success and least conflict
                                with others.
                            </p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center creative-border mb-2">
                        <div class="col-3 creative-bg d-flex">
                            <img src="assets/images/professional_report/creative logo 4.png" alt=""
                                class="skill-logo mx-auto py-1">
                        </div>
                        <div class="col-9">
                            <p class="mb-0 body-text fw-bold">Creative</p>
                            <p class="mb-0 body-text">
                                The tendency to generate or recognize ideas, alternatives, or possibilities that may be
                                useful in solving problems
                            </p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center motive-border mb-2">
                        <div class="col-3 motive-bg d-flex">
                            <img src="assets/images/professional_report/Motive logo 1.png" alt=""
                                class="skill-logo mx-auto py-1">
                        </div>
                        <div class="col-9">
                            <p class="mb-0 body-text fw-bold">Motive</p>
                            <p class="mb-0 body-text">
                                Something that causes us to act or behave in order to reach a goal or desired endpoint
                            </p>
                        </div>
                    </div>
                </div>

            </div>
            <div class="footer-content">
                <img src="assets/images/professional_report/mask_group_bg.png" alt="" class="mask-img">
                <img src="assets/images/professional_report/logo LV polos 1.png" alt="" class="mask-img2">
                <p class="page-number">2</p>
                <img src="assets/images/professional_report/letter_head_footer_simple.png" alt="" class="footer-img">
                <p class="footer-text"><span>&copy;</span> 2023, LifeVitae Pte Ltd. All rights reserved.</p>
            </div>
        </div>
    </page>
    <page size="A4">
        <div class="position-relative">

            <div class="page-header d-flex align-items-center">
                <img src="./assets/images/purple_logo.png" alt="" class="header-logo">
                <p class="mb-0 w-100 text-center">This report is specially curated for Alfredo Valentino</p>
            </div>
            <div class="page-content1">
                <div class="header-content">
                    <p class="header-content-text">What makes you stand out</p>
                </div>
                <div class="header-content-no-bg">
                    <p class="header-content-text-purple">Your Dominant Skills</p>
                </div>
                <div class="d-flex justify-content-center mt-5">
                    <div class="col-6">
                        <div class="d-flex justify-content-between">
                            <div class="col-5 position-relative">
                                <img src="assets/images/professional_report/Motive logo 1.png" alt=""
                                    class="position-absolute inside-img">
                                <img src="assets/images/hex/hex-MOTIVE.png" alt="" class="img-fluid">

                                <p class="fw-bold text-center position-absolute skill-text motive-text">MOTIVE</p>
                            </div>
                            <div class="col-5 position-relative">
                                <img src="assets/images/professional_report/Cognitive logo 1.png" alt=""
                                    class="position-absolute inside-img">
                                <img src="assets/images/hex/hex-COGNITIVE.png" alt="" class="img-fluid">

                                <p class="fw-bold text-center position-absolute skill-text cognitive-text">COGNITIVE</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mx-5 pt-3">
                    <p class="body-text mt-5">You are highly motivated to complete specific tasks and can find the
                        passion and drive to work hard
                        and push themselves. You are strong-willed and independent. You are also able to think logically
                        and
                        rationally, without emotional bias. You are able to rely on your thinking capacity, using facts
                        and
                        reasons to come to a conclusion. Due to this, you can make decisions quicker and more
                        efficiently.
                    </p>
                </div>
                <div class="header-content">
                    <p class="header-content-text">Potential areas of improvements</p>
                </div>
                <div class="header-content-no-bg">
                    <p class="header-content-text-purple">Your Developing Skills</p>
                </div>
                <div class="d-flex justify-content-center mt-5">
                    <div class="col-6">
                        <div class="d-flex justify-content-between">
                            <div class="col-5 position-relative">
                                <img src="assets/images/professional_report/emotive logo 4.png" alt=""
                                    class="position-absolute inside-img">
                                <img src="assets/images/hex/hex-EMOTIVE.png" alt="" class="img-fluid">

                                <p class="fw-bold text-center position-absolute skill-text emotive-text">EMOTIVE</p>
                            </div>
                            <div class="col-5 position-relative">
                                <img src="assets/images/professional_report/adaptive logo 1.png" alt=""
                                    class="position-absolute inside-img">
                                <img src="assets/images/hex/hex-ADAPTIVE.png" alt="" class="img-fluid">

                                <p class="fw-bold text-center position-absolute skill-text adaptive-text">ADAPTIVE</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mx-5 pt-3">
                    <p class="body-text mt-5">You can find it difficult to understand your feelings and emotions and
                        process them coherently. You are sometimes unable to show compassion and gratitude for others,
                        or care for others in a genuine manner. As you are more guarded, you have difficulty trusting
                        other people. You also sometimes lack the resilience to cope with adversity and struggle to
                        recover from setbacks. You are afraid of change and can resist new situations, leading to
                        difficulties in adapting to different environments.
                    </p>
                </div>
            </div>
            <div class="footer-content">
                <img src="assets/images/professional_report/mask_group_bg.png" alt="" class="mask-img">
                <img src="assets/images/professional_report/logo LV polos 1.png" alt="" class="mask-img2">
                <p class="page-number">3</p>
                <img src="assets/images/professional_report/letter_head_footer_simple.png" alt="" class="footer-img">
                <p class="footer-text"><span>&copy;</span> 2023, LifeVitae Pte Ltd. All rights reserved.</p>
            </div>
        </div>
    </page>
    <page size="A4">
        <div class="position-relative">

            <div class="page-header d-flex align-items-center">
                <img src="./assets/images/purple_logo.png" alt="" class="header-logo">
                <p class="mb-0 w-100 text-center">This report is specially curated for Alfredo Valentino</p>
            </div>
            <div class="page-content1">
                <div class="header-content">
                    <p class="header-content-text">Given your skill set, there’s a <strong>high</strong> possibility for
                        you to be matched to the following career pathways</p>
                </div>
                <div class="mx-5">
                    <p class="body-text">You have 3 more career pathways with a high match to your skill-set. You can
                        upgrade to the full version to unlock these pathways.</p>
                </div>
                <div class="mx-5">
                    <div class="d-flex mb-1 align-items-center">
                        <div class="col-3">
                            <div class="position-relative">
                                <img src="assets/images/high possibitily hexagon 1.png" alt="" class="img-fluid">
                                <img src="assets/images/Creative Design.png" alt=""
                                    class="position-absolute possibility-inside-img">
                            </div>
                        </div>
                        <div class="col-9">
                            <p class="fw-bold body-text mb-0">Science & Technology</p>
                            <p class="body-text">Science and technology, as a broad field, encompasses a wide range of
                                disciplines,
                                including biotechnology, life and physical science, animal and plant science, and
                                information technology. Professionals in science and technology can be found in almost
                                any industry, from government to manufacturing to pharmaceuticals. They use
                                sophisticated testing equipment, are in charge of data tracking and logging, and
                                collaborate with physicians and other researchers. A degree in Science and Technology
                                helps a student undertake research based thinking techniques which are crucial in every
                                industry.</p>
                        </div>
                    </div>
                    <div class="d-flex mb-1 align-items-center">
                        <div class="col-3">
                            <div class="position-relative">
                                <img src="assets/images/high possibitily hexagon 1.png" alt="" class="img-fluid">
                                <img src="assets/images/Creative Design.png" alt=""
                                    class="position-absolute possibility-inside-img">
                            </div>
                        </div>
                        <div class="col-9">
                            <p class="fw-bold body-text mb-0">Analytics</p>
                            <p class="body-text">Analytics helps us see insights and meaningful data that we might not
                                otherwise detect. Business analytics focuses on using insights derived from data to make
                                more informed decisions that will help organizations increase sales, reduce costs, and
                                make other business improvements. Analytics professionals review data to identify key
                                insights into a business's customers and ways the data can be used to solve problems.
                                They also communicate this information to company leadership and other stakeholders.</p>
                        </div>
                    </div>
                    <div class="d-flex mb-1 align-items-center">
                        <div class="col-3">
                            <div class="position-relative">
                                <img src="assets/images/high possibitily hexagon 1.png" alt="" class="img-fluid">
                                <img src="assets/images/Creative Design.png" alt=""
                                    class="position-absolute possibility-inside-img">
                            </div>
                        </div>
                        <div class="col-9">
                            <p class="fw-bold body-text mb-0">Agriculture & Food Technology</p>
                            <p class="body-text">Currently, Agriculture and Food Technology accounts for the largest job
                                sector around the globe. The industry works through the whole process of food
                                cultivation, processing, packaging and distribution. This sector employs graduates from
                                many fields such as engineering, agriculture courses, biosciences etc. in positions such
                                as research scientist, lab technician, food inspector, food engineer, biochemist, food
                                product development director etc.</p>
                        </div>
                    </div>
                    <div class="d-flex mb-1 align-items-center">
                        <div class="col-3">
                            <div class="position-relative">
                                <img src="assets/images/high possibitily hexagon 1.png" alt="" class="img-fluid">
                                <img src="assets/images/Creative Design.png" alt=""
                                    class="position-absolute possibility-inside-img">
                            </div>
                        </div>
                        <div class="col-9">
                            <p class="fw-bold body-text mb-0">Legal & Criminal Investigation </p>
                            <p class="body-text">Legal and criminal learning pathways provide a wide range of options.
                                Professionals could work in the field, either responding to active crimes or gathering
                                evidence. They could pursue their scientific interest by working in crime scenes and
                                labs to analyze vital evidence. They also work in an office where they counsel and deal
                                with day-to-day legal matters of an organisation.</p>
                        </div>
                    </div>
                </div>

            </div>
            <div class="footer-content">
                <img src="assets/images/professional_report/mask_group_bg.png" alt="" class="mask-img">
                <img src="assets/images/professional_report/logo LV polos 1.png" alt="" class="mask-img2">
                <p class="page-number">4</p>
                <img src="assets/images/professional_report/letter_head_footer_simple.png" alt="" class="footer-img">
                <p class="footer-text"><span>&copy;</span> 2023, LifeVitae Pte Ltd. All rights reserved.</p>
            </div>
        </div>
    </page>
    <page size="A4">
        <div class="position-relative">

            <div class="page-header d-flex align-items-center">
                <img src="./assets/images/purple_logo.png" alt="" class="header-logo">
                <p class="mb-0 w-100 text-center">This report is specially curated for Alfredo Valentino</p>
            </div>
            <div class="page-content1">
                <div class="header-content">
                    <p class="header-content-text">Your LifeStrengths</p>
                </div>
                <div class="mx-5 main">
                    <div class="d-flex flex-column align-items-center">
                        <div class="content">
                            <div class="position-relative">
                                <div>
                                    <img src="assets/images/lifeStrengths/4 5.png" class="hex-shape-inner">
                                    <p class="hex-text">Critical Thinking</p>
                                    <img src="assets/images/lifeStrengths/critical hexagon.png"
                                        class="position-absolute top-50 start-50 translate-middle ls-hex">
                                </div>
                            </div>
                            <div class="position-relative">
                                <div>
                                    <img src="assets/images/lifeStrengths/5 3.png" class="hex-shape-inner">
                                    <p class="hex-text">Self Discipline</p>
                                    <img src="assets/images/lifeStrengths/hexagon photoshop 1.png"
                                        class="position-absolute top-50 start-50 translate-middle ls-hex">
                                </div>
                            </div>
                            <div class="position-relative">
                                <div>
                                    <img src="assets/images/lifeStrengths/2 24.png" class="hex-shape-inner">
                                    <p class="hex-text">Being Persuasive</p>
                                    <img src="assets/images/lifeStrengths/interactive hexagon 1.png"
                                        class="position-absolute top-50 start-50 translate-middle ls-hex">
                                </div>
                            </div>
                            <div class="position-relative">
                                <div>
                                    <img src="assets/images/lifeStrengths/1 11.png" class="hex-shape-inner">
                                    <p class="hex-text">Being Persuasive</p>
                                    <img src="assets/images/lifeStrengths/cognitive hexagon 1.png"
                                        class="position-absolute top-50 start-50 translate-middle ls-hex">
                                </div>
                            </div>
                        </div>
                        <div class="content">
                            <div class="position-relative">
                                <div>
                                    <img src="assets/images/lifeStrengths/3 3.png" class="hex-shape-inner">
                                    <p class="hex-text">Patience</p>
                                    <img src="assets/images/lifeStrengths/emotive hexagon 1.png"
                                        class="position-absolute top-50 start-50 translate-middle ls-hex">
                                </div>
                            </div>
                            <div class="position-relative">
                                <div>
                                    <img src="assets/images/lifeStrengths/image 50 1.png"
                                        class="position-absolute top-50 start-50 translate-middle ls-hex">
                                </div>
                            </div>
                            <div class="position-relative">
                                <div>
                                    <img src="assets/images/lifeStrengths/4 6.png" class="hex-shape-inner">
                                    <p class="hex-text">Entrepreneurship</p>
                                    <img src="assets/images/lifeStrengths/critical hexagon.png"
                                        class="position-absolute top-50 start-50 translate-middle ls-hex">
                                </div>
                            </div>
                        </div>
                        <div class="content">
                            <div class="position-relative">
                                <div>
                                    <img src="assets/images/lifeStrengths/5 4.png" class="hex-shape-inner">
                                    <p class="hex-text">Will Power</p>
                                    <img src="assets/images/lifeStrengths/hexagon photoshop 2.png"
                                        class="position-absolute top-50 start-50 translate-middle ls-hex">
                                </div>
                            </div>
                            <div class="position-relative">
                                <div>
                                    <img src="assets/images/lifeStrengths/1 12.png" class="hex-shape-inner">
                                    <p class="hex-text">Self Discipline</p>
                                    <img src="assets/images/lifeStrengths/cognitive hexagon 2.png"
                                        class="position-absolute top-50 start-50 translate-middle ls-hex">
                                </div>
                            </div>
                            <div class="position-relative">
                                <div>
                                    <img src="assets/images/lifeStrengths/2 25.png" class="hex-shape-inner">
                                    <p class="hex-text">Being Persuasive</p>
                                    <img src="assets/images/lifeStrengths/interactive hexagon 2.png"
                                        class="position-absolute top-50 start-50 translate-middle ls-hex">
                                </div>
                            </div>
                            <div class="position-relative">
                                <div>
                                    <img src="assets/images/lifeStrengths/3 5.png" class="hex-shape-inner">
                                    <p class="hex-text">Self Awareness</p>
                                    <img src="assets/images/lifeStrengths/emotive hexagon 3.png"
                                        class="position-absolute top-50 start-50 translate-middle ls-hex">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mx-5 mt-5">
                    <div class="d-flex pt-5">
                        <div class="col-6 px-2">
                            <div class="mb-4">
                                <p class="mb-1 body-text fw-bold text-purple">Thinking Ahead</p>
                                <p class="mb-0 body-text">You are able to see around corners, and predict what happens
                                    next</p>
                            </div>
                            <div class="mb-4">
                                <p class="mb-1 body-text fw-bold text-purple">Sense Making</p>
                                <p class="mb-0 body-text">The world is chaotic but you can make sense it for other</p>
                            </div>
                            <div class="mb-4">
                                <p class="mb-1 body-text fw-bold text-purple">Collaborating</p>
                                <p class="mb-0 body-text">
                                    You are easy to work with, and you, in turn love to collobarate with others from
                                    different fields
                                </p>
                            </div>
                            <div class="mb-4">
                                <p class="mb-1 body-text fw-bold text-purple">Self- Awareness</p>
                                <p class="mb-0 body-text">
                                    You are comfortable with who you are and don’t profess to be who you are not
                                </p>
                            </div>
                        </div>
                        <div class="col-6 px-2">
                            <div class="mb-4">
                                <p class="mb-1 body-text fw-bold text-purple">Originality</p>
                                <p class="mb-0 body-text">
                                    You think today, others think tomord-flex
                                </p>
                            </div>
                            <div class="mb-4">
                                <p class="mb-1 body-text fw-bold text-purple">Eloquence</p>
                                <p class="mb-0 body-text">
                                    You can communicate with different auidences in compelling ways.
                                </p>
                            </div>
                            <div class="mb-4">
                                <p class="mb-1 body-text fw-bold text-purple">Engagement</p>
                                <p class="mb-0 body-text">
                                    People tent to be drawn to you, they find it engaging to interact with you.
                                </p>
                            </div>
                            <div class="mb-4">
                                <p class="mb-1 body-text fw-bold text-purple">Calmness</p>
                                <p class="mb-0 body-text">
                                    When things go crazy, people turn for level-headed wisdom
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="footer-content">
                <img src="assets/images/professional_report/mask_group_bg.png" alt="" class="mask-img">
                <img src="assets/images/professional_report/logo LV polos 1.png" alt="" class="mask-img2">
                <p class="page-number">5</p>
                <img src="assets/images/professional_report/letter_head_footer_simple.png" alt="" class="footer-img">
                <p class="footer-text"><span>&copy;</span> 2023, LifeVitae Pte Ltd. All rights reserved.</p>
            </div>
        </div>
    </page>
    <page size="A4">
        <div class="position-relative">

            <div class="page-header d-flex align-items-center">
                <img src="./assets/images/purple_logo.png" alt="" class="header-logo">
                <p class="mb-0 w-100 text-center">This report is specially curated for Alfredo Valentino</p>
            </div>
            <div class="page-content1">
                <div class="header-content">
                    <p class="header-content-text">Your LifeStrengths</p>
                </div>
                <div class="mx-5 mt-5">
                    <div class="d-flex">
                        <div class="col-6 px-2">
                            <div class="mb-4">
                                <p class="mb-1 body-text fw-bold text-purple">Resilience</p>
                                <p class="mb-0 body-text">
                                    When faced with disappointment and failure, you can bounce back with ease.
                                </p>
                            </div>
                            <div class="mb-4">
                                <p class="mb-1 body-text fw-bold text-purple">Persistence</p>
                                <p class="mb-0 body-text">
                                    You will try, try and try again......until the world gets out of your way</p>
                            </div>
                            <div class="mb-4">
                                <p class="mb-1 body-text fw-bold text-purple">Exploring</p>
                                <p class="mb-0 body-text">
                                    When others ask "why", you asking "why not"
                                </p>
                            </div>
                            <div class="mb-4">
                                <p class="mb-1 body-text fw-bold text-purple">Confident</p>
                                <p class="mb-0 body-text">
                                    You have a desire to explore new things and get to know people outside of your
                                    circle.
                                </p>
                            </div>
                        </div>
                        <div class="col-6 px-2">
                            <div class="mb-4">
                                <p class="mb-1 body-text fw-bold text-purple">Humility</p>
                                <p class="mb-0 body-text">
                                    You have control of your ego and can questions your beliefs when confronted with
                                    reality
                                </p>
                            </div>
                            <div class="mb-4">
                                <p class="mb-1 body-text fw-bold text-purple">Entrepreneurship</p>
                                <p class="mb-0 body-text">
                                    You enjoy building things from scratch, and creating value from nothing.
                                </p>
                            </div>
                            <div class="mb-4">
                                <p class="mb-1 body-text fw-bold text-purple">Drive</p>
                                <p class="mb-0 body-text">
                                    You bring positive energy to life...energy that comes from inside you....touches
                                    others
                                </p>
                            </div>
                            <div class="mb-4">
                                <p class="mb-1 body-text fw-bold text-purple">Passion</p>
                                <p class="mb-0 body-text">
                                    People tend to be drawn to you, they find it engaging to interact with you
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mx-5 mt-5">
                    <div class="st-box">
                        <p class="body-text text-purple">Disclaimer: This report has been developed using LifeVitae's
                            data science proprietary
                            algorithms. The information provided in this report is for general educational and/or
                            personal purposes only. It should not be taken as an official diagnosis or restrictive
                            analysis. The purpose of this is to aid in self-discovery and self-improvement. It is
                            designed by LifeVitae to help individuals identify their core life skills and career
                            pathways through the synergy of data collected from other individuals and behaviours, and
                            artificial intelligence.</p>
                        <p class="body-text text-purple">This report is based on the latest inputs provided by the user.
                            Please note that any
                            subsequent modifications to the LifeProfile will generate a new report, rendering this
                            report invalid.</p>
                    </div>
                </div>
            </div>
            <div class="footer-content">
                <img src="assets/images/professional_report/mask_group_bg.png" alt="" class="mask-img">
                <img src="assets/images/professional_report/logo LV polos 1.png" alt="" class="mask-img2">
                <p class="page-number">6</p>
                <img src="assets/images/professional_report/letter_head_footer_simple.png" alt="" class="footer-img">
                <p class="footer-text"><span>&copy;</span> 2023, LifeVitae Pte Ltd. All rights reserved.</p>
            </div>
        </div>
    </page>
    <page size="A4">
        <div class="position-relative">

            <div class="page-header d-flex align-items-center">
                <img src="./assets/images/purple_logo.png" alt="" class="header-logo">
                <p class="mb-0 w-100 text-center">This report is specially curated for Alfredo Valentino</p>
            </div>
            <div class="page-content7">
                <div class="px-5 mt-5">
                    <h4 class="my-5">Congratulations on completing the LifeVitae Express!</h4>
                    <p class="body-text">You've taken the first step towards a successful future. Now, let's take your
                        journey to the next
                        level with LifeVitae Advance.</p>
                    <p class="body-text">At LifeVitae, our mission is to democratize education counseling and provide
                        personalized
                        guidance to students like you. When you upgrade to LifeVitae Advance, you'll experience a
                        significant enhancement in your insights, including:</p>
                    <ul class="body-text">
                        <li><strong>Unleash all 6 LifePowers</strong> to unlock your complete potential and gain a
                            thorough understanding
                            of yourself.</li>
                        <li><strong>Explore 4 more high-possibility career pathways</strong> that align with your skills
                            and passions.
                        </li>
                        <li><strong>Unlock 10 Life Strengths</strong> for a comprehensive understanding of yourself.
                        </li>
                        <li><strong>Assess career compatibility</strong> and determine the feasibility of your dream
                            career pathway.</li>
                        <li><strong>Repository of online courses and books</strong> to further expand your knowledge and
                            skills.</li>
                        <li><strong>Summary of your achievements, passions, and moments</strong>, which will help you
                            create a compelling
                            resume.</li>
                    </ul>
                    <p class="body-text"><strong>Upgrade to LifeVitae Advance today and unlock these powerful
                            features</strong> to enhance
                        your educational
                        journey and reach your full potential.</p>
                </div>
                <div class="d-flex justify-content-center">
                    <div class="col-6">
                        <img src="assets/images/self development 1.svg" alt="">
                    </div>
                </div>
                <p class="mx-5">
                    In case you need any support, please kindly email us at info@mylifevitae.com</p>

                <div class="mx-5 text-center mt-5">
                    <p class="mb-0">Address:</p>
                    <p class="mb-0"><strong>PT LifeVitae Indonesia</strong></p>
                    <p class="mb-0">(Indonesia Office) </p>
                    <p class="mb-0">Gedung 18 Office Park</p>
                    <p class="mb-0">
                        Lantai 21 Unit C, JI. T.B. Simatupang No. 18 Desa/Kelurahan</p>
                    <p class="mb-0">Kebagusan, Kec. Pasar Minggu Jakarta Selatan, DKI Jakarta 12520</p>
                </div>
                <div>
                    <div class="d-flex justify-content-between mx-5 mt-3">
                        <div class="d-flex align-items-center">
                            <img src="assets/images/social/Mask group-1.png" alt="" class="social-icon">
                            <p class="mb-0 ms-2 social-text">@lifevitae.co</p>
                        </div>
                        <div class="d-flex align-items-center">
                            <img src="assets/images/social/Mask group-2.png" alt="" class="social-icon">
                            <p class="mb-0 ms-2 social-text">LifeVitae</p>
                        </div>
                        <div class="d-flex align-items-center">
                            <img src="assets/images/social/Mask group-3.png" alt="" class="social-icon">
                            <p class="mb-0 ms-2 social-text">LifeVitae</p>
                        </div>
                        <div class="d-flex align-items-center">
                            <img src="assets/images/social/Mask group.png" alt="" class="social-icon">
                            <p class="mb-0 ms-2 social-text">@MLifevitae.co</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-content">
                <img src="assets/images/professional_report/mask_group_bg.png" alt="" class="mask-img">
                <img src="assets/images/professional_report/logo LV polos 1.png" alt="" class="mask-img2">
                <p class="page-number">7</p>
                <img src="assets/images/professional_report/letter_head_footer_simple.png" alt="" class="footer-img">
                <p class="footer-text"><span>&copy;</span> 2023, LifeVitae Pte Ltd. All rights reserved.</p>
            </div>
        </div>
    </page>


    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>

    <script>
        const data = {
            labels: [
                'Cognitive',
                'Motive',
                'Creative',
                'Adaptive',
                'Emotive',
                'Interactive'
            ],
            datasets: [{
                label: 'My First Dataset',
                data: [65, 59, 90, 81, 56, 55],
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