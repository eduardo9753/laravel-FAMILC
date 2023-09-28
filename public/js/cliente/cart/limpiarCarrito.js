window.addEventListener('DOMContentLoaded', () => {

    status_pay = $("#status_pay").val();
    
    limpiarCarritoVenta();
    function limpiarCarritoVenta() {
        if (status_pay == 1) {
            carrito_entrada = []; localStorage.removeItem('carrito_venta');
            localStorage.clear(); 
        }
    }
});