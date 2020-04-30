<?php

namespace App\DataTables;

use App\Order;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class OrderDataTable extends DataTable
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
            ->addColumn('action', function ($data){
                return $this->getActionColumn($data);
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Order $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Order $model)
    {
        return $model->join('users', 'users.id', '=', 'User_ID')
                     ->join('order_statuses', 'order_statuses.id', '=', 'OrderStatus_ID')
                     ->select(['orders.id', 'users.email as UserEmail', 'order_statuses.Name as OrderStatus', 'TotalNet as Total', 'orders.created_at']);
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
            Column::make('UserEmail')->title('Email utilizator')->width('20%'),
            Column::make('OrderStatus')->title('Status comanda')->width('20%'),
            Column::make('Total')->title('Total comanda')->width('15%'),
            Column::make('created_at')->title('Data comenzii')->width('20%'),
        ];
    }

    protected function getActionColumn($data): string
    {
        $editUrl = route('dashboard.categories.edit', $data->id);
        $deleteUrl = route('dashboard.categories.destroy', $data->id);
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
        return 'Order_' . date('YmdHis');
    }
}
