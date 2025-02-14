<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;


class HomeController extends Controller
{

    public function index()
    {
        $request = request();
        $query = Category::query();
        $category_name = $request->query('category_name');

        if ($category_name) {
            $query->where('name', 'LIKE', "%{$category_name}%");
        }
        $categories = $query->paginate(30);
        return view('front.home', [
            'categories' => $categories
        ]);
    }
}
