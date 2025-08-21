<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
       $q = $request->query('q');

       $productsQuery = Product::latest();
       if ($q) {
           $productsQuery->where('name', 'like', "%{$q}%");
       }

       $products = $productsQuery->paginate(10)->withQueryString();

       // If this is an AJAX request, return rendered partials so the frontend can replace them
       if ($request->ajax()) {
           $rows = view('dashboard.products._rows', compact('products'))->render();
           $pagination = view('dashboard.products._pagination', compact('products'))->render();
           return response()->json(['rows' => $rows, 'pagination' => $pagination]);
       }

        return view('dashboard.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        // Ensure non-nullable image column always receives a value.
        // If no image was uploaded, store a default absolute URL (view treats http(s) URLs as external images).
        if (empty($data['image'])) {
            $data['image'] = asset('admin/dist/images/preview-11.jpg');
        }

        Product::create($data);

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
    return view('dashboard.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('dashboard.products.create', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $newPath = $request->file('image')->store('products', 'public');


            if ($product->image && !Str::startsWith($product->image, ['http://', 'https://'])) {
                if (Storage::disk('public')->exists($product->image)) {
                    Storage::disk('public')->delete($product->image);
                }
            }

            $data['image'] = $newPath;
        }

        $product->update($data);

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if ($product->image && !Str::startsWith($product->image, ['http://', 'https://'])) {
            if (Storage::disk('public')->exists($product->image)) {
                Storage::disk('public')->delete($product->image);
            }
        }

        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
