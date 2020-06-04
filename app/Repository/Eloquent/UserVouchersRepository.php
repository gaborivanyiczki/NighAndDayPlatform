<?php

namespace App\Repository\Eloquent;

use App\Repository\UserVouchersRepositoryInterface;
use App\UserVoucher;
use Illuminate\Database\Eloquent\Model;


class UserVouchersRepository extends BaseRepository implements UserVouchersRepositoryInterface
{
    protected $model;

    public function __construct(UserVoucher $userVoucher)
    {
        $this->model = $userVoucher;
    }

    public function getUserVouchers($userId)
    {
        return $this->model->where('User_ID', $userId)
                            ->join('vouchers', 'vouchers.id', '=', 'Voucher_ID')
                            ->join('voucher_types as vt', 'vt.id', '=', 'VoucherType_ID')
                            ->select('vouchers.Code as VoucherCode', 'vouchers.Discount', 'vt.Sign', 'vouchers.StartDate', 'vouchers.ExpiryDate', 'Used', 'vouchers.Active')
                            ->get()->toArray();
    }
}
