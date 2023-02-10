@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Edit Products
                    <a href="{{ url('admin/products') }}" class="btn btn-sm text-white btn-primary float-end">Back</a>
                </h3>
            </div>
            <div class="card-body">
                @if(session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
                @endif

                @if($errors->any())
                <div class="alert alert-warning">
                    <div>Fill All The Required Fileds</div>
                </div>
                @endif
                <form action="{{url('admin/products/'.$product->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
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
                            <button class="nav-link" id="colors-tab" data-bs-toggle="tab" data-bs-target="#colors-tab-pane" type="button" role="tab" aria-controls="colors-tab-pane" aria-selected="false">Products Colors</button>
                        </li>
                    </ul>
                    <div class="tab-content pt-2" id="myTabContent">
                        <div class="tab-pane fade border p-4 show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                            <div class="mb-3">
                                <label class="mb-1" for="">Category</label>
                                <select name="category_id" class="form-select">
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="mb-1" for="">Product Name</label>
                                <input type="text" class="form-control" name="name" value="{{ $product->name }}">
                            </div>
                            <div class="mb-3">
                                <label class="mb-1" for="">Product Slug</label>
                                <input type="text" class="form-control" name="slug" value="{{ $product->slug }}">
                            </div>
                            <div class="mb-3">
                                <label class="mb-1" for="">Brands</label>
                                <select name="brand" class="form-select">
                                    @foreach($brands as $brand)
                                    <option value="{{ $brand->name }}" {{ $brand->name == $product->brand ? 'selected' : '' }}>
                                        {{ $brand->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="mb-1" for="">Small Description</label>
                                <textarea name="small_description" class="form-control" rows="4">{{ $product->small_description }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label class="mb-1" for="">Description</label>
                                <textarea name="description" class="form-control" rows="4">{{ $product->description }}</textarea>
                            </div>
                        </div>
                        <div class="tab-pane fade border p-4" id="seotag-tab-pane" role="tabpanel" aria-labelledby="seotag-tab" tabindex="0">
                            <div class="mb-3">
                                <label class="mb-1" for="">Meta Title</label>
                                <input type="text" class="form-control" name="meta_title" value="{{ $product->description }}">
                            </div>
                            <div class="mb-3">
                                <label class="mb-1" for="">Meta Description</label>
                                <textarea name="meta_description" class="form-control" rows="4">{{ $product->meta_description }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label class="mb-1" for="">Meta Keyword</label>
                                <textarea name="meta_keyword" class="form-control" rows="4">{{ $product->meta_keyword }}</textarea>
                            </div>
                        </div>
                        <div class="tab-pane fade border p-4" id="details-tab-pane" role="tabpanel" aria-labelledby="details-tab" tabindex="0">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="mb-1" for="">Original Price</label>
                                        <input type="text" class="form-control" name="original_price" value="{{ $product->original_price }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="mb-1" for="">Selling Price</label>
                                        <input type="text" class="form-control" name="selling_price" value="{{ $product->selling_price }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="mb-1" for="">Quantity</label>
                                        <input type="number" class="form-control" name="quantity" value="{{ $product->quantity }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="mb-1" for="">Trending</label><br>
                                        <input type="checkbox" name="trending" style="width:30px;height:30px;" {{ $product->trending == 1 ? 'checked' : '' }}>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="mb-1" for="">Featured</label><br>
                                        <input type="checkbox" name="featured" style="width:30px;height:30px;" {{ $product->featured == 1 ? 'checked' : '' }}>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="mb-1" for="">Status</label><br>
                                        <input type="checkbox" name="status" style="width:30px;height:30px;" {{ $product->status == 1 ? 'checked' : '' }}>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="tab-pane fade border p-4" id="image-tab-pane" role="tabpanel" aria-labelledby="image-tab" tabindex="0">
                            <div class="mb-3">
                                <label class="mb-1" for="">Uploads Image Product</label>
                                <input type="file" name="image[]" class="form-control" multiple>
                            </div>
                            <div>
                                @if($product->productImages)
                                <div class="row">
                                    @foreach($product->productImages as $image)
                                    <div class="col-md-1">
                                        <img src="{{ asset($image->image) }}" alt="" style="width:100px;height:100px;" class="me-4 border">
                                        <a href="{{ url('admin/product-image/'.$image->id.'/delete') }}" class="d-block text-center">Remove</a>
                                    </div>
                                    @endforeach
                                </div>

                                @else
                                <h5>This Product Doesn't Have Any Image</h5>
                                @endif
                            </div>
                        </div>
                        <div class="tab-pane fade border p-4" id="colors-tab-pane" role="tabpanel" aria-labelledby="colors-tab" tabindex="0">
                            <div class="mb-3">
                                <h4>Add Product Color</h4>
                                <label class="mb-3" for="">
                                    <h5>Select Color</h5>
                                </label>
                                <hr />
                                <div class="row">
                                    @forelse($colors as $color)
                                    <div class="col-md-3">
                                        <div class="p-2 border mb-3">
                                            <strong>Color: </strong>{{ $color->name }}
                                            <input type="checkbox"  class="mb-2" name="colors[{{ $color->id }}]" value="{{ $color->id }}"><br>
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
                            <div class="table-responsive">
                                <table class="table table-bordered table-sm">
                                    <thead>
                                        <tr>
                                            <th>Color Name</th>
                                            <th>Quantity</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($product->productColors as $productColor)
                                        <tr class="product-color-tr">
                                            <td>
                                                @if($productColor->color)
                                                {{ $productColor->color->name }}
                                                @else
                                                No Color Found
                                                @endif
                                            </td>
                                            <td>
                                                <div class="input-group mb-3" style="width:150px;">
                                                    <input type="number" value="{{ $productColor->quantity }}" class="productColorQuantity form-control form-control-sm" min="1">
                                                    <button type="button" value="{{ $productColor->id }}" class="updateProductColorBtn btn btn-sm btn-primary text-white">Update</button>
                                                </div>
                                            </td>
                                            <td>
                                                <button type="button" value="{{ $productColor->id }}" class="deleteProductColorBtn btn btn-sm btn-danger text-white">Delete</button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3 col-md-6 offset-3">
                        <button type="submit" class="form-control btn btn-info text-white">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    $(document).ready(function() {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).on('click', '.updateProductColorBtn', function() {
            var product_color_id = $(this).val();
            var product_id = "{{ $product->id }}";
            var qty = $(this).closest('.product-color-tr').find('.productColorQuantity').val();

            if (qty <= 0) {
                alert("Quantity is required");
                return false;
            }

            var data = {
                'product_id': product_id,
                'quantity': qty
            };

            $.ajax({
                type: "POST",
                url: "/admin/product-color/" + product_color_id,
                data: data,
                success: function(response) {
                    alert(response.message);
                }
            });
        });


        $(document).on('click', '.deleteProductColorBtn', function() {

            var product_color_id = $(this).val();
            var thiss = $(this);

            $.ajax({
                type: "GET",
                url: "/admin/product-color/" + product_color_id + "/delete",
                success: function(response) {
                    thiss.closest('.product-color-tr').remove();
                    alert(response.message);
                }
            });
        });

    });
</script>
@endsection