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
         $this->call([
             UserTableSeeder::class,
             AdminUserTableSeeder::class,
             DonorTableSeeder::class,
             NewDonorSeeder::class,
             QuestionnaireSeederTable::class,
             EmailseederTable::class

    ]);
    }
}
