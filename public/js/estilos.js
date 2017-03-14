(function () {

    "use strict";

    var toggles = document.querySelectorAll(".c-hamburger");

    for (var i = toggles.length - 1; i >= 0; i--) {
        var toggle = toggles[i];
        toggleHandler(toggle);
    };

    function toggleHandler(toggle) {
        toggle.addEventListener("click", function (e) {
            e.preventDefault();
            (this.classList.contains("is-active") === true) ? this.classList.remove("is-active"): this.classList.add("is-active");
        });
    }

})();

$(document).ready(function () {
  var article;
    $('#proyectos').on('click', 'article', function () {
        article = $(this).attr('id');
        var proyecto = $(this).children('h3').children('a').html();
        var texto = $(this).children('p').html();
        var img = $(this).children('img').attr('src');
        var url = $(this).children('input').attr('value');
        $('#PisoD .modal-title').html(proyecto);
        $('#PisoD #modal-texto').html(texto);
        $('#PisoD #modal-img').prop('src', img);
        $('#PisoD #ir').prop('href', url);
        switch (article) {
          case 'PisoDigno':
            $('#PisoD .modal-header').css('background', '#53a5dc');
            $('#PisoD .modal-header h4').css('color', '#fff');
            $('#PisoD .modal-body').css('border', '3px solid rgba(83, 165, 220, 0.28)');
            $('#PisoD .modal-body').css('color', '#000');
            $('#PisoD .modal-footer a').css('background', '#3e74b9');
            break;
          case 'Despensas':
            $('#PisoD .modal-header').css('background', '#5ba548');
            $('#PisoD .modal-header h4').css('color', '#fff');
            $('#PisoD .modal-body').css('border', '3px solid rgba(91, 165, 72, 0.28)');
            $('#PisoD .modal-body').css('color', '#000');
            $('#PisoD .modal-footer a').css('background', '#5ea94c');
            break;
          case 'Salud':
            $('#PisoD .modal-header').css('background', '#ec6374');
            $('#PisoD .modal-header h4').css('color', '#fff');
            $('#PisoD .modal-body').css('border', '3px solid rgba(236, 99, 116, 0.28)');
            $('#PisoD .modal-body').css('color', '#000');
            $('#PisoD .modal-footer a').css('background', '#ea5769');
            break;
          default:

        }
    });

    $("#PisoD .modal-footer a").hover(function(e) {
      switch (article) {
        case 'PisoDigno':
          $(this).css("background",e.type === "mouseenter"?"#509ed2":"#3e74b9");
          break;
        case 'Despensas':
          $(this).css("background",e.type === "mouseenter"?"#427934":"#5ea94c");
          break;
        case 'Salud':
          $(this).css("background",e.type === "mouseenter"?"#ce293d":"#ea5769");
          break;
        default:

      }
    });
});
