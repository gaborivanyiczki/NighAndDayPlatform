<?php

namespace App\Steps\Order;

use App\ConfiguratorElement;
use Illuminate\Http\Request;
use Ycs77\LaravelWizard\Step;

class SpongeStep extends Step
{
    /**
     * The step slug.
     *
     * @var string
     */
    protected $slug = 'sponge';

    /**
     * The step show label text.
     *
     * @var string
     */
    protected $label = 'Burete';

    /**
     * The step form view path.
     *
     * @var string
     */
    protected $view = 'steps.order.sponge';

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
        //
    }

    public function getSponges()
    {
        $items = ConfiguratorElement::join('configurator_element_types as et', 'et.id', '=', 'ElementType_ID')
                                        ->where('et.Name', 'Burete')
                                        ->select('configurator_elements.id','configurator_elements.Name','ImagePath','ImageFile')
                                        ->get()
                                        ->toJson();
        return $items;
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
