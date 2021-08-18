<?php

namespace App\Models\NewDonor;

use App\Models\User\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Auth;

class NewDonor extends Auth
{
    protected $guarded = 'questionnaire';
    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',

        'phone',
//        'age',
//        'weight',
        'occupation',
//        'report',
        'image',
        'food',

        'posted_by'
    ];

    public function postedBy()
    {
        return $this->belongsTo(User::class, 'posted_by', 'id');
    }
}
