$(document).ready(function(){

    $('.box').click(function(e) {
        $('#foto-modal').prop('src', $(this).attr('src'));
        $('#myModalLabel').html($(this).attr('alt'));
    });

});
