<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


class CreateCompanyAssociationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_association', function (Blueprint $table) {
            $table->id();
            $table->string('company_association',);
        });

        // Predefined status values
        $statuses = [
            [
                'company_association' => 'LG',

            ],
            [
                'company_association' => 'APPLE',

            ],
            [
                'company_association' => 'XIAOMI',

            ],
            [
                'company_association' => 'SAMSUNG',

            ],            
            [
                'company_association' => 'BELKIN',

            ],            
            [
                'company_association' => 'HUAWEI',

            ],            
            [
                'company_association' => 'RAPOO',

            ],            
            [
                'company_association' => 'MICROSOFT',

            ],
            [
                'company_association' => 'DEKA'

            ],
            [
                'company_association' => 'HAIER'

            ],
            [
                'company_association' => 'PANASONIC'

            ],
            [
                'company_association' => 'ROMBAM'

            ],
            [
                'company_association' => 'NESCAFE'

            ],

            [
                'company_association' => 'KHIND'

            ],
            [
                'company_association' => 'SHARP'

            ],
            [
                'company_association' => 'OGAWA'

            ],
            [
                'company_association' => 'LAIFEN'

            ],
            [
                'company_association' => 'AQARA'

            ],
            [
                'company_association' => 'UNIQ'

            ],
            [
                'company_association' => 'FABER'

            ],
            [
                'company_association' => 'KDK'

            ],
            [
                'company_association' => 'UNKNOWN'

            ],
        ];

        DB::table('company_association')->insert($statuses);                
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company_association');
    }
}
