<?php

namespace App\View\Components\Widget;

use Illuminate\View\Component;

class DestinationGroup extends Component
{
    public $destinations;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($destinations)
    {
        $this->destinations = $destinations;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.widget.destination-group');
    }
}
