<?php

namespace App;
use Fico7489\Laravel\EloquentJoin\Traits\EloquentJoin;

use Illuminate\Database\Eloquent\Model;

class ConfiguratorElement extends Model
{
    use EloquentJoin;

    protected $table = 'configurator_elements';

    /**
    * Mass assignable columns
    */
    protected $fillable=['Name',
                        'ElementType_ID',
                        'ImagePath',
                        'ImageFile'];

    /**
    * Date time columns.
    */
    protected $dates=[];

}
