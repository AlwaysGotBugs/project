<nav class="navbar navbar-expand-lg navbar-light shadow-sm" style="background-color: #129866">
  <div class="container-fluid">
    <a class="navbar-brand text-white" href="{{ route('home') }}">
        {{-- Your logo image --}}
        <img src="{{ asset('images/header.png') }}" alt="Your Website Logo" style="height: 40px;">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="تبديل الملاحة">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link text-white" href="{{ route('home') }}">الصفحة الرئيسية</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="{{ route('about') }}">من نحن</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="{{ route('news') }}">الأخبار والتحديثات</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="{{ route('contact') }}">تواصل معنا</a>
        </li>
      </ul>
    </div>
  </div>
</nav>