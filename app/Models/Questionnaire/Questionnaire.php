<?php

namespace App\Models\Questionnaire;
use App\Models\Donor\Donor;
use App\Models\User\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Auth;
class Questionnaire extends Auth

{
    protected $guarded='questionnaire';
    protected $fillable= [
         'name'
        ,'password'
        ,'image'
        ,'phone'
        ,'symptoms'
        ,'posted_by'
    ];

//    public function donatedBy()
//    {
//        return $this->hasMany(Questionnaire::class, 'donated_by','id');
//    }


    public function postedBy()
    {
        return $this->belongsTo(User::class, 'posted_by','id');
    }



//    public function password()
//    {
//        return $this->belongsTo(User::class, 'password','id');
//    }
}
