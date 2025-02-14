<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\cart;
use App\Models\cart_item;
use App\Models\Product;
use App\Models\CheckoutReport;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = Auth::id();
        $cart = Cart::firstOrCreate([
            'user_id' => $userId,
        ]);
    
        // Ambil detail keranjang sebelum menghapus item
        $cartItems = cart_item::where('cart_id', $cart->id)->get();
    
        if ($cartItems->isEmpty()) {
            return redirect()->route('home')->with('error', 'Keranjang Anda kosong.');
        }
    
        $cartDetails = $cartItems->map(function ($item) {
            return [
                'nama' => $item->product->nama,
                'size' => $item->product->size,
                'quantity' => $item->quantity,
                'warna' => $item->product->warna,
                'price' => $item->product->price,
            ];
        });

        $harga = 0;
        foreach ($cartItems as $item) {
            $harga += $item->product->price * $item->quantity;
        }
    
        // Buat laporan checkout
        CheckoutReport::create([
            'user_id' => $userId,
            'cart_details' => $cartDetails,
            'total_harga' => $harga,
            'aproval' => 'not_approved',
        ]);
    
        cart_item::where('cart_id', $cart->id)->delete();
    
        Product::where('stock', '<=', 0)->delete();
    
        return redirect()->route('home')->with('success', 'Produk Sukses di Checkout');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $userId = Auth::id();
        $productId = $request->product_id;
        $quantity = $request->quantity; 

        $cart = Cart::firstOrCreate([
            'user_id' => $userId,
        ]);

        $product = Product::find($productId); 
        $cartItem = cart_item::where('cart_id', $cart->id)
                            ->where('product_id', $productId)
                            ->first();
        if($product->stock > 0){
            if ($cartItem ) {
                $cartItem->quantity += 1;
                $cartItem->save();
            } else {
                cart_item::create([
                    'cart_id' => $cart->id,
                    'product_id' => $productId,
                    'quantity' => 1,
                ]);
            }
                $product->stock -= 1; 
                $product->save();                  
                return redirect()->route('products.index');
        }else{
            return redirect()->route('products.index')->with('error', 'Stok produk tidak cukup.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cart_item = cart_item::findOrFail($id);
        $product = Product::find($cart_item->product_id); 

        $product->stock += $cart_item->quantity; 
        $product->save();
        $cart_item->delete();
        return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus.');
    }
    
}
