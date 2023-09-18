<div class="buscador">
    {{-- YA QUE SOLO VMOS A DEVOLVER UNA VISTA CON DATOS --}}
    <form action="{{ route('busqueda.search') }}" method="GET">
        <div class="flex-buscador">
            <div class="form-group">
                <select name="categoria" class="form-select w-100" id="categoria">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <button type="submit" class="boton boton-color">
                    Buscar Producto
                </button>
            </div>
        </div>
    </form>
</div>
