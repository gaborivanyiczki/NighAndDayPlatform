<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Fico7489\Laravel\EloquentJoin\Traits\EloquentJoin;

class AddressType extends Model
{
    use EloquentJoin;

    protected $table = 'address_types';
}
