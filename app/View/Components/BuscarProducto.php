<?php

namespace App\View\Components;

use Illuminate\View\Component;

class BuscarProducto extends Component
{
    public $categories;
    public function __construct($categories)
    {
        $this->categories = $categories;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.buscar-producto');
    }
}
