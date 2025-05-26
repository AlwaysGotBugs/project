<footer class="text-white py-4 mt-auto footer" style="background-color: #129866">
    <div class="container">
        <div class="row">
            {{-- Column 1: Copyright and Links --}}
            <div class="col-md-4 text-center text-md-start mb-3 mb-md-0 d-flex flex-column justify-content-center align-items-center align-items-md-start">
                <p class="mb-2">&copy; 2025 جميع الحقوق محفوظة. موقع رياضي.</p>
                <div>
                    <a href="{{ route('about') }}" class="text-decoration-none text-white me-3">من نحن</a>
                    <a href="{{ route('contact') }}" class="text-decoration-none text-white">تواصل معنا</a>
                </div>
            </div>

            {{-- Column 2: Contact Info --}}
            <div class="col-md-4 text-center mb-3 mb-md-0">
                <h5 class="text-warning mb-3">تواصل معنا</h5>
                <ul class="list-unstyled mb-0 d-flex flex-column align-items-center align-items-md-start">
                    <li class="d-flex align-items-center mb-1">
                        <i class="bi bi-envelope-fill me-2" style="font-size: 1rem;"></i>
                        <span>sports.office@ul.edu.lb</span>
                    </li>
                    <li class="d-flex align-items-center mb-1">
                        <i class="bi bi-phone-fill me-2" style="font-size: 1rem;"></i>
                        <span>(+961) 5 463 282</span>
                    </li>
                </ul>
            </div>

            {{-- Column 3: Social Media --}}
            <div class="col-md-4 text-center text-md-end">
                <h5 class="text-warning mb-3">تابعنا</h5>
                <ul class="list-unstyled d-flex justify-content-center justify-content-md-end gap-3 mb-0 social-icons-list">
                    <li>
                        <a href="https://www.facebook.com/LUSportsOffice" target="_blank" class="text-white social-icon-link">
                            <i class="bi bi-facebook" style="font-size: 1.5rem;"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.instagram.com/lu.sportsoffice" target="_blank" class="text-white social-icon-link">
                            <i class="bi bi-instagram" style="font-size: 1.5rem;"></i>
                        </a>
                    </li>
                    {{-- Add other social media icons if you have them --}}
                </ul>
            </div>
        </div>
    </div>
</footer>