<?php

namespace App\Models\Email;

use App\Models\Donor\Donor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Auth;


class Email extends Auth
{
    protected $guarded='web';
    // protected $guarded='questionnaire';

    protected $fillable= ['posted_by','requested_by','email1','email2'];


    public function postedBy()
    {
        return $this->belongsTo(User::class,'posted_by','id');
    }

    // public function requestedBy()
    // {
    //     return $this->belongsTo(Donor::class,'requested_by','id');
    // }
}
