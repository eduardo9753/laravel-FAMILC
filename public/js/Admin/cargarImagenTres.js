window.addEventListener('DOMContentLoaded', () => {

  $('#foto_tres').on('keyup', function () {
    let valor = $(this).val();
    console.log('Datos:', valor);
    $('#imgPreview_foto_tres').attr('src', valor); //IMAGEN DONDE SE VA CARGAR 
  });
});



    