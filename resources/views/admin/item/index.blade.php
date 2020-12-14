@extends('layouts.app_admin')
@include('navbar.navbar_admin')
@include('footer')
@include('common.errors')

@section('content')
<div class="container">
  <div class="row">
    <form method="GET" action="/admin/items/search">
      <input type="text" name="keyword">
      <input type="submit" value="Search">
    </form>
    <button type="button" class="btn btn-primary mx-4" onclick="location.href='/admin/items/new'">Add New Item</button>
  </div>
  <div class="row justify-content-left" style="position:relative;">
    @foreach ($items as $item)
    <div class="card col-md3 m-2" style="width: 16rem;">
      @if ($item->item_image)
      <img src="/storage/item_images/{{ $item->item_image }}" class="card-img-top" alt="product"/>
      @else
      <img src="{{ asset('/images/blank_profile.png') }}" class="card-img-top"/>
      @endif
      <div class="card-body text-center">
        <p>{{ $item->name }}</p>
        <p class="card-amount">${{ $item->amount}}</p>
      </div>
      <div class="row">
        <button type="button" class="btn btn-primary mx-3" onclick="location.href='/admin/items/{{ $item->id }}'">Show Item</button>
        <button type="button" class="btn btn-primary mx-3" onclick="location.href='/admin/items/edit/{{ $item->id }}'">Edit</button>
      </div>
    </div>
    @endforeach
  </div>
  <div class="row justify-content-center">
    {{ $items->appends(['keyword' => Request::get('keyword')])->links() }}
  </div>
  <button type="button" class="btn btn-primary" onclick="location.href='/admin'">Back</button>
</div>

@endsection
