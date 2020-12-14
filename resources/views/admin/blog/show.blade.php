@extends('layouts.app_admin')
@include('navbar.navbar_admin')
@include('footer')
@include('common.errors')

@section('content')
<div class="container">
  <div class="profile-wrap">
    <div class="row">
      <div class="col-md-4 text-center">
        @if ($blog->blog_image)
        <p>
          <img class="round-img" src="{{ asset('storage/blog_images/' . $blog->blog_image) }}" alt="blog_image">
        </p>
        @else
        <p>no image</p>
        @endif
      </div>
      <div class="col-md-8">
        <div class="row">
          <h1>{{ $blog->title }}</h1>
        </div>
        <div class="row">
          <h4>{{ $blog->caption }}</h4>
        </div>
        <button type="button" class="btn btn-primary" onclick="location.href='/admin/blogs/edit/{{ $blog->id }}'">Edit</button>
        <button type="button" class="btn btn-primary" onclick="location.href='/admin/blogs'">Back</button>
      </div>
    </div>
  </div>
</div>
@endsection
