<?php

namespace App;
use Fico7489\Laravel\EloquentJoin\Traits\EloquentJoin;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use EloquentJoin;
    protected $table = 'products';

    public function images()
    {
        return $this->hasMany('App\ProductMediaFile', 'Product_ID');
    }

    public function attributes()
    {
        return $this->hasMany('App\ProductAttribute', 'Product_ID');
    }

}
