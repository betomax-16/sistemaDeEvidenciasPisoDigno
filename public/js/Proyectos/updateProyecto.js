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
        var urlUpdate = $('#form-edit').attr('action');
        var datos = {
          nombre:$('#nombre').val(),
          descripcion:$('#descripcion').val(),
          tipo:$('#tipo').val(),
          _token: token
        };
        if (result == true) {
          $.ajax({
            method: 'put',
            url: urlUpdate,
            data: datos
          }).done(function (response) {
            if (response.session != undefined) {
              location.reload(true);
            }
            else if (response.errors != undefined) {
              if (response.errors.nombre != undefined) {
                validar($('#nombre'), response.errors.nombre);
              }
              if (response.errors.descripcion != undefined) {
                validar($('#descripcion'), response.errors.descripcion);
              }
              if (response.errors.tipo != undefined) {
                alert(response.errors.tipo);
              }
            }
            else if (response.status != undefined) {
              if (response.status == 'success') {
                window.location=redirect;
              }
            }
          });
          //$('#form-edit').submit();
        }
      }
    });

  });
});

/*
  limpiarValidacion(object)
    REMUEVE EL CONTENIDO EN UNA ETIQUETA Y
    REMUEVE LA CLASE "has-danger" DE LA ETIQUETA QUE LO CONTENGA

  PARAMETERS:
    object: ELEMENTO DEL QUE SE DESEA REALIZAR LA DESCRIPCION ANTERIOR
*/
function limpiarValidacion(object) {
  $('#error'+object.attr('id')).html('');
  object.parent().removeClass('has-danger');
}

/*
  validar(object, message)
    AGREGA LA CLASE "has-danger" A LA ETIQUETA PADRE QUE CONTIENGA A "object"
    ASI MISMO SE AGREGA UN MENSAJE AL ELEMENTO "object"

  PARAMETERS:
    object: ELEMENTO DONDE SE DESEA EFECTUAR LO ANTERIORMENTE DESCRITO
    message: MENSAJE A ASIGNAR AL CONTENIDO DEL ELEMENTO "object"
*/
function validar(object, message) {
  var formGroup = object.parent();
  if (!formGroup.hasClass('has-danger')) {
    formGroup.addClass('has-danger');
  }
  $('#error'+object.attr('id')).html(message);
};
