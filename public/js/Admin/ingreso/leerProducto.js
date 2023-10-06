

window.addEventListener('DOMContentLoaded', () => {
    $("#product_id").change(function () {
        id_producto = $('select[id=product_id]').val()
        console.log(id_producto);

        //TRAENDO LOS PRODUCTOS METODO GET
        fectProducto();
        function fectProducto() {

            id_post = $('#id_post').val()
            $.get('/admin/income/fectProducto', { id_producto: id_producto }, function (data) {
                var form = $('#form-ingreso');
                form.find('#precio_compra').val(data.result.precio)
                form.find('#precio_venta').val(data.result.precio)
                console.log('Datos: ', data.result);
            }, 'json');
        }
    });

});
