<?php

use Illuminate\Database\Seeder;

class NewDonorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\NewDonor\NewDonor::create([
            'first_name'=>'Santosh',
            'middle_name'=>'prasad',
            'last_name'=>'Neupane',

            'phone'=>'9860001244',
            'occupation'=>'farmer',
            'food'=>'apple,meat,egg',
            'status'=>1,
            'posted_by'=>1

        ]);
    }
}
