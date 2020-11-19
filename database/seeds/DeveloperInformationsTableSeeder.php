<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DeveloperInformationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('developer_informations')->insert([
            [
                'user_id' => 1,
                'last_formal_education_level_id' => 3,
                'last_formal_education_institution' => 'SMAN 74 Petang',
                'last_formal_education_field_of_study' => 'IPA',
                'current_formal_education_level_id' => 4,
                'current_formal_education_institution' => 'Universitas Bina Nusantara',
                'current_formal_education_field_of_study' => 'Teknik Informatika',
                'other_education' => 'Telah mengikuti training IT dari Kominfo',
                'skills' => 'Java, Angular',
                'phone' => '0821414251'
            ],
        ]);
    }
}
