<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property bigint $Product_ID Product ID
@property bigint $User_ID User ID
@property timestamp $created_at created at
@property timestamp $updated_at updated at
@property UserID $user belongsTo
@property ProductID $product belongsTo
   
 */
class ProductWishlist extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'product_wishlists';

    /**
    * Mass assignable columns
    */
    protected $fillable=['Product_ID',
'User_ID'];

    /**
    * Date time columns.
    */
    protected $dates=[];

    /**
    * userID
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function userID()
    {
        return $this->belongsTo(User::class,'User_ID');
    }

    /**
    * productID
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function productID()
    {
        return $this->belongsTo(Product::class,'Product_ID');
    }




}