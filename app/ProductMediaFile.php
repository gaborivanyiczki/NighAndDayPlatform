<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductMediaFile extends Model
{
    protected $table = 'product_media_files';

    protected $casts = [
        'Default' => 'boolean',
    ];

    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
