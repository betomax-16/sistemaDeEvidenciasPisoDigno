$(document).ready(function () {
  $('#btnGuardar').click(function (event) {
    event.preventDefault();
    var url = $('#form-add').attr('action');
    var data = {
      nombre:$('#nombre').val(),
      apellidoPaterno:$('#apellidoPaterno').val(),
      apellidoMaterno:$('#apellidoMaterno').val(),
      email:$('#email').val(),
      password:$('#password').val(),
      password_confirmation:$('#password_confirmation').val(),
      role:$('#role').val(),
      _token: token
    };
    $.post(url, data, function (response) {
      if (response.errors != undefined) {
        if (response.errors.nombre != undefined) {
          validar($('#nombre'), response.errors.nombre);
        }
        if (response.errors.apellidoPaterno != undefined) {
          validar($('#apellidoPaterno'), response.errors.apellidoPaterno);
        }
        if (response.errors.apellidoMaterno != undefined) {
          validar($('#apellidoMaterno'), response.errors.apellidoMaterno);
        }
        if (response.errors.email != undefined) {
          validar($('#email'), response.errors.email);
        }
        if (response.errors.password != undefined) {
          validar($('#password'), response.errors.password);
        }
        if (response.errors.password_confirmation != undefined) {
          validar($('#password'), response.errors.password_confirmation);
        }
      }
      else if (response.status != undefined) {
        if (response.status == 'success') {
          window.location=redirect;
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
}
