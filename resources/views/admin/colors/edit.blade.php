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
                <h3>Edit Color
                    <a href="{{ url('admin/colors') }}" class="btn btn-sm text-white btn-primary float-end">Back</a>
                </h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <form action="{{ url('admin/colors/'.$color->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3 col-md-4">
                            <label for="">Color Name</label>
                            <input type="text" class="form-control" value="{{ $color->name }}" name="name">
                            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="mb-3 col-md-4">
                            <label for="">Color Code</label>
                            <input type="text" class="form-control" name="code" value="{{ $color->code }}">
                            @error('code') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="mb-3 col-md-4">
                            <label for="" class="mb-3">Status</label><br>
                            <input type="checkbox" name="status" style="width:30px;height:30px" {{ $color->status == 1 ? 'checked': '' }}>
                        </div>
                        <div class="mb-3 col-md-6 offset-3">
                            <button type="submit" class="form-control btn  text-white btn-info" name="submit">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection