@extends('layouts.app')

@section('content')
@if(\Session::has('success') )
          <div class="alert alert-success">
            <p>{!! \Session::get('success') !!}</p>
          </div>
          @endif
    <div class="container">
        <h3 class="mb-5">Create Post</h3>
              <form action="{{route('posts.store')}}" method="POST" class="p-5 bg-light" enctype='multipart/form-data'>
                @csrf
                <div class="form-group">
                    <select name="category" class="form-select" aria-label="Default select example">
                    <option selected>Catgeories</option>
                    <option value="Culture">Culture</option>
                    <option value="Politics">Politics</option>
                    <option value="Business">Business</option>
                    <option value="Travel">Travel</option>
                    <option value="Tech">Tech</option>
                    <option value="Food">Food</option>
                    </select>
                </div>
                <div class="form-group">
                  <label for="title">Title</label>
                  <input type="text" name="title"   class="form-control" id="website">
                </div>
                <div class="form-group">
                <label for="image">image</label>
                <input type="file" name="image"   class="form-control" id="website">
                </div>
                <div class="form-group">
                  <label for="Description">Description</label>
                  <textarea placeholder="Description" name="Description" cols="30" rows="10" class="form-control"></textarea>
                </div>



                <div class="form-group">
                  <input type="submit" name="submit" value="Create Post" class="btn btn-primary">
            </div>

    
@endsection