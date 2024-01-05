@extends('layouts.app')

@section('content')
    <div class="container">
        <h3 class="mb-5">Create Post</h3>
              <form action="{{route('posts.update',$single->id)}}" method="POST" class="p-5 bg-light" enctype='multipart/form-data'>
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
                  <input type="text" name="title" value='{{$single->title}}'   class="form-control" id="website">
                </div>
                <div class="form-group">
                  <label for="Description">Description</label>
                  <textarea placeholder="Description" value='{{$single->description}}' name="Description" cols="30" rows="10" class="form-control"></textarea>
                </div>



                <div class="form-group">
                  <input type="submit" name="submit" value="Update Post" class="btn btn-primary">
            </div>

    
@endsection