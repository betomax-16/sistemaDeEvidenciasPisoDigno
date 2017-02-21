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
    $('#proyectos').on('click', 'article', function () {
        var proyecto = $(this).children('h3').children('a').html();
        var texto = $(this).children('p').html();
        var img = $(this).children('img').attr('src');
        var url = $(this).children('input').attr('value');
        $('#PisoD .modal-title').html(proyecto);
        $('#PisoD #modal-texto').html(texto);
        $('#PisoD #modal-img').prop('src', img);
        $('#PisoD #ir').prop('href', url);
    });
});
