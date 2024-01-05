
@extends('layouts.app')

@section('content')
<div class="section search-result-wrap">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="heading">Category: {{$name}}</div>
				</div>
			</div>
			<div class="row posts-entry">
				<div class="col-lg-8">
                    @foreach($posts as $post)
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

				<div class="col-lg-4 sidebar">
					
					
					<!-- END sidebar-box -->
					<div class="sidebar-box">
						<h3 class="heading">Popular Posts</h3>
						<div class="post-entry-sidebar">
							<ul>
                                @foreach($pubPosts as $post)
								<li>
									<a href="{{route('posts.single',$post->id)}}">
										<img src="{{ asset('assets/images/'.$post ->image.'') }}" alt="Image placeholder" class="me-4 rounded">
										<div class="text">
                                        <h4>substr({{$post ->title}},0,30)....</h4>
											<div class="post-meta">
												<span class="mr-2">{{$post ->created_at}} </span>
											</div>
										</div>
									</a>
								</li>
                                @endforeach
                            
							</ul>
						</div>
					</div>
					<!-- END sidebar-box -->

					<div class="sidebar-box">
						<h3 class="heading">Categories</h3>
						<ul class="categories">
                            @foreach($categories as $cat)
                                <li>
                                    <a href="{{route('category.update', $cat->name)}}">{{$cat ->name}} <span>{{$cat ->total}}</span></a>
                                </li>
                            @endforeach
                        </ul>
					</div>
					<!-- END sidebar-box -->

					


				</div>
			</div>
		</div>
	</div>

    @endsection