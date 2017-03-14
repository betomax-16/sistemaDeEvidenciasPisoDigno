$(document).ready(function(){

    $('#bb-custom-grid').on( "click", ".remove", function(e) {
        e.preventDefault();
        var me = $(this);
        var idHogar = $(this).attr('id');
        var url = $('#form-delete').attr('action').replace('ID_HOGAR',idHogar);
        var data = $('#form-delete').serialize();
        bootbox.confirm({
          message:'¿Estas seguro de eliminar esta evidencia?',
          buttons: {
              confirm: {
                  label: 'Aceptar',
                  className: 'green-inverse'
              },
              cancel: {
                  label: 'Cancelar',
                  className: 'red-inverse'
              }
          },
          callback: function (result) {
            if (result == true) {
              $.post(url, data, function(result){
                me.parent().fadeOut(300,function () { $(this).remove()});
              }).fail(function(){
                alert('ERROR');
                $('#evidencia'+idHogar).show();
              });
            }
          }
        });
    });

});
