@extends('layouts.app_admin')
@include('navbar.navbar_admin')
@include('footer')

@section('content')
    <div class="container">
      <div class="flex-center position-ref full-height pic_main">
        <div class="content">
          <div class="title m-b-md">
            Califish
          </div>
          <button type=“button” class="btn btn-secondary" onclick="location.href='/admin/users'">Manage User</button>
          <button type=“button” class="btn btn-secondary" onclick="location.href='/admin/items'">Manage Item</button>
          <button type=“button” class="btn btn-secondary" onclick="location.href='/admin/blogs'">Manage Blog</button>
        </div>
      </div>
    </div>
@endsection
