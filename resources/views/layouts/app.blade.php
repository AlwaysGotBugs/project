<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
<meta charset="UTF-8">
<title>@yield('title', ' دائرة النشاط الرياضي في الجامعة اللبنانية')</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="{{ asset('images/header.png') }}">
<link rel="preconnect" href="https://fonts.googleapis.com">
 <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
 <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;700&display=swap" rel="stylesheet">

<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">


 @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="d-flex flex-column min-vh-100">

 @include('partials.header')

 <main class="pb-4 flex-grow-1">
@yield('content')
</main>

 @include('partials.footer')

</body>
</html>