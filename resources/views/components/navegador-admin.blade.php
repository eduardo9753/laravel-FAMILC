<div>
    @section('navegador')
        <nav id="navegador-admin" class="contenedor">
            <div class="logo">
                <a href="{{ route('home') }}" target="_blank">
                    <img src="{{ asset('img/logo/FAMILC.png') }}" alt="">
                </a>
            </div>


            <ul class="lista-navegador">
                <li class="item-navegador"><a href="{{ route('dashboard.index') }}">inicio</a></li>
                <li class="item-navegador"><a href="{{ route('admin.product.index') }}">productos</a></li>
                <li class="item-navegador"><a href="{{ route('admin.photo.index') }}">fotos</a></li>
                <li class="item-navegador"><a href="{{ route('admin.category.index') }}">categoria</a></li>
                <li class="item-navegador">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <input type="submit" class="btn-salir" value="Salir">
                    </form>
                </li>
            </ul>
        </nav>
    @endsection
</div>
