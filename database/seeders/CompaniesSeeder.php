<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use app\Models\CompanyAssociation;

class CompaniesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $companies = [
            ['company_association' => 'LG'],
            ['company_association' => 'APPLE'],
            ['company_association' => 'XIAOMI'],
            ['company_association' => 'SAMSUNG'],
            ['company_association' => 'BELKIN'],
            ['company_association' => 'HUAWEI'],
            ['company_association' => 'RAPOO'],
            ['company_association' => 'MICROSOFT'],
            ['company_association' => 'DEKA'],
            ['company_association' => 'HAIER'],
            ['company_association' => 'PANASONIC'],
            ['company_association' => 'ROMBAM'],
            ['company_association' => 'NESCAFE'],
            ['company_association' => 'KHIND'],
            ['company_association' => 'SHARP'],
            ['company_association' => 'OGAWA'],
            ['company_association' => 'LAIFEN'],
            ['company_association' => 'AQARA'],
            ['company_association' => 'UNIQ'],
            ['company_association' => 'FABER'],
            ['company_association' => 'KDK'],
            ['company_association' => 'UNKNOWN'],
        ];

        CompanyAssociation::insert($companies);
    }
}
