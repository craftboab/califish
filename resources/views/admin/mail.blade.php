@extends('layouts.app_admin')
@include('navbar.navbar_admin')
@include('footer')

@section('content')
    <div class="container">
      <div class="flex-center position-ref full-height pic_main">
        <div class="content">
          <div class="title m-b-md">
            Zero Ocean
          </div>
          <button type="button" class="btn btn-primary" onclick="location.href='/admin/mail/send'">send</button>
        </div>
      </div>
    </div>
@endsection
