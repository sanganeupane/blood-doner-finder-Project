<?php

namespace App\Models\Donor;

use App\Models\Email\Email;
use App\Models\Questionnaire\Questionnaire;
use App\Models\User\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Auth;
class Donor extends Auth
{
    protected $guarded='questionnaire';
    protected $fillable= ['donor_name','email','address','lat1','lon1','bloodtype','sex','phone','status','posted_by'];

    public function postedBy()
    {
        return $this->belongsTo(User::class,'posted_by','id');
    }
    // public function requestedBy()
    // {
    //     return $this->hasMany(Donor::class, 'requested_by','id');
    // }

//    public function donatedBy()
//    {
//        return $this->belongsTo(Questionnaire::class,'donated_by','id');
//    }

}
