@extends('layouts.app')

@section('title', 'Info')

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
            </div>
            <form method="get" action="{{route('express.search')}}" class="position-relative d-none">
                <i class="bi bi-search position-absolute position-absolute top-50 translate-middle-y top-search-icon"></i>
                <input type="search" class="main-search" name="student_name" placeholder="Search for student name...">
            </form>
            <img src="https://via.placeholder.com/350" alt="" class="user-image-small d-block d-lg-none">
        </div>
    </div>
    <div class="inner-container">
        <div>
            <h4 class="mb-3">About LifeVitae</h4>
            <p>LifeVitae, a Singapore-based startup, leads the global frontier as the first AI-driven Life Skills Platform. Our mission is to empower students to shape personalized learning paths, focusing on achievements, passions, and life experiences, rather than solely relying on grades. Anchored in the UN-WHO Life Skills framework and leveraging advanced AI tools and sophisticated Natural Language Processing (NLP) models, our platform unravels students' skills and strengths, revolutionising the field of skill development and career guidance. We've successfully served over 300,000 students and 150 schools across India, Indonesia and Singapore.</p>
            <h4 class="mb-3">About LifeVitae Express</h4>
            <p>LifeVitae Express is an AI tool that is geared towards the impatience of today's youth who desires speed and convenience. It is an express and comprehensive guide to Self-Discovery that matches them with their potential career paths. Alternative paths are also proposed for their consideration.</p>
            <h4 class="mb-3">About LifeVitae Admin Dashboard</h4>
            <p>The Admin Dashboard serves as a comprehensive tool enabling one to monitor both platform performance and license utilisation within their organization. It delivers a concise overview of user profiles, offering actionable insights derived from key data points such as skills, strengths, and preferred pathways. This dashboard grants the access to not only a summary report but also individualised user reports, providing a detailed and insightful perspective for effective management and decision-making.</p>
            <p class="mt-4">For any feedback or queries, please email us at <a href="mailto:info@mylifevitae.com">info@mylifevitae.com</a>.</p>
            <h5 class="mb-0 mt-5 fst-italic">Disclaimer:</h5>
            <p>The information and recommendations featured in the dashboard have been curated through user responses and LifeVitae's proprietary data science algorithms. It is important to note that these insights are intended solely for general educational and/or personal purposes and should not be construed as an official diagnosis or restrictive analysis. Furthermore, it's essential to acknowledge that the information presented on the dashboard is contingent on the most recent inputs provided by users, ensuring its relevance and timeliness.</p>
        </div>
    </div>
</div>
@endsection

@push('script')

@endpush