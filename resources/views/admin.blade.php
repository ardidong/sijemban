@extends('layoutsumum')

@section('headscript')

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-more.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="//code.highcharts.com/maps/modules/map.js"></script>
@endsection

@section('content')
        <div class="container" id="container" style=" height:400px; margin-top: 100px;">
        </div>
        <div class="container">
          <div class="row justify-content-around" style="height:50px;">
            <div class="col-4 text-center shadow p-3 mb-5 bg-white rounded" id="demo" style="font-weight:bold; border-radius: 5px;">
            </div>
            <div class="col-4">
            </div>
          </div>
        </div>

        <div class="container" id="container" style=" height:400px; margin-top: 100px;">
            <div id='peta'>

            </div>
        </div>
@endsection

@section('script')
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
          data: [0, 0, 0, 0, {{$total}}, 0, 0, 0, 0, 0, 0, 0]

      }, {
          name: 'Dijemput',
          data: [0, 0, 0, 0, 0, {{$total1}}, 0, 0, 0, 0, 0, 0]

      }, //{
      //     name: 'London',
      //     data: [48.9, 38.8, 39.3, 41.4, 47.0, 48.3, 59.0, 59.6, 52.4, 65.2, 59.3, 51.2]
      //
      // }, {
      //     name: 'Berlin',
      //     data: [42.4, 33.2, 34.5, 39.7, 52.6, 75.5, 57.4, 60.4, 47.6, 39.1, 46.8, 51.1]
      //
      // }
      ]
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
</script>


@endsection
