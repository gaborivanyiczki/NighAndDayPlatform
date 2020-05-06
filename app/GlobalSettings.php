<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GlobalSettings extends Model
{
    protected $table = 'global_settings';

    /**
    * Mass assignable columns
    */
    protected $fillable=['Name',
                        'Value'];
}
