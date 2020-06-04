<?php

namespace App\DataTables;

use App\Order;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class OrderInvoiceDataTable extends DataTable
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
            ->editColumn('created_at', function($data) {
                return $data->created_at->format('Y-m-d H:i:s');
            })
            ->editColumn('Total', function($data) {
                return $data->Total . ' Lei';
            })
            ->editColumn('Confirmed', function($data) {
                return '<i class="fa fa-'. ($data->Confirmed ? 'check' : 'times') .'" aria-hidden="true"></i>';
            })
            ->editColumn('Archived', function($data) {
                return '<i class="fa fa-'. ($data->Archived ? 'check' : 'times') .'" aria-hidden="true"></i>';
            })
            ->addColumn('action', function ($data){
                return $this->getActionColumn($data);
            })
            ->editColumn('UserEmail', function($data) {
                return $data->UserEmail != null ? $data->UserEmail : 'Utilizator neinregistrat';
            })
            ->rawColumns(['created_at','action','Total','UserEmail','Confirmed','Archived']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Order $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Order $model)
    {
        return $model->leftjoin('users', 'users.id', '=', 'User_ID')
                     ->join('order_statuses', 'order_statuses.id', '=', 'OrderStatus_ID')
                     ->join('payment_types', 'payment_types.id', '=', 'PaymentType_ID')
                     ->select(['orders.id', 'users.email as UserEmail', 'orders.Confirmed','orders.Archived','order_statuses.Name as OrderStatus', 'payment_types.Name as PaymentType' ,'TotalNet as Total', 'orders.created_at']);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('order-table')
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
            Column::make('id')->title('ID Comanda')->width('10%'),
            Column::make('UserEmail')->title('Email utilizator')->width('14%')->searchable(false),
            Column::make('OrderStatus')->title('Status comanda')->width('14%')->searchable(false),
            Column::make('PaymentType')->title('Tip plata')->width('14%')->searchable(false),
            Column::make('Total')->title('Total comanda')->width('10%')->searchable(false),
            Column::make('created_at')->title('Data comenzii')->width('18%'),
            Column::make('Confirmed')->title('Confirmat')->width('5%'),
            Column::make('Archived')->title('Arhivat')->width('5%'),
        ];
    }

    protected function getActionColumn($data): string
    {
        $viewUrl = route('dashboard.orders.generateInvoice', $data->id);
        $view = '<a class="btn btn-success btn-xs btn mr-3" data-value="'.$data->id.'" href="'.$viewUrl.'"><i class="fa fa-files-o"></i> Descarca Factura</a>';
        return $view;
    }


    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Order_' . date('YmdHis');
    }
}
