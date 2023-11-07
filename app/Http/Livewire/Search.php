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
        $products = Product::join('photos', 'products.id', '=', 'photos.product_id')
            ->where('products.nombre', 'LIKE', '%' . $this->search . '%')
            ->select('products.*', 'photos.foto_uno as foto') // Selecciona las columnas que necesitas
            ->take(10)
            ->get();
        return $products;
    }
}
