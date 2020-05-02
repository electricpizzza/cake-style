@extends('layouts.admin')

@section('content')
  <!-- Header -->
  <div class="header bg-primary pb-6">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">Default</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item"><a href="#">Dashboards</a></li>
                <li class="breadcrumb-item active" aria-current="page">Default</li>
              </ol>
            </nav>
          </div>
          <div class="col-lg-6 col-5 text-right">
            <a href="#" class="btn btn-sm btn-neutral">New</a>
            <a href="#" class="btn btn-sm btn-neutral">Filters</a>
          </div>
        </div>
        <!-- Card stats -->
        <div class="row">
          <div class="col-xl-4 col-md-6">
            <div class="card card-stats">
              <!-- Card body -->
              <div class="card-body">
                <div class="row">
                  <div class="col">
                    <h5 class="card-title text-uppercase text-muted mb-0">Total traffic</h5>
                    <span class="h2 font-weight-bold mb-0">{{$sales->sum('sales')}} DHs</span>
                  </div>
                  <div class="col-auto">
                    <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                      <i class="ni ni-money-coins"></i>
                    </div>
                  </div>
                </div>
               
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-md-6">
            <div class="card card-stats">
              <!-- Card body -->
              <div class="card-body">
                <div class="row">
                  <div class="col">
                    <h5 class="card-title text-uppercase text-muted mb-0">Clients</h5>
                    <span class="h2 font-weight-bold mb-0">{{\App\User::count()}}</span>
                  </div>
                  <div class="col-auto">
                    <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                      <i class="ni ni-circle-08"></i>
                    </div>
                  </div>
                </div>
               
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-md-6">
            <div class="card card-stats">
              <!-- Card body -->
              <div class="card-body">
                <div class="row">
                  <div class="col">
                    <h5 class="card-title text-uppercase text-muted mb-0">Sales</h5>
                    <span class="h2 font-weight-bold mb-0">{{\App\Order::count()}}</span>
                  </div>
                  <div class="col-auto">
                    <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                      <i class="ni ni-bag-17"></i>
                    </div>
                  </div>
                </div>
               
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Page content -->
  <div class="container-fluid mt--6">
    <div class="row">
      <div class="col-xl-8">
        <div class="card bg-default">
          <div class="card-header bg-transparent">
            <div class="row align-items-center">
              <div class="col">
                <h6 class="text-light text-uppercase ls-1 mb-1">Overview</h6>
                <h5 class="h3 text-white mb-0">Sales value</h5>
              </div>
              <div class="col">
                <ul class="nav nav-pills justify-content-end">
                </ul>
              </div>
            </div>
          </div>
          <div class="card-body">
            <!-- Chart -->
            <div class="chart">
              <canvas id="chart-sales"></canvas>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-4">
        <div class="card">
          <div class="card-header bg-transparent">
            <div class="row align-items-center">
              <div class="col">
                <h6 class="text-uppercase text-muted ls-1 mb-1">Performance</h6>
                <h5 class="h3 mb-0">Total orders</h5>
              </div>
            </div>
          </div>
          <div class="card-body">
            <!-- Chart -->
            <div class="chart">
              <canvas height="400vh" id="chart-orders" class="chart-canvas"></canvas>
            </div>
          </div>
        </div>
      </div>
    </div>
   </div> 
<script>
    var chartSales = document.getElementById('chart-sales').getContext('2d');
    var chartOrders = document.getElementById('chart-orders').getContext('2d');
    var chartS = new Chart(chartSales, {
    // The type of chart we want to create
    type: 'line',
  
    // The data for our dataset
    data: {
        labels: [],
        datasets: [{
            label: 'My sales',
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 237, 97)',
            data: []
        }]
    },
  
      // Configuration options go here
      options: {}
  });
  var chartO = new Chart(chartOrders, {
    // The type of chart we want to create
    type: 'bar',
    // The data for our dataset
    data: {
        labels: [],
        datasets: [{
            label: 'Orders',
            barThickness: 6,
            backgroundColor: 'rgb(97, 134, 255)',
            borderColor: 'rgb(255, 237, 97)',
            data: []
        }]
    },
  
      // Configuration options go here
      options: {
        scales: {
            xAxes: [{
                stacked: true
            }],
            yAxes: [{
                stacked: true
            }]
        }
      }
  });
  function addData(chart, label, data) {
      chart.data.labels.push(label);
      chart.data.datasets.forEach((dataset) => {
          dataset.data.push(data);
      });
      chart.update();
  }
  
  var month = new Array();
  month[1] = "January";
  month[2] = "February";
  month[3] = "March";
  month[4] = "April";
  month[5] = "May";
  month[6] = "June";
  month[7] = "July";
  month[8] = "August";
  month[9] = "September";
  month[10] = "October";
  month[11] = "November";
  month[12] = "December";
  
  let sales =`<?php echo($sales);?>`;
  sales = JSON.parse(sales);
  for (let index = 0; index < sales.length; index++) {
  const element = sales[index];
  console.log(element.month);
  
  addData(chartS,month[Number(element.month)],element.sales);
  addData(chartO,month[Number(element.month)],element.orders);
  }
</script>
@endsection