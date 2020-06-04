<?php

namespace App\Steps\Order;

use App\ConfiguratorElement;
use App\CustomOrder;
use App\ViewModels\ConfiguratorViewModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Ycs77\LaravelWizard\Step;

class FinalStep extends Step
{
    /**
     * The step slug.
     *
     * @var string
     */
    protected $slug = 'final';

    /**
     * The step show label text.
     *
     * @var string
     */
    protected $label = 'Finalizare';

    /**
     * The step form view path.
     *
     * @var string
     */
    protected $view = 'steps.order.final';

    /**
     * Set the step model instance or the relationships instance.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Relations\Relation|null
     */
    public function model(Request $request)
    {
        //
    }

    /**
     * Save this step form data.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  array|null  $data
     * @param  \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Relations\Relation|null  $model
     * @return void
     */
    public function saveData(Request $request, $data = null, $model = null)
    {
        $data = $this->getRepo()->original()->reduce(function ($carry, $step) {
            return array_merge($carry, $step->data());
        }, []);

        $model = new CustomOrder();
        $model->User_ID = Auth::user()->id;

        foreach ($data as $key => $value)
        {
            $id = intval($value);
            switch ($key) {
                case 'configurator_sponge':
                    $model->Sponge_ID = $id;
                    break;
                case 'configurator_cover':
                    $model->Cover_ID = $id;
                    break;
                case 'lenght':
                    $model->lenght = $value;
                    break;
                case 'width':
                    $model->width = $value;
                    break;
                case 'quantity':
                    $model->quantity = $id;
                    break;
                case 'observation':
                    $model->observation = $value;
                    break;
            }
        }

        if($model->save())
        {
            return view('custom-order-success');
        }else{
            return redirect()->back();
        }
    }

    public function getStepsData()
    {
        $data = $this->getRepo()->original()->reduce(function ($carry, $step) {
            return array_merge($carry, (array)$step->data());
        }, []);

        $model = new ConfiguratorViewModel($data);

        return $model;
    }

    /**
     * Validation rules.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function rules(Request $request)
    {
        return [];
    }
}
