@extends('layouts.app')
@include('navbar.navbar')
@include('common.errors')
@include('footer')

@section('content')
<div class="container">
        <div class="row justify-content-center" style="margin-bottom:10px;">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        Thank you very much
                    </div>
                    <button type="button" class="btn btn-primary" onclick="location.href='/items'">Back</button>
                </div>
            </div>
        </div>
    </div>
@endsection
