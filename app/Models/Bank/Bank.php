<?php

namespace App\Models\Bank;

use Illuminate\Database\Eloquent\Model;
//use App\Models\User as Auth;
use Illuminate\Foundation\Auth\User as Auth;
class Bank extends Auth
{
    protected $guarded='admin';
    protected $fillable= ['blood_bank_name','blood_bank_location','blood_bank_contact','blood_bank_email','image'];
}
