<?php

namespace App\Models\BloodRequest;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Auth;

class BloodRequest extends Auth
{
    protected $guarded='web';
    protected $fillable= [
        'name',
        'hospital_name',
        'hospital_location',
        'contact_number',
        'pint',
        'sex',
        'bloodtype',
        'date'
    ];
}
