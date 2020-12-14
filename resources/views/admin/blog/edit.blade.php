@extends('layouts.app_admin')
@include('navbar.navbar_admin')
@include('footer')
@include('common.errors')

@section('content')
<div class="col-md-offset-2 mb-4 edit-profile-wrapper">
  <div class="row">
    <div class="col-md-8 mx-auto">
      <div class="profile-form-wrap">
        <form class="" enctype="multipart/form-data" action="/admin/blogs/update/{{ $blog->id}}" accept-charset="UTF-8" method="post">
          {{csrf_field()}}
          <input name="utf8" type="hidden" value="&#x2713;">
          <input name="id" type="hidden" value="{{ $blog->id}}">
          <div class="form-group col-md-4 content-center">
            @if ($blog->blog_image)
            <img src="{{ asset('storage/blog_images/' . $blog->blog_image) }}" class="round-img" alt="blog image"/>
            @else
            <p>No Image</p>
            @endif
            <input type="file" name="blog_image" class="mt-3" value="{{ old('blog_image',$blog->blog_image) }}" accept="image/jpeg,image/gif,image/png" />
          </div>
          <div class="col-md-8">
            <div class="form-group">
              <label for="title">Title</label>
              <input autofocus="autofocus" id=title class="form-control" type="text" value="{{ old('title',$blog->title) }}" name="title" />
              @error('title')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
            <div class="form-group">
              <label for="caption">Content</label>
              <textarea autofocus="autofocus" id=caption class="form-control" rows="10" type="text" value="" name="caption" />{{ old('caption',$blog->caption) }}</textarea>
              @error('caption')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>

            <input type="submit" name="commit" value="Update" class="btn btn-primary" data-disable-with="done" />
            <button type="button" class="btn btn-primary my-3" onclick="location.href='/admin/blogs/'">Back</button>

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary mr-2 ml-auto" data-toggle="modal" data-target="#delete_blog">
              Delete Blog
            </button>

            <!-- Modal -->
            <div class="modal fade" id="delete_blog" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    Are you sure to delete this Blog?
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <button type="button" class="btn btn-primary" onclick="location.href='/admin/blogs/delete/{{ $blog->id }}'">Delete </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
