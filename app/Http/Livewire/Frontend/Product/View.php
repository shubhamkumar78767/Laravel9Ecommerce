<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Models\Cart;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class View extends Component
{
    public $category, $product, $productColorSelectedQuantity, $quantityCount = 1, $productColorId;

    public function mount($category, $product)
    {
        $this->category = $category;
        $this->product = $product;
    }

    public function render()
    {
        return view('livewire.frontend.product.view', [
            'category' => $this->category,
            'product' => $this->product,
        ]);
    }

    public function colorSelected($productColorId)
    {
        $this->productColorId = $productColorId;
        $productColor = $this->product->productColors()->where('id', $productColorId)->first();
        $this->productColorSelectedQuantity = $productColor->quantity;

        if ($this->productColorSelectedQuantity == 0) {
            $this->productColorSelectedQuantity = "outofstock";
        }
    }

    public function addToWishList($productId)
    {
        if (Auth::check()) {
            $userId = auth()->user()->id;

            if (Wishlist::where('user_id', $userId)->where('product_id', $productId)->exists()) {
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Already Added To WishList',
                    'type' => 'error',
                    'status' => 409,
                ]);
                return false;
            } else {
                Wishlist::create([
                    'user_id' => $userId,
                    'product_id' => $productId,
                ]);

                $this->emit('wishlistUpdated');

                $this->dispatchBrowserEvent('message', [
                    'text' => 'Added To WishList Successfully',
                    'type' => 'success',
                    'status' => 200,
                ]);
            }

        } else {

            $this->dispatchBrowserEvent('message', [
                'text' => 'Please Login To Continue',
                'type' => 'error',
                'status' => 401,
            ]);
            return false;
        }
    }

    public function addToCart(int $productId)
    {
        if (Auth::check()) { //Check User is login or Not
            if ($this->product->where('id', $productId)->where('status', 1)->exists()) { //Check Product exist or not

                if ($this->product->productColors()->count() > 1) { //Check Product Contain Color Or Not

                    if ($this->productColorSelectedQuantity != null) { //Check Product Color Is Select or Not

                        if (Cart::where('user_id', auth()->user()->id)
                            ->where('product_id', $productId)
                            ->where('product_color_id', $this->productColorId)
                            ->exists()) { //Check Product is Already in Cart or Not

                            $this->dispatchBrowserEvent('message', [
                                'text' => 'Product Already Added',
                                'type' => 'warning',
                                'status' => 404,
                            ]);

                        } else {

                            $productColor = $this->product->productColors()->where('id', $this->productColorId)->first();

                            if ($productColor->quantity > 0) { //Check Selected Color Quantity

                                if ($productColor->quantity > $this->quantityCount) { //Check User want quanity is not Greater Than Avialble Quantity

                                    Cart::create([
                                        'user_id' => auth()->user()->id,
                                        'product_id' => $productId,
                                        'product_color_id' => $this->productColorId,
                                        'quantity' => $this->quantityCount,
                                    ]);

                                    $this->emit('CartUpdated');

                                    $this->dispatchBrowserEvent('message', [
                                        'text' => 'Product Added  To  Cart',
                                        'type' => 'success',
                                        'status' => 200,
                                    ]);
                                } else { //When User Want Quantity More Than  Availbale Quantity

                                    $this->dispatchBrowserEvent('message', [
                                        'text' => 'Only ' . $productColor->quantity . ' Quantity Available',
                                        'type' => 'warning',
                                        'status' => 404,
                                    ]);
                                }
                            } else { //When Selected Color Out of Stock

                                $this->dispatchBrowserEvent('message', [
                                    'text' => 'Out of Stock',
                                    'type' => 'info',
                                    'status' => 404,
                                ]);
                            }
                        }
                    } else { //When User Not Select The Color OF Product

                        $this->dispatchBrowserEvent('message', [
                            'text' => 'Select Your Product Color',
                            'type' => 'info',
                            'status' => 404,
                        ]);
                    }
                } else { //When Product Does Not Contain Any Color

                    if (Cart::where('user_id', auth()->user()->id)->where('product_id', $productId)->exists()) { //Check Product Already Exist or Not

                        $this->dispatchBrowserEvent('message', [
                            'text' => 'Product Already Added',
                            'type' => 'warning',
                            'status' => 404,
                        ]);

                    } else {

                        if ($this->product->quantity > 0) { //Check Product Quantity

                            if ($this->product->quantity > $this->quantityCount) { //Check User Want Quantity is Not Greater Than Available Quantity

                                Cart::create([
                                    'user_id' => auth()->user()->id,
                                    'product_id' => $productId,
                                    'quantity' => $this->quantityCount,
                                ]);

                                $this->emit('CartUpdated');

                                $this->dispatchBrowserEvent('message', [
                                    'text' => 'Product Added  To  Cart',
                                    'type' => 'success',
                                    'status' => 200,
                                ]);
                            } else { //When User Want More Than Available Quantity

                                $this->dispatchBrowserEvent('message', [
                                    'text' => 'Only ' . $this->product->quantity . ' Quantity Available',
                                    'type' => 'warning',
                                    'status' => 404,
                                ]);
                            }
                        } else { //Out of Stock Product

                            $this->dispatchBrowserEvent('message', [
                                'text' => 'Out of Stock',
                                'type' => 'error',
                                'status' => 401,
                            ]);
                        }
                    }
                }

            } else { //if Product Does Not Exists

                $this->dispatchBrowserEvent('message', [
                    'text' => 'Product Not Found',
                    'type' => 'warning',
                    'status' => 404,
                ]);
            }
        } else { //if you add to cart without login

            $this->dispatchBrowserEvent('message', [
                'text' => 'Please Login To Add To Cart',
                'type' => 'error',
                'status' => 401,
            ]);
        }
    }

    public function decrementQuantity()
    {
        if ($this->quantityCount > 1) {

            $this->quantityCount--;
        }
    }

    public function incrementQuantity()
    {
        if ($this->quantityCount < 10) {

            $this->quantityCount++;
        }
    }
}
