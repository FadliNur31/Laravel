<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cart_item extends Model
{
    use HasFactory;

    protected $table = 'cart_items';

    protected $fillable = [
        'quantity',
        'product_id',
        'cart_id',
    ];

    public function cart(){
        return $this->belongsTo(cart::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
