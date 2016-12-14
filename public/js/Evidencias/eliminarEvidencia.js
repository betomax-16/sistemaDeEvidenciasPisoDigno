$(document).ready(function(){

    $('#evidencias').on( "click", "button", function(e) {
        e.preventDefault();
        var idHogar = $(this).attr('id');
        var url = $('#form-delete').attr('action').replace('ID_HOGAR',idHogar);
        var data = $('#form-delete').serialize();
        bootbox.confirm('¿Estas seguro de eliminar esta evidencia?', function(res){
          if (res == true) {
            $.post(url, data, function(result){              
              $('#evidencia'+idHogar).fadeOut(300,function () { $(this).remove()});
            }).fail(function(){
              alert('ERROR');
              $('#evidencia'+idHogar).show();
            });
          }
        });
    });

});
