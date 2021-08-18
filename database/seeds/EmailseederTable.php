<?php

use App\Models\Email\Email;
use Illuminate\Database\Seeder;

class EmailseederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // posted_by','requested_by','email1','email2
        Email::create([
            'posted_by'=>1,
            // 'requested_by'=>1,
            'email1'=>'neupane.santosh55@gmail.com',
            'email2'=>'cranky.scar12345@gmail.com',
        ]);
    }
    }
