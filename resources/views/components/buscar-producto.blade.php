<div class="buscador">
    {{-- YA QUE SOLO VMOS A DEVOLVER UNA VISTA CON DATOS --}}
    <form action="{{ route('busqueda.search') }}" method="GET">
        <div class="flex-buscador">
            <div class="caja-grupo">
                <label for="categoria" class="">Seleccione la categoria</label>
                <select name="categoria" class="caja-admin espacio-abajo" id="categoria">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <button type="submit" class="boton boton-login">
                    Buscar Producto
                </button>
            </div>
        </div>
    </form>
</div>
