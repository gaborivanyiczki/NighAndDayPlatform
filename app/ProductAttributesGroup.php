<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductAttributesGroup extends Model
{
    protected $table = 'products_attributes_groups';

    public function attributes()
    {
        return $this->hasMany('App\ProductAttribute', 'Attribute_Group_ID');
    }
}
