@extends('layouts.admin')

@section('title', 'Edit User')


@section('content')
<div class="row">
    <div class="col-md-12">
        @if (session('message'))
        <div class="alert alert-success">
             {{ session('message') }}
        </div>
        @endif
        <div class="card">
            <div class="card-header">
                <h4> Edit Users
                    <a href="{{ url('admin/users') }}" class="btn btn-danger text-white float-end">
                    Back
                </a>
                </h4>
            </div>
            <div class="card-body">

                @if($errors->any())
                <div class="alert alert-warning">
                    @foreach ($errors->all() as $error )
                       <div>{{ $error }}</div>
                    @endforeach
                </div>
                @endif

                <form action="{{ url('admin/users/'.$user->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="">Name</label>
                            <input type="text" name="name" value="{{ $user->name  }}" class="form-control" />
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Email</label>
                            <input type="text" name="email"  value="{{ $user->email  }}"  class="form-control" />
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Password</label>
                            <input type="text" name="password" class="form-control" />
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Select Role</label>
                            <select name="role_as" class="form-control">
                                   <option value="">Select Role</option>
                                   <option value="0" {{ $user->role_as == '0' ? 'selected':'' }}>User</option>
                                   <option value="1" {{ $user->role_as == '1' ? 'selected':'' }}>Admin</option>
                            </select>
                        </div>
                        <div class="col-md-12 text-end">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>

                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
 @endsection
