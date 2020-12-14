@extends('layouts.app_admin')
@include('navbar.navbar_admin')
@include('footer')

@section('content')
<div class="container">
  <div>
    <button type="button" class="btn btn-primary m-2" onclick="location.href='/admin/users/new'">Create Customer</button>
  </div>
  <div class="row">
    @foreach ($users as $user)
      <div class="card col-md3 m-2" style="width:16rem; height:50vh">
      @if ($user->user_image)
          <img class="card-image-top" style="height:50%;" src="{{ asset('storage/user_images/' . $user->user_image) }}"/>
      @else
        <img class="card-image-top" style="height:50%;" src="{{ asset('/images/blank_profile.png') }}"/>
      @endif
        <div>
          <div class="card-body">
            <h5 class="cart-title">{{ $user->name}}</h5>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">{{ $user->company_name}}</li>
            <li class="list-group-item">{{ $user->email }}</li>
            <li class="list-group-item">
              <button type="button" class="btn btn-primary m-2" onclick="location.href='/admin/users/{{ $user->id }}'">Detail</button>
              <button type="button" class="btn btn-primary m-2" onclick="location.href='/admin/users/edit/{{ $user->id }}'">Edit</button>
            </li>
          </ul>
        </div>
      </div>
    @endforeach
  </div>
</div>
<div class="container">
  <button type="button" class="btn btn-primary m-5" onclick="location.href='/admin'">Back</button>
</div>
@endsection
