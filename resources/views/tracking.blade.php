
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">






<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4"> Delivery Tracking</h1>

            <div class="card mb-4">
{{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> --}}
<link href="{{ asset('dash/css/track.css') }}" rel="stylesheet" />


<section class="vh-100" style="background-color: #8c9eff;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12">
          <div class="card card-stepper text-black" style="border-radius: 16px;">
  
            <div class="card-body p-5">
  
              <div class="d-flex justify-content-between align-items-center mb-5">
                <div>
                  <h5 class="mb-0">Tracking ID: <span class="text-primary font-weight-bold">{{ $tracking->id }}</span></h5>
                </div>
                <div class="text-end">
                  {{-- <p class="mb-0">Expected Arrival <span>01/12/19</span></p>
                  <p class="mb-0">USPS <span class="font-weight-bold">234094567242423422898</span></p> --}}
                </div>
              </div>
  
              @if($tracking->status==0)
              <div class="progress">
<div class="progress-bar" style="width:20%"></div>
</div>
                @elseif($tracking->status==1)
                <div class="progress">
                  <div class="progress-bar" style="width:70%"></div>
                  </div>
                @elseif($tracking->status==3)
                <div class="progress">
                  <div class="progress-bar" style="width:100%"></div>
                  </div>
    
          @else
          <div class="progress">
            <div class="progress-bar" style="width:40%"></div>
            </div> 
          @endif
              <br>
             
  
              <div class="d-flex justify-content-between">
                <div class="d-lg-flex align-items-center">
                  <i class="fas fa-clipboard-list fa-3x me-lg-4 mb-3 mb-lg-0"></i>
                  <div>
                    <p class="fw-bold mb-1">Picup</p>
                    <p class="fw-bold mb-0"> Request</p>
                  </div>
                </div>
                <div class="d-lg-flex align-items-center">
                  <i class="fas fa-box-open fa-3x me-lg-4 mb-3 mb-lg-0"></i>
                  <div>
                    <p class="fw-bold mb-1">Order</p>
                    <p class="fw-bold mb-0">Pending</p>
                  </div>
                </div>
                <div class="d-lg-flex align-items-center">
                  <i class="fas fa-shipping-fast fa-3x me-lg-4 mb-3 mb-lg-0"></i>
                  <div>
                    <p class="fw-bold mb-1">Order</p>
                    <p class="fw-bold mb-0">Out For Delivery</p>
                  </div>
                </div>
                <div class="d-lg-flex align-items-center">
                  <i class="fas fa-home fa-3x me-lg-4 mb-3 mb-lg-0"></i>
                  <div>
                    <p class="fw-bold mb-1">Order</p>
                    <p class="fw-bold mb-0">Deliverd</p>
                  </div>
                </div>
              </div>
  
            </div>
  
          </div>
        </div>
      </div>
    </div>
  </section>
