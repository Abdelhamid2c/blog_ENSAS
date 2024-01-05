
@extends('layouts.app')

@section('content')
<div class="section search-result-wrap">
		<div class="container">
			<div class="row">
			</div>
			<div class="row posts-entry">
				<div class="col-lg-8">
                    @foreach($results as $post)
					<div class="blog-entry d-flex blog-entry-search-item">
						<a href="{{route('posts.single', $post->id)}}" class="img-link me-4">
							<img src="{{ asset('assets/images/'.$post ->image.'') }}" alt="Image" class="img-fluid">
						</a>
						<div>
							<span class="date">{{$post->created_at}} &bullet; <a href="#">{{$post->category}}</a></span>
							<h2><a href="{{route('posts.single', $post->id)}}">{{substr($post->title,0,30)}}</a></h2>
							<p>{{substr($post->description,0,30)}}</p>
							<p><a href="{{route('posts.single', $post->id)}}" class="btn btn-sm btn-outline-primary">Read More</a></p>
						</div>
					</div>
                    @endforeach
					


				</div>

				</div>
			</div>
		</div>
	</div>

    @endsection