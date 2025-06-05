<!doctype html>


<html lang="en" class=" layout-navbar-fixed layout-menu-fixed layout-compact " dir="ltr" data-skin="default"
  data-assets-path="/assets/" data-template="horizontal-menu-template" data-bs-theme="light">

<head>
  <meta charset="utf-8">
  <meta name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">

<title>
  @yield('title')
</title>

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="/assets/img/favicon/favicon.ico">

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
  <link
    href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet">

  <link rel="stylesheet" href="/assets/vendor/fonts/iconify-icons.css">

  <!-- Core CSS -->
  <!-- build:css assets/vendor/css/theme.css  -->
  
  <link rel="stylesheet" href="https://cdn.datatables.net/2.3.1/css/dataTables.dataTables.min.css">

  <link rel="stylesheet" href="/assets/vendor/libs/pickr/pickr-themes.css">

  <link rel="stylesheet" href="/assets/vendor/css/core.css">
  <link rel="stylesheet" href="/assets/css/demo.css">


  <!-- Vendors CSS -->

  <link rel="stylesheet" href="/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css">

  <!-- endbuild -->

  <link rel="stylesheet" href="/assets/vendor/fonts/flag-icons.css">
  <link rel="stylesheet" href="/assets/vendor/libs/apex-charts/apex-charts.css">

  <!-- Page CSS -->
  <link rel="stylesheet" href="/assets/vendor/css/pages/page-auth.css">

  <link rel="stylesheet" href="/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css">
  <link rel="stylesheet" href="/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css">
  <link rel="stylesheet" href="/assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css">
  <link rel="stylesheet" href="/assets/vendor/libs/select2/select2.css">
  <link rel="stylesheet" href="/assets/vendor/libs/%40form-validation/form-validation.css">

  <!-- Helpers -->
  <script src="/assets/vendor/js/helpers.js"></script>
  <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->

  <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
  <script src="/assets/vendor/js/template-customizer.js"></script>

  <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->

  <script src="/assets/js/config.js"></script>

</head>

<body>

  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-navbar-full layout-horizontal layout-without-menu">
    <div class="layout-container">

      
        {{-- Navbar --}}
        @include('admins.layouts.navbar')
        {{-- Navbar End --}}


      <!-- Layout container -->
      <div class="layout-page">
        <!-- Content wrapper -->
        <div class="content-wrapper">


            {{-- Menu / Sidebar Top --}}
            @include('admins.layouts.sidebar')
            {{-- Menu / Sidebar Top End --}}

            @yield('content')

          <!-- Footer -->
          <footer class="content-footer footer bg-footer-theme">
            <div class="container-xxl">
              <div
                class="footer-container d-flex align-items-center justify-content-between py-4 flex-md-row flex-column">
                <div class="mb-2 mb-md-0">
                  ©
                  <script>
                    document.write(new Date().getFullYear());
                  </script>, made with ❤️ by <a href="https://themeselection.com" target="_blank"
                    class="footer-link">ThemeSelection</a>
                </div>
                <div class="d-none d-lg-inline-block">

                  <a href="https://themeselection.com/license/" class="footer-link me-4" target="_blank">License</a>
                  <a href="https://themeselection.com/" target="_blank" class="footer-link me-4">More Themes</a>

                  <a href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/documentation/"
                    target="_blank" class="footer-link me-4">Documentation</a>


                  <a href="https://themeselection.com/support/" target="_blank"
                    class="footer-link d-none d-sm-inline-block">Support</a>

                </div>
              </div>
            </div>
          </footer>
          <!-- / Footer -->


          <div class="content-backdrop fade"></div>
        </div>
        <!--/ Content wrapper -->
      </div>

      <!--/ Layout container -->
    </div>
  </div>



  <!-- Overlay -->
  <div class="layout-overlay layout-menu-toggle"></div>


  <!-- Drag Target Area To SlideIn Menu On Small Screens -->
  <div class="drag-target"></div>

  <!--/ Layout wrapper -->







  <!-- Core JS -->
  <!-- build:js assets/vendor/js/theme.js  -->

  <script src="/assets/vendor/libs/jquery/jquery.js"></script>
  <script src="/assets/vendor/libs/popper/popper.js"></script>
  <script src="/assets/vendor/js/bootstrap.js"></script>
  <script src="/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
  <script src="/assets/vendor/js/menu.js"></script>

  <!-- endbuild -->

  <!-- Vendors JS -->
  <script src="/assets/vendor/libs/apex-charts/apexcharts.js"></script>
  <script src="/assets/vendor/libs/%40algolia/autocomplete-js.js"></script>
  <script src="/assets/vendor/libs/pickr/pickr.js"></script>
  <script src="/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
  <script src="/assets/vendor/libs/select2/select2.js"></script>
  <script src="/assets/vendor/libs/%40form-validation/popular.js"></script>
  <script src="/assets/vendor/libs/%40form-validation/bootstrap5.js"></script>
  <script src="/assets/vendor/libs/%40form-validation/auto-focus.js"></script>
  <script src="/assets/vendor/libs/cleave-zen/cleave-zen.js"></script>

  <!-- Main JS -->
  <script src="/assets/js/main.js"></script>

  <!-- Page JS -->
  <script src="/assets/js/dashboards-analytics.js"></script>
  {{-- <script src="/assets/js/app-user-list.js"></script> --}}
  <script src="/assets/js/pages-auth.js"></script>
  
  @yield('script')
</body>

</html>

<!-- beautify ignore:end -->