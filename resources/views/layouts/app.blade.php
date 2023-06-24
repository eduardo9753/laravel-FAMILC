<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />


    <meta name="keywords"
        content="tazas, TAZAS, tazas porsonalizadas, TAZAS PERSONALIZADAS, cuadros, CUADROS, cuadro, CUADRO, polos, polos sublimados, polos perzonalizados, polos estampados, sublimacion de tazas, diseños, gorros, botellas, tomatodos, logos, regalos, perzonalizados, tazas con fotos, tazas sublimadas, cuadros con fotos, cuadros sublimados, FAMILC, FAMILC SAC , familc, familc sac">
    <meta name="description"
        content="Tienda de productos personalizados, aqui encontraras distintos tipos de productos diseñados y podras tambien tu fotografias para retratarlos en los siguientes productos  - Tazas , Polos , Cuadro Roca , Tazas Chop">

    <title>FAMILC | Creaciones</title>

    <!-- GOOGLE FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Krub:wght@400;700&family=Montserrat:wght@300;400&family=Poppins:wght@200&family=Raleway:wght@300&display=swap"
        rel="stylesheet">


    <!-- BOX ICONS -->
    <!-- Boxicons CSS -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- Owl Stylesheets -->
    <link rel="stylesheet" href="{{ asset('owl/dist/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('owl/dist/assets/owl.theme.default.min.css') }}">

    <!-- DATATABLES CSS -->
    <link rel="stylesheet" href="{{ asset('datatable/dataTables.css') }}">
    <link rel="stylesheet" href="{{ asset('datatable/dataTables.min.css') }}">

    <!-- SPLIDE CSS -->
    <link rel="stylesheet" href="{{ asset('splide/dist/css/splide.min.css') }}">
    <link rel="stylesheet" href="{{ asset('splide/dist/css/splide-core.min.css') }}">

    <!-- ICONO DEL PROYECTO -->
    <link rel="icon" type="image/png" href="{{ asset('img/logo/FAMILC.png') }}">

    <!-- NORMALIZE CSS -->
    <link rel="stylesheet" href="{{ asset('css/normalize.css') }}">

    <!-- CSS TIENDA -->
    <link rel="stylesheet" href="{{ asset('css/colores.css') }}">
    <link rel="stylesheet" href="{{ asset('css/generales.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">

    <link rel="stylesheet" href="{{ asset('css/cliente/producto/producto.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cliente/producto/buscador.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cliente/empresa/empresa.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cliente/contacto/contacto.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cliente/galeria/galeria.css') }}">
    <link rel="stylesheet" href="{{ asset('css/nav.css') }}">
    <link rel="stylesheet" href="{{ asset('css/navAdmin.css') }}">

    <!-- CSS RESPONSIVE -->
    <link rel="stylesheet" href="{{ asset('css/responsive/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive/cliente.producto.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive/cliente.empresa.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive/cliente.contacto.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive/cliente.buscador.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive/cliente.galeria.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive/nav.css') }}">

    <!-- CSS ADMINISTRADOR -->
    <link rel="stylesheet" href="{{ asset('css/admin/auth/auth.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/producto/producto.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/categoria/categoria.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/dashboard.css') }}">

</head>

<body>

    <!-- NAVEGADORES -->
    @yield('navegador')


    <!-- HEADER -->
    @yield('header')


    <!-- CONTENIDO PRINCIPAL -->
    <main>
        <!-- CUERPO DE LAS PAGINAS -->
        @yield('contenido')
    </main>


    <!-- FOOTER -->
    @yield('footer')

    <!-- JS QUERY -->
    <script src="https://code.jquery.com/jquery-3.6.4.slim.js"
        integrity="sha256-dWvV84T6BhzO4vG6gWhsWVKVoa4lVmLnpBOZh/CAHU4=" crossorigin="anonymous"></script>

    <!-- javascript OWL CAROUSEL -->
    <script src="{{ asset('owl/dist/owl.carousel.js') }}"></script>
    <script src="{{ asset('owl/dist/owl.carousel.min.js') }}"></script>


    <!-- DATATABLES JS -->
    <script src="{{ asset('datatable/dataTables.js') }}"></script>
    <script src="{{ asset('datatable/dataTables.min.js') }}"></script>



    <!-- SPLIDE JS -->
    <script src="{{ asset('splide/dist/js/splide.min.js') }}"></script>

    <!-- SCRIPT -->
    <script src="{{ asset('js/owl.js') }}"></script>
    <script src="{{ asset('js/cargarImagenUno.js') }}"></script>
    <script src="{{ asset('js/cargarImagenDos.js') }}"></script>
    <script src="{{ asset('js/cargarImagenTres.js') }}"></script>
    <script src="{{ asset('js/dataTables.js') }}"></script>



</body>

</html>
