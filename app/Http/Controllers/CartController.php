<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
class CartController extends Controller
{

   
    public function add(Request $request, $id)
{
    $request->validate(['quantity' => 'required|integer|min:1']);

    $existingItem = Cart::where('user_id', Auth::id())
        ->where('product_id', $id)
        ->first();

    if ($existingItem) {
        // Product already exists in cart, increase quantity
        $existingItem->quantity += $request->quantity;
        $existingItem->save();
    } else {
        // Product not in cart yet, create new entry
        Cart::create([
            'user_id' => Auth::id(),
            'product_id' => $id,
            'quantity' => $request->quantity
        ]);
    }

    return redirect()->back()->with('success', 'Product added to cart!');
}

    public function show(){
        $cartItems = Cart::where('user_id', Auth::id())->with('product')->get();

        $total = 0;
        foreach($cartItems as $item){
            $total += $item->product->price * $item->quantity;
        }
        return view('cart.show', compact('cartItems', 'total'));


    }

    public function remove($id){
        Cart::where('user_id', Auth::id())->where('id', $id)->delete();
        return redirect()->back()->with('success', 'Item removed from cart');
    }

    public function updateQuantity(Request $request, $id){
        $request->validate(['quantity' => 'required|integer|min:1']);

        $item = Cart::where('user_id', Auth::id())->where('id', $id)->first();
        if($item){
            $item->quantity = $request->quantity;
            $item->save();
        }

        return redirect()->back()->with('Success','Quantity updated');
    }
}
