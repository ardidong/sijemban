$(function () {
    var chart = new Highcharts.Map('peta', {
        title: {
        text: 'Peta Sebaran Lokasi Donasi di Kabupaten Sleman'
        },

        chart:{
            map : petas
        },

        mapNavigation: {
            enabled: true
        },

        legend: {
            title: {
                text: 'Banyak Donasi per Kecamatan'
            }
        },

        colorAxis: {
            tickPixelInterval: 100
        },


        series: [
                {
                    data: dataLok,
                    name: 'Jumlah Donasi',
                    type: 'map',
                    keys: ['name','value'],
                    joinBy : 'name'
                   
                }
            ]
    });
    
});