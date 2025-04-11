<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


class CreateProductTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_type', function (Blueprint $table) {
            $table->id();
            $table->string('product_type', 255);
        });

        // Predefined status values
        $statuses = [
            [
                'product_type' => 'KitchenAppliances',

            ],
            [
                'product_type' => 'BestMobile',

            ],
            [
                'product_type' => 'DigitalGadget',

            ]
        ];

        DB::table('product_type')->insert($statuses);        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_type');
    }
}
