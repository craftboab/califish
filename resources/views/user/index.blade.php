@extends('layouts.app')
@include('navbar.navbar')
@include('footer')

@section('content')
<div class="container">
  <div class="profile-wrap">
  @if ($user->id == Auth::user()->id)
  <div class="row">
    <div class="col-md-4 text-center">
      @if ($user->user_image)
        <p>
          <img class="round-img" src="{{ asset('storage/user_images/' . $user->user_image) }}"/>
        </p>
        @else
          <img class="round-img" src="{{ asset('/images/blank_profile.png') }}"/>
      @endif
    </div>
    <div class="col-md-8">
      <div class="row">
        <h1>{{ $user->name }}</h1>

          <a class="btn btn-outline-dark common-btn edit-profile-btn" href="/users/edit">Edit Profile</a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>

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
      <button type="button" class="btn btn-secondary" onclick="location.href='/'">Back</button>
    </div>
  </div>
  @endif
</div>
</div>
@endsection
