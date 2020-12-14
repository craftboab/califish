@extends('layouts.app_admin')
@include('navbar.navbar_admin')
@include('footer')
@include('common.errors')

@section('content')
<div class="container">
  <form class="upload-images p-0 border-0" id="new_post" enctype="multipart/form-data" action="{{ url('admin/blogs/store')}}" accept-charset="UTF-8" method="POST">
    {{csrf_field()}}
    <div class="form-group">
      <label for="image">Image</label>
      <input type="file" name="blog_image" id="image" accept="image/jpeg,image/gif,image/png">
    </div>
    <div class="form-group">
      <label for="title">Title</label>
      <input type="text" name="title" class="form-control" value="{{ old('title') }}" id="title">
      @error('title')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
    </div>
    <div class="form-group">
      <label for="caption">Content</label>
      <textarea type="text" name="caption" class="form-control" value="{{ old('caption' ) }}" id="caption"></textarea>
      @error('caption')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
    </div>
    
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

@endsection
