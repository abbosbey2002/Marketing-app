<?php

namespace App\View\Components;

use App\Models\Service;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PortfolyoCreate extends Component
{

    public $services1;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->services1 = Service::all();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('admin.components.portfolios.provider-portfolio-modal')->with('services1', $this->services1);
    }
}
