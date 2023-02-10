@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        @if(session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
        @endif
        <div class="card">
            <div class="card-header">
                <h3>Edit Slider
                    <a href="{{ url('admin/sliders') }}" class="btn btn-sm text-white btn-primary float-end">Back</a>
                </h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <!-- <div class="col-md-12"> -->
                        <form action="{{ url('admin/sliders/'.$slider->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3 col-md-12">
                                <label for="">Title</label>
                                <input type="text" class="form-control" value="{{ $slider->title }}" name="title">
                            </div>
                            <div class="mb-3 col-md-12">
                                <label for="">Description</label>
                                <textarea class="form-control" name="description" rows="3">{{ $slider->description }}</textarea>
                            </div>
                            <div class="mb-3 col-md-12">
                                <label for="">Image</label>
                                <input type="file" class="form-control" name="image">
                                <img src='{{ asset("$slider->image") }}' alt="" style="width:70px;height:70px;">
                            </div>
                            <div class="mb-3 col-md-12">
                                <label for="" class="mb-3">Status</label><br>
                                <input type="checkbox" name="status" style="width:30px;height:30px" {{ $slider->status == true ? 'checked' : '' }}>
                            </div>
                            <div class="mb-3 col-md-6 offset-3">
                                <button type="submit" class="form-control btn text-white btn-info" name="submit">Save</button>
                            </div>
                        </form>
                    <!-- </div> -->
                </div>
            </div>
        </div>
    </div>
</div>

@endsection