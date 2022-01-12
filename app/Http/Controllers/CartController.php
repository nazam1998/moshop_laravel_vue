<?php

namespace App\Http\Controllers;

use App\Models\CartDetail;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cart = Auth::user()->cart;
        $cartdetails = CartDetail::where('cart_id', $cart->id)->with('product')->get();
        return view('cart.index', compact('cartdetails'));
    }



    public function add(Request $request, $id)
    {
        $product = Product::find($id);
        if ($product->shop->id == Auth::user()->shop->id) {
            return redirect()->back();
        }
        $request->validate(['quantity' => ['required', 'numeric', 'min:1', 'max:' . $product->stock]]);
        $cart = Auth::user()->cart;
        if (CartDetail::where('cart_id', $cart->id)->where('product_id', $id)->count() > 0) {
            $cartdetail = CartDetail::where('cart_id', $cart->id)->where('product_id', $id)->first();
            $cartdetail->quantity += $request->quantity;
            $cartdetail->save();
        } else {
            $cartdetail = new CartDetail();

            $cartdetail->quantity = $request->quantity;
            $cartdetail->cart_id = $cart->id;
            $cartdetail->product_id = $id;
            $cartdetail->save();
        }
        $product->stock -= $request->quantity;
        $product->save();

        return redirect()->back();
    }
    public function confirm()
    {
        $cart = Auth::user()->cart;
        $totalPrice = 0;
        foreach ($cart->cartDetails as $details) {
            $totalPrice += ($details->quantity * $details->product->price);
        }

        $order = new Order();
        $order->user_id = Auth::id();
        $order->price = $totalPrice;
        $order->date = Carbon::now();
        $order->save();

        foreach ($cart->cartDetails as $details) {
            $orderdetail = new OrderDetail();
            $orderdetail->order_id = $order->id;
            $orderdetail->product_id = $details->product_id;
            $orderdetail->quantity = $details->quantity;
            $orderdetail->save();
        }

        $cart->cartDetails()->delete();

        return redirect()->back();
    }
}
