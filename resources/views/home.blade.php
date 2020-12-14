@extends('layouts.app')
@include('navbar.navbar')
@include('footer')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Welcome back {{ Auth::user()->name }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                      <button type="button" class="btn btn-secondary" onclick="location.href='/items/'">shopping</button>
                    </div>
                </div>
            </div>
            <div class="py-5">
              <button type="button" class="btn btn-secondary" onclick="location.href='/'">Back to top page</button>
            </div>
        </div>
    </div>
</div>
@endsection
