<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Anchorage FCU</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href={{ asset('vendors/feather/feather.css') }}>
  <link rel="stylesheet" href={{ asset('vendors/ti-icons/css/themify-icons.css') }}>
  <link rel="stylesheet" href={{ asset('vendors/css/vendor.bundle.base.css') }}>
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href={{ asset('vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}>
  <link rel="stylesheet" href={{ asset('vendors/ti-icons/css/themify-icons.css') }}>
  <link rel="stylesheet" type="text/css" href={{ asset('js/select.dataTables.min.css') }}>
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href={{ asset('css/style.css') }}>
  <!-- endinject -->
  <link rel="shortcut icon" href={{ asset('assets/images/rbc-app-icon.svg') }} />
</head>
<body>
     <!-- container-scroller Start -->
     <div class="container-scroller">
          @include('admin.layouts.navbar')
          <div class="container-fluid page-body-wrapper">
               @include('admin.layouts.sidebar')
               <div class="main-panel">
                    <div class="content-wrapper">
                         @yield('content')
                    </div>
                    @include('admin.layouts.footer')
               </div>
          </div>
     <!-- container-scroller End -->
     </div>

<!-- plugins:js -->
@include('admin.layouts.footer-scripts')
<!-- End custom js for this page-->
</body>

</html>