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
        $products = Product::where('nombre', 'LIKE', '%' . $this->search . '%')
            ->whereNotIn('category_id', [6, 7, 8, 9, 10, 11])
            ->take(10)->get();
        return $products;
    }
}
