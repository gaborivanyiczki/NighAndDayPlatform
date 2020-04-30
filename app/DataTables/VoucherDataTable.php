<?php

namespace App\DataTables;

use App\Voucher;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class VoucherDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->editColumn('Active', function($data) {
                return '<i class="fa fa-'. ($data->Active ? 'check' : 'times') .'" aria-hidden="true"></i>';
            })
            ->addColumn('action', function ($data){
                return $this->getActionColumn($data);
            })
            ->rawColumns(['Active', 'action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Voucher $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Voucher $model)
    {
        return $model->join('voucher_types', 'voucher_types.id', '=', 'VoucherType_ID')
                        ->select('vouchers.id', 'vouchers.Code', 'Discount', 'voucher_types.Name as VoucherType', 'ExpiryDate', 'Active');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('voucher-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->buttons(
                        Button::make('create'),
                        Button::make('export'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
                  ->addClass('text-center'),
            Column::make('id')->title('ID Voucher')->width('10%'),
            Column::make('Code')->title('Cod Voucher')->width('20%'),
            Column::make('Discount')->width('15%'),
            Column::make('VoucherType')->title('Tip discount')->width('10%'),
            Column::make('ExpiryDate')->title('Data Expirarii')->width('20%'),
            Column::make('Active')->title('Activ')->width('10%')
        ];
    }

    protected function getActionColumn($data): string
    {
        $editUrl = route('dashboard.vouchers.edit', $data->id);
        $deleteUrl = route('dashboard.vouchers.destroy', $data->id);
        $edit = '<a class="btn btn-primary btn-sm btn mr-3" data-value="'.$data->id.'" href="'.$editUrl.'"><i class="fa fa-edit"></i></a>';
        $delete = "<form onSubmit='return confirm('Doresti sa stergi acest produs?');' action='$deleteUrl' method='post' style='display: contents;'>".csrf_field()."<button type='submit' class='btn btn-secondary cursor-pointer'><i class='text-danger fa fa-remove'></i></button></form>";
        return $edit . $delete;
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Voucher_' . date('YmdHis');
    }
}
