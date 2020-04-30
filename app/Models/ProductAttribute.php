<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property bigint $Product_ID Product ID
@property bigint $Attribute_ID Attribute ID
@property bigint $Product_Attribute_Group_ID Product Attribute Group ID
@property varchar $Value Value
@property varchar $CreatedUser CreatedUser
@property timestamp $created_at created at
@property timestamp $updated_at updated at
@property ProductAttributeGroupID $productsAttributesGroup belongsTo
@property AttributeID $attribute belongsTo
@property ProductID $product belongsTo
@property \Illuminate\Database\Eloquent\Collection $orderItem hasMany
   
 */
class ProductAttribute extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'product_attributes';

    /**
    * Mass assignable columns
    */
    protected $fillable=['Product_ID',
'Attribute_ID',
'Product_Attribute_Group_ID',
'Value',
'CreatedUser'];

    /**
    * Date time columns.
    */
    protected $dates=[];

    /**
    * productAttributeGroupID
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function productAttributeGroupID()
    {
        return $this->belongsTo(ProductsAttributesGroup::class,'Product_Attribute_Group_ID');
    }

    /**
    * attributeID
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function attributeID()
    {
        return $this->belongsTo(Attribute::class,'Attribute_ID');
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

    /**
    * orderItems
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class,'PAV_ID');
    }



}