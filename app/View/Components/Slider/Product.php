<?php

namespace App\View\Components\Slider;

use App\Models\Shop\Product as ShopProduct;
use Illuminate\View\Component;

class Product extends Component
{
    public string $title;
    public array $products;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $title, array $products)
    {
        $this->title = $title;
        $this->products = $products;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.slider.product');
    }
}
