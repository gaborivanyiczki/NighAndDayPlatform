<?php

namespace App\Http\Controllers;

use App\Steps\Order\CoverStep;
use App\Steps\Order\FinalStep;
use App\Steps\Order\SpongeStep;
use Ycs77\LaravelWizard\Wizardable;

class OrderWizardController extends Controller
{
    use Wizardable;

    /**
     * The wizard name.
     *
     * @var string
     */
    protected $wizardName = 'order';

    /**
     * The wizard title.
     *
     * @var string
     */
    protected $wizardTitle = 'Order';

    /**
     * The wizard options.
     *
     * @var array
     */
    protected $wizardOptions = [
        'cache' => true,
    ];

    /**
     * The wizard steps instance.
     *
     * @var array
     */
    protected $steps = [
        SpongeStep::class,
        CoverStep::class,
        FinalStep::class,
    ];

    public function __construct()
    {
        $this->middleware('auth');
    }
}
