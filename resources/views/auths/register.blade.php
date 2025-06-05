<!doctype html>

  


<html lang="en" class=" layout-wide  customizer-hide" dir="ltr" data-skin="default" data-assets-path="/assets/" data-template="horizontal-menu-template" data-bs-theme="light">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">

    
      <title>Demo: Register Cover - Pages | Sneat - Bootstrap Dashboard PRO</title>
    
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="/assets/img/favicon/favicon.ico">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="/assets/vendor/fonts/iconify-icons.css">

    <!-- Core CSS -->
    <!-- build:css assets/vendor/css/theme.css  -->
    
      
      <link rel="stylesheet" href="/assets/vendor/libs/pickr/pickr-themes.css">
    
    <link rel="stylesheet" href="/assets/vendor/css/core.css">
    <link rel="stylesheet" href="/assets/css/demo.css">

    
    <!-- Vendors CSS -->
    
      <link rel="stylesheet" href="/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css">
    
    <!-- endbuild -->

    <!-- Vendor -->
  <link rel="stylesheet" href="/assets/vendor/libs/%40form-validation/form-validation.css">

    <!-- Page CSS -->
    <!-- Page -->
  <link rel="stylesheet" href="/assets/vendor/css/pages/page-auth.css">

    <!-- Helpers -->
    <script src="/assets/vendor/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    
      <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
      <script src="/assets/vendor/js/template-customizer.js"></script>
    
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    
      <script src="/assets/js/config.js"></script>
    
  </head>

  <body>

    <!-- Content -->

  <div class="authentication-wrapper authentication-cover">
    <!-- Logo -->
    <a href="index.html" class="app-brand auth-cover-brand gap-2">
      <span class="app-brand-logo demo">
        <span class="text-primary">
            <img src="/assets/img/logos/komicatsickle.png" alt="Logo" width="50">
        </span>
        </span>
      <span class="app-brand-text demo text-heading fw-bold">ComiCat</span>
    </a>
    <!-- /Logo -->
    <div class="authentication-inner row m-0">
      <!-- /Left Text -->
      <div class="d-none d-lg-flex col-lg-7 col-xl-8 align-items-center p-5">
        <div class="w-100 d-flex justify-content-center">
          <img src="/assets/img/illustrations/cat-with-a-book.png" class="img-fluid scaleX-n1-rtl" alt="Login image" width="700" data-app-dark-img="illustrations/cat-with-a-book.png" data-app-light-img="illustrations/cat-with-a-book.png">
        </div>
      </div>
      <!-- /Left Text -->

      <!-- Register -->
      <div class="d-flex col-12 col-lg-5 col-xl-4 align-items-center authentication-bg p-sm-12 p-6">
        <div class="w-px-400 mx-auto mt-sm-12 mt-8">
          <h4 class="mb-1">Adventure starts here 🚀</h4>
          <p class="mb-6">Make your app management easy and fun!</p>

          <form id="formAuthentication" class="mb-6" action="index.html" method="GET">
            <div class="mb-6 form-control-validation">
              <label for="username" class="form-label">Username</label>
              <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username" autofocus="">
            </div>
            <div class="mb-6 form-control-validation">
              <label for="email" class="form-label">Email</label>
              <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email">
            </div>
            <div class="form-password-toggle form-control-validation">
              <label class="form-label" for="password">Password</label>
              <div class="input-group input-group-merge">
                <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password">
                <span class="input-group-text cursor-pointer"><i class="icon-base bx bx-hide"></i></span>
              </div>
            </div>
            <div class="my-7 form-control-validation">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="terms-conditions" name="terms">
                <label class="form-check-label" for="terms-conditions">
                  I agree to
                  <a href="javascript:void(0);">privacy policy & terms</a>
                </label>
              </div>
            </div>
            <button class="btn btn-primary d-grid w-100">Sign up</button>
          </form>

          <p class="text-center">
            <span>Already have an account?</span>
            <a href="auth-login-cover.html">
              <span>Sign in instead</span>
            </a>
          </p>

          <div class="divider my-6">
            <div class="divider-text">or</div>
          </div>

          <div class="d-flex justify-content-center">
            <a href="javascript:;" class="btn btn-sm btn-icon rounded-circle btn-text-facebook me-1_5">
              <i class="icon-base bx bxl-facebook-circle icon-20px"></i>
            </a>

            <a href="javascript:;" class="btn btn-sm btn-icon rounded-circle btn-text-twitter me-1_5">
              <i class="icon-base bx bxl-twitter icon-20px"></i>
            </a>

            <a href="javascript:;" class="btn btn-sm btn-icon rounded-circle btn-text-github me-1_5">
              <i class="icon-base bx bxl-github icon-20px"></i>
            </a>

            <a href="javascript:;" class="btn btn-sm btn-icon rounded-circle btn-text-google-plus">
              <i class="icon-base bx bxl-google icon-20px"></i>
            </a>
          </div>
        </div>
      </div>
      <!-- /Register -->
    </div>
  </div>

<!-- / Content -->

    

    

    

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/theme.js  -->
    
    
      <script src="/assets/vendor/libs/jquery/jquery.js"></script>
    
    <script src="/assets/vendor/libs/popper/popper.js"></script>
    <script src="/assets/vendor/js/bootstrap.js"></script>
    <script src="/assets/vendor/libs/%40algolia/autocomplete-js.js"></script>

    
      
      <script src="/assets/vendor/libs/pickr/pickr.js"></script>
    

    
      <script src="/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
      
        
        <script src="/assets/vendor/libs/hammer/hammer.js"></script>
        
          <script src="/assets/vendor/libs/i18n/i18n.js"></script>
        
      
      <script src="/assets/vendor/js/menu.js"></script>
    
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="/assets/vendor/libs/%40form-validation/popular.js"></script>
  <script src="/assets/vendor/libs/%40form-validation/bootstrap5.js"></script>
  <script src="/assets/vendor/libs/%40form-validation/auto-focus.js"></script>

    <!-- Main JS -->
    
      <script src="/assets/js/main.js"></script>
    

    <!-- Page JS -->
    <script src="/assets/js/pages-auth.js"></script>
    
  </body>
</html>

  <!-- beautify ignore:end -->

