<?php

namespace App\DataTables;

use App\User;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class UserDataTable extends DataTable
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
            ->editColumn('active', function($data) {
                return '<i class="fa fa-'. ($data->active ? 'check' : 'times') .'" aria-hidden="true"></i>';
            })
            ->addColumn('action', function ($data){
                return $this->getActionColumn($data);
            })
            ->rawColumns(['active', 'action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model)
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
                    ->setTableId('user-table')
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
            Column::make('id')->title('ID User')->width('10%'),
            Column::make('firstname')->title('Nume')->width('18%'),
            Column::make('lastname')->title('Prenume')->width('17%'),
            Column::make('email')->title('Email')->width('15%'),
            Column::make('telephone')->title('Numar telefon')->width('15%'),
            Column::make('active')->title('Activ')->width('10%'),
        ];
    }

    protected function getActionColumn($data): string
    {
        $editUrl = route('dashboard.users.edit', $data->id);
        $deleteUrl = route('dashboard.users.destroy', $data->id);
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
        return 'User_' . date('YmdHis');
    }
}
