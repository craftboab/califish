@extends('layouts.app')
@include('navbar.navbar')
@include('footer')

@section('content')
<div class="container">

  @if(Session::has('flash_message'))
  <div class="alert alert-success">
    {{ session('flash_message') }}
  </div>
  @endif

  <form method="GET" action="/items/search">
    <input type="text" name="keyword">
    <input type="submit" value="Search">
  </form>

  <div class="row justify-content-left" style="position:relative;">
    @foreach ($items as $item)
    <div class="card col-md3 m-2" style="width: 16rem;">
      @if ($item->item_image)
      <img src="/storage/item_images/{{ $item->item_image }}" class="card-img-top" alt="product"/>
      @else
      <img src="{{ asset('/images/blank_profile.png') }}" class="card-img-top"/>
      @endif

      <div class="card-body text-center">
        <a href="/item/{{ $item->id }}">{{ $item->name }}</a>
        <p class="card-amount">${{ $item->amount}}</p>
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
    @endforeach
  </div>
  <div class="row justify-content-center">
    {{ $items->appends(['keyword' => Request::get('keyword')])->links() }}
  </div>
  <button type="button" class="btn btn-secondary" onclick="location.href='/'">Back</button>
</div>

@endsection
