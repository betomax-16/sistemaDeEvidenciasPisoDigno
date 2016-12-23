$(document).ready(function () {
  $('#btnGuardar').click(function (e) {
    e.preventDefault();
    bootbox.confirm({
      message:'¿Estas seguro de editar el nombre del proyecto?',
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
          $('#form-edit').submit();
        }
      }
    });
    
  });
});
