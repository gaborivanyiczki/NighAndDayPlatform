<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Fico7489\Laravel\EloquentJoin\Traits\EloquentJoin;

class Attribute extends Model
{
    use EloquentJoin;
    protected $table = 'attributes';

    protected $fillable=['Name',
    'Description',
    'Attribute_Group_ID',
    'Choosable'];

    public function product_attributes()
    {
        return $this->hasMany('App\ProductAttribute', 'Attribute_ID');
    }

    public function attribute_group()
    {
        return $this->belongsTo('App\AttributeGroup');
    }
}
