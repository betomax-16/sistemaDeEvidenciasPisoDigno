$(document).ready(function(){

    $('#evidencias').on( "click", ".remove", function(e) {
        e.preventDefault();
        var idHogar = $(this).attr('id');
        var url = $('#form-delete').attr('action').replace('ID_HOGAR',idHogar);
        var data = $('#form-delete').serialize();
        bootbox.confirm({
          message:'¿Estas seguro de eliminar esta evidencia?',
          buttons: {
              confirm: {
                  label: 'Aceptar',
                  className: 'btn-success'
              },
              cancel: {
                  label: 'Cancelar',
                  className: 'btn-danger'
              }
          },
          callback: function (result) {
            if (result == true) {
              $.post(url, data, function(result){
                $('#evidencia'+idHogar).fadeOut(300,function () { $(this).remove()});
              }).fail(function(){
                alert('ERROR');
                $('#evidencia'+idHogar).show();
              });
            }
          }
        });
    });

});
