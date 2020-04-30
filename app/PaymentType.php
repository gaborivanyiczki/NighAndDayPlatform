<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Fico7489\Laravel\EloquentJoin\Traits\EloquentJoin;

class PaymentType extends Model
{
    use EloquentJoin;

    protected $table = 'payment_types';

}
