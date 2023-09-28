@section('navegador')
    <nav class="navbar navbar-expand-lg boton-color container-fluid" id="navegador-admin">
        <div class="container-fluid">
            <div class="logo">
                <a href="{{ route('home') }}" target="_blank">
                    <img src="{{ asset('img/logo/FAMILC.png') }}" alt="">
                </a>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon text-white"><svg xmlns="http://www.w3.org/2000/svg"
                        class="icon icon-tabler icon-tabler-menu-2" width="40" height="40" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M4 6l16 0" />
                        <path d="M4 12l16 0" />
                        <path d="M4 18l16 0" />
                    </svg></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active text-white " aria-current="page"
                            href="{{ route('dashboard.index') }}">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('admin.category.index') }}">Categorias</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('admin.product.index') }}">Productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('admin.provider.index') }}">Proveedores</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link text-white dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Inventario
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="{{ route('admin.income.create') }}">Registrar Compra</a></li>
                            <li><a class="dropdown-item" href="{{ route('admin.income.index') }}">Lista de Compras</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link text-white dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Ventas
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            {{-- <li><a class="dropdown-item" href="{{ route('admin.sale.index') }}">Pedidos por Entregar</a></li> --}}
                            <li><a class="dropdown-item" href="{{ route('admin.sale.list') }}">Ventas Pagados</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('admin.photo.index') }}">Fotos</a>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <input type="submit" class="btn btn-danger" value="Salir">
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
@endsection
