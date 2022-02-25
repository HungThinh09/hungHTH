<?php

namespace App\View\Components;

use Illuminate\View\Component;

class sale extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $sale;
    public $price;
    public function __construct($sale=0,$price)
    {
        $this->sale=$sale;
        $this->price=$price;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $sale=$this->sale;
        $price=$this->price;
      
        return view('components.sale',[
            'sale' => $sale,
            'price' => $price
        ]);
    }
}
