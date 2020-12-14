@extends('layouts.app')
@include('navbar.navbar')
@include('footer')

@section('content')
    <div class="">
      <div class="row">
        <div class="col-md-2">
          <p class="container py-5">oh my got<br>
            oh yeah<br>
          </p>
        </div>
        <div class="col-md-8">
          <div class="flex-center position-ref full-height pic_main">
              <div class="content">
                  <div class="title m-b-md">
                      California Fish
                  </div>
                  @guest
                    <button type=“button” class="btn btn-secondary" onclick="location.href='/items'">Item List</button>
                  @else
                    <button type=“button” class="btn btn-secondary" onclick="location.href='/items'">Go to Shopping</button>
                  @endguest
              </div>
          </div>
        </div>
        <div class="col-md-2">
        </div>
      </div>
    </div>
@endsection
