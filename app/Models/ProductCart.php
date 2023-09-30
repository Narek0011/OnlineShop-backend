<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCart extends Model
{
    use HasFactory;
    protected $fillable = [
        'total_amount',
        'product_id',
        'color_id',
        'count',
        'user_id',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function color()
    {
        return $this->belongsTo(Colors::class);
    }

    public function id()
    {
        return $this->belongsTo(Colors::class);
    }
}
