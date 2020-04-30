<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Fico7489\Laravel\EloquentJoin\Traits\EloquentJoin;

class VoucherType extends Model
{
    use EloquentJoin;

    protected $table = 'voucher_types';

    /**
    * Mass assignable columns
    */
    protected $fillable=['Code',
                        'Name',
                        'Sign'
                        ];
}
