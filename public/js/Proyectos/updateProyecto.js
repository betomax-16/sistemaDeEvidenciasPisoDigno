$(document).ready(function () {
  $('#btnGuardar').click(function (e) {
    e.preventDefault();
    bootbox.confirm({
      message:'¿Estas seguro de editar el nombre del proyecto?',
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
          $('#form-edit').submit();
        }
      }
    });

  });
});
