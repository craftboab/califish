@extends('layouts.app_admin')
@include('navbar.navbar_admin')
@include('footer')

@section('content')
<div class="container">
  <div class="profile-wrap">
    <div class="row">
      <div class="col-md-4 text-center">
        @if ($user->user_image)
        <p>
          <img class="round-img" src="{{ asset('storage/user_images/' . $user->user_image) }}" alt="user_image">
        </p>
        @else
          <img class="round-img" src="{{ asset('/images/blank_profile.png') }}" alt="blank_user_image">
        @endif
      </div>
      <div class="col-md-8">
        <div class="row">
          <h1>{{ $user->name }}</h1>
        </div>
        <div class="row">
          <p>
            {{ $user->email }}
          </p>
        </div>
        <div class="row">
          <p>
            {{ $user->company_name }}
          </p>
        </div>
        <div class="row">
          <p>
            {{ $user->company_address }}
          </p>
        </div>
        <div class="row">
          <p>
            {{ $user->company_contact }}
          </p>
        </div>
        <div class="row">
          <p>
            {{ $user->company_web }}
          </p>
        </div>
        <button type="button" class="btn btn-primary" onclick="location.href='/admin/users/edit/{{ $user->id }}'">Edit</button>
        <button type="button" class="btn btn-primary" onclick="location.href='/admin/users'">Back</button>
      </div>
    </div>
  </div>
</div>
@endsection
