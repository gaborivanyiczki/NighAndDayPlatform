<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Fico7489\Laravel\EloquentJoin\Traits\EloquentJoin;

class OrderAddress extends Model
{
    use EloquentJoin;

    protected $table = 'order_address';

    /**
    * Mass assignable columns
    */
    protected $fillable=['Address',
                        'Telephone',
                        'ZipCode',
                        'ContactName',
                        'Email'];
}
