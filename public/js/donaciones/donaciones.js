$(document).ready(function () {
  $('#donar').addClass('active');

  $('#paypal').click(function (event) {
    event.preventDefault();
    $('#RFC').removeClass('recurso-active');
    $('#SPEI').removeClass('recurso-active');
    if (!$(this).hasClass('recurso-active')) {
      $(this).addClass('recurso-active');
    }
    $('.paypal').removeClass('hidden');
    if (!$('.referencia-bancaria').hasClass('hidden')) {
      $('.referencia-bancaria').addClass('hidden');
    }
    if (!$('.spei').hasClass('hidden')) {
      $('.spei').addClass('hidden');
    }
  });

  $('#RFC').click(function (event) {
    event.preventDefault();
    $('#paypal').removeClass('recurso-active');
    $('#SPEI').removeClass('recurso-active');
    if (!$(this).hasClass('recurso-active')) {
      $(this).addClass('recurso-active');
    }
    $('.referencia-bancaria').removeClass('hidden');
    if (!$('.paypal').hasClass('hidden')) {
      $('.paypal').addClass('hidden');
    }
    if (!$('.spei').hasClass('hidden')) {
      $('.spei').addClass('hidden');
    }
  });

  $('#SPEI').click(function (event) {
    event.preventDefault();
    $('#paypal').removeClass('recurso-active');
    $('#RFC').removeClass('recurso-active');
    if (!$(this).hasClass('recurso-active')) {
      $(this).addClass('recurso-active');
    }
    $('.spei').removeClass('hidden');
    if (!$('.paypal').hasClass('hidden')) {
      $('.paypal').addClass('hidden');
    }
    if (!$('.referencia-bancaria').hasClass('hidden')) {
      $('.referencia-bancaria').addClass('hidden');
    }
  });
});
