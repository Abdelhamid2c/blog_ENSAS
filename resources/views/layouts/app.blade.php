<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Blog ENSAS</title>

    <!-- import css -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;600;700&display=swap" rel="stylesheet">


	<link rel="stylesheet" href="{{asset('assets/fonts/icomoon/style.css')}}">
	<link rel="stylesheet" href="{{asset('assets/fonts/flaticon/font/flaticon.css')}}">

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>

	<link rel="stylesheet" href="{{asset('assets/css/tiny-slider.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/aos.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/glightbox.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/style.css')}}">

	<link rel="stylesheet" href="{{asset('assets/css/flatpickr.min.css')}}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">

    <nav class="site-nav">
		<div class="container">
			<div class="menu-bg-wrap">
				<div class="site-navigation">
					<div class="row g-0 align-items-center">
						<div class="col-2">
							<a href="{{ route('home') }}" class="logo m-0 float-start">Blog ENSAS<span class="text-primary">.</span></a>
						</div>
                        <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                             <span class="navbar-toggler-icon"></span>
                        </button> -->
						<div class="col-8 text-center">
							<form action="#" class="search-form d-inline-block d-lg-none">
								<input type="text" class="form-control" placeholder="Search...">
								<span class="bi-search"></span>
							</form>

							<ul class="js-clone-nav d-none d-lg-inline-block text-start site-menu mx-auto">
								<li class="active"><a href="{{route('home')}}">Home</a></li>
								
								<li><a href="{{route('category.update','Culture')}}">Culture</a></li>
								<li><a href="{{route('category.update','Business')}}">Business</a></li>
								<li><a href="{{route('category.update','Politics')}}">Politics</a></li>
								@auth
								<li><a href="{{ route('posts.create')}}">Create Posts</a></li>
								@endauth
								<li><a href="{{ route('contact')}}">Contact Us</a></li>
								@guest
                                    @if (Route::has('login'))
                                        <li><a href="{{ route('login') }}">Login</a></li>
                                    @endif 
                                    @if (Route::has('register'))
                                        <li><a href="{{ route('register') }}">Register</a></li>
                                    @endif 
                                @else
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{ Auth::user()->name }}
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
										<a class="dropdown-item" href="{{route('users.profile',Auth::user()->id)}}">
                                                {{ __('Public Profile') }}
                                            </a>
                                            <a class="dropdown-item" href="{{route('users.edit',Auth::user()->id)}}">
                                                {{ __('Update Profile') }}
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
							
						</div>
						<div class="col-2 text-end">
							<a href="#" class="burger ms-auto float-end site-menu-toggle js-menu-toggle d-inline-block d-lg-none light">
								<span></span>
							</a>
							<form action="{{route('posts.search')}}" method="POST" class="search-form d-none d-lg-inline-block">
								@csrf
								<input name = "search" type="text" class="form-control" placeholder="Search...">
								<span class="bi-search"></span>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <footer class="site-footer">
		<div class="container">
			<div class="row">
				<div class="col-lg-4">
					<div class="widget">
						<h3 class="mb-4">About</h3>
						<p>Three dedicated students from ENSA Safi, united in their pursuit of knowledge and eager to make a positive impact in the world.</p>
					</div> <!-- /.widget -->
					<div class="widget">
						<h3>Social</h3>
						<ul class="list-unstyled social">
							<li><a href="https://www.instagram.com/abdelhamid_chebel/" target="_blank"><span class="icon-instagram"></span></a></li>
							<li><a href="https://www.facebook.com/abdelhamid.chebel" target="_blank"><span class="icon-facebook"></span></a></li>
							<li><a href="https://www.linkedin.com/in/abdelhamidchebel-3429451a7/" target="_blank"><span class="icon-linkedin"></span></a></li>
						</ul>
					</div> <!-- /.widget -->
				</div> <!-- /.col-lg-4 -->
				<div class="col-lg-4 ps-lg-5">
					<div class="widget">
						
					</div> <!-- /.widget -->
				</div> <!-- /.col-lg-4 -->
				<div class="col-lg-4">
					<div class="widget">
						<div class="post-entry-footer">
							<ul>
							<li><a href="{{ route('about') }}"><h3 class="mb-4">About us</h3></a></li>
							<li><a href="{{ route('contact') }}"><h3 class="mb-4">Contact</h3></a></li>
							</ul>
						</div>


					</div> <!-- /.widget -->
				</div> <!-- /.col-lg-4 -->
			</div> <!-- /.row -->

			<div class="row mt-5">
				<div class="col-12 text-center">
          <!-- 
              **==========
              NOTE: 
              Please don't remove this copyright link unless you buy the license here https://untree.co/license/  
              **==========
            -->

            <p>Copyright &copy;<script>document.write(new Date().getFullYear());</script> <br> By IDIA &hearts;       </p>
          </div>
        </div>
      </div> 
    </footer> 
    <div id="overlayer"></div>
    <div class="loader">
    	<div class="spinner-border text-primary" role="status">
    		<span class="visually-hidden">Loading...</span>
    	</div>
    </div>


    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/tiny-slider.js') }}"></script>

    <script src="{{ asset('assets/js/flatpickr.min.js') }}"></script>


    <script src="{{ asset('assets/js/aos.js') }}"></script>
    <script src="{{ asset('assets/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/js/navbar.js') }}"></script>
    <script src="{{ asset('assets/js/counter.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
</body>
</html>
