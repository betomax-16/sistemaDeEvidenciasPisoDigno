$(document).ready(function(){

    $('.box').click(function(e) {
        $('#foto-modal').prop('src', $(this).attr('src'));
        var id = $(this).attr('id');
        var data = {idFoto : id, _token : token};
        var url = '../foto/ver';

        $.post(url, data, function(response) {
          $('#myModalLabel').html(response.foto.tipo);
        });
    });

});
