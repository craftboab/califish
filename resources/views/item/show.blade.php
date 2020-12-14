@extends('layouts.app')
@include('navbar.navbar')
@include('footer')

@section('content')
<div class="container">
  <div class="profile-wrap">
    <div class="row">
      <div class="col-md-4 text-center">
        @if ($item->item_image)
          <p>
            <img src="{{ asset('storage/item_images/' . $item->item_image )}}" alt="item-image" class="round-img">
          </p>
        @else
          <img src="{{ asset('/images/blank_profile.png')}}" alt="blank-image" class="round-img">
        @endif
      </div>
      <div class="col-md-8">
        <div class="row">
          <h5>{{ $item->name }}</h5>
        </div>
        <div class="row">
          <p>${{ $item->amount }}</p>
        </div>
        @auth
        <div class="card-body">
          <form method="POST" action="/cartitem/store" class="form-inline m-1" style="width:100%; position: absolute; bottom:0;">
            {{ csrf_field() }}
            <select name="quantity" class="form-control col-4 mr-1">
              <option selected>0</option>
              <option>1</option>
              <option>2</option>
              <option>3</option>
              <option>4</option>
              <option>6</option>
              <option>7</option>
              <option>8</option>
              <option>9</option>
              <option>10</option>
            </select>
            <input type="hidden" name="item_id" value="{{ $item->id }}">
            <button type="submit" class="btn btn-primary col-6">Add Cart</button>
          </form>
        </div>
        @endauth

      </div>
    </div>
    <button type="button" class="btn btn-secondary content-center" onclick="location.href='/items'">Back</button>
  </div>
</div>
@endsection



<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <a href="/item/{{ $item->id }}">{{ $item->name }}</a>
                </div>
                <div class="card-body">
                    {{ $item->amount }}
                </div>
            </div>
        </div>
    </div>
</div>
