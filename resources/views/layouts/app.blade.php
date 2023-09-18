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
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&family=Raleway:wght@300&display=swap"
        rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- BOX ICONS -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- Owl Stylesheets -->
    <link rel="stylesheet" href="{{ asset('lib/owl/dist/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('lib/owl/dist/assets/owl.theme.default.min.css') }}">

    <!-- DATATABLES CSS -->
    <link rel="stylesheet" href="{{ asset('lib/datatable/dataTables.css') }}">
    <link rel="stylesheet" href="{{ asset('lib/datatable/dataTables.min.css') }}">

    <!-- SPLIDE CSS -->
    <link rel="stylesheet" href="{{ asset('lib/splide/dist/css/splide.min.css') }}">
    <link rel="stylesheet" href="{{ asset('lib/splide/dist/css/splide-core.min.css') }}">

    <!-- ICONO DEL PROYECTO -->
    <link rel="icon" type="image/png" href="{{ asset('img/logo/FAMILC.png') }}">

    <!-- NORMALIZE CSS -->
    <link rel="stylesheet" href="{{ asset('css/normalize.css') }}">

    <!--CSS SWEEALERT2-->
    <link rel="stylesheet" href="{{ asset('lib/sweetalert2/sweetalert2.min.css') }}">

    <!--ANIMACION CSS-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

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

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    -->

    <!-- CDN JQUERY -->
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"
        integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>

    <!-- javascript OWL CAROUSEL LIB-->
    <script src="{{ asset('lib/owl/dist/owl.carousel.js') }}"></script>
    <script src="{{ asset('lib/owl/dist/owl.carousel.min.js') }}"></script>

    <!-- DATATABLES JS LIB-->
    <script src="{{ asset('lib/datatable/dataTables.js') }}"></script>
    <script src="{{ asset('lib/datatable/dataTables.min.js') }}"></script>

    <!--CSS SWEEALERT2-->
    <script src="{{ asset('lib/sweetalert2/sweetalert2.min.js') }}"></script>

    <!-- SPLIDE JS -->
    <script src="{{ asset('lib/splide/dist/js/splide.min.js') }}"></script>



    <!--SCRIPT ADMINISTRADOR-->
    <script src="{{ asset('js/Admin/cargarImagenUno.js') }}"></script>
    <script src="{{ asset('js/Admin/cargarImagenDos.js') }}"></script>
    <script src="{{ asset('js/Admin/cargarImagenTres.js') }}"></script>

    <!--SCCRIPT GENERALES-->
    <script src="{{ asset('js/dataTables.js') }}"></script>
    <script src="{{ asset('js/cliente/owl.js') }}"></script>
    

    <!--SCRIPT CLIENTE CARRITO DE COMPRAS-->
    <script src="{{ asset('js/cliente/cart/venta.js') }}"></script>



</body>

</html>



