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

                   {{-- Merchant Card Start --}}
       @if(auth()->user()->type=='Merchant')
            <div class="row">



                <div class="col-xl-3 col-md-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                         
          <h3>{{0+$mdptoday[0]->total}}</h3>                                              

                          <p>Total Due Today</p>
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
                         
          <h3>{{0+$mdpyesterday[0]->total}}</h3>                                              

                          <p>Total Due Yesterday</p>
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
                          
          <h3>{{0+$mdptotal[0]->total}}</h3>                                              

                          <p>Total Due</p>
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
                      
          <h3>Waiting</h3>                                              

                          <p>For Payment</p>
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
            {{-- Merchant Card End --}}

                               {{-- Admin Card Start --}}
       @if(auth()->user()->type=='Admin')
       <div class="row">



           <div class="col-xl-3 col-md-6">
               <div class="small-box bg-danger">
                   <div class="inner">
                    
     <h3>{{0+$admintoday[0]->total}}</h3>                                              

                     <p>Total Due Today</p>
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
                    
     <h3>{{0+$adminyesterday[0]->total}}</h3>                                              

                     <p>Total Due Yesterday</p>
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
                     
     <h3>{{0+$admintotal[0]->total}}</h3>                                              

                     <p>Total Due</p>
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
                 
     <h3>Waiting</h3>                                              

                     <p>For Payment</p>
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
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                       {{-- Merchant Table Start --}}
                       @if(auth()->user()->type=='Merchant')
                        <tr>
                            <th>SN</th>
                            <th>Customar Name</th>
                            <th>Customar Phone</th>
                            <th>Customar Address</th>
                            <th>Due</th>
                            <th>Status</th>
                            
                        </tr>
                        @endif
                         {{-- Merchant Table End --}}
                          {{-- Admin Table Start --}}
                       @if(auth()->user()->type=='Admin')
                       <tr>
                           <th>SN</th>
                           <th>Merchant Name</th>
                           <th>Customar Name</th>
                           <th>Customar Phone</th>
                           <th>Customar Address</th>
                           <th>Due</th>
                           <th>Status</th>
                           <th>Action</th>
                       </tr>
                       @endif
                        {{-- Admin Table End --}}
                    </thead>

                    
                    <tbody>
                       
                        {{-- Merchant Table Start --}}
                        @if(auth()->user()->type=='Merchant')
                           @foreach ($alldueshow as $key=>$alldueshow)
  
                        <tr>
                            <td>{{$key+1}}</td>
                            
                            <td>{{$alldueshow->Recipient_Name}}</td>
                            <td>{{$alldueshow->Recipient_Phone}}</td>
                            <td>{{$alldueshow->Recipient_Address}}</td>
                            <td>{{$alldueshow->Ammount_Collect-$alldueshow->delivery_charge}}</td>
                            <td>
                                <span class="btn btn-danger">Pending                   <div class="overlay">
                                    <i class="fas fa-0x fa-sync-alt fa-spin"></i>
                                  </div></span>
                            </td>
                            
                        </tr>
                        
                        @endforeach
                        @endif
                       {{-- Merchant Table End --}}
                                               {{-- Admin Table Start --}}
                                               @if(auth()->user()->type=='Admin')
                                               @foreach ($alladminshow as $key=>$alladminshow)
                      
                                            <tr>
                                                <td>{{$key+1}}</td>
                                                <td>{{$alladminshow->marcent_name}}</td>
                                                <td>{{$alladminshow->Recipient_Name}}</td>
                                                <td>{{$alladminshow->Recipient_Phone}}</td>
                                                <td>{{$alladminshow->Recipient_Address}}</td>
                                                <td>{{$alladminshow->Ammount_Collect-$alladminshow->delivery_charge}}</td>
                                                <td>
                                                    <span class="btn btn-danger">Pending                   <div class="overlay">
                                                        <i class="fas fa-0x fa-sync-alt fa-spin"></i>
                                                      </div></span>
                                                </td>
                                                <td><a href="/due_edit/{{ $alladminshow->id }}" class="btn btn-success" role="button" aria-pressed="true">Edit</a></td>
                                            </tr>
                                            
                                            @endforeach
                                            @endif
                                           {{-- Admin Table End --}}
                    </tbody>
                </table>
            
        </div>
    </main>
@endsection