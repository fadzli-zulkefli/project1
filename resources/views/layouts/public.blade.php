<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('/') }}assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="{{ asset('/') }}assets/img/favicon.png">
 <!-- CSRF Token -->
 <meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ config('app.name', 'Laravel') }}</title>

  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <!-- Nucleo Icons -->
  <link href="{{ asset('/') }}assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="{{ asset('/') }}assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <link href="{{ asset('/') }}assets/css/font-awesome.css" rel="stylesheet" />
  <link href="{{ asset('/') }}assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="{{ asset('/') }}assets/css/argon-design-system.css?v=1.2.0" rel="stylesheet" />

  @yield('myhead')
</head>

<body class="offline-doc">
  <!-- Navbar -->
  <header id="navbar-main" class="navbar fixed-top navbar-main navbar-expand-lg bg-primary navbar-dark headroom">
    <div class="container">
      <a class="navbar-brand mr-lg-5" href="{{ url('/') }}">
        <img style="height: 60px;" src="{{ asset('/') }}img/nadma_logo.png">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="navbar-collapse collapse" id="navbar_global">
        <div class="navbar-collapse-header">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="../../index.html">
                <img src="{{ asset('/') }}assets/img/brand/blue.png">
              </a>
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>


        <span class="navbar-nav navbar-nav-hover align-items-lg-center">
            <h5 style="color: #fff;">{{ config('app.name') }}</h5>

            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;

            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;

            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;


        </span>
        <div style="float:right;" class="float-right justify-content-end">

        <ul style="margin-bottom:5px;" class="navbar-nav navbar-nav-hover align-items-lg-center">
          {{-- <li class="nav-item dropdown">
            <a href="#" class="nav-link" data-toggle="dropdown" href="#" role="button">
              <i class="ni ni-ui-04 d-lg-none"></i>
              <span class="nav-link-inner--text">Menu</span>
            </a>
            <div class="dropdown-menu dropdown-menu-xl">
              <div class="dropdown-menu-inner">
                <a href="http://www.nadma.gov.my" class="media d-flex align-items-center">
                  <div class="icon icon-shape bg-gradient-primary rounded-circle text-white">
                    <i class="ni ni-credit-card"></i>
                  </div>
                  <div class="media-body ml-3">
                    <h6 class="heading text-primary mb-md-1">Maklumat Bantuan</h6>
                    <p class="description d-none d-md-inline-block mb-0">Maklumat Bantuan Khas COVID 19</p>
                  </div>
                </a>
                <a href="{{ url('/') }}" class="media d-flex align-items-center">
                  <div class="icon icon-shape bg-gradient-success rounded-circle text-white">
                    <i class="ni ni-palette"></i>
                  </div>
                  <div class="media-body ml-3">
                    <h6 class="heading text-primary mb-md-1">Syarat Permohonan</h6>
                    <p class="description d-none d-md-inline-block mb-0">Syarat-Syarat Permohonan Bantuan Khas COVID 19</p>
                  </div>
                </a>
                <a href="http://www.nadma.gov.my/" class="media d-flex align-items-center">
                  <div class="icon icon-shape bg-gradient-warning rounded-circle text-white">
                    <i class="ni ni-spaceship"></i>
                  </div>
                  <div class="media-body ml-3">
                    <h5 class="heading text-warning mb-md-1">Hubungi Kami</h5>
                    <p class="description d-none d-md-inline-block mb-0">Hubungi NADMA</p>
                  </div>
                </a>
              </div>
            </div>
          </li> --}}
<!--end  Navbar -->

{{--
          <li class="nav-item dropdown">
            <a href="#" class="nav-link" data-toggle="dropdown" href="#" role="button">
              <i class="ni ni-collection d-lg-none"></i>
              <span class="nav-link-inner--text">Examples</span>
            </a>
            <div class="dropdown-menu">
              <a href="../examples/landing.html" class="dropdown-item">Landing</a>
              <a href="../examples/profile.html" class="dropdown-item">Profile</a>
              <a href="../examples/login.html" class="dropdown-item">Login</a>
              <a href="../examples/register.html" class="dropdown-item">Register</a>
            </div>
          </li>

--}}

        </ul>

        </div>
{{--
        <ul class="navbar-nav align-items-lg-center ml-lg-auto">
          <li class="nav-item">
            <a class="nav-link nav-link-icon" href="https://www.facebook.com/CreativeTim/" target="_blank" data-toggle="tooltip" title="Like us on Facebook">
              <i class="fa fa-facebook-square"></i>
              <span class="nav-link-inner--text d-lg-none">Facebook</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link nav-link-icon" href="https://www.instagram.com/creativetimofficial" target="_blank" data-toggle="tooltip" title="Follow us on Instagram">
              <i class="fa fa-instagram"></i>
              <span class="nav-link-inner--text d-lg-none">Instagram</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link nav-link-icon" href="https://twitter.com/creativetim" target="_blank" data-toggle="tooltip" title="Follow us on Twitter">
              <i class="fa fa-twitter-square"></i>
              <span class="nav-link-inner--text d-lg-none">Twitter</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link nav-link-icon" href="https://github.com/creativetimofficial/argon-design-system" target="_blank" data-toggle="tooltip" title="Star us on Github">
              <i class="fa fa-github"></i>
              <span class="nav-link-inner--text d-lg-none">Github</span>
            </a>
          </li>
          <li class="nav-item d-none d-lg-block ml-lg-4">
            <a href="https://www.creative-tim.com/product/argon-design-system-pro?ref=ads-upgrade-pro" target="_blank" class="btn btn-neutral btn-icon">
              <span class="btn-inner--icon">
                <i class="fa fa-shopping-cart"></i>
              </span>
              <span class="nav-link-inner--text">Upgrade to PRO</span>
            </a>
            <a href="https://www.creative-tim.com/product/argon-design-system" target="_blank" class="btn btn-neutral btn-icon">
              <span class="btn-inner--icon">
                <i class="fa fa-cloud-download mr-2"></i>
              </span>
              <span class="nav-link-inner--text">Download</span>
            </a>
          </li>



        </ul>

--}}

      </div>
    </div>
  </header>
  <!-- End Navbar -->
  <div classOLD="page-header clear-filter">

{{--
    <div class="page-header-image" style="background-image: url('{{ asset('/') }}assets/img/denys.jpg');">
    </div>
--}}


@yield('content')



  </div>
  <footer class="footer">
    <div class="container">

    {{--


      <div class="row row-grid align-items-center mb-5">
        <div class="col-lg-6">

          <h3 class="text-primary font-weight-light mb-2">Thank you for supporting us!</h3>


          <h4 class="mb-0 font-weight-light">Let's get in touch on any of these platforms.</h4>
        </div>
        <div class="col-lg-6 text-lg-center btn-wrapper">
          <a target="_blank" href="https://twitter.com/mynadma" rel="nofollow" class="btn btn-icon-only btn-twitter rounded-circle" data-toggle="tooltip" data-original-title="Follow us">
            <span class="btn-inner--icon"><i class="fa fa-twitter"></i></span>
          </a>
          <a target="_blank" href="https://www.facebook.com/nadma.pmd" rel="nofollow" class="btn-icon-only rounded-circle btn btn-facebook" data-toggle="tooltip" data-original-title="Like us">
            <span class="btn-inner--icon"><i class="fab fa-facebook"></i></span>
          </a>
          <a target="_blank" href="http://www.nadma.gov.my/" rel="nofollow" class="btn btn-icon-only btn-dribbble rounded-circle" data-toggle="tooltip" data-original-title="Follow us">
            <span class="btn-inner--icon"><i class="fa fa-dribbble"></i></span>
          </a>

        </div>


      </div>

      --}}


      <hr>
      <div class="row align-items-center justify-content-md-between">
        <div class="col-md-6">
          <div class="copyright">
            &copy; 2020 <a href="http://www.nadma.gov.my/" target="_blank">NADMA</a>.
          </div>
        </div>
        <div class="col-md-6">


        <div class="text-lg-center btn-wrapper nav nav-footer justify-content-end">
          <a target="_blank" href="https://twitter.com/mynadma" rel="nofollow" class="btn btn-icon-only btn-twitter rounded-circle" data-toggle="tooltip" data-original-title="Follow us">
            <span class="btn-inner--icon"><i class="fa fa-twitter"></i></span>
          </a>
          <a target="_blank" href="https://www.facebook.com/nadma.pmd" rel="nofollow" class="btn-icon-only rounded-circle btn btn-facebook" data-toggle="tooltip" data-original-title="Like us">
            <span class="btn-inner--icon"><i class="fab fa-facebook"></i></span>
          </a>
          <a target="_blank" href="http://www.nadma.gov.my/" rel="nofollow" class="btn btn-icon-only btn-dribbble rounded-circle" data-toggle="tooltip" data-original-title="Follow us">
            <span class="btn-inner--icon"><i class="fa fa-dribbble"></i></span>
          </a>

        </div>

{{--
          <ul class="nav nav-footer justify-content-end">

            <li class="nav-item">
              <a href="http://www.nadma.gov.my/" class="nav-link" target="_blank">Contact Us</a>
            </li>
            <li class="nav-item">
              <a href="http://www.nadma.gov.my/" class="nav-link" target="_blank">About Us</a>
            </li>

          </ul>
--}}

        </div>
      </div>
    </div>
  </footer>
  <!--   Core JS Files   -->
  <script src="{{ asset('/') }}assets/js/core/jquery-3.4.1.min.js" type="text/javascript"></script>
  <script src="{{ asset('/') }}assets/js/core/popper.min.js" type="text/javascript"></script>
  <script src="{{ asset('/') }}assets/js/core/bootstrap.min.js" type="text/javascript"></script>
  <script src="{{ asset('/') }}assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>

   <!-- Scripts -->
   <script src="{{ asset('js/jquery.mask.min.js') }}"></script>


  <!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
  <script src="{{ asset('/') }}assets/js/plugins/bootstrap-switch.js"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="{{ asset('/') }}assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
  <script src="{{ asset('/assets') }}/js/plugins/moment.min.js"></script>
  <script src="{{ asset('/assets') }}/js/plugins/datetimepicker.js" type="text/javascript"></script>
  <script src="{{ asset('/assets') }}/js/plugins/bootstrap-datepicker.min.js"></script>
  <!-- Control Center for Argon UI Kit: parallax effects, scripts for the example pages etc -->

{{--
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

  --}}


  <script src="{{ asset('/assets') }}/js/argon-design-system.min.js?v=1.2.0" type="text/javascript"></script>

  {{--
  <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
  <script>

    window.TrackJS &&
      TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "argon-design-system-pro"
      });


  </script>

  --}}


@yield('myjs')

</body>

</html>
