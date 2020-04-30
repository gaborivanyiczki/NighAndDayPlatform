<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property bigint $Product_ID Product ID
@property varchar $Path Path
@property varchar $Filename Filename
@property varchar $UploadedBy UploadedBy
@property tinyint $Default Default
@property timestamp $created_at created at
@property timestamp $updated_at updated at
@property ProductID $product belongsTo
   
 */
class ProductMediaFile extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'product_media_files';

    /**
    * Mass assignable columns
    */
    protected $fillable=['Product_ID',
'Path',
'Filename',
'UploadedBy',
'Default'];

    /**
    * Date time columns.
    */
    protected $dates=[];

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