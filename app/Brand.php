<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table = 'brands';

    protected $fillable=['Name',
    'Slug',
    'Description',
    'Active',
    'New',
    'WidgetShow',
    'LogoPath',
    'LogoFile'];
}
