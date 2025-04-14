<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public $timestamps = false; // Add this line

    protected $fillable = ['name', 'description', 'price', 'image_url', 'quantity', 'product_type', 'company_association', 'date_added'];
    
    
    /**
     * Get the product type that the product belongs to
     */
    public function productType()
    {
        return $this->belongsTo(ProductType::class, 'product_type', 'id');
    }
    
    /**
     * Get the company association that the product belongs to
     */
    public function companyAssociation()
    {
        return $this->belongsTo(CompanyAssociation::class, 'company_association', 'id');
    }
}
