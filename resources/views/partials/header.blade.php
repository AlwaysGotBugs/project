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
        {{-- Navigation links for ALL users (public and admin) --}}
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

        {{-- Conditional Navigation based on Authentication Status --}}
        @auth {{-- This block is displayed ONLY if a user is logged in --}}
        <li class="nav-item">
          {{-- Link to Admin Panel (e.g., News Management) --}}
          <a class="nav-link text-white" href="{{ route('admin.news.index') }}">لوحة التحكم (الأخبار)</a>
        </li>
        <li class="nav-item">
          {{-- Logout button/form --}}
          <form action="{{ route('logout') }}" method="POST" class="d-inline">
            @csrf
            <button type="submit" class="nav-link text-white btn btn-link" style="color: inherit; text-decoration: none; padding: 0.5rem 1rem;">تسجيل الخروج</button>
          </form>
        </li>
        @else {{-- This block is displayed ONLY if NO user is logged in --}}
        <li class="nav-item">
          {{-- Link to Admin Login Page --}}
          <a class="nav-link text-white" href="{{ route('login') }}">تسجيل الدخول (إدارة)</a>
        </li>
        @endauth
      </ul>
    </div>
  </div>
</nav>