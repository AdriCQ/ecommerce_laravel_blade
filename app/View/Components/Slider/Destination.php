<?php

namespace App\View\Components\Slider;

use Illuminate\View\Component;

class Destination extends Component
{
    public $destinations;
    public $title;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($destinations, $title = 'Destinos')
    {
        $this->destinations = $destinations;
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.slider.destination');
    }
}
