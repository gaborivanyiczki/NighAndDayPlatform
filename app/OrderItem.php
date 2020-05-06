<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Fico7489\Laravel\EloquentJoin\Traits\EloquentJoin;

class OrderItem extends Model
{
    use EloquentJoin;

    protected $table = 'order_items';

    /**
    * Mass assignable columns
    */
    protected $fillable=['Order_ID',
                        'Product_ID',
                        'Quantity',
                        'ProductPrice',
                        'Total'];

    public function order()
    {
        return $this->belongsTo('App\Order');
    }

    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
