

window.addEventListener('DOMContentLoaded', () => {

  $('#foto_dos').on('keyup', function () {
    let valor = $(this).val();
    console.log('Datos:', valor);
    $('#imgPreview_foto_dos').attr('src', valor); //IMAGEN DONDE SE VA CARGAR 
  });
});
