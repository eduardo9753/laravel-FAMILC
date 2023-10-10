window.addEventListener('DOMContentLoaded', () => {

    $('#form-cart-venta').on('click', '#guardar-datos-venta-compra', function (e) {
        e.preventDefault();

        var form = $('#form-cart-venta');
        if (form.find('#nombres').val() === '') { alerta('Ingrese Nombre y Apellido', 'info', 1500); return; }
        if (form.find('#direccion').val() === '') { alerta('Ingrese su Dirección', 'info', 1500); return; }
        if (form.find('#numero_documento').val() === '') { alerta('Ingrese su # de Documento', 'info', 1500); return; }
        if (form.find('#telefono').val() === '') { alerta('Ingrese su # de Celular', 'info', 1500); return; }
        if (form.find('#email').val() === '') { alerta('Ingrese su Correo', 'info', 1500); return; }
        else {
            $.ajax({
                url: "/mercadopago/pay",
                method: "POST",
                data: $('#form-cart-venta').serialize(),
                dataType: "JSON",

                beforeSend: function () {
                    //$('#form-cart-venta').find('#guardar-datos-venta').attr('disabled', true);
                    $('#form-cart-venta').find('#guardar-datos-venta-compra').attr('disabled', true);
                }, //desabilitamos

                success: function (data) {
                    console.log('Datos Preference: ', data.msg);
                    if (data.code == 2) {
                        alerta(data.msg + ' excede a nuestro stock actual', 'info', 2500);
                        form.find('#guardar-datos-venta-compra').attr('disabled', false); //habilitamos
                    } else {
                        //CREANDO EL BOTON DE PAGO MERCADOPAGO
                        const mp = new MercadoPago(data.msg.public_key);
                        mp.bricks().create("wallet", "wallet_container", {
                            initialization: {
                                preferenceId: data.msg.preference_id,
                                redirectMode: "self",
                                //redirectMode: "modal"
                            },
                            callbacks: {
                                onReady: () => { },
                                onSubmit: () => { },
                                onError: (error) => console.error('error arrojado', error),
                            },
                            customization: {
                                visual: {
                                    buttonBackground: 'black',
                                    borderRadius: '16px',
                                },
                                texts: {
                                    action: 'pay',
                                    valueProp: 'security_details',
                                },
                            },
                        });
                    }
                }
            });
        }
    });


    //(2)ALERT
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