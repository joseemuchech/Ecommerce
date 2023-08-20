@extends('layouts.app')

@section('title', 'Change Password')

@section('content')

<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
        <div class="col-md-10">
            @if (session('message'))
              <h5 class="alert alert-success">{{ session('message') }}</h5>
            @endif


            @if($errors->any())
            <ul class="alert alert-danger">
                @foreach ($errors->all() as $error )
                   <li class="text-danger">{{ $error }}</li>
                @endforeach
            </ul>
            @endif

                <div class="card shadow">
                    <div class="header bg-primary">
                        <h4 class="mb-3 p-2 text-white">
                            Change Password
                            <a href="{{ url('profile') }}" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('change_password') }}" method="POST">
                            @csrf
                            <div class="row">

                                    <div class="mb-3">
                                        <label for="">Current Password</label>
                                        <input type="password" name="current_password"  class="form-control" />
                                </div>

                                    <div class="mb-3">
                                        <label for="">New Password</label>
                                        <input type="password" name="password" class="form-control" />
                                    </div>


                                    <div class="mb-3">
                                        <label for="">Confirm Password</label>
                                        <input type="password" name="password_confirmation" class="form-control" />
                                    </div>

                                <div class="mb-3 text-end">
                                   <button type="submit" class="btn btn-primary">Update Password</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                 </div>
        </div>

        </div>
    </div>
  </div>

@endsection
