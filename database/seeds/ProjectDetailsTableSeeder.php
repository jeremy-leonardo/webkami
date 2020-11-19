<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('project_details')->insert([
            [
                'title' => 'Company Profile untuk PT. Akselerasi Dunia Indonesia Jaya Pertama',
                'description' => 'Pembuatan website static untuk PT. Akselerasi Dunia Indonesia Jaya Pertama dengan menggunakan plain HTML, CSS, Javascript tanpa perlu support CMS. Namun deployment juga merupakan tanggung jawab dari pengambil project. Desain sudah ada dari designer internal perusahaan.',
                'project_category_id' => 1,
                'deadline' => '2021-05-02',
                'client_user_id' => 2,
                'budget' => 3000000,
            ],
        ]);
    }
}
