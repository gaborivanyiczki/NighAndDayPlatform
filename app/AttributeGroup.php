<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Fico7489\Laravel\EloquentJoin\Traits\EloquentJoin;

class AttributeGroup extends Model
{
    use EloquentJoin;
    protected $table = 'attribute_groups';

    public function attributes()
    {
        return $this->hasMany('App\Attribute', 'Attribute_Group_ID');
    }
}
