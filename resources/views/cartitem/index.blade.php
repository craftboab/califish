@extends('layouts.app')

@section('content')
<!-- flass_message -->
@if(Session::has('flash_message'))
<div class="alert alert-success">
  {{ session('flash_message') }}
</div>
@endif

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        @foreach ($cartitems as $cartitem)
        <div class="card-header">
          <a href="/item/{{ $cartitem->item_id }}">{{ $cartitem->name }}</a>
        </div>
        <div class="card-body">
          <div>
            ${{ $cartitem->amount }}
          </div>
          <div class="form-inline">
            <!-- update quantity -->
            <form method="POST" action="/cartitem/{{ $cartitem->id }}">
              @method('PUT')
              @csrf
              <input type="text" class="form-control" name="quantity" value="{{ $cartitem->quantity }}">ps
              <button type="submit" class="btn btn-primary">update</button>
            </form>
            <!-- delete form  -->
            <form method="POST" action="/cartitem/{{ $cartitem->id }}">
              @method("DELETE")
              @csrf
              <button type="submit" class="btn btn-primary ml-1">remove</button>
            </form>
          </div>
        </div>
        @endforeach
      </div>
    </div>
    <div class="col-md-4">
      <div class="card">
        <div class="card-header">
          Total
        </div>
        <div class="card-body">
          <div>
            ${{ $subtotal }}
          </div>
          <div>
            <a class="btn btn-primary" href="/buy" role="button">Place your order</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</br>
<button type="button" class="btn btn-secondary" onclick="location.href='/items'">Back</button>
</div>
@endsection
