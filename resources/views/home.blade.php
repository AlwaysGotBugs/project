@extends('layouts.app')

@section('title', 'الصفحة الرئيسية')

@section('content')

<div id="bannerCarousel" class="carousel slide carousel-fade mb-5" data-bs-ride="carousel" data-bs-interval="3500">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#bannerCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#bannerCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#bannerCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        <button type="button" data-bs-target="#bannerCarousel" data-bs-slide-to="3" aria-label="Slide 4"></button>
    </div>
    <div class="carousel-inner" style="height: 600px;">
        <div class="carousel-item active">
            <img src="{{ asset('images/1.jpg') }}" class="d-block w-100 h-100 object-fit-cover" alt="Championship 1">
            <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded p-2">
                <h3 class="fw-bold text-white">بطولة الجامعة اللبنانية الكبرى 2024</h3>
                <p class="text-white-50">لحظات لا تُنسى من التميز الرياضي.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="{{ asset('images/2.jpg') }}" class="d-block w-100 h-100 object-fit-cover" alt="Championship 2">
            <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded p-2">
                <h3 class="fw-bold text-white">الروح الرياضية والعمل الجماعي</h3>
                <p class="text-white-50">نُؤمن بأن الرياضة تجمعنا.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="{{ asset('images/3.jpg') }}" class="d-block w-100 h-100 object-fit-cover" alt="Championship 3">
            <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded p-2">
                <h3 class="fw-bold text-white">منشآتنا الحديثة</h3>
                <p class="text-white-50">مرافق على أعلى مستوى لتدريب وتطوير الأبطال.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="{{ asset('images/4.jpg') }}" class="d-block w-100 h-100 object-fit-cover" alt="Championship 4">
            <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded p-2">
                <h3 class="fw-bold text-white">جيل جديد من الرياضيين</h3>
                <p class="text-white-50">نستثمر في مستقبل الرياضة اللبنانية.</p>
            </div>
        </div>
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

<div class="container-fluid py-5">
    <h2 class="text-center text-primary mb-5 display-4 fw-bold">المنشآت الرياضية</h2>

    <div class="row justify-content-center px-2 px-md-0">
        @for ($i = 1; $i <= 4; $i++)
        <div class="col-xl-3 col-lg-4 col-md-6 col-12 mb-4 d-flex justify-content-center">
            <div class="card h-100 shadow-sm border-0 facility-card" onclick="openGallery({{ $i }})">
                <img src="{{ asset("images/facility{$i}/1.jpg") }}" class="card-img-top" style="height: 300px; object-fit: cover;" alt="Facility {{ $i }}">
                <div class="card-body d-flex flex-column justify-content-between">
                    <h5 class="card-title text-center text-dark fw-bold mb-0">المنشأة {{ $i }}</h5>
                    <p class="card-text text-muted text-center mt-2 small">انقر لعرض المعرض</p>
                </div>
            </div>
        </div>
        @endfor
    </div>
</div>

<style>
    .facility-card {
        transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        cursor: pointer;
    }
    .facility-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
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
</style>

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

<script>
    const facilityImages = {
        1: @json(array_map('basename', glob(public_path('images/facility1/*.jpg')))),
        2: @json(array_map('basename', glob(public_path('images/facility2/*.jpg')))),
        3: @json(array_map('basename', glob(public_path('images/facility3/*.jpg')))),
        4: @json(array_map('basename', glob(public_path('images/facility4/*.jpg'))))
    };

    function openGallery(facilityNumber) {
        const gallery = document.getElementById('galleryContent');
        gallery.innerHTML = '';

        const images = facilityImages[facilityNumber];
        images.forEach(fileName => {
            const img = document.createElement('img');
            img.src = `/images/facility${facilityNumber}/${fileName}`;
            img.classList.add('img-thumbnail', 'shadow-sm');
            img.style.height = '250px';
            img.style.objectFit = 'cover';
            img.style.flexShrink = '0';
            gallery.appendChild(img);
        });

        const modal = new bootstrap.Modal(document.getElementById('galleryModal'));
        modal.show();
    }
</script>

@endsection