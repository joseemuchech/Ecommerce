@extends('layouts.app')

@section('title', 'User Profile')

@section('content')

<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h4>User Profile
                    <a href="{{ url('change_password') }}" class="btn btn-warning float-end">Change password</a>
                </h4>
                <div class="underline mb-3"></div>
            </div>
        <div class="col-md-10">
            @if (session('message'))
              <p class="alert alert-success">{{ session('message') }}</p>
            @endif


            @if($errors->any())
            <div class="alert alert-warning">
                @foreach ($errors->all() as $error )
                   <div>{{ $error }}</div>
                @endforeach
            </div>
            @endif

                <div class="card shadow">
                    <div class="header bg-primary">
                        <h4 class="mb-3 p-2 text-white">
                            User Details
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('profile') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="">Username</label>
                                        <input type="text" name="username" value="{{ Auth::user()->name }}" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="">Email Address</label>
                                        <input type="text"readonly name="email" value="{{ Auth::user()->email }}" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="">Phone Number</label>
                                        <input type="text" name="phone" value="{{ Auth::user()->userDetail->phone ?? '' }}" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="">Zip/pin Code</label>
                                        <input type="text" name="pin_code" value="{{ Auth::user()->userDetail->pin_code ?? '' }}" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="">Address</label>
                                        <textarea type="text" name="address" class="form-control" rows="3" >{{ Auth::user()->userDetail->address ?? '' }}</textarea>
                                    </div>
                                    </div>
                                <div class="col-md-12">
                                  <button type="submit" class="btn btn-primary float-end ">Save Data</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                 </div>

        </div>
    </div>
  </div>

@endsection
