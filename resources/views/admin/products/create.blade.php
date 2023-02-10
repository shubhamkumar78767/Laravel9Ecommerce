@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Add Products
                    <a href="{{ url('admin/products') }}" class="btn btn-sm text-white btn-primary float-end">Back</a>
                </h3>
            </div>
            <div class="card-body">
                @if($errors->any())
                <div class="alert alert-warning">
                    <div>Fill All The Required Fileds</div>
                </div>
                @endif
                <form action="{{url('admin/products')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Home</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="seotag-tab" data-bs-toggle="tab" data-bs-target="#seotag-tab-pane" type="button" role="tab" aria-controls="seotag-tab-pane" aria-selected="false">SEO Tags</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="details-tab" data-bs-toggle="tab" data-bs-target="#details-tab-pane" type="button" role="tab" aria-controls="details-tab-pane" aria-selected="false">Details</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="image-tab" data-bs-toggle="tab" data-bs-target="#image-tab-pane" type="button" role="tab" aria-controls="image-tab-pane" aria-selected="false">Product Image</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="color-tab" data-bs-toggle="tab" data-bs-target="#color-tab-pane" type="button" role="tab" aria-controls="color-tab-pane" aria-selected="false">Product Color</button>
                        </li>
                    </ul>
                    <div class="tab-content pt-2" id="myTabContent">
                        <div class="tab-pane fade border p-4 show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                            <div class="mb-3">
                                <label class="fw-semibold mb-1" for="">Category</label>
                                <select name="category_id" class="form-select">
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                            <div class="mb-3">
                                <label class="fw-semibold mb-1" for="">Product Name</label>
                                <input type="text" class="form-control" name="name">
                                @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                            <div class="mb-3">
                                <label class="fw-semibold mb-1" for="">Product Slug</label>
                                <input type="text" class="form-control" name="slug">
                                @error('slug') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                            <div class="mb-3">
                                <label class="fw-semibold mb-1" for="">Brands</label>
                                <select name="brand" class="form-select">
                                    @foreach($brands as $brand)
                                    <option value="{{ $brand->name }}">{{ $brand->name }}</option>
                                    @endforeach
                                </select>
                                @error('brand') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                            <div class="mb-3">
                                <label class="fw-semibold mb-1" for="">Small Description</label>
                                <textarea name="small_description" class="form-control" rows="4"></textarea>
                                @error('small_description') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                            <div class="mb-3">
                                <label class="fw-semibold mb-1" for="">Description</label>
                                <textarea name="description" class="form-control" rows="4"></textarea>
                                @error('description') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                        </div>
                        <div class="tab-pane fade border p-4" id="seotag-tab-pane" role="tabpanel" aria-labelledby="seotag-tab" tabindex="0">
                            <div class="mb-3">
                                <label class="fw-semibold mb-1" for="">Meta Title</label>
                                <input type="text" class="form-control" name="meta_title">
                                @error('meta_title') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                            <div class="mb-3">
                                <label class="fw-semibold mb-1" for="">Meta Description</label>
                                <textarea name="meta_description" class="form-control" rows="4"></textarea>
                                @error('meta_description') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                            <div class="mb-3">
                                <label class="fw-semibold mb-1" for="">Meta Keyword</label>
                                <textarea name="meta_keyword" class="form-control" rows="4"></textarea>
                                @error('meta_keyword') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                        </div>
                        <div class="tab-pane fade border p-4" id="details-tab-pane" role="tabpanel" aria-labelledby="details-tab" tabindex="0">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="fw-semibold mb-1" for="">Original Price</label>
                                        <input type="text" class="form-control" name="original_price">
                                        @error('original_price') <small class="text-danger">{{ $message }}</small> @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="fw-semibold mb-1" for="">Selling Price</label>
                                        <input type="text" class="form-control" name="selling_price">
                                        @error('selling_price') <small class="text-danger">{{ $message }}</small> @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="fw-semibold mb-1" for="">Quantity</label>
                                        <input type="number" class="form-control" name="quantity">
                                        @error('quantity') <small class="text-danger">{{ $message }}</small> @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="fw-semibold mb-1" for="">Trending</label><br>
                                        <input type="checkbox" name="trending" style="width:30px;height:30px;">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="fw-semibold mb-1" for="">Featured</label><br>
                                        <input type="checkbox" name="featured" style="width:30px;height:30px;">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="fw-semibold mb-1" for="">Status</label><br>
                                        <input type="checkbox" name="status" style="width:30px;height:30px;">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="tab-pane fade border p-4" id="image-tab-pane" role="tabpanel" aria-labelledby="image-tab" tabindex="0">
                            <div class="mb-3">
                                <label class="fw-semibold mb-1" for="">Uploads Image Product</label>
                                <input type="file" name="image[]" class="form-control" multiple>
                            </div>
                        </div>
                        <div class="tab-pane fade border p-4" id="color-tab-pane" role="tabpanel" aria-labelledby="color-tab" tabindex="0">
                            <div class="mb-3">
                                <label class="fw-semibold mb-3" for="">
                                    <h5>Select Color</h5>
                                </label>
                                <hr />
                                <div class="row">
                                    @forelse($colors as $color)
                                    <div class="col-md-3">
                                        <div class="p-2 border mb-3">
                                            <strong>Color: </strong>{{ $color->name }} 
                                            <input type="checkbox" name="colors[{{ $color->id }}]" value="{{ $color->id }}"> <br>
                                            <strong>Quantity: </strong>: <input type="number" name="colorquantity[{{ $color->id }}]" style="width:70px;border:1px solid;">
                                        </div>
                                    </div>
                                    @empty
                                    <div class="col-md-12">
                                        <h1>No Color Found</h1>
                                    </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="mt-3 col-md-6 offset-3">
                        <button type="submit" class="form-control btn btn-primary text-white">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection