<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(ClientInformationTableSeeder::class);
        $this->call(EducationLevelsTableSeeder::class);
        $this->call(DeveloperInformationTableSeeder::class);
        $this->call(ProjectCategoriesTableSeeder::class);
        $this->call(ProjectDetailsTableSeeder::class);
        $this->call(ProjectStatusesTableSeeder::class);
    }
}
