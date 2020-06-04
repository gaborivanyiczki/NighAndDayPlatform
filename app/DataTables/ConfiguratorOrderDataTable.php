<?php

namespace App\DataTables;

use App\CustomOrder;
use App\Order;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ConfiguratorOrderDataTable extends DataTable
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
            })
            ->rawColumns(['action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Order $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(CustomOrder $model)
    {
        return $model->leftjoin('users', 'users.id', '=', 'User_ID')
                     ->join('configurator_elements as ce', 'ce.id', '=', 'Sponge_ID')
                     ->join('configurator_elements as ces', 'ces.id', '=', 'Cover_ID')
                     ->select(['custom_orders.id', 'custom_orders.lenght', 'custom_orders.width', 'custom_orders.quantity', 'custom_orders.observation','ce.Name as Sponge','ces.Name as Cover', 'users.Email'])
                     ->orderBy('custom_orders.created_at','desc');
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
            Column::make('id')->title('ID Comanda')->width('8%'),
            Column::make('Email')->title('Email utilizator')->width('14%')->searchable(false),
            Column::make('Sponge')->title('Tip Burete')->width('14%')->searchable(false),
            Column::make('Cover')->title('Tip Husa')->width('14%')->searchable(false),
            Column::make('lenght')->title('Lungime')->width('10%'),
            Column::make('width')->title('Latime')->width('10%'),
            Column::make('quantity')->title('Cantitate')->width('10%'),
            Column::make('observation')->title('Observatii')->width('20%'),
        ];
    }

    protected function getActionColumn($data): string
    {
        $viewUrl = route('dashboard.orders.configurator.show', $data->id);
        $view = '<a class="btn btn-success btn-xs btn mr-3" data-value="'.$data->id.'" href="'.$viewUrl.'"><i class="fa fa-eye"></i></a>';
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
