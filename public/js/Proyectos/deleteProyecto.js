$(document).ready(function(){

    $('.btn-delete').click(function (e) {
      e.preventDefault();
      var fila = $(this).parents('tr');
      var proyecto = fila.attr('id');
      var form = $('#form-delete');
      var url = form.attr('action').replace('ID_PROYECTO',proyecto);
      var data = form.serialize();
      bootbox.confirm({
        message:'¿Estas seguro de eliminar el proyecto?',
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
              fila.fadeOut(300,function () { $(this).remove()});
            }).fail(function(){
              alert('ERROR');
              fila.show();
            });
          }
        }
      });

    });

});
