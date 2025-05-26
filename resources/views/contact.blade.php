@extends('layouts.app')

@section('title', 'تواصل معنا')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <div class="p-5 bg-light rounded shadow-lg text-center" style="border-bottom: 5px solid #fd7e14; border-left: 5px solid #fd7e14;">
                    <h1 class="mb-4 text-warning" style="font-weight: 700;">تواصل معنا</h1>
                    <p class="lead mb-4">يسعدنا تواصلكم معنا للإجابة على جميع استفساراتكم وتقديم الدعم.</p>

                    <div class="list-group list-group-flush mb-4">
                        <a href="mailto:sports.office@ul.edu.lb" class="list-group-item list-group-item-action py-3 d-flex justify-content-center align-items-center">
                            <i class="bi bi-envelope-fill text-primary me-3" style="font-size: 1.5rem;"></i>
                            <span class="lead"><strong>Email:</strong> sports.office@ul.edu.lb</span>
                        </a>
                        <a href="tel:+9615463282" class="list-group-item list-group-item-action py-3 d-flex justify-content-center align-items-center">
                            <i class="bi bi-phone-fill text-success me-3" style="font-size: 1.5rem;"></i>
                            <span class="lead"><strong>Phone:</strong> (+961) 5 463 282</span>
                        </a>
                        <a href="https://www.facebook.com/LUSportsOffice" target="_blank" class="list-group-item list-group-item-action py-3 d-flex justify-content-center align-items-center">
                            <i class="bi bi-facebook text-info me-3" style="font-size: 1.5rem;"></i>
                            <span class="lead"><strong>Facebook:</strong> LU Sports office</span>
                        </a>
                        <a href="https://www.instagram.com/lu.sportsoffice" target="_blank" class="list-group-item list-group-item-action py-3 d-flex justify-content-center align-items-center">
                            <i class="bi bi-instagram text-danger me-3" style="font-size: 1.5rem;"></i>
                            <span class="lead"><strong>Instagram:</strong> lu.sportsoffice</span>
                        </a>
                    </div>

                    <p class="text-muted mt-4">نتطلع إلى تواصلكم!</p>
                </div>
            </div>
        </div>
    </div>
@endsection