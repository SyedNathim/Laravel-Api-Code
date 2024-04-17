<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brand;
use App\Models\ProductsCategory;

class ProductsCategoryController extends Controller
{
    function categoryShow()
    {
        // Retrieve products along with related brand and category
        $all_products = Product::select('products.id', 'product_name', 'price', 'imgUrl', 'category_name', 'brand_name')
            ->join('brands', 'products.brand_id', '=', 'brands.id')
            ->join('products_category', 'products.category_id', '=', 'products_category.id')
            ->get();
    
        // Convert the result to JSON and return
        return response()->json($all_products);
    }
}
