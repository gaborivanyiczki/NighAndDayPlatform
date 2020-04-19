<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    public $table = 'contact_us';
    public $fillable = ['firstname','lastname','email','message'];
}