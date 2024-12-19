<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
    
{
    use HasFactory;
    protected $fillable = [
        'nama',     
        'warna',
        'price',
        'size',
        'stock',
        'category_id',
        'image',
    ];

    public function scopeFilter($query, array $filters){
        $query->when($filters['category'] ?? false, function($query, $categories){
            return $query->whereHas('category', function($query) use ($categories){
                $query->where('nama', $categories);
            });
        });
        $query->when($filters['color'] ?? false, function($query, $colors){
            return $query->whereIn('warna', $colors);
        });
        $query->when($filters['size'] ?? false, function($query, $sizes){
            return $query->whereIn('size', $sizes);
        });
    }

    public function category(){
        return $this->belongsTo(category::class);
    }
    
    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }

}
