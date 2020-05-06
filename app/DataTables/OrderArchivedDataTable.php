<?php

namespace App\DataTables;

use App\Order;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class OrderArchivedDataTable extends DataTable
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
            ->addColumn('action', function ($data){
                return $this->getActionColumn($data);
            })
            ->editColumn('UserEmail', function($data) {
                return $data->UserEmail != null ? $data->UserEmail : 'Utilizator neinregistrat';
            })
            ->rawColumns(['created_at','action','Total','UserEmail']);
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
                     ->where('orders.Archived', 1)
                     ->select(['orders.id', 'users.email as UserEmail', 'order_statuses.Name as OrderStatus', 'payment_types.Name as PaymentType' ,'TotalNet as Total', 'orders.created_at']);
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
            Column::make('UserEmail')->title('Email utilizator')->width('15%'),
            Column::make('OrderStatus')->title('Status comanda')->width('15%'),
            Column::make('PaymentType')->title('Tip plata')->width('15%'),
            Column::make('Total')->title('Total comanda')->width('10%'),
            Column::make('created_at')->title('Data comenzii')->width('20%'),
        ];
    }

    protected function getActionColumn($data): string
    {
        $viewUrl = route('dashboard.orders.show', $data->id);
        $editUrl = route('dashboard.orders.edit', $data->id);
        $deleteUrl = route('dashboard.orders.archive', $data->id);
        $view = '<a class="btn btn-success btn-xs btn mr-3" data-value="'.$data->id.'" href="'.$viewUrl.'"><i class="fa fa-eye"></i></a>';
        $edit = '<a class="btn btn-primary btn-xs btn mr-3" data-value="'.$data->id.'" href="'.$editUrl.'"><i class="fa fa-edit"></i></a>';
        $delete = "<form onSubmit='return confirm('Doresti sa arhivezi aceasta comanda?');' action='$deleteUrl' method='get' style='display: contents;'><button type='submit' class='btn btn-danger btn-xs'><i class='fa fa-trash' style='color:white;'></i></button></form>";
        return $view . $edit . $delete;
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
