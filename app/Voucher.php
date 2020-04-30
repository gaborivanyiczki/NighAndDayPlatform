<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Fico7489\Laravel\EloquentJoin\Traits\EloquentJoin;

class Voucher extends Model
{
    use EloquentJoin;

    protected $table = 'vouchers';

    /**
    * Mass assignable columns
    */
    protected $fillable=['Code',
                        'Discount',
                        'Active',
                        'VoucherType_ID',
                        'StartDate',
                        'ExpiryDate'
                        ];
}
