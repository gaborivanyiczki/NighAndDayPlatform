<?php

namespace App\DataTables;

use App\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;
use Yajra\DataTables\DataTablesEditor;

class ProductDataTableEditor extends DataTablesEditor
{
    protected $model = Product::class;

    /**
     * Get create action validation rules.
     *
     * @return array
     */
    public function createRules()
    {
        return [
            'email' => 'required|email|unique:' . $this->resolveModel()->getTable(),
            'name'  => 'required',
        ];
    }

    /**
     * Get edit action validation rules.
     *
     * @param Model $model
     * @return array
     */
    public function editRules(Model $model)
    {
        return [
            'Name' => 'sometimes|required|' . Rule::unique($model->getTable())->ignore($model->getKey()),
            'Slug' => 'sometimes|required|' . Rule::unique($model->getTable())->ignore($model->getKey()),
            'Price'  => 'sometimes|required',
            'Description'  => 'sometimes|required',
        ];
    }

    /**
     * Get remove action validation rules.
     *
     * @param Model $model
     * @return array
     */
    public function removeRules(Model $model)
    {
        return [];
    }
}
