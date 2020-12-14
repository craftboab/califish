@extends('layouts.app_admin')
@include('navbar.navbar_admin')
@include('footer')
@include('common.errors')

@section('content')
<div class="col-md-offset-2 mb-4 edit-profile-wrapper">
  <div class="row">
    <div class="col-md-8 mx-auto">
      <div class="profile-form-wrap">
        <form class="edit_item" enctype="multipart/form-data" action="/admin/users/update/{{ $user->id }}" accept-charset="UTF-8" method="post">
          {{csrf_field()}}
          <input name="utf8" type="hidden" value="&#x2713;" />
          <input type="hidden" name="id" value="{{ $user->id }}" />
          <div class="form-group col-md-4 content-center">
            @if ($user->user_image)
            <img src="{{ asset('storage/user_images/' . $user->user_image) }}" class="round-img" alt="user image"/>
            @else
            <img src="{{ asset('/images/blank_profile.png') }}" class="round-img" alt="blank user image"/>
            @endif
            <input type="file" name="user_image" class="mt-3" value="{{ old('user_image',$user->id) }}" accept="image/jpeg,image/gif,image/png" />
          </div>

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

            <input type="submit" name="commit" value="Done" class="btn btn-primary" data-disable-with="done" />
            <button type="button" class="btn btn-primary my-3" onclick="location.href='/admin/users/{{ $user->id }}'">Back</button>

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary mr-2 ml-auto" data-toggle="modal" data-target="#delete_user">
              Delete User
            </button>

            <!-- Modal -->
            <div class="modal fade" id="delete_user" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    Are you sure to delete this user?
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <button type="button" class="btn btn-primary" onclick="location.href='/admin/users/delete/{{ $user->id }}'">Delete User</button>
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
