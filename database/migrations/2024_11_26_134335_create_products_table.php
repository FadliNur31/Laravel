<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id(); // Primary key dengan auto-increment
            $table->string('nama'); // Nama kategori
            $table->timestamps(); // created_at dan updated_at
        });
        
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // Primary key dengan auto-increment
            $table->string('nama'); // Nama produk
            $table->integer('stock'); // Stok produk
            $table->string('warna'); // Warna produk
            $table->decimal('price', 10, 2); // Harga produk
            $table->string('image')->nullable(); // Gambar produk (opsional)
            $table->foreignId('category_id')->constrained()->onDelete('cascade'); // Foreign key untuk kategori
            $table->timestamps(); // created_at dan updated_at
        });
        
        Schema::create('carts', function (Blueprint $table) {
            $table->id(); // Primary key dengan auto-increment
            $table->string('nama'); // Nama keranjang
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Foreign key ke tabel users
            $table->timestamps(); // created_at dan updated_at
        });
        
        Schema::create('cart_items', function (Blueprint $table) {
            $table->id(); // Primary key dengan auto-increment
            $table->integer('quantity'); // Jumlah produk dalam keranjang
            $table->foreignId('product_id')->constrained()->onDelete('cascade'); // Foreign key ke tabel products
            $table->foreignId('cart_id')->constrained()->onDelete('cascade'); // Foreign key ke tabel carts
            $table->timestamps(); // created_at dan updated_at
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
