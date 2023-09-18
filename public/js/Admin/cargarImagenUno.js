window.addEventListener('DOMContentLoaded', () => {

  $('#foto_uno').on('keyup', function () {
    let valor = $(this).val();
    console.log('Datos:', valor);
    $('#imgPreview_foto_uno').attr('src', valor); //IMAGEN DONDE SE VA CARGAR 
  });
});



