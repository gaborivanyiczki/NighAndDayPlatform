<?php

namespace App;
use Fico7489\Laravel\EloquentJoin\Traits\EloquentJoin;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use EloquentJoin;

    protected $table = 'products';

    /**
    * Mass assignable columns
    */
    protected $fillable=['Name',
                        'Slug',
                        'ProductCode',
                        'Warranty',
                        'Return',
                        'Delivery',
                        'Description',
                        'Price',
                        'DiscountPrice',
                        'Discount',
                        'Quantity',
                        'Status_ID',
                        'Category_ID',
                        'Brand_ID',
                        'Active',
                        'Favorite',
                        'CreatedUser'];

    /**
    * Date time columns.
    */
    protected $dates=[];


    /**
    * productWishlists
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function productWishlists()
    {
        return $this->hasMany(ProductWishlist::class,'Product_ID');
    }

    public function images()
    {
        return $this->hasMany('App\ProductMediaFile', 'Product_ID');
    }

    public function attributes()
    {
        return $this->hasMany('App\ProductAttribute', 'Product_ID');
    }

}
