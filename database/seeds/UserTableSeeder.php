<?php

use Illuminate\Database\Seeder;
use App\Models\User\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'user_name'=>'santosh',
            'user_username'=>'santosh',
            'user_email'=>'neupane.santosh55@gmail.com',
            'password'=>bcrypt('santosh002'),
            'status'=>1
        ]);
    }
}
