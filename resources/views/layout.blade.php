<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <meta name="copyright">

  <title>NSTU EEE</title>

  <link rel="stylesheet" href="{{ asset('assets/css/maicons.css') }}">

  <link rel="stylesheet" href="{{ asset('../assets/css/bootstrap.css') }}">

  <link rel="stylesheet" href="{{ asset('../assets/vendor/owl-carousel/css/owl.carousel.css') }}">

  <link rel="stylesheet" href="{{ asset('../assets/vendor/animate/animate.css') }}">

  <link rel="stylesheet" href="{{ asset('../assets/css/theme.css') }}">

  <!-- Added After User Login System -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>

</head>
<body>

  <!-- Back to top button -->
  <div class="back-to-top"></div>

  <header>
    <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
      <div class="container">
        <a class="navbar-brand" href="/" style="font-size: 1.75rem;"><span class="text-primary">NSTU</span>-EEE</a>


        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupport" aria-controls="navbarSupport" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupport">
          <ul class="navbar-nav ml-auto">

              @guest
                @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="btn btn-primary ml-lg-3" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                @endif

                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else
                <li class="nav-item {{ Request::path() === '/' ? 'active': '' }}">
                  <a class="nav-link" href="/">Home</a>
                </li>
                
                <li class="nav-item {{ Request::path() === 'researchTopic' ? 'active': '' }}">
                  <a class="nav-link" href="/researchTopic">Research Topic</a>
                </li>
                <!-- <li class="nav-item {{ Request::path() === 'questionBank' ? 'active': '' }}">
                  <a class="nav-link" href="/questionBank">Question Bank</a>
                </li> -->
                <li class="nav-item {{ Request::path() === 'courseMaterial' ? 'active': '' }}">
                  <a class="nav-link" href="/courseMaterial">Course Material</a>
                </li>
                <li class="nav-item {{ Request::path() === 'projects' ? 'active': '' }}">
                  <a class="nav-link" href="/projects">Projects</a>
                </li>

                <li class="nav-item dropdown ">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/user/{{Auth::user()->id}}">
                            {{ __('Profile') }}
                        </a>
                        <a class="dropdown-item" href="/userInfo/edit">
                            {{ __('Edit Profile') }}
                        </a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
          </ul>
        </div> <!-- .navbar-collapse -->
      </div> <!-- .container -->
    </nav>
  </header>

  @yield('main')

  <footer class="page-footer" style="padding-top: 16px;padding-bottom: 1px;">
    <div class="container" >

      <p id="copyright">Copyright &copy; 2021 <a href="" target="_blank">NSTU EEE</a>. All right reserved</p>
    </div>
  </footer>

<script src="{{ asset('../assets/js/jquery-3.5.1.min.js') }}"></script>

<script src="{{ asset('../assets/js/bootstrap.bundle.min.js') }}"></script>

<script src="{{ asset('../assets/vendor/owl-carousel/js/owl.carousel.min.js') }}"></script>

<script src="{{ asset('../assets/vendor/wow/wow.min.js') }}"></script>

<script src="{{ asset('../assets/js/theme.js') }}"></script>
  
</body>
</html>