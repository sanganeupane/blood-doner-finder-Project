<?php

use Illuminate\Database\Seeder;
use App\Models\Donor\Donor;
class DonorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Donor::create([
            'donor_name'=>'Santosh',
            'email'=>'neupane.santosh55@gmail.com',

            'address'=>'KTM',
            'bloodtype'=>'O+',
            'sex'=>'male',
            'phone'=>'9860001244',
            'status'=>'0',
            'posted_by'=>'1'
//            'donated_by'=>'1'
            ]);
    }
}
