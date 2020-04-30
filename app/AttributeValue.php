<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Fico7489\Laravel\EloquentJoin\Traits\EloquentJoin;

class AttributeValue extends Model
{
    use EloquentJoin;
    protected $table = 'attribute_values';

    protected $fillable=['Attribute_ID',
    'Value',
    'CreatedUser'];

    public function attribute()
    {
        return $this->belongsTo('App\Attribute');
    }
}
