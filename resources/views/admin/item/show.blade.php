@extends('layouts.app_admin')
@include('navbar.navbar_admin')
@include('footer')
@include('common.errors')

@section('content')
<div class="container">
  <div class="profile-wrap">
    <div class="row">
      <div class="col-md-4 text-center">
        @if ($item->item_image)
        <p>
          <img class="round-img" src="{{ asset('storage/item_images/' . $item->item_image) }}" alt="item_image">
        </p>
        @else
          <img class="round-img" src="{{ asset('/images/blank_profile.png') }}" alt="blank_item_image">
        @endif
      </div>
      <div class="col-md-8">
        <div class="row">
          <h1>{{ $item->name }}</h1>
        </div>
        <div class="row">
          <h4>
            Price:  ${{ $item->amount }}
          </h4>
        </div>
        @if ($item_case == null)
        <div class="row">
          <h4>
            Inventry: {{ $item->quantity }}
          </h4>
        </div>
        @elseif ($item_case && $item_bulk)
        <div class="row">
          <h4>
            Inventry: {{ $item_case }}cs---{{ $item_bulk }} </br>
            Peces per Case: {{$item->case_volume}}pcs/Case
          </h4>
        </div>
        @elseif ($item_case)
        <div class="row">
          <h4>
            Inventry: {{ $item_case }}cs </br>
            Peces per Case: {{$item->case_volume}}pcs/Case
          </h4>
        </div>
        @endif
        <div class="row mt-3">
          <h5>Item Detail:</h5>
        </div>
        <div class="row">
          <p>
            {{ $item->detail }}
          </p>
        </div>
        <button type="button" class="btn btn-primary" onclick="location.href='/admin/items/edit/{{ $item->id }}'">Edit</button>
        <button type="button" class="btn btn-primary" onclick="location.href='/admin/items'">Back</button>
      </div>
    </div>
  </div>
</div>
@endsection
