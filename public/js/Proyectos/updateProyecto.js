$(document).ready(function () {
  $('#btnGuardar').click(function (e) {
    e.preventDefault();
    bootbox.confirm('¿Estas seguro de editar el nombre del proyecto?', function(res){
      if (res == true) {
        $('#form-edit').submit();
      }
    });
  });
});
