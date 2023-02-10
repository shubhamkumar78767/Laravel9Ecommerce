<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class WishListCount extends Component
{
    public $wishlistCount;
    
    protected $listeners = ['wishlistUpdated' => 'checkWishListCount'];

    public function checkWishListCount()
    {
        if(Auth::check()){
            return $this->wishlistCount = Wishlist::where('user_id',Auth::user()->id)->count();
        }
        return $this->wishlistCount = 0;
    }

    public function render()
    {
        $this->wishlistCount = $this->checkWishListCount();

        return view('livewire.frontend.wish-list-count',[
            'wishlistCount' => $this->wishlistCount
        ]);
    }
}
