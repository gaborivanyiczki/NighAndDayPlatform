<?php

namespace App\DataTables;

use App\Product;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ProductDataTable extends DataTable
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
            ->editColumn('Active', function($data) {
                return '<i class="fa fa-'. ($data->Active ? 'check' : 'times') .'" aria-hidden="true"></i>';
            })
            ->addColumn('action', function ($data){
                return $this->getActionColumn($data);
            })
            ->rawColumns(['Active','action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Product $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Product $model)
    {
        return $model->join('categories', 'categories.id', '=', 'Category_ID')
                     ->select('products.id', 'products.Name', 'products.Price', 'products.DiscountPrice', 'products.Active', 'products.Quantity', 'products.ProductCode' , 'categories.Name as Category');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('product-table')
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
                  ->exportable(true)
                  ->printable(true)
                  ->width(60)
                  ->addClass('text-center'),
            Column::make('id')->title('ID')->width('5%'),
            Column::make('Name')->title('Denumire')->width('20%'),
            Column::make('ProductCode')->title('Cod produs')->width('10%'),
            Column::make('Category')->title('Categorie')->width('20%')->searchable(false),
            Column::make('Price')->title('Pret')->width('10%'),
            Column::make('DiscountPrice')->title('Pret redus')->width('10%'),
            Column::make('Quantity')->title('Cantitate stoc')->width('10%'),
            Column::make('Active')->title('Activ')->width('5%'),
        ];
    }

     /**
     * Get action columns.
     *
     * @return array
     */
    protected function getActionColumn($data): string
    {
        $editUrl = route('dashboard.product.edit', $data->id);
        $deleteUrl = route('dashboard.product.destroy', $data->id);
        $edit = '<a class="btn btn-primary btn-xs btn mr-3" data-value="'.$data->id.'" href="'.$editUrl.'"><i class="fa fa-edit"></i></a>';
        $delete = "<form onSubmit='return confirm('Doresti sa stergi acest produs?');' action='$deleteUrl' method='post' style='display: contents;'>".csrf_field()."<button type='submit' class='btn btn-danger btn-xs'><i class='fa fa-remove'></i></button></form>";
        return $edit . $delete;
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Product_' . date('YmdHis');
    }
}
