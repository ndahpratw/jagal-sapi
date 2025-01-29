@extends('layouts.main')

@section('content')
    <div class="pagetitle">
        <h1>Laporan</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="">Home</a></li>
            <li class="breadcrumb-item active">Laporan</li>
        </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">

             <!-- Reports -->
             <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Laporan Keuangan <span>/bulan</span></h5>
              
                  <!-- Line Chart -->
                  <div id="reportsChart"></div>
              
                  <script>
                    document.addEventListener("DOMContentLoaded", () => {
                      const pemasukan = @json($data_pemasukan->pluck('total_biaya'));
                      const bulan = @json($data_pemasukan->pluck('bulan_tahun'));
              
                      new ApexCharts(document.querySelector("#reportsChart"), {
                        series: [{
                          name: 'Pemasukan',
                          data: pemasukan
                        }],
                        chart: {
                          height: 350,
                          type: 'area',
                          toolbar: {
                            show: false
                          },
                        },
                        markers: {
                          size: 4
                        },
                        colors: ['#ff771d'],
                        fill: {
                          type: "gradient",
                          gradient: {
                            shadeIntensity: 1,
                            opacityFrom: 0.3,
                            opacityTo: 0.4,
                            stops: [0, 90, 100]
                          }
                        },
                        dataLabels: {
                          enabled: false
                        },
                        stroke: {
                          curve: 'smooth',
                          width: 2
                        },
                        xaxis: {
                          categories: bulan
                        },
                        tooltip: {
                          x: {
                            format: 'MM'
                          },
                        }
                      }).render();
                    });
                  </script>
                  <!-- End Line Chart -->
                </div>
              </div>
              
            </div><!-- End Reports -->

            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                      <h5 class="text-center my-4 fw-bold">Informasi Pemasukan</h5>
                      <div class="table-responsive">
                        <table class="table">
                          <thead>
                              <th>NO</th>
                              <th>BULAN-TAHUN</th>
                              <th>TOTAL PEMASUKAN</th>
                          </thead>
                          <tbody>
                         @foreach ($data_pemasukan as $item)
                             <tr>
                              <td>{{$nomer++}}</td>
                              <td>{{$item->bulan_tahun}}</td>
                              <td>Rp {{ number_format($item->total_biaya, 0, ',', '.') }}</td>
                             </tr>
                         @endforeach
                          </tbody>
                      </table>
                      </div>
                    </div>
                </div>

            </div><!-- End Card -->
              
            <div class="col-lg-4">
                <!-- Website Traffic -->
                <div class="card">
                  <div class="card-body pb-0">
                      <h5 class="card-title">Jasa Terbanyak</h5>
              
                      <!-- Grafik -->
                      <div id="trafficChart" style="min-height: 400px;" class="echart"></div>
              
                      <script>
                        document.addEventListener("DOMContentLoaded", () => {
                            const produkData = @json($produkData); // Ambil data dari controller
                    
                            // Siapkan data untuk grafik
                            const chartData = produkData.map(item => ({
                                value: item.value,
                                name: item.name
                            }));
                    
                            // Inisialisasi grafik
                            echarts.init(document.querySelector("#trafficChart")).setOption({
                                tooltip: {
                                    trigger: 'item'
                                },
                                legend: {
                                    top: '5%',
                                    left: 'center'
                                },
                                color: ['#FFDAB3', '#C8AAAA', '#9F8383'], // Menentukan warna grafik
                                series: [{
                                    name: 'Jasa Terbanyak',
                                    type: 'pie',
                                    radius: ['40%', '70%'],
                                    avoidLabelOverlap: false,
                                    label: {
                                        show: false,
                                        position: 'center'
                                    },
                                    emphasis: {
                                        label: {
                                            show: true,
                                            fontSize: '18',
                                            fontWeight: 'bold'
                                        }
                                    },
                                    labelLine: {
                                        show: false
                                    },
                                    data: chartData // Data untuk grafik pie
                                }]
                            });
                        });
                    </script>
                    
                  </div>
              </div>
              
           </div>
        
        
        </div>
    </section>
@endsection