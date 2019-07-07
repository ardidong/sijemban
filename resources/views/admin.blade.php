@extends('layoutsumum')

@section('headscript')

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-more.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="//code.highcharts.com/maps/modules/map.js"></script>
@endsection

@section('content')
      <div>
        <div class="row justify-content-around" style="height:50px; margin-top: 100px;">
          <div class="col-4 text-center shadow p-3 mb-5 bg-white rounded" id="demo" style="font-weight:bold; border-radius: 5px;">
          </div>
          <div class="col-4">
          </div>
        </div>
      </div>
      <div class="container shadow-lg p-3 mb-5 bg-white rounded" style="background-color:white; margin-top: 70px;">
        <h1>STATISTIK DONASI</h1>
        <div id="container" style=" height:400px;">
        </div>

        <div id="container" style=" height:400px; margin-top: 100px;">
            <div id='peta'>

            </div>
        </div>
      </div>
      <div class="container shadow-lg p-3 mb-5 bg-white rounded" style="background-color:white; margin-top: 100px;">
        <div id="container1" style=" height:400px;">
        </div>
      </div>
@endsection

@section('script')

<script>
    var dataLok ={!!json_encode($lokasi)!!} ;
    console.log(dataLok);
</script>
<!-- Data Peta Sleman-->
<script src="{{ asset('js/sleman.js ') }}" ></script>
<script src="{{ asset('js/locationStat.js') }}" ></script>


<script type="text/javascript">
  Highcharts.chart('container', {
      chart: {
          type: 'column'
      },
      title: {
          text: 'Grafik Status Penjemputan Barang'
      },
      xAxis: {
          categories: [
              'Jan',
              'Feb',
              'Mar',
              'Apr',
              'May',
              'Jun',
              'Jul',
              'Aug',
              'Sep',
              'Oct',
              'Nov',
              'Dec'
          ],
          crosshair: true
      },
      yAxis: {
          min: 0,
          allowDecimals: false,
          title: {
              text: 'Jumlah Donasi'
          }
      },
      tooltip: {
          headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
          pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
              '<td style="padding:0"><b>{point.y} donasi</b></td></tr>',
          footerFormat: '</table>',
          shared: true,
          useHTML: true
      },
      plotOptions: {
          column: {
              pointPadding: 0.2,
              borderWidth: 0
          }
      },
      series: [{
          name: 'Diajukan',
          data:  {!!json_encode($hitung_diajukan)!!}

      }, {
          name: 'Dijemput',
          data: {!!json_encode($hitung_dijemput)!!}

      }]
  });

  var tanggal = [
                @foreach($tanggal as $donasi)
                new Date("{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $donasi->created_at)->format('m/d/Y')}}"),
                @endforeach
              ];
  var tanggal1 = [
                  @foreach($tanggal as $donasi)
                  new Date("{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $donasi->tanggal_jemput)->format('m/d/Y')}}"),
                  @endforeach
              ];
  var i;
  var hitung = 0;
  for (i = 0; i < tanggal.length; i++) {
    var timeDiff = tanggal1[i].getTime() - tanggal[i].getTime();
    var DaysDiff = timeDiff / (1000 * 3600 * 24);
    hitung = hitung + DaysDiff;
  }
  var rata = hitung/tanggal.length;
  document.getElementById("demo").innerHTML = "Rata - Rata Penjemputan " +"<br>"+ Math.trunc(rata) +" hari";

//Grafik jumlah donator
Highcharts.chart('container1', {

  title: {
      text: 'Pertambahan User Baru Setiap Bulan'
  },

  yAxis: {
      allowDecimals: false,
      title: {
          text: 'Jumlah User'
      }
  },
  legend: {
      layout: 'vertical',
      align: 'right',
      verticalAlign: 'middle'
  },

  xAxis: {
      categories: [
          'Jan',
          'Feb',
          'Mar',
          'Apr',
          'May',
          'Jun',
          'Jul',
          'Aug',
          'Sep',
          'Oct',
          'Nov',
          'Dec'
      ],
      crosshair: true
  },

  series: [{
      name: 'Donator',
      data: {!!json_encode($hitung_donatur)!!}
  }, {
      name: 'Petugas',
      data: {!!json_encode($hitung_petugas)!!}
  }],

  responsive: {
      rules: [{
          condition: {
              maxWidth: 500
          },
          chartOptions: {
              legend: {
                  layout: 'horizontal',
                  align: 'center',
                  verticalAlign: 'bottom'
              }
          }
      }]
  }

});

</script>


@endsection
