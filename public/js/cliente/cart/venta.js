window.addEventListener('DOMContentLoaded', () => {

    let carrito_venta = [];

    //(4)PARA MANTENER LOS DATOS EN EL LOCALSTORGE
    datosLocalStorage()
    function datosLocalStorage() {
        carrito_venta = JSON.parse(localStorage.getItem('carrito_venta')) || [];
    }


    //(6)PINTAR EL NUMERO DE ELEMENTOS DE NUESTRO CARRITO
    cantidadCarrito(carrito_venta);
    function cantidadCarrito(carrito_venta) {
        $('.contador-carrito').text(carrito_venta.length);
    }

    /*(1)FUNCION PARA ACCEDER A CADA PRODUCTO(DIV) Y LEERLOS*/
    $(document).on('click', '.agregar-carrito', function (e) {
        e.preventDefault();//console.log('div seleccionado', e.target.parentElement.parentElement);
        const produtoSeleccionado = e.target.parentElement.parentElement;//se ubica en el div padre para explorar los elementos 
        leerDatosProducto(produtoSeleccionado);
    });


    //(2)GUARDAR DATOS EN EL OBJETO
    function leerDatosProducto(produtoSeleccionado) {
        const info_producto = {
            imagen: produtoSeleccionado.querySelector('img').src,
            nombre: produtoSeleccionado.querySelector('h2').textContent,
            precio_venta: produtoSeleccionado.querySelector('.tamanio-precio').textContent,
            product_id: produtoSeleccionado.querySelector('.agregar-carrito').getAttribute('data-id'),
            cantidad: 1
        };
        //revisar si ya existe para actualizar la cantidad
        const ver = carrito_venta.find(venta => venta.product_id === info_producto.product_id);
        if (ver == null) {
            carrito_venta = [...carrito_venta, info_producto]; alerta(`Agregado:${info_producto.nombre}`);
            cantidadCarrito(carrito_venta);
        } else {
            if (ver.cantidad >= 12) {
                alerta('la cantidad máxima es de 12 unidades');
            } else { ver.cantidad++; alerta(`Cantidad agregada a: ${ver.nombre}`); }
        }
        //LOCALSTORAGE
        sincronizarStorage();
    }


    //(3)LOCALSTORAGE
    function sincronizarStorage() {
        localStorage.setItem('carrito_venta', JSON.stringify(carrito_venta));
    }


    //(5)ALERT
    function alerta(mensaje) {
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: mensaje,
            showConfirmButton: false,
            timer: 1500
        })
    }
});