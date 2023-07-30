<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  {{-- Font Awesome CDN --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  {{-- Filepond CSS --}}
  <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />

  <!-- Vendor CSS Files -->
  <link href="{{ asset('backend/dashboard/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('backend/dashboard/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('backend/dashboard/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('backend/dashboard/vendor/quill/quill.snow.css') }}" rel="stylesheet">
  <link href="{{ asset('backend/dashboard/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
  <link href="{{ asset('backend/dashboard/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('backend/dashboard/vendor/simple-datatables/style.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('backend/dashboard/style.css') }}" rel="stylesheet">
</head>
  <body>

    {{-- Header --}}
    <x-backend.header />

    {{-- Sidebar --}}
    <x-backend.sidebar />

    {{-- Main Content --}}
    <main id="main" class="main">
      @yield('content')
    </main>

    {{-- Back to the top --}}
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    {{-- Alphine JS --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Vendor JS Files -->
    <script src="{{ asset('backend/dashboard/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('backend/dashboard/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('backend/dashboard/vendor/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('backend/dashboard/vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('backend/dashboard/vendor/quill/quill.min.js') }}"></script>
    <script src="{{ asset('backend/dashboard/vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset('backend/dashboard/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('backend/dashboard/vendor/php-email-form/validate.js') }}"></script>
    
    {{-- Filepond JS --}}
    <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
    
    <!-- Template Main JS File -->
    <script src="{{ asset('backend/dashboard/main.js') }}"></script>

</body>
</html>