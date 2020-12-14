@extends('layouts.app_admin')
@include('navbar.navbar_admin')
@include('footer')

@section('content')
<div class="container">
  <!-- バリデーションエラーの場合に表示 -->
@include('common.errors')
  <form class="upload-images p-0 border-0" id="new_post" enctype="multipart/form-data" action="{{ url('admin/users/store')}}" accept-charset="UTF-8" method="POST">
    {{csrf_field()}}
    <div class="form-group">
      <label for="image">Example file input</label>
      <input type="file" name="user_image" id="image" accept="image/jpeg,image/gif,image/png">
    </div>
    <div class="form-group">
      <label for="name">Name</label>
      <input type="name" name="name" class="form-control" value="{{ old('name') }}" id="name">
      @error('name')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
    </div>
    <div class="form-group">
      <label for="email">Email address</label>
      <input type="email" name="email" class="form-control" value="{{ old('email' ) }}" id="email" aria-describedby="emailHelp">
      @error('email')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>

    <div class="form-group">
      <label for="company_name">Company Name</label>
      <input type="name" name="company_name" class="form-control" value="{{ old('company_name') }}" id="company_name">
      @error('company_name')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
    </div>
    <div class="form-group">
      <label for="company_address">Company Address</label>
      <input type="name" name="company_address" class="form-control" value="{{ old('company_address') }}" id="company_address">
      @error('company_address')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
    </div>
    <div class="form-group">
      <label for="company_contact">Company Contact</label>
      <input type="name" name="company_contact" class="form-control" value="{{ old('compny_contact') }}" id="company_contact">
      @error('company_contact')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
    </div>
    <div class="form-group">
      <label for="company_web">Company Website</label>
      <input type="name" name="company_web" class="form-control" value="{{ old('compny_web') }}" id="company_web">
      @error('company_web')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
    </div>

    <div class="form-group">
      <label for="exampleInputPassword1">Password</label>
      <input type="password" name="password" class="form-control">
    </div>
        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
    <div class="form-group">
      <input class="form-control" placeholder="Comfirm Password" autocomplete="off" type="password" name="password_confirmation" required>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
@endsection
