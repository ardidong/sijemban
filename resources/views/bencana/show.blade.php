@extends('layoutsumum')

@section('headscript')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
@endsection

@section('content')
<div class="container shadow-lg p-3 mb-5 bg-white rounded" style="margin-top:100px;margin-bottom:20px;">
  <div class="row">
    <div class="col-8">
      <h1 id="judul">{{$bencana->nama_bencana}}</h1>
      <h5>{{$bencana->batas_waktu->diffForHumans()}}</h5>
    </div>
    <div class="col-4">
      <div align="center">
        <a href="/donasi/create/{{$bencana->id}}">
        <div style="margin: 20px 0;">
            <button type="submit" style="width:200px;" class="btn btn-primary btn-lg">Donasi</button>
        </div>
        </a>
      </div>
    </div>

  </div>

  <div class="row">
    <div class="col-8">
        <img src="/storage/cover/{{$bencana->cover}}" alt="Gambar" style="margin-bottom: 30px; width:730px;height:400px;">
      <p id="artikel" style="text-align:justify;">{{$bencana->deskripsi}}</p>
    </div>
    <div class="col-4">
      <div id="container" style="min-width: 310px; max-width: 800px; height: 400px; margin: 0 auto"></div>
      <div id="container1" style="min-width: 310px; max-width: 800px; height: 400px; margin: 0 auto"></div>
    </div>
  </div>
</div>
@endsection

@section('script')
<script type="text/javascript">
Highcharts.chart('container', {
  chart: {
      type: 'bar'
  },
  title: {
      text: 'Jumlah Barang'
  },
  yAxis: {
      min: 0,
      title: {
          text: 'Jumlah (unit)',
          align: 'high'
      },
      labels: {
          overflow: 'justify'
      }
  },
  tooltip: {
      valueSuffix: ' unit'
  },
  plotOptions: {
      bar: {
          dataLabels: {
              enabled: true
          }
      }
  },
  legend: {
      layout: 'vertical',
      align: 'right',
      verticalAlign: 'top',
      x: 0,
      y: 50,
      floating: true,
      borderWidth: 1,
      backgroundColor:
          Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF',
      shadow: true
  },
  credits: {
      enabled: false
  },
  series: [{
      name: 'Barang Kebutuhan Pokok',
      data: [{{$jumlahkebutuhan}}]
  }, {
      name: 'Peralatan Darurat',
      data: [{{$jumlahperalatan}}]
  }, {
      name: 'Obat Obatan',
      data: [{{$jumlahobat}}]
  }]
});

//Statistik Konsumsi
Highcharts.chart('container1', {
  chart: {
      type: 'bar'
  },
  title: {
      text: 'Jumlah Konsumsi'
  },
  yAxis: {
      min: 0,
      title: {
          text: 'Jumlah (kg)',
          align: 'high'
      },
      labels: {
          overflow: 'justify'
      }
  },
  tooltip: {
      valueSuffix: ' kilogram'
  },
  plotOptions: {
      bar: {
          dataLabels: {
              enabled: true
          }
      }
  },
  credits: {
      enabled: false
  },
  series: [{
      name: 'Barang Konsumsi',
      data: [{{$jumlahkonsumsi}}]
  }]
});
</script>
@endsection
