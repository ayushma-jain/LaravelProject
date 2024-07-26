<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}" />
    

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js','resources/saas/style.scss'])
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/7.2.1/tinymce.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        tinymce.init({
            'selector' : 'textarea'
        });
    </script>
</head>
<body>
    <div id="app" class="row">
        @if(Auth::user())
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm col-12">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
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
        
        <nav id="sidebarMenu" class="d-lg-block sidebar bg-white col-3">
            <div class="position-sticky">
                <div class="list-group list-group-flush mt-2">
                  <a href="{{ route('dashboard') }}" class="list-group-item list-group-item-action py-2 ripple @if(Request::is('dashboard')){{'active'}}@endif" aria-current="true">
                    <i class="fas fa-tachometer-alt fa-fw me-3"></i><span>Main dashboard</span>
                  </a>
                  <a href="{{ route('google-map') }}" class="list-group-item list-group-item-action py-2 ripple @if(Request::is('google-map')){{'active'}}@endif">
                    <i class="fas fa-chart-area fa-fw me-3"></i><span>Google Map & Charts</span>
                  </a>
                  <a href="{{ route('mail') }}" class="list-group-item list-group-item-action py-2 ripple @if(Request::is('mail')){{'active'}}@endif"><i
                      class="fas fa-lock fa-fw me-3"></i><span>Email</span></a>
                  <a href="{{ route('payment-gateway') }}" class="list-group-item list-group-item-action py-2 ripple @if(Request::is('payment-gateway')){{'active'}}@endif"><i
                        class="fas fa-lock fa-fw me-3"></i><span>Payment Gateway</span></a>
                </div>
              </div>
        </nav>
       

        <main class="col-9">
            <div class=" p-5 my-2 border">
                @yield('content')
            </div>
        </main>
    @else
        <main class="col-12">
            <div class="container p-5 my-2 border">
                @yield('content')
            </div>
        </main>
    @endif
      
    </div>
</body>

        </div>
    </body>
</html>
