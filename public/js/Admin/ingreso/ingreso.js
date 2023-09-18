window.addEventListener('DOMContentLoaded', () => {

    const contenedor_carrito = document.querySelector('.lista-carrito tbody'); //tbody de la tabla de datos
    let carrito_entrada = []; //array de los datos para la tabla ingreso_detalle

    datosLocalStorage()//(7)
    function datosLocalStorage() {
        carrito_entrada = JSON.parse(localStorage.getItem('carrito_entrada')) || [];
        datosCarritoIngreso();
    }

    //(12)SUMAR CANTIDAD AL INGRESO CUANDO PRESIONEMOS EL BOTON "+"
    $(document).on('click', '#sumar-cantidad-ingreso-btn', function (e) {
        e.preventDefault()
        let leerProducto = e.target.parentElement.parentElement; //me trae la fila del producto
        let cantidad_actual = leerProducto.querySelector('.cantidad').getAttribute('value');
        let product_id = leerProducto.querySelector('.product_id').getAttribute('value');
        const ver = carrito_entrada.find(venta => venta.product_id === product_id);
        if (ver) {
            if (ver.cantidad >= 12) {
                alerta('La cantidad máxima es de 12 unidades');
            } else { ver.cantidad++; }
        }
        datosCarritoIngreso();//traemos los datos que esta sincronizado con localStorage
    });

    //(10)RESTAR CANTIDAD AL INGRESO CUANDO PRESIONEMOS EL BOTON "-"
    $(document).on('click', '#restar-cantidad-ingreso-btn', function (e) {
        e.preventDefault();
        let leerProducto = e.target.parentElement.parentElement; //me trae la fila del producto
        let cantidad_actual = leerProducto.querySelector('.cantidad').getAttribute('value');
        let product_id = leerProducto.querySelector('.product_id').getAttribute('value');
        const ver = carrito_entrada.find(ingreso => ingreso.product_id === product_id);
        if (ver) {
            if (ver.cantidad <= 1) {
                alerta('La cantidad mínima del producto es de una unidad', 'warning');
            } else { ver.cantidad--; }
            datosCarritoIngreso();//traemos los datos que esta sincronizado con localStorage
        }
    })

    //(8)ENVIAR DATOS POR AJAX Y GUARDAR LA INFORMACION EN LA BASE DE DATOS
    $('#form-ingreso').on('submit', function (e) {
        e.preventDefault();

        if (carrito_entrada.length <= 0) {
            alerta('La tabla no puede estar vacia', 'error');
        } else {
            $.ajax({
                url: "/admin/income/store",
                method: "POST",
                data: $('#form-ingreso').serialize(),
                dataType: "JSON",

                beforeSend: function () { },

                success: function (data) {
                    if (data.code == 1) {
                        alerta(data.msg, 'success')
                        carrito_entrada = []; localStorage.removeItem('carrito_entrada');
                        localStorage.clear(); limpiarHTML();
                        $('#form-ingreso')[0].reset();
                    } else { alerta(data.msg, 'error'); }
                }
            });
        }

    });


    //(5)ELIMINAR TODOS LOS ELEMENTOS DEL CARRITO
    $(document).on('click', '#vaciar-carrito', function () {
        carrito_entrada = []; localStorage.removeItem('carrito_entrada');
        localStorage.clear(); limpiarHTML();
    });


    //(4)ELIMINAR DATOS DEL CARRITO POR EL BOTON "X"
    $(document).on('click', '#eliminar-ingreso-btn', function () {
        const product_id = $(this).data('id'); //data-id
        //filtrar todos los datos exepto el id que le paso capturado pro el "data-id"
        carrito_entrada = carrito_entrada.filter(entrada => entrada.product_id != product_id);//!= (esta sintaxis funciono)
        datosCarritoIngreso();
    });


    //(1)GUARDAR DATOS EN EL OBJETO AL HACER CLICK AL BOTON CON ID ="agregar-datos-entrada"
    $('#form-ingreso').on('click', '#agregar-datos-entrada', function (e) {
        e.preventDefault();

        //VARIABLES DEL FORMULARIO
        var form = $('#form-ingreso');
        if (form.find('#tipo_documento').val() === '') { alerta('Tipo documento no debe estar vacio', 'warning'); return; }
        if (form.find('#numero_documento').val() === '') { alerta('Numero documento no debe estar vacio', 'warning'); return; }
        if (form.find('#cantidad').val() === '') { alerta('cantidad no debe estar vacio', 'warning'); return; }
        if (form.find('#precio_compra').val() === '') { alerta('precio compra no debe estar vacio', 'warning'); return; }
        if (form.find('#precio_venta').val() === '') {
            alerta('precio venta no debe estar vacio'); return;
        } else {
            const info_entrada = {   //CREANDO EL OBJETO PARA LA TABLA DETALLE INGRESO
                product_id: form.find('#product_id').val(),
                product: $('select[id="product_id"] option:selected').text(),//capturar el texto
                proveedor_id: form.find('#person_id').val(),
                proveedor: $('select[id="person_id"] option:selected').text(),//capturar el texto
                tipo_documento: form.find('#tipo_documento').val(),
                numero_documento: form.find('#numero_documento').val(),
                person_id: form.find('#person_id').val(),
                cantidad: form.find('#cantidad').val(),
                precio_compra: form.find('#precio_compra').val(),
                precio_venta: form.find('#precio_venta').val(),
            }
            //REVISAMOS POR ID PROVEEDOR Y ID PRODUCTO PARA ACTUALIZAR LA CANTIDAD O REGISTRA NUEVO INGRESO
            const ver = carrito_entrada.find(entrada => entrada.proveedor_id === info_entrada.proveedor_id && entrada.product_id === info_entrada.product_id);
            if (ver == null) {
                carrito_entrada = [...carrito_entrada, info_entrada];
            } else { ver.cantidad++; }
            datosCarritoIngreso();
        }
    });


    //(2)PINTAR LOS DATOS DEL OBJETO EN LA TABLA(HTML)
    function datosCarritoIngreso() {
        //limpiamos la tabla del html sobrante
        limpiarHTML();
        let Total = 0;

        carrito_entrada.forEach(entrada => {
            const row = document.createElement('tr');
            const subTotal = entrada.precio_compra * entrada.cantidad;
            Total = Total + subTotal;
            row.innerHTML = `
              <td><a class="boton boton-color" id="eliminar-ingreso-btn" data-id="${entrada.product_id}">X</a></td>
              <td>${entrada.product} <input class="input-carrito product_id" type="text" name="product_id[]" value="${entrada.product_id}" hidden></td>
              <td>${entrada.proveedor} <input class="input-carrito" type="text" name="proveedor_id[]" value="${entrada.proveedor_id}" hidden></td>
              <td><input class="input-carrito-tamanio-uno input-carrito" type="text w-20" name="tipo_documento[]" value="${entrada.tipo_documento}"></td>
              <td><input class="input-carrito" type="text" name="numero_documento[]" value="${entrada.numero_documento}"></td>
              <td><input class="input-carrito-tamanio-uno input-carrito cantidad" type="text" name="cantidad[]" value="${entrada.cantidad}"></td>
              <td><input class="input-carrito-tamanio-uno input-carrito" type="text" name="precio_compra[]" value="${entrada.precio_compra}"></td>
              <td><input class="input-carrito-tamanio-uno input-carrito" type="text" name="precio_venta[]" value="${entrada.precio_venta}"></td>
              <td class="text-center"><input type="submit" class="boton boton-color" id="sumar-cantidad-ingreso-btn" value="+"></td>
              <td class="text-center"><input type="submit" class="boton boton-sin-color" id="restar-cantidad-ingreso-btn" value="-"> </td>
              <td class="text-center"><input class="input-carrito" type="text" name="total_compra[]" value="${subTotal.toFixed(2)}"></td>
            `;
            //PINTANDO LOS DATOS EN LA FILA
            contenedor_carrito.appendChild(row);
        });
        $('#total_compra').val(Total.toFixed(2)) //con dos decimales
        //LOCALSTORAGE
        sincronizarStorage();
    }

    //(6)LOCALSTORAGE
    function sincronizarStorage() {
        localStorage.setItem('carrito_entrada', JSON.stringify(carrito_entrada));
    }

    //(3)FUNCION PARA LIMPIAR EL HTML SOBRANTE
    function limpiarHTML() {
        while (contenedor_carrito.firstChild) { //segunda forma
            contenedor_carrito.removeChild(contenedor_carrito.firstChild);
        }
    }


    //ALERT(9)
    function alerta(mensaje, icon) {
        Swal.fire({
            position: 'top-end',
            icon: icon,
            title: mensaje,
            showConfirmButton: false,
            timer: 1500
        })
    }
});