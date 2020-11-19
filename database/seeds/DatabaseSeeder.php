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
        $this->call(ClientInformationsTableSeeder::class);
        $this->call(EducationLevelsTableSeeder::class);
        $this->call(DeveloperInformationsTableSeeder::class);
        $this->call(ProjectCategoriesTableSeeder::class);
        $this->call(ProjectDetailsTableSeeder::class);
        $this->call(ProjectStatusesTableSeeder::class);
    }
}
