<?php

namespace App;
use Fico7489\Laravel\EloquentJoin\Traits\EloquentJoin;

use Illuminate\Database\Eloquent\Model;

class ConfiguratorElementType extends Model
{
    use EloquentJoin;

    protected $table = 'configurator_element_types';

    /**
    * Mass assignable columns
    */
    protected $fillable=['Name'];

    /**
    * Date time columns.
    */
    protected $dates=[];

}
