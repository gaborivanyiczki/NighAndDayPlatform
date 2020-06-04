<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Fico7489\Laravel\EloquentJoin\Traits\EloquentJoin;

class UserVoucher extends Model
{
    use EloquentJoin;

    protected $table = 'user_vouchers';

    protected $fillable = ['User_ID', 'Voucher_ID', 'Used'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
