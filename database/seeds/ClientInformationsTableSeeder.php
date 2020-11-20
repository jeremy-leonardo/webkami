<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientInformationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('client_informations')->insert([
            [
                'user_id' => 2,
                'company' => 'PT. Akselerasi Dunia Indonesia Jaya Pertama',
                'description' => 'PT. Akselerasi Dunia Indonesia Jaya Pertama adalah perusahaan terbuka yang bekerja di sektor petrokimia',
                'field' => 'Petrokimia',
                'phone' => '4612414'
            ],
            [
                'user_id' => 4,
                'company' => 'PT. Internasional Dunia Kaya Makmur',
                'description' => 'PT. Internasional Dunia Kaya Makmur adalah perusahaan terbuka yang bekerja di sektor pertambangan',
                'field' => 'Pertambangan',
                'phone' => '4617128'
            ],
        ]);
    }
}
