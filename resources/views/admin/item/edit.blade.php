@extends('layouts.app_admin')
@include('navbar.navbar_admin')
@include('footer')
@include('common.errors')

@section('content')
<div class="col-md-offset-2 mb-4 edit-profile-wrapper">
  <div class="row">
    <div class="col-md-8 mx-auto">
      <div class="profile-form-wrap">
        <form class="edit_item" enctype="multipart/form-data" action="/admin/items/update/{{ $item->id }}" accept-charset="UTF-8" method="post">
          {{csrf_field()}}
          <input name="utf8" type="hidden" value="&#x2713;" />
          <input type="hidden" name="id" value="{{ $item->id }}" />
          <div class="form-group col-md-4 content-center">
            @if ($item->item_image)
            <img src="{{ asset('storage/item_images/' . $item->item_image) }}" class="round-img" alt="item image"/>
            @else
            <img src="{{ asset('/images/blank_profile.png') }}" class="round-img" alt="blank item image"/>
            @endif
            <input type="file" name="item_image" class="mt-3" value="{{ old('item_image',$item->item_image) }}" accept="image/jpeg,image/gif,image/png" />
          </div>

          <div class="col-md-8">
            <div class="form-group">
              <label for="item_name">Item Name</label>
              <input autofocus="autofocus" id=item_name class="form-control" type="text" value="{{ old('item_name',$item->name) }}" name="item_name" />
              @error('item_name')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
            <div class="form-group">
              <label for="item_amount">Item Price</label>
              <input autofocus="autofocus" id=item_amount class="form-control" type="text" value="{{ old('item_amount',$item->amount) }}" name="item_amount" />
              @error('item_amount')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
            <div class="form-group">
              <label for="item_quantity">Item Amount</label>
              <input autofocus="autofocus" id=item_quantity class="form-control" type="text" value="{{ old('item_quantity',$item->quantity) }}" name="item_quantity" />
              @error('item_quantity')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
            <div class="form-group">
              <label for="case_volume">Peace amounts per Case</label>
              <select autofocus="autofocus" id=case_volume class="form-control" type="name" value="{{ old('case_volume',$item->case_volume) }}" name="case_volume" />
                <option value="-">-</option>
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
              <label for="item_type">Item Type</label>
              <select autofocus="autofocus" id=item_type class="form-control" type="name" value="{{ old('item_type',$item->item_type) }}" name="item_type" >
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
              <label for="detail">Item Detail</label>
              <textarea autofocus="autofocus" id=detail class="form-control" rows="10" type="text" value="" name="detail">{{ old('detail',$item->detail) }}</textarea>
              @error('detail')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <input type="submit" name="commit" value="Done" class="btn btn-primary" data-disable-with="done" />
            <button type="button" class="btn btn-primary my-3" onclick="location.href='/admin/items/{{ $item->id }}'">Back</button>

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary mr-2 ml-auto" data-toggle="modal" data-target="#delete_item">
              Delete Item
            </button>

            <!-- Modal -->
            <div class="modal fade" id="delete_item" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    Are you sure to delete this Item?
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <button type="button" class="btn btn-primary" onclick="location.href='/admin/items/delete/{{ $item->id }}'">Delete Item</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
