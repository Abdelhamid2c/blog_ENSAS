@extends('layouts.app')

@section('content')
    <div class="container">
        <h3 class="mb-5">Update profile Info</h3>
              <form action="{{route('users.update',$user->id)}}" method="POST" class="p-5 bg-light" enctype='multipart/form-data'>
                @csrf
                <div class="form-group">
                  <label for="email">email</label>
                  <input type="text" name="email" value='{{$user->email}}'   class="form-control" id="website">
                  @error('email')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>

                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" name="name" value='{{$user->name}}'   class="form-control" id="website">
                  @error('name')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>

                <div class="form-group">
                <label for="image">Profile</label>
                <input type="file" name="image"   class="form-control" id="website">
                </div>

                <div class="form-group">
                  <label for="description">Bio</label>
                  <textarea placeholder="Bio"  name="description" cols="30" rows="10" class="form-control"></textarea>
                  @error('Bio')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>


                <div class="form-group">
                  <input type="submit" name="submit" value="Update " class="btn btn-primary">
            </div>

</form>
@endsection 


