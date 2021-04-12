<?php

namespace App\Widgets;

use App\Models\ADS;
use Arrilot\Widgets\AbstractWidget;

class AdsWidget extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [
        'count'=>10
    ];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {

        $ads = ADS::DateFrom()->DateTo()->Active()->inRandomOrder()->take($this->config['count'])->get();

        return view('widgets.ads_widget', [
            'config' => $this->config,
            'ads'=>      $ads
        ]);
    }
}
