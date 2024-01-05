@extends('layouts.app')

@section('content')


	<section class="section bg-light">
		<div class="container">
			<div class="row align-items-stretch retro-layout">
			
			@if(\Session::has('delete') )
          <div class="alert alert-success">
            <p>{!! \Session::get('delete') !!}</p>
          </div>
          @endif

		  @if(\Session::has('updated.user') )
          <div class="alert alert-success">
            <p>{!! \Session::get('updated.user') !!}</p>
          </div>
          @endif
				<div class="col-md-4">
                    @foreach($posts as $post)
                    <a href="{{route('posts.single',$post ->id)}}" class="h-entry v-height gradient">

                    <div class="featured-img" style="background-image: url('{{ asset('assets/images/'.$post ->image.'')}}');"></div>

                    <div class="text">
                        <span class="date">{{$post ->created_at }}</span>
                        <h2>{{$post ->title }}</h2>
                    </div>
                    </a>
                    @endforeach

				</div>
				<div class="col-md-4">
                @foreach($postOne as $justPost)
                    
					<a href="{{route('posts.single',$justPost ->id)}}" class="h-entry img-5 h-100 gradient">

                        <div class="featured-img" style="background-image: url('{{ asset('assets/images/'.$justPost ->image.'')}}');"></div>

                        <div class="text">
                            <span class="date">{{$justPost ->created_at }}</span>
                            <h2>{{$justPost ->title}}</h2>
                        </div>
                    </a>
                @endforeach

				</div>
				<div class="col-md-4">
                @foreach($postTwo as $justPost)
					<a href="{{route('posts.single',$justPost ->id)}}" class="h-entry mb-30 v-height gradient">

						<div class="featured-img" style="background-image: url('{{ asset('assets/images/'.$justPost ->image.'')}}');"></div>

						<div class="text">
							<span class="date">{{$justPost ->created_at }}</span>
							<h2>{{$justPost ->title}}</h2>
						</div>
					</a>
                    @endforeach

				</div>
			</div>
		</div>
	</section>
	<!-- End retroy layout blog posts -->

	<!-- Start posts-entry -->
	<section class="section posts-entry">
		<div class="container">
			<div class="row mb-4">
				<div class="col-sm-6">
					<h2 class="posts-entry-title">Business</h2>
				</div>
				<div class="col-sm-6 text-sm-end"><a href="category.html" class="read-more">View All</a></div>
			</div>
			<div class="row g-3">
				<div class="col-md-9">
					<div class="row g-3">
                    @foreach($postsBus as $Post)

						<div class="col-md-6">
							<div class="blog-entry">
								<a href="{{route('posts.single',$Post ->id)}}" class="img-link">
									<img src="{{ asset('assets/images/'.$Post ->image.'') }}" alt="Image" class="img-fluid">
								</a>
								<span class="date">{{$Post ->created_at}}</span>
								<h2><a href="{{route('posts.single',$Post ->id)}}">{{$Post ->title}}</a></h2>
								<p>{{$Post ->description}}</p>
								<p><a href="{{route('posts.single',$Post ->id)}}" class="btn btn-sm btn-outline-primary">Read More</a></p>
							</div>
						</div>
                    @endforeach
					</div>
				</div>
				<div class="col-md-3">
					<ul class="list-unstyled blog-entry-sm">
                    @foreach($postsBusTree as $Post)
						<li>
							<span class="date">{{$Post ->created_at}}</span>
							<h3><a href="{{route('posts.single',$Post ->id)}}">{{$Post ->title}}</a></h3>
							<p>{{$Post ->description}}</p>
							<p><a href="{{route('posts.single',$Post ->id)}}" class="read-more">Continue Reading</a></p>
						</li>
                        @endforeach
					</ul>
				</div>
			</div>
		</div>
	</section>
	<!-- End posts-entry -->

	<!-- Start posts-entry -->
	<section class="section posts-entry posts-entry-sm bg-light">
		<div class="container">
			<div class="row">
            @foreach($randomPosts as $Post)
				<div class="col-md-6 col-lg-3">
					<div class="blog-entry">
						<a href="{{route('posts.single',$Post ->id)}}" class="img-link">
							<img src="{{ asset('assets/images/'.$Post ->image.'') }}" alt="Image" class="img-fluid">
						</a>
						<span class="date">{{$Post ->created_at}}</span>
						<h2><a href="{{route('posts.single',$Post ->id)}}">{{substr($Post ->title,0,15)}}...</a></h2>
						<p>{{substr($Post ->description,0,30)}}...</p>
						<p><a href="{{route('posts.single',$Post ->id)}}" class="read-more">Continue Reading</a></p>
					</div>
				</div>
                @endforeach
			</div>
		</div>
	</section>
	<!-- End posts-entry -->

	<!-- Start posts-entry -->
	<section class="section posts-entry">
		<div class="container">
			<div class="row mb-4">
				<div class="col-sm-6">
					<h2 class="posts-entry-title">Culture</h2>
				</div>
				<div class="col-sm-6 text-sm-end"><a href="category.html" class="read-more">View All</a></div>
			</div>
			<div class="row g-3">
				<div class="col-md-9 order-md-2">
					<div class="row g-3">
                    @foreach($PostsCulture as $Post)
						<div class="col-md-6">
							<div class="blog-entry">
								<a href="{{route('posts.single',$Post ->id)}}" class="img-link">
									<img src="{{ asset('assets/images/'.$Post ->image.'') }}" alt="Image" class="img-fluid">
								</a>
								<span class="date"></span>
								<h2><a href="{{route('posts.single',$Post ->id)}}">{{$Post ->created_at}}</a></h2>
								<p>{{substr($Post ->description,0,15)}}...</p>
								<p><a href="{{route('posts.single',$Post ->id)}}" class="btn btn-sm btn-outline-primary">Read More</a></p>
							</div>
						</div>
                        @endforeach
					</div>
				</div>
				<div class="col-md-3">
					<ul class="list-unstyled blog-entry-sm">
                    
                    @foreach($PostsCultureTwo as $Post)
						<li>
							<span class="date">{{$Post ->created_at}}</span>
							<h3><a href="{{route('posts.single',$Post ->id)}}">{{substr($Post ->title,0,15)}}...</a></h3>
							<p>{{substr($Post ->description,0,15)}}...</p>
							<p><a href="{{route('posts.single',$Post ->id)}}" class="read-more">Continue Reading</a></p>
						</li>
                    @endforeach
					</ul>
				</div>
			</div>
		</div>
	</section>

	<section class="section">
		<div class="container">

			<div class="row mb-4">
				<div class="col-sm-6">
					<h2 class="posts-entry-title">Politics</h2>
				</div>
				<div class="col-sm-6 text-sm-end"><a href="category.html" class="read-more">View All</a></div>
			</div>

			<div class="row">
				<div class="col-lg-4 mb-4">
                @foreach($PostsPolitics as $Post)

					<div class="post-entry-alt">
						<a href="{{route('posts.single',$Post ->id)}}" class="img-link"><img src="{{ asset('assets/images/'.$Post ->image.'') }}" alt="Image" class="img-fluid"></a>
						<div class="excerpt">
							

							<h2><a href="{{route('posts.single',$Post ->id)}}">{{$Post ->title}}</a></h2>
							<div class="post-meta align-items-center text-left clearfix">
								<!-- <figure class="author-figure mb-0 me-3 float-start"><img src="images/person_1.jpg" alt="Image" class="img-fluid"></figure> -->
								<span class="d-inline-block mt-1">By <a href="{{route('posts.single',$Post ->id)}}">{{substr($Post ->user_name,0,10)}}</a></span>
								<span>&nbsp;-&nbsp; {{$Post ->created_at}}</span>
							</div>

							<p>{{substr($Post ->description,0,15)}}...</p>
							<p><a href="{{route('posts.single',$Post ->id)}}" class="read-more">Continue Reading</a></p>
						</div>
                        @endforeach
					</div>
				</div>
				
			</div>
			
		</div>
	</section>

	<div class="section bg-light">
		<div class="container">

			<div class="row mb-4">
				<div class="col-sm-6">
					<h2 class="posts-entry-title">Travel</h2>
				</div>
				<div class="col-sm-6 text-sm-end"><a href="category.html" class="read-more">View All</a></div>
			</div>

			<div class="row align-items-stretch retro-layout-alt">
            
            @foreach($PostsTravel as $Post)

				<div class="col-md-5 order-md-2">
					<a href="{{route('posts.single',$Post ->id)}}" class="hentry img-1 h-100 gradient">
						<div class="featured-img" style="background-image: url('{{ asset('assets/images/'.$Post ->image.'') }}');"></div>
						<div class="text">
							<span>{{$Post ->created_at}}</span>
							<h2>{{$Post ->title}}</h2>
						</div>
					</a>
				</div>
                @endforeach

				<div class="col-md-7">
                @foreach($PostsTravel as $PostsTravelOn)

					<a href="{{route('posts.single',$PostsTravelOn ->id)}}" class="hentry img-2 v-height mb30 gradient">
						<div class="featured-img" style="background-image: url('{{ asset('assets/images/'.$PostsTravelOn ->image.'') }}');"></div>
						<div class="text text-sm">
							<span>{{$PostsTravelOn ->created_at}}</span>
							<h2>{{$PostsTravelOn ->title}}</h2>
						</div>
					</a>
                    @endforeach

					<div class="two-col d-block d-md-flex justify-content-between">
                    
                    @foreach($PostsTravelTwo as $PostsTravelOn)

						<a href="single.html" class="hentry v-height img-2 gradient">
							<div class="featured-img" style="background-image:  url('{{ asset('assets/images/'.$PostsTravelOn ->image.'') }}');"></div>
							<div class="text text-sm">
								<span>{{$PostsTravelOn ->created_at}}</span>
								<h2>{{$PostsTravelOn ->title}}</h2>
							</div>
						</a>
                        @endforeach
					</div>  

				</div>
			</div>

		</div>
	</div>
    @endsection
