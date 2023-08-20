@extends('layouts.app')

@section('title', 'Thank You for shopping')

@section('content')

<div class="py-3 pt-md-4">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                @if (session('message'))
                  <h5 class="alert alert-success">{{ session('message') }}</h5>
                @endif
                <div class="p-4 shadow bg-white">
                  <h2></h2>
                  <h3 style="color:green">Thank You for Shopping With Us.</h3>
                  <a href="{{ url('collections') }}" class="btn btn-primary">Shop now</a>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
