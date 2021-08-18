<?php

namespace App\Models\User;

use App\Models\Donor\Donor;
use App\Models\Questionnaire\Questionnaire;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Auth;

class User extends Auth
{
//    protected $primaryKey = 'id';
    protected $guarded='web';
    protected $fillable= [
        'user_name',
        'user_username',
        'user_email',
        'password',
        'status'
    ];

    public function postedBy()
    {
        return $this->hasMany(User::class, 'posted_by','id');
    }

}
