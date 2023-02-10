<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class WishListShow extends Component
{
    public function render()
    {
        $user_id = Auth::user()->id;

        $wishlists = Wishlist::where('user_id',$user_id)->get();
        return view('livewire.frontend.wish-list-show', ['wishlists' => $wishlists]);
    }

    public function removeWishlistItem(int $wishlistId)
    {
        $user_id = Auth::user()->id;

        Wishlist::where('user_id',$user_id)->where('id',$wishlistId)->delete();

        $this->emit('wishlistUpdated');

        $this->dispatchBrowserEvent('message', [
            'text' => 'WishList Item Removed Successfully',
            'type' => 'success',
            'status' => 200
        ]);
    }
}
