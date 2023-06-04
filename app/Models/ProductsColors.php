<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProductsColors extends Model
{
    use HasFactory;
    protected $fillable = [
        'product',
        'color',
    ];

    public function product()
    {
        return $this->hasMany(Product::class);
    }

    public function color()
    {
        return $this->hasMany(Colors::class);
    }

}
