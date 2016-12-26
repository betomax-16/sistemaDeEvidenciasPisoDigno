Morris.Donut({
  element: 'graph',
  data: [
    {value: 19.8, label: 'Pob. vulnerable \n Por carencias sociales'},
    {value: 5.1, label: 'Pob. vulnerable \n Por ingresos'},
    {value: 64.5, label: 'Población en \n Situacion de pobreza'},
    {value: 10.5, label: 'Población \n No vulnerable'}
  ],
  backgroundColor: '#ccc',
  labelColor: '#060',
  colors: [
    '#0BA462',
    '#39B580',
    '#67C69D',
    '#95D7BB'
  ],
  formatter: function (x) { return x + "%"}
});
