@extends('layouts.app_admin')
@include('navbar.navbar_admin')
@include('footer')
@include('common.errors')

@section('content')
<div class="container">
  <!-- バリデーションエラーの場合に表示 -->

  <form class="upload-images p-0 border-0" id="new_post" enctype="multipart/form-data" action="{{ url('admin/items/store')}}" accept-charset="UTF-8" method="POST">
    {{csrf_field()}}
    <div class="form-group">
      <label for="image">Item Image</label>
      <input type="file" name="item_image" id="image" accept="image/jpeg,image/gif,image/png">
    </div>
    <div class="form-group">
      <label for="name">Item Name</label>
      <input type="name" name="name" class="form-control" value="{{ old('name') }}" id="name" aria-describedby="emailHelp">
      @error('name')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
    </div>
    <div class="form-group">
      <label for="amount">Product Price</label>
      <input type="name" name="amount" class="form-control" value="{{ old('amount' ) }}" id="amount">
      @error('amount')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
    </div>
    <div class="form-group">
      <label for="quantity">Quantity</label>
      <input type="name" name="quantity" class="form-control" value="{{ old('quantity') }}" id="quantity">
      @error('quantity')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
    </div>
    <div class="form-group">
      <label for="case_volume">** If new Item is packed up, How many Packs per case? **</label>
      <select type="name" name="case_volume" class="form-control" value="{{ old('case_volume') }}" id="case_volume">
        <option value="">-</option>
        @for ($i = 1; $i < 101; $i++)
          <option value="{{ $i }}">{{ $i }} pc</option>
        @endfor
      </select>
      @error('case_volume')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
    </div>
    <div class="form-group">
      <label for="item_type">What is type of new Item?</label>
      <select type="name" name="item_type" class="form-control" value="{{ old('item_type') }}" id="item_type">
        <option value="Fresh">Fresh</option>
        <option value="Fresh">Super Frozen</option>
        <option value="SuperFrozen">Frozen</option>
        <option value="dry">Dry</option>
        <option value="others">Others</option>
      </select>
      @error('item_type')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
    </div>
    <div class="form-group">
      <label for="detail">Detail</label>
      <textarea type="text" name="detail" class="form-control" value="{{ old('detail') }}" id="detail"></textarea>
      @error('detail')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
@endsection
