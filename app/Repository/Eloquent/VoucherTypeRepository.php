<?php

namespace App\Repository\Eloquent;

use App\Repository\VoucherTypeRepositoryInterface;
use App\VoucherType;
use Illuminate\Database\Eloquent\Model;


class VoucherTypeRepository extends BaseRepository implements VoucherTypeRepositoryInterface
{
    protected $model;

    public function __construct(VoucherType $voucherType)
    {
        $this->model = $voucherType;
    }

    public function getVoucherTypes()
    {
        return $this->model->select('id','Name')
                            ->get();
    }
}
