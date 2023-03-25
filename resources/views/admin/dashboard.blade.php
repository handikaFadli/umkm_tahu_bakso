@extends('admin.layouts.main')

@section('content')
<div class="container-fluid">
    <h1 class="mt-4">Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Welcome to Admin Tahu Bakso Sambal Kecap Jani</li>
    </ol>
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-coklat-muda2 text-white mb-4">
                <div class="card-body">Data Kategori</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="/kategori">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-coba text-white mb-4">
                <div class="card-body">Data Produk</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="/produk">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-coklat2 text-white mb-4">
                <div class="card-body">Data Reseller</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="/reseller">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-hijau text-white mb-4">
                <div class="card-body">Data Penjualan</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="/penjualan">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 grid-margin">
          <div class="card">
            <div class="card-body">
             <div class="d-flex justify-content-between">
              <p class="card-title">Data Penjualan</p>
              <a href="/penjualan" class="text-info">View all</a>
             </div>
              <p class="font-weight-500">Jumlah pendapatan perbulan dari hasil penjualan</p>
              <canvas id="BarChart"></canvas>
            </div>
          </div>
        </div>
      </div>
      {{-- <div class="row">
        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header"><i class="fas fa-chart-area mr-1"></i>Jumlah Mobil</div>
                <div class="card-body"><canvas id="BarChart" width="100%" height="40"></canvas></div>
            </div>
        </div>
      </div> --}}

    {{-- <script>
        var labels = {{ Js::from($labels) }};
        var jumlah = {{ Js::from($jumlah) }};
        
        var data1 = {
            labels: [1,2,3],
            datasets: [{
            label: '# of Votes',
            data: [1,2,3],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 99, 132, 0.2)',
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(255,99,132,1)',
                'rgba(255,99,132,1)',
            ],
            borderWidth: 1,
            fill: false
            }]
        };

        var options1 = {
            scales: {
            yAxes: [{
                ticks: {
                beginAtZero: true
                }
            }]
            },
            legend: {
            display: false
            },
            elements: {
            point: {
                radius: 0
            }
            }
        };
        // Get context with jQuery - using jQuery's .get() method.
        if ($("#barChartPen").length) {
            var barChartPenCanvas = $("#barChartPen").get(0).getContext("2d");
            // This will get the first returned node in the jQuery collection.
            var barChartPen = new Chart(barChartPenCanvas, {
            type: 'bar',
            data: data1,
            options: options1
            });
        }
    </script> --}}

     <script>
        var labels = {{ Js::from($labels) }};
        var jumlah = {{ Js::from($jumlah) }};
        var ctx = document.getElementById("BarChart");
        var BarChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: "Jumlah",
                    backgroundColor: "#A09F57",
                    borderColor: "#FEFAE0",
                    data: jumlah,
                }],
            },
        options: {
            scales: {
                xAxes: [{
                    time: {
                        unit: 'month'
                    },
                    gridlines: {
                        display: false
                    },
                    ticks: {
                        maxTicksLimit: 6
                    }
                }],
                yAxes: [{
                    ticks: {
                        min: 0,
                        maxTicksLimit: 6
                    },
                    gridlines: {
                        display: true
                    }
                }],
            },
            legend: {
                display: false
            }
        }
    });
    </script>

    {{-- <script>
        var ctx = document.getElementById("barChartPen");
        var barChartPen = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ["Blue", "Red", "Yellow", "Green"],
            datasets: [{
            data: [12.21, 15.58, 11.25, 8.32],
            backgroundColor: ['#007bff', '#dc3545', '#ffc107', '#28a745'],
            }],
        },
        });
    </script> --}}
@endsection

