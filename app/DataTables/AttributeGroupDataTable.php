<?php

namespace App\DataTables;

use App\AttributeGroup;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class AttributeGroupDataTable extends DataTable
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
            ->addColumn('action', function ($data){
                return $this->getActionColumn($data);
            })
            ->rawColumns(['created_at','action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\AttributeGroup $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(AttributeGroup $model)
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
                    ->setTableId('attributegroup-table')
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
            Column::make('id')->title('ID Grup Atribute')->width('20%'),
            Column::make('Name')->title('Denumire Grup')->width('30%'),
            Column::make('created_at')->title('Data crearii')->width('30%'),
        ];
    }

    /**
     * Get action columns.
     *
     * @return array
     */
    protected function getActionColumn($data): string
    {
        $editUrl = route('dashboard.attributes.groups.edit', $data->id);
        $deleteUrl = route('dashboard.attributes.groups.destroy', $data->id);
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
        return 'AttributeGroup_' . date('YmdHis');
    }
}
