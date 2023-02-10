<div>
    <div class="py-3 py-md-5 bg-light">
        <div class="container">
            <h4>My Cart</h4>
            <hr/>
            <div class="row">
                <div class="col-md-12">
                    <div class="shopping-cart">

                        <div class="cart-header d-none d-sm-none d-mb-block d-lg-block">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4>Products</h4>
                                </div>
                                <div class="col-md-1">
                                    <h4>Price</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4>Quantity</h4>
                                </div>
                                <div class="col-md-1">
                                    <h4>Total</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4>Remove</h4>
                                </div>
                            </div>
                        </div>

                        @forelse($carts as $cart)
                            @if($cart->product)
                                <div class="cart-item">
                                    <div class="row">
                                        <div class="col-md-6 my-auto">
                                            <a href="{{ url('collections/'.$cart->product->category->slug.'/'.$cart->product->slug) }}">
                                                <label class="product-name">
                                                    @if($cart->product->productImages)
                                                        <img src="{{ asset($cart->product->productImages[0]->image) }}" style="width: 50px; height: 50px" alt="">
                                                    @endif
                                                    {{ $cart->product->name }}
                                                    @if($cart->productColor)

                                                        @if($cart->productColor->color)
                                                            <span>- Color: {{ $cart->productColor->color->name }}</span>
                                                        @endif
                                                    @endif
                                                </label>
                                            </a>
                                        </div>
                                        <div class="col-md-1 my-auto">
                                            <label class="price">{{ $cart->product->selling_price }} </label>
                                        </div>
                                        <div class="col-md-2 col-7 my-auto">
                                            <div class="quantity">
                                                <div class="input-group">
                                                    <button type="button" wire:loading.attr="disabled" wire:click=" decrementQuantity({{ $cart->id }})" class="btn btn1"><i class="fa fa-minus"></i></button>
                                                    <input type="text" value="{{ $cart->quantity }}" class="input-quantity" />
                                                    <button type="button" wire:loading.attr="disabled" wire:click=" incrementQuantity({{ $cart->id }})" class="btn btn1"><i class="fa fa-plus"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-1 my-auto">
                                            <label class="price">{{ $cart->product->selling_price * $cart->quantity }} </label>

                                            @php $totalPrice += $cart->product->selling_price * $cart->quantity;  @endphp
                                            
                                        </div>
                                        <div class="col-md-2 col-5 my-auto">
                                            <div class="remove">
                                                <button type="button" wire:loading.attr="disabled" wire:click="removeCartItem({{ $cart->id }})" class="btn btn-danger btn-sm">
                                                    <span wire:loading.remove wire:target="removeCartItem({{ $cart->id }})">
                                                        <i class="fa fa-trash"></i> Remove
                                                    </span>
                                                    <span wire:loading wire:target="removeCartItem({{ $cart->id }})">
                                                        <i class="fa fa-trash"></i> Removing
                                                    </span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @empty
                            <div>No Cart Item Available</div>
                        @endforelse
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-8 my-md-auto mt-3">
                    <h5>
                        Get the best deal & offers <a href="{{ url('/collections') }}">Shop Now</a>
                    </h5>
                </div>
                <div class="col-md-4 mt-3">
                    <div class="shadow-sm bg-white p-3">
                        <h4>Total:
                            <span class="float-end">&#8377;{{ $totalPrice }}</span>
                        </h4>
                        <hr>
                        <a href="{{ url('/checkout') }}" class="btn btn-warning w-100">Checkout</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
