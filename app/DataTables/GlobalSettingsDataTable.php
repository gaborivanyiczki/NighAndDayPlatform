<?php

namespace App\DataTables;

use App\GlobalSettings;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class GlobalSettingsDataTable extends DataTable
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
     * @param \App\GlobalSetting $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(GlobalSettings $model)
    {
        return $model->select('id','Name','Value');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('globalsettings-table')
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
            Column::make('Name'),
            Column::make('Value'),
        ];
    }

    protected function getActionColumn($data): string
    {
        $editUrl = route('dashboard.settings.edit', $data->id);
        $edit = '<a class="btn btn-primary btn-sm btn mr-3" data-value="'.$data->id.'" href="'.$editUrl.'"><i class="fa fa-edit"></i></a>';
        return $edit;
    }


    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'GlobalSettings_' . date('YmdHis');
    }
}
