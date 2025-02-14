<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Product::paginate();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'store_id' => 'required|exists:stores,id',
            'category_id' => 'required|exists:catigories,id',
            'status' => 'in:active,inactive',
            'price' => 'required',
            'compare_price' => 'nullable',
            'description' => 'nullable',
        ]);

        $products = Product::create($data);
        return Response::json([
            'message' => 'Product created successfully',
            'product' => $products,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $product = Product::findOrFail($id);
     return $product->load('category:id,name');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Product $product)
    {
        $data = $request->validate([
            'name' => 'sometimes|required',
            'store_id' => 'sometimes|required|exists:stores,id',
            'category_id' => 'sometimes|required|exists:catigories,id',
            'status' => 'in:active,inactive',
            'price' => 'sometimes|required',
            'compare_price' => 'sometimes|nullable',
            'description' => 'sometimes|nullable',
        ]);

        $product->update($data);
        return Response::json([
            'message' => 'Product updated successfully',
            'product' => $product,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::destroy($id);
        return [
            'message' => 'Product deleted successfully',
        ];
    }
}
