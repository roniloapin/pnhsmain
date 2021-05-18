<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- <title>{{ config('app.name', 'PNHS-ES') }}</title> -->
    <title>PNHS</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style> 
        /* Modify the background color */ 
          
        .navbar-custom { 
            background-color: #131772; 
        } 
        /* Modify brand and text color */ 
          
        .navbar-custom .navbar-brand, 
        .navbar-custom .navbar-text { 
            color: white; 
        }
        .footer {
            position: absolute;
            left: 0;
            /* bottom: 0; */
            width: 100%;
            color: white;
            text-align: center;
        }
        body {
            padding-bottom: 120px;
            /* background-color: #75c1dd; */
            /* background: linear-gradient(to right, #4285f4, #34a853, #fbbc05, #ea4335); */
            background: linear-gradient(to bottom, #71A8EE, #3072EB);
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light">
            <div class="container"> 
                <!-- <a class="navbar-brand" href="{{ url('/') }}">
                    Legazpi City National High School
                </a> -->
                <!-- <div class="col-md-4 col-sm-12 phone-number">
						<h6 class="fa fa-phone" aria-hidden="true"> +63-052-736-0335 <a class="fa fa-envelope fa-lg">inquiry@ust-legazpi.edu.ph</a> </h6>
						<h6 class="fa fa-envelope fa-lg" aria-hidden="true"> <a href="mailto:inquiry@pnhs.edu.ph" target="_blank">inquiry@ust-legazpi.edu.ph</a></h6>
			    </div> -->

                <marquee behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();" class="navbar-brand" style="color: white;"> | System is under maintenance |  | System is under maintenance |  | System is under maintenance |  | System is under maintenance |  | System is under maintenance | </marquee>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}" style="color: white;">{{ __('Login') }}</a>
                                </li>
                            @endif
                            
                            <!-- @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif -->
                        @else
                            <li class="nav-item">
                                    <a class="nav-link" style="color: white;" href="/dashboard">{{ __('Dashboard') }}</a>
                            </li> 
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" style="color: white;" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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
                </div>
            </div>
            
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    <footer class="footer" >
            <p> Copyright &copy; {{ now()->year }} Pagasa National High School<br>
        </footer>
    </div>

    
    <script src="{{ asset('js/jquery/jquery.min.js')  }}"></script>
    <script>
        function change() {
            var selected = $('#key_stage').val();
            if (selected == 'jhs'){
                $('#for_jh').css('display', 'block');
                $('#for_sh').css('display', 'none');
            }else if(selected == 'shs'){
                $('#for_jh').css('display', 'none');
                $('#for_sh').css('display', 'block');
            }
        }
    </script>
    <script>
        if(window.history.replaceState){
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
</body>

</html>
