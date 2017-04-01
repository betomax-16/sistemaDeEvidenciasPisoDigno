var arrayFotos = new Array();
var banderaGuardar = true;
var arrayStatus = new Array();
arrayStatus['dropzoneFileUpload1'] = true;
arrayStatus['dropzoneFileUpload2'] = true;
arrayStatus['dropzoneFileUpload3'] = true;
arrayStatus['dropzoneFileUpload4'] = true;
$(document).ready(function () {
  /*
    MUESTRA ACORDION DE JQUERY UI
  */
  $( "#acordion" ).accordion();

  /*
    EVENTOS QUE SE EJECUTAN AL PERDER EL FOCO DEL CAMPO "municipio" o "localidad"
    PARA EVALUAR QUE EL NOMBRE DE DICHO MUNICIPIO O LOCALIDAD EXISTA EN LA BASE DE DATOS
  */
  $('#municipio').focusout(function () {
    var inputCurrent = $(this);
    var lugar = $(this).val().trim();
    var url = '../../evidencias/outFocusMunicipio';
    var data = {place : lugar, _token : token};
    if (lugar != '') {
      $.post(url, data, function (response) {
        if (response.idMunicipio != null) {
          $( "#idMunicipio" ).val(response.idMunicipio);
          limpiarValidacion(inputCurrent);
        }
        else {
          $( "#idMunicipio" ).val('');
          validar(inputCurrent, 'Municipio inexistente.');
        }
      });
    }
  });

  $('#localidad').focusout(function () {
    var inputCurrent = $(this);
    var lugar = inputCurrent.val().trim();
    var idMun = $('#idMunicipio').val();
    var url = '../../evidencias/outFocusLocalidad';
    var data = {place : lugar,  idMunicipio : idMun, _token : token};
    if (lugar != '') {
      $.post(url, data, function (response) {
        if (response.idLocalidad != null) {
          $( "#idLocalidad" ).val(response.idLocalidad);
          limpiarValidacion(inputCurrent);
        }
        else {
          $( "#idLocalidad" ).val('');
          validar(inputCurrent, 'Localidad inexistente.');
        }
      });
    }
  });

  Dropzone.autoDiscover = false;
  myAwesomeDropzone1 = crearDropzone('foto1', '#addImage1', 1, 1);
  myAwesomeDropzone2 = crearDropzone('foto2', '#addImage2', 1, 1);
  myAwesomeDropzone3 = crearDropzone('foto3', '#addImage3', 1, 1);
  myAwesomeDropzone4 = crearDropzone('fotoN', '#addImage4', null, 10);
  var myDropzone1 = new Dropzone("#dropzoneFileUpload1", myAwesomeDropzone1);
  var myDropzone2 = new Dropzone("#dropzoneFileUpload2", myAwesomeDropzone2);
  var myDropzone3 = new Dropzone("#dropzoneFileUpload3", myAwesomeDropzone3);
  var myDropzone4 = new Dropzone("#dropzoneFileUpload4", myAwesomeDropzone4);

  /*
    EVENTOS PARA LOS CAMPOS "municipio" Y "localidad"
    PARA EJECUTAR LOS AUTOCOMPLETES
  */
  $('#municipio').keyup(function(e){
      var lugar = $(this).val();
      if (lugar == '') {
        $( "#idMunicipio" ).val('');
        limpiarValidacion($(this));
      }
      var region = 'MUNICIPIO';
      if (lugar.length > 1) {
        var data = {place : lugar, area : region, _token : token};
        var url = '../../evidencias/autocomplete';

        $.post(url, data, function(response) {
          var aux = JSON.stringify(response.lugares);
          aux = aux.replace(/á/g, "a");
          aux = aux.replace(/é/g, "e");
          aux = aux.replace(/í/g, "i");
          aux = aux.replace(/ó/g, "o");
          aux = aux.replace(/ú/g, "u");
          $( "#municipio" ).autocomplete({
            source: JSON.parse(aux),
            minLength: 2,
            select: function(event, ui) {
              event.preventDefault();
              $( "#municipio" ).val(ui.item.label);
              $( "#idMunicipio" ).val(ui.item.label+'_'+ui.item.value);
            },
            focus: function(event, ui) {
              event.preventDefault();
            }
          });
        });
      }
  });

  $('#localidad').keyup(function(){
      var localidad = $(this).val();
      if (localidad == '') {
        $( "#idLocalidad" ).val('');
        limpiarValidacion($(this));
      }
      var mun = $( "#idMunicipio" ).val();
      if (localidad.length > 1) {
        var data = {lugar : localidad, municipio : mun, _token : token};
        var url = '../../evidencias/autocompleteLocalidad';

        $.post(url, data, function(response) {
          var aux = JSON.stringify(response.lugares);
          aux = aux.replace(/á/g, "a");
          aux = aux.replace(/é/g, "e");
          aux = aux.replace(/í/g, "i");
          aux = aux.replace(/ó/g, "o");
          aux = aux.replace(/ú/g, "u");
          $( "#localidad" ).autocomplete({
            source: JSON.parse(aux),
            minLength: 2,
            select: function(event, ui) {
              event.preventDefault();
              $( "#localidad" ).val(ui.item.label);
              $( "#idLocalidad" ).val(ui.item.value);
            },
            focus: function(event, ui) {
              event.preventDefault();
            }
          });
        });
      }
  });

  $('#btnGuardar').click(function (event) {
    event.preventDefault();
    var count = 0;
    for (var status in arrayStatus) {
      if (arrayStatus[status]) {
        count++;
      }
    }
    if (count == 4) {
      if (banderaGuardar) {
        banderaGuardar = false;
        jsShowWindowLoad();
        var url = urlSaveRecordig;
        var info = {
          municipio : $('#municipio').val(),
          idMunicipio : $('#idMunicipio').val(),
          localidad : $('#localidad').val(),
          idLocalidad : $('#idLocalidad').val(),
          familia : $('#familia').val(),
          idBeneficiado: idHogar,
          fotos1 : arrayFotos['dropzoneFileUpload1'],
          fotos2 : arrayFotos['dropzoneFileUpload2'],
          fotos3 : arrayFotos['dropzoneFileUpload3'],
          fotos4 : arrayFotos['dropzoneFileUpload4'],
          _token : token,
        };
        $.ajax({
          method: 'put',
          url: urlSaveRecordig,
          data: info
        }).done(function (response) {
          //alert(JSON.stringify(response));
          setTimeout(function () {
            $("#windowLoad").remove();
            if (response.session != undefined) {
              location.reload(true);
            }
            else if (response.errors != undefined) {
              banderaGuardar = true;
              if (response.errors.municipio != undefined) {
                validar($('#municipio'), response.errors.municipio);
              }
              if (response.errors.localidad != undefined) {
                validar($('#localidad'), response.errors.localidad);
              }
              if (response.errors.familia != undefined) {
                validar($('#familia'), response.errors.familia);
              }
              if (response.errors.fotos1 != undefined) {
                bootbox.alert(response.errors.fotos1[0]);
              }
            }
            else if (response.status != undefined) {
              if (response.status == 'success') {
                bootbox.alert('Información alamacenada exitosamente.');
              }
              else {
                //mostrar error
                bootbox.alert('ocurrio algún problema');
              }
              setTimeout(function () {
                //REDIRECCIONAR A EVIDENCIAS
                window.location=redirect;
              }, 2000);
            }
          }, 2000);
        });
      }
    }
    else {
      alert('no se han terminado de subir las imagenes');
    }
  });
});

function jsShowWindowLoad(mensaje) {
    //eliminamos si existe un div ya bloqueando
    $("#windowLoad").remove();

    //si no enviamos mensaje se pondra este por defecto
    if (mensaje === undefined) mensaje = "Procesando la información<br>Espere por favor";

    //centrar imagen gif
    height = 20;//El div del titulo, para que se vea mas arriba (H)
    var ancho = 0;
    var alto = 0;

    //obtenemos el ancho y alto de la ventana de nuestro navegador, compatible con todos los navegadores
    if (window.innerWidth == undefined) ancho = window.screen.width;
    else ancho = window.innerWidth;
    if (window.innerHeight == undefined) alto = window.screen.height;
    else alto = window.innerHeight;

    //operación necesaria para centrar el div que muestra el mensaje
    var heightdivsito = alto/2 - parseInt(height)/2;//Se utiliza en el margen superior, para centrar

   //imagen que aparece mientras nuestro div es mostrado y da apariencia de cargando
    imgCentro = "<div style='text-align:center;height:" + alto + "px; font-size: 25px; color:#fbfbfb;'><div  style='color:#000;margin-top:15%; font-size:20px;font-weight:bold'></div><img  style='max-width:100%;height:150px;' src='"+urlLoading+"'><br>" + mensaje + "</div>";

        //creamos el div que bloquea grande------------------------------------------
        div = document.createElement("div");
        div.id = "windowLoad"
        div.style.width = "100%";
        div.style.height = "100%";
        $("body").append(div);

        //creamos un input text para que el foco se plasme en este y el usuario no pueda escribir en nada de atras
        input = document.createElement("input");
        input.id = "focusInput";
        input.type = "text"

        //asignamos el div que bloquea
        $("#WindowLoad").append(input);

        //asignamos el foco y ocultamos el input text
        $("#focusInput").focus();
        $("#focusInput").hide();

        //centramos el div del texto
        $("#windowLoad").html(imgCentro);

}

function crearDropzone(parametro, idClickable, maxFiles, paralelos) {
  return myAwesomeDropzone = {
      url: urlSave,
      paramName: parametro, // The name that will be used to transfer the file
      maxFilesize: 5, // MB
      maxFiles: maxFiles,
      addRemoveLinks: true,
      acceptedFiles: ".png,.jpg,.jpeg",
      clickable: idClickable, //area clickable
      params: { _token: token }, //objeto con parametros que se desean pasar cada vez que se envia un archivo
      dictRemoveFile: "Remover",
      dictFileTooBig: 'La imagen es mayor de 5 MB',
      dictDefaultMessage: '',
      uploadMultiple: true,
      //autoProcessQueue: false, //evita que las imagenes se cargen solas al server
      parallelUploads: paralelos,//cantidad maxima de archivos a subir en paralelo
      //previewTemplate: document.querySelector('#preview-template').innerHTML,
      init:function () {
        var myDropzone = this;
        $('.dz-message').css('display', 'none');
        switch (myDropzone.element.id) {
          case 'dropzoneFileUpload1':
            cargarImagenes(fotosObject, myDropzone, 'PISO_ORIGINAL');
            break;
          case 'dropzoneFileUpload2':
            cargarImagenes(fotosObject, myDropzone, 'PISO_EN_PROCESO');
            break;
          case 'dropzoneFileUpload3':
            cargarImagenes(fotosObject, myDropzone, 'PISO_TERMINADO');
            break;
          case 'dropzoneFileUpload4':
            cargarImagenes(fotosObject, myDropzone, 'OTROS');
            break;
        }

        this.on('removedfile', function (file) {
          var idDrop = this.element.id;
          var data = {
            id: file.name,
            idBeneficiado: idHogar,
            tipo: idDrop,
            _token : token,
          };
          $.post( urlDelete, data, function( response ) {
            alert(response);
            if (response == 'eliminado') {
              var i = arrayFotos[idDrop].indexOf( file.name );
              if ( i !== -1 ) {
                  arrayFotos[idDrop].splice( i, 1 );
              }
            }
          });
        });
        this.on('addedfile', function (file) {
          var id = myDropzone.element.id;
          if (file.type != 'image/png' && file.type != 'image/jpg' && file.type != 'image/jpeg') {
            bootbox.alert('no valido');
            this.removeFile(file);
            arrayStatus[id] = false;
          }
          if (id != 'dropzoneFileUpload4' && arrayFotos[id] != undefined && arrayFotos[id] != '') {
            this.removeFile(file);
          }
        });
        this.on('successmultiple',function (data,response) {
          myDropzone.processQueue.bind(myDropzone);
          var idDrop = this.element.id;
          var aux = new Array();
          for (var i = 0; i < response.info.length; i++) {
            aux.push(response.info[i]);
          }
          arrayFotos[idDrop] = aux;
          arrayStatus[idDrop] = true;
          //alert(arrayFotos[idDrop]);
          //alert(JSON.stringify(response));
        });
      },
      accept: function(file, done) {
        if (file.size == 0) {
          done("Empty files will not be uploaded.");
        }
        else { done(); }
      },
      error: function (file, response) {
        file.previewElement.classList.add("dz-error");
      },
      maxfilesexceeded:function (file) {
        bootbox.alert("No se le permite elegir más de 1 archivo!");
        this.removeFile(file);
      },
  };
}

/*
  cargarImagenes(objFotos, myDropzone, tipo)
    CARGA LAS IMAGENES ALMACENADAS EN EL SERVER EN EL
    DROPZONE CORRESPONDIENTE PARA CADA TIPO DE IMAGEN

    PARAMETER:
      objFotos: OBJETO JSON CON LOS DATOS DE LAS IMAGENES ALMACENADAS EN SERVIDOR (NOMBRE_ORIGINAL, NOMBRE_SANITIZADO, TIPO, TAMAÑO)
      myDropzone: INSTANCIA DEL OBJETO DE MYDROPZONE EN QUE SE DESEA ISERTAR LAS IMAGENES
      tipo: TIPO DE IMAGENES QUE SE CARGARANE EN EL DROPZONE ESPECIFICADO EN EL PARAMETRO ANTERIOR (PISO_ORIGINAL, PISO_EN_PROCESO, PISO_TERMINADO, OTROS)
*/
function cargarImagenes(objFotos, myDropzone, tipo) {
  var aux = new Array();
  $.each(objFotos, function (key, value) {
    if (value.tipo == tipo) {
      var file = {name: value.server, size: value.size};
      myDropzone.options.addedfile.call(myDropzone, file);
      myDropzone.options.thumbnail.call(myDropzone, file, urlImagenes + '/' +value.server);
      myDropzone.emit("complete", file);
      aux.push(file.name);
    }
  });
  arrayFotos[myDropzone.element.id] = aux;
}

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
