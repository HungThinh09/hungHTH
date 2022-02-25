<?php

namespace App\View\Components;

use Illuminate\View\Component;

class productList extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $products;
    public $nameProduct;
    public $pagi;
    public function __construct($products, $nameProduct="", $pagi=0)
    {
        $this->products=$products;
        $this->nameProduct=$nameProduct;
        $this->pagi=$pagi;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {

        $products=$this->products;
        $nameProduct=$this->nameProduct;
        $pagi=$this->pagi;

        return view('components.productlist',[
            'products' => $products,
            'nameProduct' => $nameProduct,
            'pagi' => $pagi
        ]);
    }
}
