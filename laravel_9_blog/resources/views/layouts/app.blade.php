<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap" rel="stylesheet">

    <link href="{{ asset('assets/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/customcss/blog.css') }}" rel="stylesheet">
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    
    <div id="app" class="container">

        <header class="blog-header lh-1 py-3">
        
            <div class="row flex-nowrap justify-content-between align-items-center mb-3">

                <div class="col-4 pt-1">

                    <p class="link-secondary"><strong>For those about for coffee</strong></p>
                  
                </div>
        
                <div class="col text-center">
        
                    <a href="/" class="blog-header-logo text-dark">Laravel 9 - Blog</a>
        
                </div>

                <div class="col-4 d-flex justify-content-end align-items-center">
                    
                    <p class="link-secondary"><strong>we salute you!</strong></p>
                  </div>
        
                
            </div>
       
        </header>
    
       
        <div class="nav-scroller py-1 m-2">
       
            <nav class="nav d-flex justify-content-between">
       
                <a class="p-2 link-secondary" href="/">
                            
                    Home
            
                </a>
          
                <a class="p-2 link-secondary" href="/blog">
                    
                    Blog
                
                </a>
            
                @guest

                    @if (Route::has('login'))
                        
                        <a class="p-2 link-secondary" href="{{ route('login') }}">{{ __('Login') }}</a>
                        
                    @endif

                    @if (Route::has('register'))
                    
                        <a class="p-2 link-secondary" href="{{ route('register') }}">{{ __('Register') }}</a>
                    
                    @endif
                    
                    @else

                        <li class="p-2 link-secondary nav-item dropdown">
                            
                            <a id="navbarDropdown" class="nav-link link-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                        <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
                                    </svg>
                                </span>
                                    
                                {{ Auth::user()->name }}
                            
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                
                                <a class="dropdown-item link-secondary" href="{{ route('logout') }}"
                               
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

                <!-- Authentication Links -->

            </nav>

        </div>

        {{-- ☢   Header Image ☣  --}}

        <img src="{{ asset('assets/img/beans,about_jo-lanta-68KjM0kfsVo-unsplash-min.jpg') }}" class="img-fluid mb-5" alt="" />


        <main class="py-4">
            @yield('content')
            
        </main>

        {{-- ☢   Footer ☣  --}}
        <footer class="row row-cols-1 row-cols-sm-2 row-cols-md-5 py-5 my-5 border-top">
   
            <div class="col mb-3">
            
                <img src="{{ asset('assets/img/octo_green_black.png') }}" width="50" height="50" />         
          
                <p class="text-muted">&copy; 2022</p>
        
            </div>

        </footer>
        
        <div class="text-center">
        
            <p>Blog template built for <a href="https://getbootstrap.com/">Bootstrap</a> by <a href="https://twitter.com/mdo">@mdo</a>.</p>
           
            <p>
               
                <a href="#">Back to top</a>
            
            </p>
            
        </div>

    </div>

</body>

</html>
