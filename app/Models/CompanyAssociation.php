<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyAssociation extends Model
{
    use HasFactory;
    protected $table = 'company_association';

        /**
     * Get all products of this company association
     */
    public function products()
    {
        return $this->hasMany(Product::class, 'company_association', 'id');
    }

}
