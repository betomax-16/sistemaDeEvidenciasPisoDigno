Morris.Donut({

    element: 'graph',
    resize: true,
    data: [
        {
            value: 19.8,
            label: 'Pob. Vulnerable Por Carencias Sociales'
        },
        {
            value: 5.1,
            label: 'Pob. Vulnerable Por Ingresos'
        },
        {
            value: 64.5,
            label: 'Población En Situacion De Pobreza'
        },
        {
            value: 10.5,
            label: 'Población No Vulnerable'
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
