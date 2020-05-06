<?php

namespace App\DataTables;

use App\Brand;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class BrandDataTable extends DataTable
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
            ->editColumn('Active', function($data) {
                return '<i class="fa fa-'. ($data->Active ? 'check' : 'times') .'" aria-hidden="true"></i>';
            })
            ->editColumn('WidgetShow', function($data) {
                return '<i class="fa fa-'. ($data->WidgetShow ? 'check' : 'times') .'" aria-hidden="true"></i>';
            })
            ->addColumn('action', function ($data){
                return $this->getActionColumn($data);
            })
            ->rawColumns(['Active', 'action','WidgetShow','created_at']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Brand $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Brand $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('brand-table')
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
            Column::make('id')->title('ID Brand')->width('15%'),
            Column::make('Name')->title('Denumire')->width('20%'),
            Column::make('Slug')->title('Slug')->width('20%'),
            Column::make('WidgetShow')->title('Arata in meniu/widget')->width('12%'),
            Column::make('Active')->title('Activ')->width('10%'),
            Column::make('created_at')->title('Data crearii')->width('15%'),
        ];
    }

     /**
     * Get action columns.
     *
     * @return array
     */
    protected function getActionColumn($data): string
    {
        $editUrl = route('dashboard.brands.edit', $data->id);
        $deleteUrl = route('dashboard.brands.delete', $data->id);
        $edit = '<a class="btn btn-primary btn-xs btn mr-3" data-value="'.$data->id.'" href="'.$editUrl.'"><i class="fa fa-edit"></i></a>';
        $delete = "<form onSubmit='return confirm('Doresti sa stergi acest brand?');' action='$deleteUrl' method='get' style='display: contents;'><button type='submit' class='btn btn-danger btn-xs'><i class='fa fa-remove'></i></button></form>";
        return $edit . $delete;
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Brand_' . date('YmdHis');
    }
}
