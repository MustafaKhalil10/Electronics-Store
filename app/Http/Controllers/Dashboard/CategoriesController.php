<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    //
    public function index()
    {
        $request = request();
        $user = auth()->user();
        $query = Category::where('store_id', $user->store->id);
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

        $categories = $query->withCount('products')->paginate(30);
        return view('dashboard.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('dashboard.categories.create_edit');
    }

    public function store(Request $request)
    {
        $data = $request->validate(Category::rules());
        $user = auth()->user();
        $data['store_id'] = $user->store->id;
        Category::create($data);
        return redirect()->route('categories.index')->with('success', 'category created successfully');
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('dashboard.categories.create_edit', [
            'category' => $category,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate(Category::rules());
        $user = auth()->user();
        $data['store_id'] = $user->store->id;
        $category = Category::find($id);
        $category->update($request->all());;
        return redirect()->route('categories.index')->with('success', 'category updated successfully');
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('categories.index')->with('info', 'category deleted successfully');
    }

    public function show(Category $category)
    {
        $user = auth()->user();
        $products = $category->products()->where('store_id', $user->store->id)->paginate(20);

        return view('dashboard.categories.show', [
            'category' => $category,
            'products' => $products
        ]);
    }
}
