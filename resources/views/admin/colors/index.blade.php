@extends('layouts.admin')

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
                <h4>Colors List
                    <a href="{{ url('admin/colors/create') }}" class="btn btn-primary text-white float-end">
                    Add Color
                </a>
                </h4>
            </div>
            <div class="card-body">
                <table class="table table-border table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Color Name</th>
                            <th>Color Code</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($colors as $color )
                        <tr>
                            <td>{{ $color->id }}</td>
                            <td>{{ $color->name }}</td>
                            <td>{{ $color->code }}</td>
                            <td>{{ $color->status ? 'Hidden':'Visible' }}</td>
                            <td>
                                <a href="{{ url('admin/colors/'.$color->id.'/edit') }}" class="btn btn-sm btn-success">Edit</a>
                                <a href="{{ url('admin/colors/'.$color->id.'/delete') }}" onclick="return confirm('Are you sure,you want to delete this data?')" class="btn btn-sm btn-danger">Delete</a>

                            </td>

                        </tr>
                        @empty
                        <tr>
                            <td colspan="5">No Color Found!</td>
                        </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection


