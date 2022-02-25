<?php

namespace App\View\Components;

use Illuminate\View\Component;

class statusCart extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($status=0, $quantity=0)
    {
       $this->status=$status;
       $this->quantity=$quantity;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $status = $this->status;
        $quantity = $this->quantity;
        return view('components.status-cart',
        [
            'status' => $status,
            'quantity' => $quantity
        ]
    );
    }
}
