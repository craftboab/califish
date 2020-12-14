@extends('layouts.app')
@include('navbar.navbar')
@include('common.errors')
@include('footer')

@section('content')
<div class="col-md-offset-2 mb-4 edit-profile-wrapper">
  <div class="row">
    <div class="col-md-8 mx-auto">
      <div class="profile-form-wrap">
        <form class="edit_user" enctype="multipart/form-data" action="/users/update/{{ $user->id }}" accept-charset="UTF-8" method="post">
          <input name="utf8" type="hidden" value="&#x2713;" />
          <input type="hidden" name="id" value="{{ $user->id }}" />
          {{csrf_field()}}
          <div class="form-group">
            <label for="user_image">プロフィール写真</label><br>
                @if ($user->user_image)
                    <p>
                        <img class="round-img" src="{{ asset('storage/user_images/' . $user->user_image) }}" alt="avatar" />
                    </p>
                @endif
            <input type="file" name="user_image"  value="{{ old('user_profile_photo',$user->id) }}" accept="image/jpeg,image/gif,image/png" />
          </div>

          <div class="form-group">
            <label for="user_name">name</label>
            <input autofocus="autofocus" class="form-control" type="text" value="{{ old('user_name',$user->name) }}" name="user_name" />
          </div>

          <div class="form-group">
            <label for="user_email">mail</label>
            <input autofocus="autofocus" class="form-control" type="email" value="{{ old('user_email',$user->email) }}" name="user_email" />
          </div>

          <div class="form-group">
              <label for="company_name">Company Name</label>
              <input autofocus="autofocus" id=company_name class="form-control" type="text" value="{{ old('company_name',$user->company_name) }}" name="company_name" />
            </div>

            <div class="form-group">
              <label for="company_address">Company Address</label>
              <input autofocus="autofocus" id=company_address class="form-control" type="text" value="{{ old('company_address',$user->company_address) }}" name="company_address" />
            </div>

            <div class="form-group">
              <label for="company_contact">Company Contact</label>
              <input autofocus="autofocus" id=company_contact class="form-control" type="text" value="{{ old('company_contact',$user->company_contact) }}" name="company_contact" />
            </div>

            <div class="form-group">
              <label for="company_web">Company Website URL</label>
              <input autofocus="autofocus" id=company_web class="form-control" type="text" value="{{ old('company_web',$user->company_web) }}" name="company_web" />
            </div>

            <div>
              <button type="button" class="btn btn-outline-primary mb-3" onclick="location.href='/users/password/{{ $user->id}}'">Change Password</button>
            </div>

          <input type="submit" name="commit" value="変更する" class="btn btn-primary" data-disable-with="変更する" />
          <button type="button" class="btn btn-primary" onclick="history.back()">Back</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
