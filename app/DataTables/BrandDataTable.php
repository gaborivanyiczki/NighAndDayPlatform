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
            ->addColumn('action', function ($data){
                return $this->getActionColumn($data);
            });
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
            Column::make('id'),
            Column::make('Name'),
            Column::make('Description'),
            Column::make('Slug'),
            Column::make('Active'),
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
        $deleteUrl = route('dashboard.brands.destroy', $data->id);
        $edit = '<a class="btn btn-primary btn-sm" data-value="'.$data->id.'" href="'.$editUrl.'"><i class="fa fa-edit"></i></a>';
        $delete = "<form onSubmit='return confirm('Doresti sa stergi acest produs?');' action='$deleteUrl' method='post'>".csrf_field()."<button type='submit' class='btn btn-secondary cursor-pointer'><i class='text-danger fa fa-remove'></i></button></form>";
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
