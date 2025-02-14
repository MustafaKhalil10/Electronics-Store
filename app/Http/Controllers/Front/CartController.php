<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Repositories\Cart\CartModelRepository;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function index()
    {
        $repository = new CartModelRepository();
        $items = $repository->get();
        $total = $repository->total();
        return view('front.cart', [
            'items' => $items,
            'total' => $total
        ]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'product_id' => ['required', 'int', 'exists:products,id'],
            'quantity' => ['nullable', 'int', 'min:1'],
        ]);
        $product = Product::findOrFail($request->post('product_id'));
        $repository = new CartModelRepository();
        $repository->add($product, $request->post('quantity'));
        return redirect()->back()->with('success', 'product added successfully');
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'quantity' => ['nullable', 'int', 'min:1'],
        ]);
        $repository = new CartModelRepository();
        $repository->update($id, $request->post('quantity'));
        return redirect()->back()->with('success', 'product updated successfully');
    }


    public function destroy($id)
    {
        $repository = new CartModelRepository();
        $repository->delete($id);
        return redirect()->back()->with('success', 'product deleted successfully');
    }
}
