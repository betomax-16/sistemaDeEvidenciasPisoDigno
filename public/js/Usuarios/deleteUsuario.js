$(document).ready(function(){

    $('.btn-delete').click(function (e) {
      e.preventDefault();
      var fila = $(this).parents('tr');
      var usuario = fila.attr('id');
      var form = $('#form-delete');
      var url = form.attr('action').replace('ID_USUARIO',usuario);
      var data = form.serialize();
      bootbox.confirm('¿Estas seguro de eliminar al usuario?', function(res){
        if (res == true) {
          $.post(url, data, function(result){
            fila.fadeOut(300,function () { $(this).remove()});
          }).fail(function(){
            alert('ERROR');
            fila.show();
          });
        }
      });
    });

});
