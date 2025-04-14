<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    use HasFactory;

    protected $table = 'product_type';
    /**
     * Get all products of this product type
     */
    public function products()
    {
        return $this->hasMany(Product::class, 'product_type', 'id');
    }
}
