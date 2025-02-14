<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class cart extends Model
{
    use HasFactory;
    
    protected $table = 'carts';

    protected $fillable = [
        'user_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function items()
    {
        return $this->hasMany(cart_item::class, 'cart_id');
    }
}
