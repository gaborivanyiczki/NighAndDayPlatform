<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Fico7489\Laravel\EloquentJoin\Traits\EloquentJoin;

class ProductAttribute extends Model
{
    use EloquentJoin;
    protected $table = 'product_attributes';

    protected $fillable=['Product_ID',
                        'Attribute_ID',
                        'Product_Attribute_Group_ID',
                        'Attribute_Value_ID',
                        'CreatedUser'];

    public function product()
    {
        return $this->belongsTo('App\Product');
    }

    public function attribute_group()
    {
        return $this->belongsTo('App\ProductAttributesGroup');
    }

    public function attribute()
    {
        return $this->belongsTo('App\Attribute');
    }

    public function attribute_value()
    {
        return $this->belongsTo('App\AttributeValue');
    }


    public function attribute_choosable()
    {
        return $this->belongsTo('App\Attribute')->wherePivot('Choosable', 1);
    }
}
