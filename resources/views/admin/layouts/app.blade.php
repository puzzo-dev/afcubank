<!DOCTYPE html>
<html lang="en">
@include('admin.layout.header')
<body>
     <!-- container-scroller Start -->
     <div class="container-scroller">
          @include('users.layouts.navbar')
          <div class="container-fluid page-body-wrapper">
               @include('users.layouts.sidebar')
               <div class="main-panel">
                    <div class="content-wrapper">
                         @yield('content')
                    </div>
                    @include('users.layouts.footer')
               </div>
          </div>
     <!-- container-scroller End -->
     </div>

<!-- plugins:js -->
@include('users.layouts.footer-scripts')
<!-- End custom js for this page-->
</body>

</html>