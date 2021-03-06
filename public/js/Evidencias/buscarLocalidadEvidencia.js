var año = $('#año').val();
var region = $('#region').val();
var lugar = $('#nombreLugar').val();

$(document).ready(function(){

  (function() {
    [].slice.call( document.querySelectorAll( 'select.cs-select' ) ).forEach( function(el) {
      new SelectFx(el);
    } );
  })();
    $('.cs-options li').each(function () {
      if ($(this).attr('data-value') == $('#region').val()) {
        $(this).addClass('cs-selected');
      }
    });

    $('#btnExcel').click(function (e) {
      if ($('#evidencias').find('li').length > 0) {
        var aux = download;
        aux = aux.replace('PROYECTO',proyecto);
        aux = aux.replace('ANIO',año);
        aux = aux.replace('REGION',region);
        if (lugar == '') {
          lugar = 'SD';
        }
        aux = aux.replace('LUGAR',lugar);
        $(this).prop('href',aux);
      }
      else {
        e.preventDefault();
        bootbox.alert('No se encontraron datos en la busqueda.');
      }
    });

    $('#evidencias').on('click','.item img', function () {
      $('#foto-modal').prop('src', $(this).attr('src'));
      var titulo = $(this).attr('alt');
      $('#myModalLabel').html(titulo);
    });

    function evidencias(año, region, lugar){
      var data = {place : lugar, area : region, year : año, project : proyecto, _token : token};
      var url = '../hogares';
      $('#bb-custom-grid').html('');
      $.post(url, data, function(response) {
          $('#bb-custom-grid').html(response.evidencias);
          $('#pagination').html(response.paginacion);
          Page.init();
      });
    };

    $('#btnBuscar').click(function () {
      año = $('#año').val();
      region = $('#region').val();
      lugar = $('#nombreLugar').val();
      evidencias(año, region, lugar);
    });

    $('#nombreLugar').keyup(function(){
        var lugarr = $(this).val();
        var regionn = $('#region').val();
        if (lugarr.length > 1) {
          var data = {place : lugarr, area : regionn, _token : token};
          var url = '../autocomplete';

          $.post(url, data, function(response) {
            //alert(JSON.stringify(response.lugares));
            var aux = JSON.stringify(response.lugares);
            aux = aux.replace(/á/g, "a");
            aux = aux.replace(/é/g, "e");
            aux = aux.replace(/í/g, "i");
            aux = aux.replace(/ó/g, "o");
            aux = aux.replace(/ú/g, "u");
            $( "#nombreLugar" ).autocomplete({
              source: JSON.parse(aux),
              minLength: 2,
              select: function(event, ui) {
                event.preventDefault();
                $( "#nombreLugar" ).val(ui.item.label);
                //$('#id_municipio').val(ui.item.value);
              },
              focus: function(event, ui) {
                event.preventDefault();
              }
            });
          });
        }
    });

    $(document).on('click', '.pagination a', function (e) {
        paginacionPost($(this).attr('href').split('page=')[1]);
        e.preventDefault();
    });

});

function paginacionPost(page) {
  var url = '../hogares?page=' + page;
  var data = {place : lugar, area : region, year : año, project : proyecto, _token : token};
  $.post(url, data, function(response) {
    $('#bb-custom-grid').html(response.evidencias);
    $('#pagination').html(response.paginacion);
    Page.init();
    window.location.hash = page;
  });
}

$(window).on('hashchange', function() {
    if (window.location.hash) {
        var page = window.location.hash.replace('#', '');
        if (page == Number.NaN || page <= 0) {
            return false;
        } else {
            paginacionPost(page);
        }
    }
});
