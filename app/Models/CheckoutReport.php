<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckoutReport extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'cart_details','total_harga',
        'approval'];

    protected $casts = [
        'cart_details' => 'array',  // Mengkonversi kolom cart_details menjadi array otomatis
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');  // Menghubungkan dengan user_id
    }
}

