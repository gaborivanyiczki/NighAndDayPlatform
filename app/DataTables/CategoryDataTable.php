<?php

namespace App\DataTables;

use App\Category;
use App\Repository\Eloquent\CategoriesRepository;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class CategoryDataTable extends DataTable
{
    protected $categoryRepo;

    public function __construct(CategoriesRepository $categoriesRepository)
    {
        $this->categoryRepo = $categoriesRepository;
    }

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
            ->editColumn('Active', function($data) {
                return '<i class="fa fa-'. ($data->Active ? 'check' : 'times') .'" aria-hidden="true"></i>';
            })
            ->editColumn('New', function($data) {
                return '<i class="fa fa-'. ($data->New ? 'check' : 'times') .'" aria-hidden="true"></i>';
            })
            ->addColumn('action', function ($data){
                return $this->getActionColumn($data);
            })
            ->rawColumns(['Active', 'action', 'New']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Category $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Category $model)
    {
        return $model->leftjoin('categories as cp', 'cp.id', '=', 'categories.parent_id')
                    ->select(['categories.id', 'cp.Name as Parent','categories.Name','categories.Active','categories.New']);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('category-table')
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
            Column::make('id')->title('ID Categorie')->width('15%'),
            Column::make('Parent')->title('Categorie Parinte')->width('28%'),
            Column::make('Name')->title('Denumire')->width('28%'),
            Column::make('Active')->title('Activ')->width('10%'),
            Column::make('New')->title('Marcat Nou')->width('10%'),
        ];
    }


    protected function getActionColumn($data): string
    {
        $editUrl = route('dashboard.categories.edit', $data->id);
        $deleteUrl = route('dashboard.categories.delete', $data->id);
        $edit = '<a class="btn btn-primary btn-xs btn mr-3" data-value="'.$data->id.'" href="'.$editUrl.'"><i class="fa fa-edit"></i></a>';
        $delete = "<form onSubmit='return confirm('Doresti sa stergi aceasta categorie?');' action='$deleteUrl' method='get' style='display: contents;'><button type='submit' class='btn btn-danger btn-xs'><i class='fa fa-remove'></i></button></form>";
        return $edit . $delete;
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Category_' . date('YmdHis');
    }
}
