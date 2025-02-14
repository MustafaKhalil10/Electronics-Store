<?php

namespace App\Repositories\Cart;

use App\Models\Cart;
use App\Models\Product;
use App\Repositories\Cart\CartRepository;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;


class CartModelRepository implements CartRepository
{
    protected $items;

    public function __construct()
    {
        $this->items = collect([]);
    }
    public function get(): Collection
    {
        if (!$this->items->count()) {
            $this->items = Cart::with('product')
                ->where('cookie_id', '=', $this->getCookieId())->get();
        }
        return $this->items;
    }

    // public function get(): Collection
    // {
    //    return Cart::with('product')
    //    ->where('cookie_id' , '=',$this->getCookieId())->get();

    // }

    public function add(Product $product, $quantity = 1) //quantity default is 1
    {
        return Cart::create([
            'cookie_id' => $this->getCookieId(),
            'user_id' => Auth::id(),
            'product_id' => $product->id,
            'quantity' => $quantity
        ]);
    }

    public function update($id, $quantity = 1)
    {
        Cart::where('id', '=', $id)
            ->where('cookie_id', '=', $this->getCookieId())
            ->update([
                'quantity' => $quantity,
            ]);
    }

    public function delete($id)
    {
        Cart::where('id', $id)
            ->where('cookie_id', '=', $this->getCookieId())
            ->delete();
    }

    public function total(): float
    {
        return $this->get()->sum(function ($item){
           return $item->quantity * $item->product->price;
        });
    }

    public function empty()
    {
        Cart::where('cookie_id', '=', $this->getCookieId())->delete();
    }

    protected function getCookieId()
    {
        $cookie_id = Cookie::get('cart_id'); //
        if (!$cookie_id) {
            $cookie_id = Str::uuid();
            $minutes = Carbon::now()->addDays(30)->diffInMinutes(Carbon::now());
            Cookie::queue('cart_id', $cookie_id, $minutes);
        }
        return $cookie_id;
    }
}
