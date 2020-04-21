<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Fico7489\Laravel\EloquentJoin\Traits\EloquentJoin;

class UserVoucher extends Model
{
    use EloquentJoin;

    protected $table = 'user_vouchers';

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
