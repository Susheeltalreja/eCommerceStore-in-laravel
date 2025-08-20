<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\UserCart;
class ProductController extends Controller
{
    public function index()
    {
        return view("admin.sections.add_product");
    }
    public function store(Request $request)
    {
        $product = new Product();
        $product->product_name = $request->product_name;
        $product->product_category = $request->category;
        $product->product_sku = $request->sku;
        $product->product_price = $request->price;
        $product->product_desc = $request->desc;
        if ($request->image != "") {
            $image = $request->image;
            $ext = $image->Extension();
            $uniqueName = time() . $ext;
            $image->move('uploads/product', $uniqueName);
            $product->product_image = $uniqueName;
        }
        $product->save();
        return redirect('/see_product');
    }
    public function see_product()
    {
        $products = Product::all();
        return view('admin.sections.show_product', compact('products'));
    }
    public function orders()
    {
        // Get all orders with user info
        $orders = UserCart::with('user')->paginate(10); // eager load user
        return view('admin.sections.orders', compact('orders'));
    }

    public function edit($id)
    {
        $products = Product::find($id);
        return view('admin.sections.edit', compact('products'));
    }
    public function update($id, Request $request)
    {
        $product = Product::find($id);
        $product->product_name = $request->product_name;
        $product->product_category = $request->category;
        $product->product_sku = $request->sku;
        $product->product_price = $request->price;
        $product->product_desc = $request->desc;
        if ($request->image != "") {
            File::delete(public_path('uploads/user/' . $product->image));
            $image = $request->image;
            $ext = $image->Extension();
            $uniqueName = time() . $ext;
            $image->move('uploads/product', $uniqueName);
            $product->product_image = $uniqueName;
        }
        $product->save();
        return redirect('/see_product');
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        File::delete(public_path('uploads/product' . $product->image));
        $product->delete();
        return redirect('/see_product');
    }
}
