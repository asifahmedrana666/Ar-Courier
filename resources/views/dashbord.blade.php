@extends('layouts.app')
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">



@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Dashboard</h1> 


            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Today Report</li>
            </ol>
            @if(auth()->user()->type=='2')
            <div class="p-3 mb-2 bg-danger text-white">Your Account is Pending</div>
@endif
       {{-- Admin Card Start --}}
       @if(auth()->user()->type=='Admin')
            <div class="row">



                <div class="col-xl-3 col-md-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                         
          <h3>{{$adpending_delivery}}</h3>                                              

                          <p>Picup Request</p>
                        </div>
                        <div class="icon">
                          <i class="fas fa-shopping-cart"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                          More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                      </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="small-box bg-gradient-success">
                        <div class="inner">
                         
          <h3>{{$adcomplete_delivery}}</h3>                                              

                          <p>Complete Delivery</p>
                        </div>
                        <div class="icon">
                          <i class="fas fa-user-plus"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                          More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                      </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                          
          <h3>{{$adProcessing_delivery}}</h3>                                              

                          <p>Out For Delivery</p>
                        </div>
                        <div class="icon">
                          <i class="fas fa-shopping-cart"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                          More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                      </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                      
          <h3>{{$adtotal_order}}</h3>                                              

                          <p>Retrun Delivery</p>
                        </div>
                        <div class="icon">
                          <i class="fas fa-user-plus"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                          More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                      </div>
                </div>
            </div>
            @endif
 {{-- Admin Card End --}}

 {{-- Marcent Card Start --}}
 @if(auth()->user()->type=='Merchant')
 <div class="row">



  <div class="col-xl-3 col-md-6">
      <div class="small-box bg-danger">
          <div class="inner">
           
<h3>{{$merchant_compleate}}</h3>                                              

            <p>Complete Delivery </p>
          </div>
          <div class="icon">
            <i class="fas fa-shopping-cart"></i>
          </div>
          <a href="#" class="small-box-footer">
            More info <i class="fas fa-arrow-circle-right"></i>
          </a>
        </div>
  </div>
  <div class="col-xl-3 col-md-6">
      <div class="small-box bg-gradient-success">
          <div class="inner">
           
<h3>{{$merchant_outfor}}</h3>                                              

            <p>Out For Delivery</p>
          </div>
          <div class="icon">
            <i class="fas fa-user-plus"></i>
          </div>
          <a href="#" class="small-box-footer">
            More info <i class="fas fa-arrow-circle-right"></i>
          </a>
        </div>
  </div>
  <div class="col-xl-3 col-md-6">
      <div class="small-box bg-info">
          <div class="inner">
            
<h3>{{$merchant_Retrun}}</h3>                                              

            <p>Retrun Delivery</p>
          </div>
          <div class="icon">
            <i class="fas fa-shopping-cart"></i>
          </div>
          <a href="#" class="small-box-footer">
            More info <i class="fas fa-arrow-circle-right"></i>
          </a>
        </div>
  </div>
  <div class="col-xl-3 col-md-6">
      <div class="small-box bg-warning">
          <div class="inner">
        
<h3>{{$merchantdue[0]->total}}</h3>                                              

            <p>Due Ammount</p>
          </div>
          <div class="icon">
            <i class="fas fa-user-plus"></i>
          </div>
          <a href="#" class="small-box-footer">
            More info <i class="fas fa-arrow-circle-right"></i>
          </a>
        </div>
  </div>
</div>
@endif
{{-- Marcent Card End --}}

{{-- Rider Card Start --}}
@if(auth()->user()->type=='Rider')
<div class="row">



  <div class="col-xl-3 col-md-6">
      <div class="small-box bg-success">
          <div class="inner">
           
<h3>{{$rider_complete}}</h3>                                              

            <p>Complete Delivery</p>
          </div>
          <div class="icon">
            <i class="fas fa-shopping-cart"></i>
          </div>
          <a href="#" class="small-box-footer">
            More info <i class="fas fa-arrow-circle-right"></i>
          </a>
        </div>
  </div>
  <div class="col-xl-3 col-md-6">
      <div class="small-box bg-gradient-danger">
          <div class="inner">
           
<h3>{{$rider_pending}}</h3>                                              

            <p>Retrun Delivery</p>
          </div>
          <div class="icon">
            <i class="fas fa-user-plus"></i>
          </div>
          <a href="#" class="small-box-footer">
            More info <i class="fas fa-arrow-circle-right"></i>
          </a>
        </div>
  </div>
  <div class="col-xl-3 col-md-6">
      <div class="small-box bg-info">
          <div class="inner">
            
<h3>{{0+$Amount_toCollected[0]->total}}</h3>                                              

            <p>Amount Collected</p>
          </div>
          <div class="icon">
            <i class="fas fa-shopping-cart"></i>
          </div>
          <a href="#" class="small-box-footer">
            More info <i class="fas fa-arrow-circle-right"></i>
          </a>
        </div>
  </div>
  <div class="col-xl-3 col-md-6">
      <div class="small-box bg-warning">
          <div class="inner">
        
<h3>{{0+$Amount_toCollect[0]->total}}</h3>                                              

            <p>Amount to Collect</p>
          </div>
          <div class="icon">
            <i class="fas fa-user-plus"></i>
          </div>
          <a href="#" class="small-box-footer">
            More info <i class="fas fa-arrow-circle-right"></i>
          </a>
        </div>
  </div>
</div>
@endif
{{-- Rider Card End --}}

            
            <div class="row">
                <div class="col-xl-6">
                    <div class="card mb-4">
                      <div>
                        <canvas id="myChart"></canvas>
                      </div>
                        <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-chart-bar me-1"></i>
                            All Delivery Last 7 Day
                        </div>
                        <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                    </div>
                </div>
            </div>
            @php
              $day = Carbon\Carbon::now();
              $to = Carbon\Carbon::today();
              $ys = Carbon\Carbon::yesterday();
              $Day1 = App\Models\order::where('created_at',$day->subDays(3)->toDateString())->count();
              $Day2 = App\Models\order::where('created_at',$day->subDays(2)->toDateString())->count();
              $Day3 = App\Models\order::where('created_at',$day->subDays(1)->toDateString())->count();
              $Day4 = App\Models\order::where('created_at',$day->subDays(0)->toDateString())->count();
              $Day5 = App\Models\order::where('created_at',$day->subDays(-1)->toDateString())->count();
              $Yesterday = App\Models\order::where('created_at',$ys->subDays(-2)->toDateString())->count();
              $Today = App\Models\order::where('created_at',$to->toDateString())->count();
            @endphp
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script>
              const labels = [
                '0',
                'Yesterday',
                'Today',
                '0',
              ];
            
              const data = {
                labels: labels,
                datasets: [{
                  label: 'All Delivery Last 2 Day',
                  backgroundColor: 'rgb(255, 99, 132)',
                  borderColor: 'rgb(255, 99, 132)',
                  data: [0, {{$Yesterday}}, {{$Today}},0],
                }]
              };
            
              const config = {
                type: 'line',
                data: data,
                options: {}
              };
            </script>
            <script>
              const myChart = new Chart(
                document.getElementById('myChart'),
                config
              );
            </script>
            
        </div>
    </main>
@endsection