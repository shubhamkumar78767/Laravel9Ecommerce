@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Add Category
                    <a href="{{ url('admin/category') }}" class="btn btn-sm text-white btn-primary float-end">Back</a>
                </h3>
            </div>
            <div class="card-body">
                <form action="{{ url('admin/category') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="mb-1 fw-semibold" for="">Name</label>
                            <input type="text" class="form-control" name="name">
                            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="mb-1 fw-semibold" for="">Slug</label>
                            <input type="text" class="form-control" name="slug">
                            @error('slug') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="mb-1 fw-semibold" for="">Description</label>
                            <textarea name="description" class="form-control" rows="3"></textarea>
                            @error('description') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="mb-1 fw-semibold" for="">Image</label>
                            <input type="file" class="form-control" name="image">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="mb-1 fw-semibold" for="">Status</label><br>
                            <input type="checkbox"  name="status" style="width:30px;height:30px;">
                        </div>
                        <div class="col-md-12 mb-3">
                            <h4>SEO Tags</h4>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="mb-1 fw-semibold" for="">Meta Title</label>
                            <input type="text" class="form-control" name="meta_title">
                            @error('meta_title') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="mb-1 fw-semibold" for="">Meta Keyword</label>
                            <textarea class="form-control" name="meta_keyword" rows="3"></textarea>
                            @error('meta_keyword') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="mb-1 fw-semibold" for="">Meta Description</label>
                            <textarea class="form-control" name="meta_description" rows="3"></textarea>
                            @error('meta_description') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="col-md-4 offset-4 mb-3">
                            <button type="submit" class="form-control btn btn-primary text-white">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection