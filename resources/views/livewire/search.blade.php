<div class="">

    <form class="mt-3">
        <div class="row">
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping"><i class='bx bx-search' style='color:#f32125'></i></span>
                <input wire:model="search" class="form-control me-2" type="search" name="search"
                    placeholder="Escriba el producto que desea buscar" autocomplete="off">
            </div>
        </div>
    </form>

    <div class="">
        @if ($search)
            <ul class="list-group z-index mt-1">
                {{-- PINTANDO LOS DATOS CON METODO "getResultsProperty" --}}
                @forelse ($this->results as $result)
                    <a href="{{ route('product.show', ['product' => $result]) }}">
                        <li class="list-group-item">{{ $result->nombre }}</li>
                    </a>
                @empty
                    <li class="list-group-item">No hubo resultados</li>
                @endforelse
            </ul>
        @endif
    </div>
</div>
