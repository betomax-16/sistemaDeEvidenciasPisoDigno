var año = $('#año').val();
var region = $('#region').val();
var lugar = $('#nombreLugar').val();

$(document).ready(function(){
    $('.item img').click(function(e) {
        $('#foto-modal').prop('src', $(this).attr('src'));
        var titulo = $(this).attr('alt');
        $('#myModalLabel').html(titulo);
    });

    function evidencias(año, region, lugar){
      var data = {place : lugar, area : region, year : año, project : proyecto, _token : token};
      var url = '../hogares';
      $('#evidencias').html('');
      $.post(url, data, function(response) {
        $('#evidencias').html(response);
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
            $( "#nombreLugar" ).autocomplete({
              source: response.lugares,
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
    $('#evidencias').html(response);
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
