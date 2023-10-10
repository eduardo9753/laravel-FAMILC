<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class Search extends Component
{
    public $search;


    public function render()
    {
        return view('livewire.search');
    }

    //METODO DE BUSQUEDA
    public function getResultsProperty()
    {
        $products = Product::where('nombre', 'LIKE', '%' . $this->search . '%')->take(10)->get();
        return $products;
    }
}
