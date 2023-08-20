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
                <h4>Edit Slider
                    <a href="{{ url('admin/sliders') }}" class="btn btn-danger text-white float-end">
                    Back
                </a>
                </h4>
            </div>
            <div class="card-body">
                <form action="{{ url('admin/sliders/'.$slider->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="">Title</label>
                        <input type="text" name="title" value="{{ $slider->title }}" class="form-control"/>
                    </div>
                    <div class="mb-3">
                        <label for="">Description</label>
                        <textarea type="text" name="description" rows="3" class="form-control">{{ $slider->description }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="">Image</label>
                        <input type="file" name="image" class="form-control"/>
                        <img src="{{ asset("$slider->image") }}" style="width: 50px; height:50px;" alt="Img">
                    </div>
                    <div class="mb-3">
                        <label for="">Status</label><br/>
                        <input type="checkbox" name="status" {{ $slider->status == '1' ? 'checked':'' }}  style="width: 20px; height:20px;"/> Checked=Hidden, Unchecked=Visible
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary text-white float-end">Update</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

@endsection


