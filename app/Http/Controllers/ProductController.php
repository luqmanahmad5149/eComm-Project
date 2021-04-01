<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class ProductController extends Controller
{
    public function index()
    {
        $data = Product::all();
        return view('product', ['products'=>$data]);
    }
    public function detail($id)
    {
        $data = Product::find($id);
        return view('detail', ['product'=>$data]);
    }
    // public function search(Request $req)
    // {
    //     $data = Product::
    //     where('name', 'like', '%'.$req->input('query').'%')
    //     ->get();
    //     return view('search', ['products'=>$data]);
    // }
    public function addToCart(Request $req)
    {
        if ($req->session()->has('user')){
            $cart = new Cart;
            $cart->user_id = $req->session()->get('user')['id'];
            $cart->product_id = $req->product_id;
            $cart->save();
            return redirect('/');
        }
        else {
            return redirect('/login');
        }
    }
    public static function cartItem()
    {
        $userId = Session::get('user')['id'];
        return Cart::where('user_id', $userId)->count();
    }
    public function cartList()
    {
        $userId = Session::get('user')['id'];
        $products = DB::table('cart')
        ->join('products', 'cart.product_id', '=', 'products.id')
        ->where('cart.user_id', $userId)
        ->select('products.*', 'cart.id as cart_id')
        ->get();

        return view('cartlist', ['products'=> $products]);
    }
    public function removeCart($id)
    {
        Cart::destroy($id);
        return redirect('cartlist');
    }
    public function orderNow()
    {
        $userId = Session::get('user')['id'];
        $total = DB::table('cart')
        ->join('products', 'cart.product_id', '=', 'products.id')
        ->where('cart.user_id', $userId)
        ->sum('products.price');

        return view('ordernow', ['total'=> $total]);
    }
    public function orderPlace(Request $req)
    {
        $userId = Session::get('user')['id'];
        $allCart = Cart::where('user_id', $userId)->get();
        foreach ($allCart as $cart) {
            $order = new Order();
            $order->product_id = $cart['product_id'];
            $order->user_id = $cart['user_id'];
            $order->status = 'pending';
            $order->payment_method = $req->payment;
            $order->payment_status = 'pending';
            $order->address = $req->address;
            $order->save();
            Cart::where('user_id', $userId)->delete();
        }
        $req->input();
        return redirect('/');
    }
    public function myOrders()
    {
        $userId = Session::get('user')['id'];
        $orders = DB::table('orders')
        ->join('products', 'orders.product_id', '=', 'products.id')
        ->where('orders.user_id', $userId)
        ->get();

        return view('myorders', ['orders'=> $orders]);
    }
    public function addProduct()
    {
        return view('createproduct');
    }
    public function createProduct(Request $req)
    {
        $create = new Product();
        $create->name = $req->name;
        $create->price = $req->price;
        $create->category = $req->category;
        $create->description = $req->description;
        $create->gallery = $req->gallery;
        $create->save();
        return redirect('/');
    }
    public function updateProduct($id)
    {
        $product = Product::find($id);
        return view('updateproduct', ['product'=> $product]);
    }
    public function editProduct(Product $product)
    {
        request()->validate([
            'name' => 'required',
            'price' => 'required',
            'category' => 'required',
            'description' => 'required',
            'gallery' => 'required',
        ]);
        
        $product->update([
            'name' => request('name'),
            'price' => request('price'),
            'category' => request('category'),
            'description' => request('description'),
            'gallery' => request('gallery'),
        ]);
        return redirect('/');
    }
    public function removeProduct($id)
    {
        Product::destroy($id);
        return redirect('/');
    }
}
