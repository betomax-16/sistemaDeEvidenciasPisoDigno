$(document).ready(function(){

    $('.btn-delete').click(function (e) {
      e.preventDefault();
      var fila = $(this).parents('li');
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
              fila.fadeOut(300,function () {
                $(this).remove();
                var countLista = $('.listaProyectos li').size();
                if (countLista == 0) {
                  $('.listaProyectos').remove();
                  $('#mensajes').html('<h1 class="display-4 text-md-center" style="color:#B8B7B7;">Sin proyectos activos</h1>');
                }
              });
            }).fail(function(){
              alert('ERROR');
              fila.show();
            });
          }
        }
      });

    });

});
