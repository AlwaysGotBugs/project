@extends('layouts.app')

@section('title', 'الصفحة الرئيسية')

@section('content')

<div id="bannerCarousel" class="carousel slide carousel-fade mb-5" data-bs-ride="carousel" data-bs-interval="3500">
    <div class="carousel-indicators">
        @php
            $bannerImages = [];
            $directory = public_path('images/home-banner');
            if (File::exists($directory)) {
                $files = File::glob($directory . '/*.{jpg,jpeg,png,gif,webp}', GLOB_BRACE);
                // Sort files by name for consistent order
                sort($files);
                foreach ($files as $filePath) {
                    $bannerImages[] = basename($filePath);
                }
            }
        @endphp
        @foreach ($bannerImages as $key => $imageName)
            <button type="button" data-bs-target="#bannerCarousel" data-bs-slide-to="{{ $key }}"
                    class="{{ $key == 0 ? 'active' : '' }}" aria-current="{{ $key == 0 ? 'true' : 'false' }}"
                    aria-label="Slide {{ $key + 1 }}">
            </button>
        @endforeach
    </div>
    <div class="carousel-inner" style="height: 600px;">
        @foreach ($bannerImages as $key => $imageName)
            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                <img src="{{ asset('images/home-banner/' . $imageName) }}" class="d-block w-100 h-100 object-fit-cover" alt="Banner Image {{ $key + 1 }}">
                {{-- You can add dynamic captions here if you have data for them, or remove this div if not needed --}}
                <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded p-2">
                    <h3 class="fw-bold text-white">عنوان ديناميكي {{ $key + 1 }}</h3>
                    <p class="text-white-50">وصف ديناميكي هنا.</p>
                </div>
            </div>
        @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#bannerCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">السابق</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#bannerCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">التالي</span>
    </button>
</div>


{{-- جدول المباريات والأنشطة Section --}}
<div class="container py-5">
    <h2 class="text-center mb-5" style="color: #129866; font-weight: 700;">
        جدول المباريات والأنشطة
    </h2>

    <div class="row justify-content-center">

        {{-- Match Example 1 --}}
        <div class="col-12 mb-4">
            <div class="card match-card shadow-sm rounded-3">
                <div class="card-body d-flex flex-column flex-md-row justify-content-between align-items-center p-3">
                    <div class="team-info d-flex flex-column align-items-center text-center">
                        <h5 class="fw-bold mb-0">الفريق الأول</h5>
                    </div>

                    <div class="match-details text-center mx-md-4 mb-3 mb-md-0">
                        <div class="text-muted small">
                            <i class="bi bi-calendar me-1"></i> 2025-06-28
                            <i class="bi bi-clock me-1 ms-2"></i> 20:00
                        </div>
                        <div class="text-muted small">
                            <i class="bi bi-tv-fill me-1"></i> قناة رياضية 1
                        </div>
                        <div class="text-muted small">
                            <i class="bi bi-geo-alt-fill me-1"></i> ملعب المدينة الرياضية
                        </div>
                    </div>

                    <div class="team-info d-flex flex-column align-items-center text-center">
                        <h5 class="fw-bold mb-0">الفريق الثاني</h5>
                    </div>
                </div>
            </div>
        </div>

        {{-- Activity Example 2 --}}
        <div class="col-12 mb-4">
            <div class="card match-card shadow-sm rounded-3">
                <div class="card-body d-flex flex-column flex-md-row justify-content-between align-items-center p-3">
                    <div class="team-info d-flex flex-column align-items-center text-center">
                        <h5 class="fw-bold mb-0">ورشة عمل تدريبية</h5>
                    </div>

                    <div class="match-details text-center mx-md-4 mb-3 mb-md-0">
                        <p class="mb-1 text-muted small">تحسين الأداء البدني</p>
                        <div class="text-muted small">
                            <i class="bi bi-calendar me-1"></i> 2025-07-05
                            <i class="bi bi-clock me-1 ms-2"></i> 10:00
                        </div>
                        <div class="text-muted small">
                            <i class="bi bi-geo-alt-fill me-1"></i> قاعة المحاضرات، الجامعة
                        </div>
                    </div>

                    <div class="team-info d-flex flex-column align-items-center text-center">
                        <h5 class="fw-bold mb-0">مع المدرب خبير</h5>
                    </div>
                </div>
            </div>
        </div>

        {{-- Match Example 3 (Completed) --}}
        <div class="col-12 mb-4">
            <div class="card match-card shadow-sm rounded-3">
                <div class="card-body d-flex flex-column flex-md-row justify-content-between align-items-center p-3">
                    <div class="team-info d-flex flex-column align-items-center text-center">
                        <h5 class="fw-bold mb-0">فريق الأمل</h5>
                    </div>

                    <div class="match-details text-center mx-md-4 mb-3 mb-md-0">
                        <div class="text-muted small">
                            <i class="bi bi-calendar me-1"></i> 2025-05-20
                            <i class="bi bi-clock me-1 ms-2"></i> 17:00
                        </div>
                        <div class="text-muted small">
                            <i class="bi bi-geo-alt-fill me-1"></i> ملعب الجامعة الجديد
                        </div>
                    </div>

                    <div class="team-info d-flex flex-column align-items-center text-center">
                        <h5 class="fw-bold mb-0">فريق العزيمة</h5>
                    </div>
                </div>
            </div>
        </div>

        {{-- Activity Example 4 --}}
        <div class="col-12 mb-4">
            <div class="card match-card shadow-sm rounded-3">
                <div class="card-body d-flex flex-column flex-md-row justify-content-between align-items-center p-3">
                    <div class="team-info d-flex flex-column align-items-center text-center">
                        <h5 class="fw-bold mb-0">حصص يوغا صباحية</h5>
                    </div>

                    <div class="match-details text-center mx-md-4 mb-3 mb-md-0">
                        <p class="mb-1 text-muted small">لتحسين التركيز والمرونة</p>
                        <div class="text-muted small">
                            <i class="bi bi-calendar me-1"></i> كل ثلاثاء وخميس
                            <i class="bi bi-clock me-1 ms-2"></i> 07:30
                        </div>
                        <div class="text-muted small">
                            <i class="bi bi-geo-alt-fill me-1"></i> قاعة الأنشطة الرياضية
                        </div>
                    </div>

                    <div class="team-info d-flex flex-column align-items-center text-center">
                        <h5 class="fw-bold mb-0">مع المدربة ليلى</h5>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="container-fluid py-5">
    <h2 class="text-center text-primary mb-5 display-4 fw-bold">المنشآت الرياضية</h2>

    <div class="row justify-content-center px-2 px-md-0">
        @for ($i = 1; $i <= 6; $i++)
        <div class="col-xl-4 col-lg-4 col-md-6 col-12 mb-4 d-flex justify-content-center">
            {{-- REMOVED onclick="openGallery({{ $i }})" --}}
            <div class="card h-100 shadow-sm border-0 facility-card">
                <img src="{{ asset("images/facility{$i}/1.jpg") }}" class="card-img-top" style="height: 300px;width: 300px; object-fit: cover;" alt="Facility {{ $i }}">
                <div class="card-body d-flex flex-column justify-content-between">
                    <h5 class="card-title text-center text-dark fw-bold mb-0">المنشأة {{ $i }}</h5>
                    {{-- REMOVED or MODIFIED the text --}}
                    {{-- <p class="card-text text-muted text-center mt-2 small">انقر لعرض المعرض</p> --}}
                    {{-- You can add a brief description here if you want --}}
                    <p class="card-text text-muted text-center mt-2 small">صورة للمنشأة {{ $i }}</p>
                </div>
            </div>
        </div>
        @endfor
    </div>
</div>


<style>
    .facility-card {
        transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out; /* KEEP THIS */
        /* cursor: pointer; -- REMOVE THIS LINE IF IT'S STILL THERE */
    }
    .facility-card:hover {
        transform: translateY(-5px); /* KEEP THIS */
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important; /* KEEP THIS */
    }
    .facility-card .card-img-top {
        border-bottom: 3px solid #007bff;
    }
    .match-card {
        border-radius: 0.75rem; /* More rounded corners */
        background-color: #fff;
        border: 1px solid #e0e0e0;
        transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
    }

    .match-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1) !important;
    }

    .match-card .team-logo {
        width: 60px; /* Adjusted size for better alignment */
        height: 60px; /* Adjusted size for better alignment */
        object-fit: contain;
        border-radius: 50%; /* If you want circular logos */
        border: 1px solid #eee;
        padding: 5px;
    }

    /* Important: Ensure logos are always above text and centered within their column */
    .match-card .team-info {
        display: flex;
        flex-direction: column; /* Stack logo above text */
        align-items: center; /* Center horizontally within the column */
        text-align: center; /* Ensure text is centered too */
        width: auto; /* Allow content to dictate width */
        margin-bottom: 0; /* Reset margin from previous adjustments */
    }

    .match-card .match-details {
        flex-grow: 1; /* Allows details section to take available space */
        max-width: 300px; /* Limit width on larger screens */
    }

    /* Responsive adjustments for the match card */
    @media (max-width: 767.98px) {
        .match-card .card-body {
            flex-direction: column; /* Stack elements vertically on small screens */
        }
        .match-card .team-info {
            width: 100%; /* Full width for team info on small screens */
            margin-bottom: 1rem; /* Add space below team info when stacked */
        }
        .match-card .team-logo {
            margin-bottom: 10px; /* Add space below logo when stacked */
        }
        .match-card .match-details {
            width: 100%;
            margin-left: 0 !important;
            margin-right: 0 !important;
            margin-bottom: 1rem;
        }
    }


    /* Existing CSS for facility-card and carousel */
    .facility-card {
        /* REMOVED transition, cursor, and hover effects related to clickability */
        /* If you still want a slight visual effect on hover, you can add a subtle box-shadow */
        transition: box-shadow 0.3s ease-in-out; /* Keep a subtle transition for shadow */
    }
    .facility-card:hover {
        box-shadow: 0 0.25rem 0.5rem rgba(0, 0, 0, 0.08) !important; /* Lighter shadow on hover */
        /* REMOVED transform: translateY(-5px); */
    }
    .facility-card .card-img-top {
        border-bottom: 3px solid #007bff;
    }

    @media (max-width: 992px) {
        .carousel-inner {
            height: 450px !important;
        }
    }
    @media (max-width: 768px) {
        .carousel-inner {
            height: 350px !important;
        }
        .carousel-caption h3 {
            font-size: 1.2rem;
        }
        .carousel-caption p {
            font-size: 0.8rem;
        }
    }
    @media (max-width: 576px) {
        .carousel-inner {
            height: 250px !important;
        }
        .carousel-caption {
            display: none !important;
        }
    }

    /* Footer alignment styles */
    .footer .col-md-4 {
        display: flex;
        flex-direction: column;
        justify-content: center; /* Vertically center content within columns */
        align-items: center; /* Horizontally center content within columns */
    }

    /* Override for specific column alignments on medium and larger screens */
    .footer .col-md-4:first-child {
        align-items: center; /* Center for mobile */
    }
    @media (min-width: 768px) {
        .footer .col-md-4:first-child {
            align-items: flex-start; /* Align to start on medium screens */
            text-align: left;
        }
    }

    .footer .col-md-4:last-child {
        align-items: center; /* Center for mobile */
    }
    @media (min-width: 768px) {
        .footer .col-md-4:last-child {
            align-items: flex-end; /* Align to end on medium screens */
            text-align: right;
        }
    }

    /* Contact Info list specific alignment */
    .footer ul.list-unstyled.d-flex.flex-column {
        width: 100%; /* Ensure the ul takes full width to control alignment */
    }
    .footer ul.list-unstyled.d-flex.flex-column li {
        width: auto; /* Allow li to size to its content */
    }

    .social-icons-list .social-icon-link {
        display: inline-flex; /* Use flexbox for vertical alignment */
        align-items: center; /* Center icon vertically */
        justify-content: center; /* Center icon horizontally */
        width: 30px; /* Adjust as needed for consistent size */
        height: 30px; /* Adjust as needed for consistent size */
    }

    /* Ensure text alignment within specific columns on medium screens */
    @media (min-width: 768px) {
        .footer .col-md-4:nth-child(2) h5,
        .footer .col-md-4:nth-child(2) ul {
            text-align: center; /* Center align title and list for the middle column */
            align-items: center; /* Ensure items inside list are centered too */
        }
    }
</style>

{{-- REMOVED the galleryModal HTML completely --}}
{{--
<div class="modal fade" id="galleryModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-primary fw-bold">معرض الصور</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="إغلاق"></button>
            </div>
            <div class="modal-body">
                <div id="galleryContent" class="d-flex overflow-auto gap-3 py-2" style="max-width: 100%;"></div>
            </div>
        </div>
    </div>
</div>
--}}

{{-- REMOVED the entire script block containing openGallery function --}}
{{--
<script>
    const facilityImages = {
        1: @json(array_map('basename', glob(public_path('images/facility1/*.jpg')))),
        // ... (and so on for other facility images)
    };

    function openGallery(facilityNumber) {
        // ... (function logic)
    }
</script>
--}}

@endsection