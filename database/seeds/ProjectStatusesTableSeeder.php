<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('project_statuses')->insert([
            [
                'name' => 'Dalam Pengerjaan',
            ],
            [
                'name' => 'Menunggu Pembayaran',
            ],
            [
                'name' => 'Selesai',
            ],
        ]);
    }
}
