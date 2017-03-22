$(document).ready(function () {
  var bandera = true;
  limpiarValidacion($('#selectUsuario'));

  $('#btnGuardar').click(function (event) {
    limpiarValidacion($('#selectUsuario'));
    event.preventDefault();
    var plantilla = '<tr id="{ID_USUARIO}">\
      <td class="text-md-center">{NOMBRE}</td>\
      <td class="text-md-center hidden-xs-down">{EMAIL}</td>\
      <td class="text-md-center"><button class="btn red-inverse btn-delete" type="button" name="button">Eliminar</button></td>\
    </tr>';
    var url = $('#formAdd').attr('action');
    var data = {
      idUsuario: $('#selectUsuario').val(),
      _token : token
    };
    if (bandera) {
      bandera = false;
      $.post(url, data, function (response) {
        if (response.errors != undefined) {
          validar($('#selectUsuario'), response.errors.idUsuario);
        }
        else {
          var aux = plantilla.replace('{ID_USUARIO}', response.id);
          aux = aux.replace('{NOMBRE}', response.nombre);
          aux = aux.replace('{EMAIL}', response.email);
          $('#tabla tbody').append(aux);

          $('#selectUsuario option[value='+response.id+']').remove();
          bandera=true;
        }
      });
    }
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
