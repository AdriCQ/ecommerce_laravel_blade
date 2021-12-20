<?php

namespace App\View\Components\Widget;

use App\Models\Shop\Product as ShopProduct;
use Illuminate\Support\Facades\Log;
use Illuminate\View\Component;

class Product extends Component
{
    public $product;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($product)
    {
        // Log::info($product);
        $this->product = $product;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.widget.product');
    }
}
