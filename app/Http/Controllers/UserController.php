<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Register;
use App\Models\Cart;
use App\Models\UserCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function viewForm()
    {
        return view('register');
    }
    public function store(Request $request)
    {
        $addUser = new Register();
        $isFirstUser = $addUser->count() === 0 ? 'admin' : 'user';

        $addUser->name = $request->name;
        $addUser->email = $request->email;
        $addUser->password = Hash::make($request->password);
        $addUser->role = $isFirstUser;
        $addUser->save();

        if ($addUser->role === 'admin') {
            session([
                'user_id' => $addUser->user_id,
                'role' => $addUser->role,
                'name' => $addUser->name
            ]);
            return redirect('/dashboard');
        } else {
            session([
                'user_id' => $addUser->user_id,
                'role' => $addUser->role,
                'name' => $addUser->name
            ]);
            return redirect('/');
        }
    }
    public function login()
    {
        return view('login');
    }
    public function home()
    {
        $userId = session()->get('user_id');
        // Try to find existing cart item
        $cart = Cart::where('user_id', $userId)
            ->get();
        $products = Product::all();
        return view("user.homePage", [
            'products' => $products,
            'cart' => $cart,
        ]);
    }

    public function dashboard()
    {
        $total_sale = UserCart::sum('total');
        $total_product = UserCart::sum('quantity');
        $products = Product::count();
        return view("admin.sections.dashboard_section", [
            'sales' => $total_sale,
            'quantity' => $total_product,
            'products' => $products
        ]);
    }
    public function check()
    {
        $total_sale = UserCart::sum('total');
        $total_product = UserCart::sum('quantity');
        $products = Product::sum('Product_id');
        echo '<pre>';
        print_r('User Products:'.$total_product);
        print_r('User total:'.$total_sale);
        print_r(' total:'.$products);
        echo '</pre>';
    }
    public function checkAuth(Request $request)
    {
        $checkAuth = Register::where('email', $request->email)->first();

        if ($checkAuth && Hash::Check($request->password, $checkAuth->password)) {
            session([
                'user_id' => $checkAuth->user_id,
                'role' => $checkAuth->role,
                'name' => $checkAuth->name
            ]);
            if ($checkAuth->role === 'admin') {
                return redirect('/dashboard')->with('success', 'Login successfully');
            } else {
                return redirect('/')->with('success', 'Login successfully');
                ;
            }
        } else {
            return redirect()->back()->with('error', 'Invalid Credentials');
        }
    }


}
