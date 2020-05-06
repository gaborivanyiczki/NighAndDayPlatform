<?php

namespace App\DataTables;

use App\Attribute;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class AttributeDataTable extends DataTable
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
            ->editColumn('Choosable', function($data) {
                return '<i class="fa fa-'. ($data->Choosable ? 'check' : 'times') .'" aria-hidden="true"></i>';
            })
            ->addColumn('action', function ($data){
                return $this->getActionColumn($data);
            })
            ->rawColumns(['Choosable', 'action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Attribute $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Attribute $model)
    {
        return $model->leftjoin('attribute_groups as ag', 'ag.id', '=', 'Attribute_Group_ID')
                      ->select('attributes.id', 'ag.Name as AttributeGroup', 'attributes.Name', 'attributes.Choosable');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('attribute-table')
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
            Column::make('id')->title('ID Atribut')->width('20%'),
            Column::make('AttributeGroup')->title('Grup Atribut Legatura')->width('25%'),
            Column::make('Name')->title('Nume atribut')->width('25%'),
            Column::make('Choosable')->title('Selectabil (pagina produs)')->width('20%'),
        ];
    }


     /**
     * Get action columns.
     *
     * @return array
     */
    protected function getActionColumn($data): string
    {
        $editUrl = route('dashboard.attributes.edit', $data->id);
        $deleteUrl = route('dashboard.attributes.destroy', $data->id);
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
        return 'Attribute_' . date('YmdHis');
    }
}
