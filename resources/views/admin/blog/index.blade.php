@extends('layouts.app_admin')
@include('navbar.navbar_admin')
@include('footer')
@include('common.errors')

@section('content')
<div class="container">
  <div class="row">
    <form class="" action="/admin/blogs/search" method="get">
      <input type="text" name="keyword">
      <input type="submit" name="Search" value="Search">
    </form>
    <buttom type="button" class="btn btn-primary mx-4" onclick="location.href='/admin/blogs/new'">Add New Blog</buttom>
  </div>
  <div class="row justify-content-left" style="position:relative;">
    @foreach($blogs as $blog)
    <div class="card col-md-3 m-2" style="width: 16rem;">
      @if($blog->blog_image)
      <img src="{{ asset('/storage/blog_images/' .$blog->blog_image)}}" class="card-img-top" alt="blog">
      @else
      <p>no image</p>
      @endif
      <div class="cad-body text-center">
        <p>{{ $blog->title}}</p>
        <p>{{ $blog->caption}}</p>
      </div>
      <div class="row">
        <button type="button" class="btn btn-primary mx-3" onclick="location.href='/admin/blogs/show/{{ $blog->id }}'">Detail</button>
        <button type="button" class="btn btn-primary mx-3" onclick="location.href='/admin/blogs/edit/{{ $blog->id }}'">Edit</button>
      </div>
    </div>
    @endforeach
  </div>
  <div class="row justify-content-center">
    {{ $blogs->appends(['keyword' => Request::get('keyword')])->links() }}
  </div>
  <button type="button" class="btn btn-primary" onclick="location.href='/admin'">back</button>
</div>
@endsection
