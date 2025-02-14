<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class FavoritesController extends Controller
{

    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'يجب عليك تسجيل الدخول أولًا');
        }
        $user = Auth::user();
        $favorites = $user->favorites()->with('product')->get();

        return view('front.favorites.index', compact('favorites'));
    }


    public function store(Request $request)
    {
        $request->validate(['product_Id' => 'required|exists:products,id']);
        $product_Id = $request->post('product_Id');
        $user = Auth::user();
        if (!$user->favorites()->where('product_id', $product_Id)->exists()) {
            $user->favorites()->create(['product_id' => $product_Id]);
            Product::where('id', $product_Id)->update(['favorite_product'=>'1']);
        }
        return back()->with('success', 'Complete adding products to options!');
    }

    public function destroy($id)
    {
        $user = Auth::user();
        $user->favorites()->where('product_id', $id)->delete();
        Product::where('id', $id)->update(['favorite_product'=>'0']);
        return back()->with('success', 'The product has been removed from favorites!');
    }
}
