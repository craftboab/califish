@extends('layouts.app')
@include('navbar.navbar')
@include('common.errors')
@include('footer')

@section('content')
<div class="container">
  <form class="edit_item" action="/users/password_confirmation/{{ $user->id }}" accept-charset="UTF-8" method="post">
    　{{csrf_field()}}

    <div class="form-group">
      <label for="new_password">New Password</label>
      <input autofocus="autofocus" class="form-control" type="password" id="new_password" name="new_password" />
    </div>

    <div class="form-group">
      <label for="new_password_confirmation">New Password Confirmation</label>
      <input autofocus="autofocus" class="form-control" type="password" id="new_password_confirmation" name="new_password_confirmation" required/>
    </div>

    <input type="submit" name="commit" value="Change Password" class="btn btn-primary" data-disable-with="Change Password" />
    <button type="button" class="btn btn-primary" onclick="history.back()">Back</button>
</form>
</div>

@endsection
