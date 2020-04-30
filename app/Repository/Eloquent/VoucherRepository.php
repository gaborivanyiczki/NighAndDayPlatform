<?php

namespace App\Repository\Eloquent;

use App\Repository\VoucherRepositoryInterface;
use App\Voucher;
use Illuminate\Database\Eloquent\Model;


class VoucherRepository extends BaseRepository implements VoucherRepositoryInterface
{
    protected $model;

    public function __construct(Voucher $voucher)
    {
        $this->model = $voucher;
    }

    public function getVouchers()
    {
        return $this->model->get();
    }

    public function findVoucherById($id)
    {
        return $this->model->where('id', $id)
                            ->first();
    }
}
