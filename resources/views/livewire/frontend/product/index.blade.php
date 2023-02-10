<div>
    <div class="row">
        <div class="col-md-3">
            @if($category->brands)
                <div class="card">
                    <div class="card-header">
                        <h4>Brands</h4>
                    </div>
                    <div class="card-body">
                        @foreach($category->brands as $brandItem)
                            <label for="" class="d-block">
                                <input type="checkbox" wire:model="brandInputs" value="{{ $brandItem->name }}">&nbsp;{{ $brandItem->name }}
                            </label>
                        @endforeach
                    </div>
                </div>
            @endif

            <div class="card mt-3">
                <div class="card-header">
                    <h4>Price</h4>
                </div>
                <div class="card-body">
                    <label for="" class="d-block">
                        <input name="priceSort" value="high-to-low" type="radio" wire:model="priceInputs" >&nbsp;High To Low
                    </label>
                    <label for="" class="d-block">
                        <input name="priceSort" value="low-to-high" type="radio" wire:model="priceInputs" >&nbsp;Low To High
                    </label>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="row">
                @forelse($products as $product)
                <div class="col-md-4">
                    <div class="product-card">
                        <div class="product-card-img">
                            @if($product->quantity > 0)
                            <label class="stock bg-success">In Stock</label>
                            @else
                            <label class="stock bg-danger">Out Of Stock</label>
                            @endif

                            @if($product->productImages->count() > 0)
                            <a href="{{ url('/collections/'.$product->category->slug.'/'.$product->slug) }}">
                                <img src='{{ asset($product->productImages[0]->image) }}' alt="{{ $product->name }}">
                            </a>
                            @endif
                        </div>
                        <div class="product-card-body">
                            <p class="product-brand">{{ $product->brand }}</p>
                            <h5 class="product-name">
                                <a href="{{ url('/collections/'.$product->category->slug.'/'.$product->slug) }}">
                                    {{ $product->name }}
                                </a>
                            </h5>
                            <div>
                                <span class="selling-price">&#8377;{{ $product->selling_price }}</span>
                                <span class="original-price">&#8377;{{ $product->original_price }}</span>
                            </div>
                            <!-- <div class="mt-2">
                                        <a href="" class="btn btn1">Add To Cart</a>
                                        <a href="" class="btn btn1"> <i class="fa fa-heart"></i> </a>
                                        <a href="" class="btn btn1"> View </a>
                                    </div> -->
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-md-12">
                    <div class="p-2">
                        <h4>No Product Available {{ $category->name }}</h4>
                    </div>
                </div>
                @endforelse
            </div>
        </div>
    </div>
</div>