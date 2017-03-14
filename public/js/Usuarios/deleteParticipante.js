$(document).ready(function(){

    function refrescar() {
      var url = '../../participantes/'+proyecto;
      var data = { _token : token };
      $.post(url, data, function(result){
        $('#selectUsuario').html(result);
      }).fail(function(){
        alert('ERROR');
      });
    }

    $('#tabla tbody').on('click', '.btn-delete', function () {
      var fila = $(this).parents('tr');
      var usuario = fila.attr('id');
      var form = $('#form-delete');
      var url = form.attr('action').replace('ID_USUARIO',usuario);
      var data = form.serialize();
      bootbox.confirm({
        message:'¿Estas seguro de eliminar al usuario?',
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
              refrescar();
            }).fail(function(){
              alert('ERROR');
              fila.show();
            });
          }
        }
      });
    });

});
