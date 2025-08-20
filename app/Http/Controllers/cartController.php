<?php

namespace App\Http\Controllers;

use App\Models\userInfo;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\UserCart;
use App\Models\Product;
class cartController extends Controller
{
    public function add_to_cart(Request $request)
    {
        $userId = session()->get('user_id');

        // Try to find existing cart item
        $cart = Cart::where('user_id', $userId)
            ->where('product_id', $request->product_id)
            ->first();
        if ($userId) {
            if ($cart) {
                // If found, increase quantity
                $cart->quantity += $request->quantity;
                $cart->total = $cart->quantity * $cart->price;
                $cart->save();
            } else {
                // If not found, create new cart row
                $cart = new Cart();
                $cart->user_id = $userId;
                $cart->product_id = $request->product_id;
                $cart->name = $request->name;
                $cart->quantity = $request->quantity;
                $cart->price = $request->price;
                $cart->image = $request->image;
                $cart->total = $cart->quantity * $cart->price;
                $cart->save();
            }
        } else {
            return redirect('/loginForm')->with('error', 'Login first!');
        }

        return redirect('/');
    }
    public function quantity(Request $request, $id)
    {

        // Try to find existing cart item
        $cart = Cart::find($id);
        if ($request->has('increase')) {
            $cart->quantity += 1;
            $cart->total = $cart->quantity * $cart->price;
        } else if ($request->has('decrease') && $cart->quantity > 1) {
            $cart->quantity = $cart->quantity - 1;
            $cart->total = $cart->quantity * $cart->price;
        } else if ($cart->quantity <= 1 && $request->has('decrease')) {
            $cart->delete();
        }
        $cart->save();
        return redirect()->back();
    }

    public function Destroy($id)
    {
        $cart = Cart::find($id);
        $cart->delete();
        return redirect()->back();
    }
    public function Checkout(Request $request)
    {
        $userId = session()->get('user_id');

        // Try to find existing cart item
        $cart = Cart::where('user_id', $userId)
            ->get();
        $user = new userInfo();
        $user->user_name = $request->user_name;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->city = $request->city;
        $user->save();
        foreach ($cart as $item) {
            $checkout = new UserCart();
            $checkout->userId = $user->user_id;
            $checkout->product_name = $item->name;
            $checkout->quantity = $item->quantity;
            $checkout->price = $item->price;
            $checkout->total = $item->total;
            $checkout->image = $item->image;
            $item->delete();
            $checkout->save();
        }
        return redirect('/');
    }
    public function checkPage()
    {
        $userId = session()->get('user_id');
        $cart = Cart::where('user_id', $userId)
            ->get();
        return view("user.checkout", [
            'cart' => $cart,
        ]);
    }
    public function updateOrderStatus(Request $request, $id)
    {
        $order = UserCart::findOrFail($id);
        $status = $request->input('status');

        // Optional: store status in database
        $order->status = $status;
        $order->save();

        return redirect()->back()->with('success', 'Order status updated!');
    }

}
