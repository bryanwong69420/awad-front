<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use app\Models\ProductType;

class ProductTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Predefined status values
        $statuses = [
            ['product_type' => 'KitchenAppliances'],
            ['product_type' => 'BestMobile'],
            ['product_type' => 'DigitalGadget',]
        ];
            
        ProductType::insert($statuses);
    
    }
}
