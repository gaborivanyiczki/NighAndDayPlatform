<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\VoucherDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Voucher\Update;
use App\Http\Requests\Voucher\Store;
use App\Repository\Eloquent\VoucherRepository;
use App\Repository\Eloquent\VoucherTypeRepository;
use App\Voucher;
use Illuminate\Http\Request;

class VouchersController extends Controller
{
    protected $voucherRepo;
    protected $voucherTypeRepo;

    public function __construct(VoucherRepository $voucherRepository, VoucherTypeRepository $voucherTypeRepository)
    {
        $this->middleware('auth');
        $this->middleware('role:administrator');

        $this->voucherRepo = $voucherRepository;
        $this->voucherTypeRepo = $voucherTypeRepository;
    }

    public function index(VoucherDataTable $dataTable)
    {
        return $dataTable->render('dashboard.voucher.index');
    }

    public function create()
    {
        $voucherTypes = $this->voucherTypeRepo->getVoucherTypes();
        return view('dashboard.voucher.create', [
            'voucherTypes' => $voucherTypes
            ]);
    }

    public function store(Store $request)
    {
        $model=new Voucher();
        $model->fill($request->input());

        $model->save();

        return redirect()->route('dashboard.vouchers');
    }


    public function edit($id)
    {
        $voucher = $this->voucherRepo->findVoucherById($id);
        $voucherTypes = $this->voucherTypeRepo->getVoucherTypes();

        return view('dashboard.voucher.edit', [
            'model' => $voucher,
            'voucherTypes' => $voucherTypes
            ]);
    }

    public function update(Update $request)
    {
        $voucher = Voucher::find($request->VoucherID);
        $voucher->fill($request->input());

        if ($voucher->save()) {

            session()->flash('app_message', 'Voucher successfully updated');
            return redirect()->route('dashboard.vouchers');
            } else {
                session()->flash('app_error', 'Something is wrong while updating Voucher');
            }
        return redirect()->back();
    }

    public function destroy(Request $request)
    {
        $voucher = Voucher::find($request->id);

        if ($voucher->delete()) {
                session()->flash('app_message', 'Brand successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting Brand');
            }

        return redirect()->back();
    }

}
