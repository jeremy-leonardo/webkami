<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('project_categories')->insert([
            [
                'name' => 'Company Profile atau Sejenisnya'
            ],
            [
                'name' => 'Blog'
            ],
            [
                'name' => 'Point of Sale (POS), web app sales (kasir/ penjualan)'
            ],
            [
                'name' => 'Data Visualization dari web dengan data source yang sudah anda miliki'
            ],
            [
                'name' => 'Lainnya'
            ],
        ]);
    }
}
