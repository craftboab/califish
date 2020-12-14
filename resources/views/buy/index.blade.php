@extends('layouts.app')
@include('navbar.navbar')
@include('common.errors')
@include('footer')

@section('content')
<div class="col-md-offset-2 mb-4 edit-profile-wrapper">
  <div class="row">
    <div class="col-md-8 mx-auto">
      <div class="profile-form-wrap">
        <form class="edit_item" action="/buy/update/{{$cartitems}}" accept-charset="UTF-8" method="post">
          {{csrf_field()}}
          <div class="col-md-8">
            <div class="form-group">
              <label for="user_name">Name</label>
              <input autofocus="autofocus" id=user_name class="form-control" type="text" value="{{ old('user_name',$user->name) }}" name="user_name" />
            </div>

            <div class="form-group">
              <label for="email">Email</label>
              <input autofocus="autofocus" id=email class="form-control" type="text" value="{{ old('user_email',$user->email) }}" name="user_email" />
            </div>

            <div class="form-group">
              <label for="company_name">Company Name</label>
              <input autofocus="autofocus" id=company_name class="form-control" type="text" value="{{ old('company_name',$user->company_name) }}" name="company_name" />
            </div>

            <div class="form-group">
              <label for="sending_address">Sending Address</label>
              <input autofocus="autofocus" id=sending_address class="form-control" type="text" value="{{ old('sending_address',$user->company_address) }}" name="sending_address" />
            </div>

            <div class="form-group">
              <label for="company_contact">Company Contact</label>
              <input autofocus="autofocus" id=company_contact class="form-control" type="text" value="{{ old('company_contact',$user->company_contact) }}" name="company_contact" />
            </div>

            <div class="form-row">
               <div class="col-md-6">
                   <button type="submit" class="btn btn-primary" name="post">Proceed to checkout</button>
               </div>
            </div>
            <button type="button" class="btn btn-primary my-3" onclick="location.href='/cartitem'">Back</button>

          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    @foreach ($cartitems as $cartitem)
                        <div class="card-header">
                            {{ $cartitem->name }}
                        </div>
                        <div class="card-body">
                            <div>
                                {{ $cartitem->amount }}円
                            </div>
                            <div>
                                {{ $cartitem->quantity }}個
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
</div>
@endsection
