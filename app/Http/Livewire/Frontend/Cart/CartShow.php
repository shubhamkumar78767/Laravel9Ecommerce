<?php

namespace App\Http\Livewire\Frontend\Cart;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CartShow extends Component
{
    public $carts, $totalPrice = 0;

    public function render()
    {
        $this->carts = Cart::where('user_id', Auth::user()->id)->get();
        return view('livewire.frontend.cart.cart-show', [
            'carts' => $this->carts,
        ]);
    }

    public function decrementQuantity(int $cartId)
    {
        $cartData = Cart::where('id', $cartId)->where('user_id', auth()->user()->id)->first();
        if ($cartData) {

            if ($cartData->productColor()->where('id', $cartData->product_color_id)->exists()) {
                $productColor = $cartData->productColor()->where('id', $cartData->product_color_id)->first();
                if ($productColor->quantity > $cartData->quantity) {
                    $cartData->decrement('quantity');
                    $this->dispatchBrowserEvent('message', [
                        'text' => 'Quantity Update Successfully',
                        'type' => 'success',
                        'status' => 200,
                    ]);
                } else {

                    $this->dispatchBrowserEvent('message', [
                        'text' => 'Only ' . $productColor->quantity . ' Qunatity Availbale.',
                        'type' => 'success',
                        'status' => 200,
                    ]);
                }

            } else {

                if ($cartData->product->quantity > $cartData->quantity) {
                    $cartData->decrement('quantity');
                    $this->dispatchBrowserEvent('message', [
                        'text' => 'Quantity Update Successfully',
                        'type' => 'success',
                        'status' => 200,
                    ]);
                } else {

                    $this->dispatchBrowserEvent('message', [
                        'text' => 'Only ' . $cartData->product->quantity . ' Qunatity Availbale.',
                        'type' => 'success',
                        'status' => 200,
                    ]);
                }
            }

        } else {

            $this->dispatchBrowserEvent('message', [
                'text' => 'Something Went Wrong.',
                'type' => 'error',
                'status' => 404,
            ]);
        }
    }

    public function incrementQuantity(int $cartId)
    {
        $cartData = Cart::where('id', $cartId)->where('user_id', auth()->user()->id)->first();
        if ($cartData) {

            if ($cartData->productColor()->where('id', $cartData->product_color_id)->exists()) {
                $productColor = $cartData->productColor()->where('id', $cartData->product_color_id)->first();
                if ($productColor->quantity > $cartData->quantity) {
                    $cartData->increment('quantity');
                    $this->dispatchBrowserEvent('message', [
                        'text' => 'Quantity Update Successfully',
                        'type' => 'success',
                        'status' => 200,
                    ]);
                } else {

                    $this->dispatchBrowserEvent('message', [
                        'text' => 'Only ' . $productColor->quantity . ' Qunatity Availbale.',
                        'type' => 'success',
                        'status' => 200,
                    ]);
                }

            } else {

                if ($cartData->product->quantity > $cartData->quantity) {
                    $cartData->increment('quantity');
                    $this->dispatchBrowserEvent('message', [
                        'text' => 'Quantity Update Successfully',
                        'type' => 'success',
                        'status' => 200,
                    ]);
                } else {

                    $this->dispatchBrowserEvent('message', [
                        'text' => 'Only ' . $cartData->product->quantity . ' Qunatity Availbale.',
                        'type' => 'success',
                        'status' => 200,
                    ]);
                }
            }

        } else {

            $this->dispatchBrowserEvent('message', [
                'text' => 'Something Went Wrong.',
                'type' => 'error',
                'status' => 404,
            ]);
        }
    }

    public function removeCartItem(int $cartId)
    {
        $cartRemoveData = Cart::where('id',$cartId)->where('user_id',auth()->user()->id)->first();
        if($cartRemoveData){

            $cartRemoveData->delete();

            $this->emit('CartUpdated');
            $this->dispatchBrowserEvent('message', [
                'text' => 'Cart Item Remove Successfully.',
                'type' => 'success',
                'status' => 200,
            ]);
        }else{

            $this->dispatchBrowserEvent('message', [
                'text' => 'Something Went Wrong.',
                'type' => 'error',
                'status' => 404,
            ]);
        }
    }
}
