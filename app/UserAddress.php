<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Fico7489\Laravel\EloquentJoin\Traits\EloquentJoin;

class UserAddress extends Model
{
    use EloquentJoin;

    protected $table = 'user_addresses';

    protected $fillable = ['User_ID', 'AddresType_ID', 'Address', 'Zipcode', 'Telephone', 'ContactName', 'Default'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
