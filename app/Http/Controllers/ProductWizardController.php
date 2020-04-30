<?php

namespace App\Http\Controllers;

use App\Steps\Product\ProductAttributes;
use App\Steps\Product\ProductDetails;
use App\Steps\Product\ProductImages;
use Ycs77\LaravelWizard\Wizardable;

class ProductWizardController extends Controller
{
    use Wizardable;

    /**
     * The wizard name.
     *
     * @var string
     */
    protected $wizardName = 'product';

    /**
     * The wizard title.
     *
     * @var string
     */
    protected $wizardTitle = 'Product';

    /**
     * The wizard options.
     *
     * @var array
     */
    protected $wizardOptions = [];

    /**
     * The wizard steps instance.
     *
     * @var array
     */
    protected $steps = [
        ProductDetails::class,
        ProductAttributes::class,
        ProductImages::class,
    ];

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:administrator');
    }
}
