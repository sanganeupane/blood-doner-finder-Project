<?php

use Illuminate\Database\Seeder;
use App\Models\Questionnaire\Questionnaire;
class QuestionnaireSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Questionnaire::create([
            'name'=>'santosh',
            'password'=>bcrypt('santosh002'),
            'phone'=>'9860001244',
            'symptoms'=>'headaches',
            'status'=>1,
            'posted_by'=>1

        ]);

    }

}
