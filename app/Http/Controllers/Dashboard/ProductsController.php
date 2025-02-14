<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Http\Request;

class ProductsController extends Controller
{

    public function index()
    {
        $request = request();
        $user = auth()->user();

        if (!$user || !$user->store) {
            return redirect()->route('dashboard')->with('error', 'ليس لديك متجر');
        }

        $query = Product::where('store_id', $user->store->id);
        $name = $request->query('name');
        $status = $request->query('status');
        $startDate = $request->query('start_date');
        $end_Date = $request->query('end_date');

        if ($name) {
            $query->where('name', 'LIKE', "%{$name}%");
        }
        if ($status) {
            $query->whereStatus($status);
        }
        if ($startDate) {
            $query->whereDate('created_at', '>=', $startDate);
        }
        if ($end_Date) {
            $query->whereDate('created_at', '<=', $end_Date);
        }

        $products = $query->with(['store', 'category'])->paginate(110);
        return view('dashboard.products.index', [
            'products' => $products
        ]);
    }

    public function create()
    {
        $stores = Store::all();
        $categories = Category::all();
        return view('dashboard.products.create_edit', [
            'stores' => $stores,
            'categories' => $categories,
        ]);
    }

    public function edit(Product $product)
    {
        $stores = Store::all();
        $categories = Category::all();
        return view('dashboard.products.create_edit', [
            'stores' => $stores,
            'categories' => $categories,
            'product' => $product,
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate(Product::rules());
        $user = auth()->user();

        $categoryName = $data['category_name'];
        $category = Category::firstOrCreate(['name' => $categoryName,'store_id'=> $user->store->id]);

        $data['store_id'] = $user->store->id;
        $data['category_id'] = $category->id;

        Product::create($data);
        return redirect()->route('products.index')
            ->with('success', 'Product created successfully');
    }

    public function update(Request $request, Product $product)
    {
        $data = $request->validate(Product::rules());

        $categoryName = $data['category_name'];
        $category = Category::firstOrCreate(['name' => $categoryName]);
        $user = auth()->user();
        $data['store_id'] = $user->store->id;
        $data['category_id'] = $category->id;

        $product->update($data);
        return redirect()->route('products.index')
            ->with('success', 'Product updated successfully');
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('products.index')->with('success', 'category deleted successfully');
    }
}
