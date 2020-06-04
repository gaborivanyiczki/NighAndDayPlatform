<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomOrder extends Model
{
    protected $table = 'custom_orders';

    protected $fillable=['User_ID',
    'Sponge_ID',
    'Cover_ID',
    'lenght',
    'width',
    'quantity',
    'observation'];


    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function sponge()
    {
        return $this->belongsTo('App\ConfiguratorElement');
    }
    public function cover()
    {
        return $this->belongsTo('App\ConfiguratorElement');
    }
}
