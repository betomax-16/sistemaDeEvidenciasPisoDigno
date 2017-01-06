Morris.Donut({

    element: 'graph',
    resize: true,
    data: [
        {
            value: 19.8,
            label:'<h5>Pob. Vulnerable por carencias sociales</h5>\
    <p>Población que  presenta una o  más  carencias  sociales,  pero  cuyo  ingreso  es superior a la línea de bienestar.</p>',
        },
        {
            value: 5.1,
            label:'<h5>Pob. Vulnerable por ingresos</h5>\
    <p>Población que no presenta carencias sociales y cuyo ingreso es inferior o igual a la línea de bienestar.</p>',
        },
        {
            value: 64.5,
            label:'<h5>Población en situacion de pobreza</h5>\
    <p>Una persona se encuentra en situación de pobreza cuando presenta al menos una carencia social y sus ingresos son insuficientes para adquirir los bienes y servicios que requiere para satisfacer sus necesidades.</p>',
        },
        {
            value: 10.5,
            label:'<h5>Población no vulnerable</h5>\
    <p>Población cuyo ingreso es superior a la línea de bienestar y que no tiene carencia social alguna.</p>',
        }

  ],
    backgroundColor: '#ccc',
    labelColor: '#060',
    colors: [
    '#0BA462',
    '#39B580',
    '#67C69D',
    '#95D7BB'
  ],
    formatter: function (x) {
        return x + "%"
    }
});


$( "#graph" ).mouseover(function() {
	prepareMorrisDonutChart();
});

$( document ).ready(function() {
	prepareMorrisDonutChart();
  $('#circulos').waypoint(function () {
    setTimeout(function(){
      miniGrafica('.primera', .229, '#0681c4', '#4ac5f8');
      miniGrafica('.segunda', .212, '#DF8208', '#FE9F22');
      miniGrafica('.tercera', .752, '#DADE07', '#FCFF00');
      miniGrafica('.cuarta', .189, '#D01804', '#F81D05');
      miniGrafica('.quinta', .306, '#8E0B83', '#CD07BC');
      miniGrafica('.sexta', .239, '#0BA227', '#10C831');
    }, 100);
     this.destroy();
  },{offset:'70%',triggerOnce: true});

  
});
function prepareMorrisDonutChart() {
	$("#graph tspan:first").css("display","none");
	$("#graph tspan:nth-child(1)").css("font-size","30px");
  var isi = $("#graph tspan:first").text();
	$('#infoGrafica').html($(isi));
}


function miniGrafica(nombre, valor, tono1, tono2) {
  $(nombre+'.circle').circleProgress({
    value: valor,
    fill: {gradient: [[tono1, .5], [tono2, .5]], gradientAngle: Math.PI / 4}
  }).on('circle-animation-progress', function(event, progress, stepValue) {
    $(this).find('strong').html(parseFloat((valor*100) * progress).toFixed(1) + '<i>%</i>');
  });
}
