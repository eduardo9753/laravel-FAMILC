window.addEventListener('DOMContentLoaded', () => {


    function fotoUno(input) {
        if (input.files && input.files[0]) {
          let read = new FileReader();
          read.onload = function (e) {
            $('#imgPreview_foto_uno').attr('src', e.target.result); //IMAGEN DONDE SE VA CARGAR 
          }
          read.readAsDataURL(input.files[0]);
        }
      }

      $('#foto_uno').change(function () { //IAMGEN DEL INPUT
        fotoUno(this);
      });

     
    
    });
    