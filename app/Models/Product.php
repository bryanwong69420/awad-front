<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public $timestamps = false; // Add this line

    protected $fillable = ['name', 'description', 'price', 'image_url', 'quantity', 'product_type', 'company_association', 'date_added'];
}
