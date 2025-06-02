{{-- resources/views/layouts/admin.blade.php --}}
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - @yield('title', 'لوحة التحكم')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .sidebar {
            width: 250px;
            min-height: 100vh;
            background-color: #343a40; /* Dark background */
            color: white;
            padding-top: 20px;
        }
        .sidebar .nav-link {
            color: rgba(255, 255, 255, 0.75);
            padding: 10px 20px;
            display: block;
        }
        .sidebar .nav-link:hover {
            color: white;
            background-color: #495057;
        }
        .sidebar .nav-link.active {
            color: white;
            background-color: #007bff; /* Primary color */
        }
        .main-content {
            margin-right: 250px; /* Adjust for sidebar width */
            padding: 20px;
        }
        @media (max-width: 768px) {
            .sidebar {
                position: fixed;
                top: 0;
                right: -250px; /* Hide off-screen */
                z-index: 1040;
                transition: right 0.3s ease-in-out;
            }
            .sidebar.show {
                right: 0;
            }
            .main-content {
                margin-right: 0;
            }
            .navbar-toggler {
                margin-left: auto;
            }
        }
    </style>
</head>
<body class="d-flex">
    <div class="sidebar d-flex flex-column" id="adminSidebar">
        <h4 class="text-center text-primary mb-4">لوحة التحكم</h4>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.news.*') ? 'active' : '' }}" href="{{ route('admin.news.index') }}">
                    <i class="bi bi-newspaper me-2"></i> إدارة الأخبار
                </a>
            </li>
            {{-- Add other admin sections here --}}
        </ul>
        <div class="mt-auto p-3">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-outline-danger w-100">
                    <i class="bi bi-box-arrow-right me-2"></i> تسجيل الخروج
                </button>
            </form>
        </div>
    </div>

    <div class="flex-grow-1 main-content">
        {{-- For mobile toggle button --}}
        <button class="btn btn-primary d-md-none mb-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#adminSidebar" aria-controls="adminSidebar">
            <i class="bi bi-list"></i>
        </button>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @yield('admin_content')
    </div>

    <script>
        // For mobile sidebar toggle
        document.addEventListener('DOMContentLoaded', function() {
            var adminSidebar = document.getElementById('adminSidebar');
            // If using offcanvas on mobile, ensure it closes when a link is clicked
            var sidebarLinks = adminSidebar.querySelectorAll('.nav-link');
            sidebarLinks.forEach(function(link) {
                link.addEventListener('click', function() {
                    if (window.innerWidth < 768 && adminSidebar.classList.contains('show')) {
                        var bsOffcanvas = bootstrap.Offcanvas.getInstance(adminSidebar);
                        if (bsOffcanvas) {
                            bsOffcanvas.hide();
                        }
                    }
                });
            });
        });
    </script>
</body>
</html>