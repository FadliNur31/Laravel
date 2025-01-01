<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\category;
use Illuminate\Support\Facades\Auth;
use App\Models\cart;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
       if($request->input('sort') == "Low"){
           $products = Product::orderBy('price', 'ASC')->filter(request(['category', 'color', 'size']))->Paginate(9)->withQueryString();
       }else{
           $products = Product::orderBy('price', 'DESC')->filter(request(['category', 'color', 'size']))->Paginate(9)->withQueryString();
       }
       $userId = Auth::id(); 
       $cart = cart::where('user_id', $userId)->first(); 
       $cartItems = $cart->items()->with('product')->get();;   
      
       $categories = category::All();
       return view('products', compact('products','categories','cartItems'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = category::all();
        return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi form
        $request->validate([
            'nama' => 'required|string|max:255',
            'stok' => 'required|integer',
            'price' => 'required|numeric',
            'warna' => 'required|string',
            'image' => 'nullable',
            'size' => 'required|string',
            'category_id' => 'required|exists:categories,id', 
        ]);
        $image = null;
        if ($request->has('image') && filter_var($request->image, FILTER_VALIDATE_URL)) {
            $image = $request->image;
        } elseif ($request->hasFile('image')) {
            $image = $request->file('image')->store('images', 'public');
        }

        // Simpan produk
        Product::create([
            'nama' => $request->nama,
            'stock' => $request->stok,
            'price' => $request->price,
            'warna' => $request->warna,
            'category_id' => $request->category_id,
            'image' => $image,
            'size' => $request->size,
            'deskripsi' =>$request->deskripsi,
        ]);

        return redirect()->route('admin.index');
    }


    /**
     * Display the specified resource.
     */
    public function show(Product $prod)
    {
 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        $categories = category::all();
       
        return view('products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'stok' => 'required|integer',
            'price' => 'required|numeric',
            'warna' => 'required|string',
            'image' => 'required|string',
            'size' => 'required|string',
            'category_id' => 'required|exists:categories,id', // pastikan category_id valid
        ]);

        $product = Product::findOrFail($id);

        $product->nama = $validatedData['nama'];
        $product->stock = $validatedData['stok'];
        $product->price = $validatedData['price'];
        $product->warna = $validatedData['warna'];
        $product->image = $validatedData['image'];
        $product->size = $validatedData['size'];
        $product->category_id = $validatedData['category_id'];

        $product->save();

        return redirect()->route('admin.index')->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        $product->delete();

        return redirect()->route('admin.index')->with('success', 'Produk berhasil dihapus.');
    }
}
