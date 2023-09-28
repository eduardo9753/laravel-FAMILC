window.addEventListener('DOMContentLoaded', () => {

    const contenedor_carrito = document.querySelector('.lista-carrito-venta tbody'); //tbody de la tabla de datos
    let carrito_venta = [];


    //(7)PARA MANTENER LOS DATOS EN EL LOCALSTORGE
    datosLocalStorage()
    function datosLocalStorage() {
        carrito_venta = JSON.parse(localStorage.getItem('carrito_venta')) || [];
        datosCarritoVenta();
    }

    //(12)FUNCION PARA QUE NO MANIPULEN EL PRECIO DE LA VENTA
    $(document).on('change', '#total_venta', function (e) {
        alerta('No puedes manipular el costo :(', 'error', 2000);
        let Total = 0;
        carrito_venta.forEach(venta => {
            const subTotal = venta.precio_venta * venta.cantidad;
            Total = Total + subTotal;
        });
        $('#total_venta').val(Total.toFixed(2)) //con dos decimales
        //localStorage
        sincronizarStorage();
    });


    //(9)PINTAR EL NUMERO DE ELEMENTOS DE NUESTRO CARRITO
    cantidadCarrito(carrito_venta);
    function cantidadCarrito(carrito_venta) {
        $('.contador-carrito').text(carrito_venta.length);
    }



    //(11)FUNCION PARA ACTIVAR O DESACTIVAR EL BOTON DE "Finalizar Compra"
    desactivarBotonFinalizarCompra(carrito_venta);
    function desactivarBotonFinalizarCompra(carrito_venta) {
        let cantidad = carrito_venta.length;
        var form = $('#form-cart-venta');
        if (cantidad === 0) {
            form.find('#guardar-datos-venta').attr('disabled', true);
        } else {
            form.find('#guardar-datos-venta').attr('disabled', false);
        }
    }



    //(10)FUNCION PARA ACTIVAR O DESACTIVAR EL BOTON DE "Comprar"
    desactivarBotonCompra(carrito_venta);
    function desactivarBotonCompra(carrito_venta) {
        let cantidad = carrito_venta.length;
        var form = $('#form-cart-comprar');
        if (cantidad === 0) {
            form.find('#boton-comprar').attr('disabled', true);
        } else {
            form.find('#boton-comprar').attr('disabled', false);
        }
    }


    /*(9)ENVIAR DATOS POR AJAX Y GUARDAR LA INFORMACION DEL PEDIDO EN LA BASE DE DATOS
    $('#form-cart-venta').on('click', '#guardar-datos-venta', function (e) {
        e.preventDefault();

        var form = $('#form-cart-venta');
        if (form.find('#nombres').val() === '') { alerta('Ingrese Nombre y Apellido', 'info', 1500); return; }
        if (form.find('#direccion').val() === '') { alerta('Ingrese su Dirección', 'info', 1500); return; }
        if (form.find('#numero_documento').val() === '') { alerta('Ingrese su # de Documento', 'info', 1500); return; }
        if (form.find('#telefono').val() === '') { alerta('Ingrese su # de Celular', 'info', 1500); return; }
        if (form.find('#email').val() === '') { alerta('Ingrese su Correo', 'info', 1500); return; }

        else {
            $.ajax({
                url: "/cart/list/shopping",
                method: "POST",
                data: $('#form-cart-venta').serialize(),
                dataType: "JSON",

                beforeSend: function () { form.find('#guardar-datos-venta').attr('disabled', true); }, //desabilitamos

                success: function (data) {
                    if (data.code == 2) {
                        alerta(data.msg + ' excede a nuestro stock actual', 'error', 2500);
                        form.find('#guardar-datos-venta').attr('disabled', false); //habilitamos
                    } else if (data.code == 1) {
                        form.find('#guardar-datos-venta').attr('disabled', true);//desabilitamos
                        alerta(data.msg, 'success', 3500);
                        localStorage.removeItem('carrito_venta');
                        localStorage.clear(); limpiarHTML();
                        $('#form-cart-venta')[0].reset();
                        setTimeout(function () { location.reload(true); }, 1000);
                        cantidadCarrito(carrito_venta);
                    } else { alerta(data.msg, 'error', 1500); form.find('#guardar-datos-venta').attr('disabled', true); }//desabilitamos
                }
            });
        }
    });*/


    //(4)SUMAR CANTIDAD AL PRODUCTO CUANDO PRESIONEMOS EL BOTON "+"
    $(document).on('click', '#sumar-cantidad-btn', function (e) {
        e.preventDefault();
        let leerProducto = e.target.parentElement.parentElement; //me trae la fila del producto
        let cantidad_actual = leerProducto.querySelector('.cantidad').getAttribute('value');
        let product_id = leerProducto.querySelector('.product_id').getAttribute('value');
        const ver = carrito_venta.find(venta => venta.product_id === product_id);
        if (ver) {
            if (ver.cantidad >= 12) {
                alerta('La cantidad maxima es de 12 unidades', 'info');
            } else { ver.cantidad++; }
        }
        datosCarritoVenta();//traemos los datos que esta sincronizado con localStorage
    });


    //(5)RESTAR CANTIDAD AL PRODUCTO CUANDO PRESIONEMOS EL BOTON "-"
    $(document).on('click', '#restar-cantidad-btn', function (e) {
        e.preventDefault();
        let leerProducto = e.target.parentElement.parentElement; //me trae la fila del producto
        let cantidad_actual = leerProducto.querySelector('.cantidad').getAttribute('value');
        let product_id = leerProducto.querySelector('.product_id').getAttribute('value');
        const ver = carrito_venta.find(venta => venta.product_id === product_id);
        if (ver) {
            if (ver.cantidad <= 1) {
                alerta('La cantidad minima del producto es de una unidad', 'warning');
            } else { ver.cantidad--; }
            datosCarritoVenta();//traemos los datos que esta sincronizado con localStorage
        }
    })


    //(3)ELIMINAR DATOS DEL CARRITO POR EL BOTON "X"
    $(document).on('click', '#eliminar-ingreso-btn', function () {
        const product_id = $(this).data('id'); //data-id
        //filtrar todos los datos exepto el id que le paso capturado pro el "data-id"
        carrito_venta = carrito_venta.filter(venta => venta.product_id != product_id);//!= (esta sintaxis funciono)
        cantidadCarrito(carrito_venta);
        desactivarBotonCompra(carrito_venta);
        desactivarBotonFinalizarCompra(carrito_venta);
        datosCarritoVenta();
    });


    //(1)FUNCION DONDE PINTO LOS DATOS EN LA TABLA
    function datosCarritoVenta() {
        //limpiamos la tabla del html sobrante
        limpiarHTML();
        let Total = 0;

        carrito_venta.forEach(venta => {
            const row = document.createElement('tr');
            const subTotal = venta.precio_venta * venta.cantidad;
            Total = Total + subTotal;
            row.innerHTML = `
              <td><a class="boton boton-color" id="eliminar-ingreso-btn" data-id="${venta.product_id}">X</a></td>
              <td class=""><input type="text" class="input-carrito-tamanio-uno text-center input-carrito product_id" name="product_id[]" value="${venta.product_id}" readonly> </td>
              <td><img class="img-cart" src="${venta.imagen}" alt=""></td>
              <td class="text-center">${venta.nombre}</td>
              <td class=""><input type="text" class="input-carrito-tamanio-uno text-center input-carrito precio_venta" name="precio_venta[]" value="${venta.precio_venta}" readonly> </td>
              <td class=""><input type="text" class="input-carrito-tamanio-uno text-center input-carrito cantidad" name="cantidad[]" value="${venta.cantidad}" readonly> </td>
              <td class="text-center"><input type="submit" class="boton boton-color" id="sumar-cantidad-btn" value="+"> </td>
              <td class="text-center"><input type="submit" class="boton boton-sin-color" id="restar-cantidad-btn" value="-"> </td>
              <td class="text-center">${subTotal.toFixed(2)}</td>
          `;
            contenedor_carrito.appendChild(row);
        });
        $('#total_venta').val(Total.toFixed(2)) //con dos decimales
        //localStorage
        sincronizarStorage();
    }

    //(6)LOCALSTORAGE
    function sincronizarStorage() {
        localStorage.setItem('carrito_venta', JSON.stringify(carrito_venta));
    }

    //(2)FUNCION QUE LIMPIA EL HTML SOBRANTE
    function limpiarHTML() {
        if (contenedor_carrito.firstChild) {
            while (contenedor_carrito.firstChild) { //segunda forma
                contenedor_carrito.removeChild(contenedor_carrito.firstChild);
            }
        }
    }

    //(8)ALERT
    function alerta(mensaje, icon, time) {
        Swal.fire({
            title: mensaje,
            showClass: {
                popup: 'animate__animated animate__fadeInDown'
            },
            hideClass: {
                popup: 'animate__animated animate__fadeOutUp'
            },
            position: 'top-end',
            icon: icon,
            showConfirmButton: false,
            timer: time
        })
    }
});