@extends('layouts.app')
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
@section('content')




<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Total Order</h1>
            
            @if(auth()->user()->type=='Admin')
            <a href="create_order" class="btn btn-success" role="button" aria-pressed="true">Create Order</a>
            @endif
            @if(auth()->user()->type=='Merchant')
            <a href="create_order" class="btn btn-success" role="button" aria-pressed="true">Create Order</a>
            @endif
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    All Order
                </div>

                {{-- Admin  Start --}}
                @if(auth()->user()->type=='Admin')
                    <ul class="nav nav-pills nav-fill">

                    </li>
                    <li class="nav-item">
                        <a class="btn btn-primary"  href="/order">All Delivery <p class="btn btn-dark">{{$admintotal}}</p> </a> 
                    </li>
                        <li class="nav-item">
                          <a class="btn btn-danger"  href="/pending_delivery">Picup Request  <p class="btn btn-dark">{{$adminpicup}}</p>  </a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-success"  href="/complete_delivery">Complete Delivery <p class="btn btn-dark">{{$admincomplete}}</p> </a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-info"  href="/Processing_delivery">Out For Delivery <p class="btn btn-dark">{{$adminout}}</p> </a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-danger"  href="/Retrun_delivery">Retrun <p class="btn btn-dark">{{$adminRetrun}}</p> </a>
                        </li>
                    </li>
                        <li class="nav-item">
                            <a class="btn btn-warning"  href="/holddelivery">Hold <p class="btn btn-dark">{{$adminhold}}</p> </a>
                        </li>
                      </ul>
                      @endif
       {{-- Admin  End --}}
 {{-- Merchant  Start --}}
 @if(auth()->user()->type=='Merchant')
 <ul class="nav nav-pills nav-fill">

 </li>
 <li class="nav-item">
     <a class="btn btn-primary"  href="/order">All Delivery <p class="btn btn-dark">{{$total_order}}</p> </a> 
 </li>
     <li class="nav-item">
       <a class="btn btn-danger"  href="/pending_delivery">Picup Request  <p class="btn btn-dark">{{$pending_delivery}}</p>  </a>
     </li>
     <li class="nav-item">
         <a class="btn btn-success"  href="/complete_delivery">Complete Delivery <p class="btn btn-dark">{{$complete_delivery}}</p> </a>
     </li>
     <li class="nav-item">
         <a class="btn btn-info"  href="/Processing_delivery">Out For Delivery <p class="btn btn-dark">{{$Processing_delivery}}</p> </a>
     </li>
     <li class="nav-item">
         <a class="btn btn-danger"  href="/Retrun_delivery">Retrun <p class="btn btn-dark">{{$Retrun_delivery}}</p> </a>
     </li>
 </li>
     <li class="nav-item">
         <a class="btn btn-warning"  href="/holddelivery">Hold <p class="btn btn-dark">{{$hold_delivery}}</p> </a>
     </li>
   </ul>
   @endif
{{-- Merchant  End --}}
{{-- Rider  Start --}}
@if(auth()->user()->type=='Rider')
<ul class="nav nav-pills nav-fill">

</li>
<li class="nav-item">
    <a class="btn btn-primary"  href="/order">All Delivery <p class="btn btn-dark">{{$riderall}}</p> </a> 
</li>
    <li class="nav-item">
      <a class="btn btn-danger"  href="/pending_delivery">Picup Request  <p class="btn btn-dark">{{$riderpicup}}</p>  </a>
    </li>
    <li class="nav-item">
        <a class="btn btn-success"  href="/complete_delivery">Complete Delivery <p class="btn btn-dark">{{$ridercomplete}}</p> </a>
    </li>
    <li class="nav-item">
        <a class="btn btn-info"  href="/Processing_delivery">Out For Delivery <p class="btn btn-dark">{{$riderout}}</p> </a>
    </li>
    <li class="nav-item">
        <a class="btn btn-danger"  href="/Retrun_delivery">Retrun <p class="btn btn-dark">{{$riderRetrun}}</p> </a>
    </li>
</li>
    <li class="nav-item">
        <a class="btn btn-warning"  href="/holddelivery">Hold <p class="btn btn-dark">{{$riderhold}}</p> </a>
    </li>
  </ul>
  @endif
{{-- Rider  End --}}



                      
                
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            {{-- Admin Table Start --}}
                            @if(auth()->user()->type=='Admin')
                            <tr>
                                <th>SN</th>
                                <th>Merchant Name</th>
                                <th>Picup Address</th>
                                <th>Customar Name</th>
                                <th>Customar Phone</th>
                                <th>Customar Address</th>
                                <th>Ammount To Collect</th>
                                <th>Status</th>
                                <th>Action</th>
                                
                            </tr>
                            @endif
                            {{-- Admin Table End --}}
                            {{-- merchant Table Start --}}
                            @if(auth()->user()->type=='Merchant')
                            <tr>
                                <th>SN</th>
                                <th>Customar Name</th>
                                <th>Customar Phone</th>
                                <th>Customar Address</th>
                                <th>Delivery Charge</th>
                                <th>Ammount To Collect</th>
                                <th>Status</th>
                                <th>Action</th>
                                
                            </tr>
                            @endif
                            {{-- merchant Table End --}}
                            {{-- Rider Table Start --}}
                            @if(auth()->user()->type=='Rider')
                            <tr>
                                <th>SN</th>
                                <th>Customar Name</th>
                                <th>Customar Phone</th>
                                <th>Customar Address</th>
                                <th>Ammount To Collect</th>
                                <th>Status</th>
                                <th>Action</th>
                                
                            </tr>
                            @endif
                            {{-- Rider Table End --}}
                        </thead>
                    
                        <tbody>
                            {{-- Admin Table Start --}}
                            @if(auth()->user()->type=='Admin')
                            @foreach ($adminorder as $key=>$adminorder)
                            <tr>
                                <td>{{ $key+1}}</td>
                                <td>{{$adminorder->marcent_name}}</td>
                                <td>{{$adminorder->picup_address}}</td>
                                <td>{{$adminorder->Recipient_Name}}</td>
                                <td>{{$adminorder->Recipient_Phone}}</td>
                                <td>{{$adminorder->Recipient_Address}}</td>
                                <td>{{$adminorder->Ammount_Collect}}</td>
                                <td>
                                    @if($adminorder->status==0)
                                    <h5><span class="badge btn btn-danger">Picup Reques</span></h5>
                                      @elseif($adminorder->status==1)
                                      <h5><span class="badge btn btn-info ">Pending </span></h5>
                                     @elseif($adminorder->status==2)
                                      <h5><span  class="badge btn btn-primary  ">Out For Delivery </span></h5>
                                       @elseif($adminorder->status==3)
                                       <h5> <span  class="badge btn btn-warning">Hold</span> </h5>
                                        @elseif($adminorder->status==4)
                                        <h5> <span  class="badge btn btn-danger">Retrun</span> </h5>
                                     @else
                                     <h5> <span  class="badge btn btn-success">Deliverd</span> </h5>
                                     @endif
                                
                                   </td>
                                   <td>
                                    <a href="/edit_order/{{ $adminorder->id }}" class="btn btn-success" role="button" aria-pressed="true">Edit</a>
                                    <a href="/delete_order/{{ $adminorder->id }}" class="btn btn-danger" role="button" aria-pressed="true">Delete</a>
                                    <a href="/viewinvoice/{{ $adminorder->id }}" class="btn btn-info" role="button" aria-pressed="true">View</a>
                                    <a href="/tracking/{{ $adminorder->id }}" class="btn btn-warning" role="button" aria-pressed="true">Track</a>
                                </td>
                            </tr>
                            @endforeach
                            @endif
                            {{-- Admin Table End --}}
                             {{-- Merchant Table Start --}}
                             @if(auth()->user()->type=='Merchant')
                             @foreach ($merchantorder as $key=>$merchantorder)
                             <tr>
                                 <td>{{ $key+1}}</td>
                                 <td>{{$merchantorder->Recipient_Name}}</td>
                                 <td>{{$merchantorder->Recipient_Phone}}</td>
                                 <td>{{$merchantorder->Recipient_Address}}</td>
                                 <td>{{$merchantorder->delivery_charge}}</td>
                                 <td>{{$merchantorder->Ammount_Collect}}</td>
                                 <td>
                                    @if($merchantorder->status==0)
                                    <h5><span class="badge btn btn-danger">Picup Reques</span></h5>
                                      @elseif($merchantorder->status==1)
                                      <h5><span class="badge btn btn-info ">Pending </span></h5>
                                     @elseif($merchantorder->status==2)
                                      <h5><span  class="badge btn btn-primary  ">Out For Delivery </span></h5>
                                       @elseif($merchantorder->status==3)
                                       <h5> <span  class="badge btn btn-warning">Hold</span> </h5>
                                        @elseif($merchantorder->status==4)
                                        <h5> <span  class="badge btn btn-danger">Retrun</span> </h5>
                                     @else
                                     <h5> <span  class="badge btn btn-success">Deliverd</span> </h5>
                                     @endif
                                 
                                    </td>
                                    <td>
                                     
                                     <a href="/viewinvoice/{{ $merchantorder->id }}" class="btn btn-info" role="button" aria-pressed="true">View</a>
                                     <a href="/tracking/{{ $merchantorder->id }}" class="btn btn-warning" role="button" aria-pressed="true">Track</a>
                                 </td>
                             </tr>
                             @endforeach
                             @endif
                             {{-- Merchant Table End --}}
                             {{-- Rider Table Start --}}
                             @if(auth()->user()->type=='Rider')
                             @foreach ($riderordert as $key=>$riderordert)
                             <tr>
                                 <td>{{ $key+1}}</td>
                                 <td>{{$riderordert->Recipient_Name}}</td>
                                 <td>{{$riderordert->Recipient_Phone}}</td>
                                 <td>{{$riderordert->Recipient_Address}}</td>
                                 <td>{{$riderordert->Ammount_Collect}}</td>
                                 <td>
                                    @if($riderordert->status==0)
                                    <h5><span class="badge btn btn-danger">Picup Reques</span></h5>
                                      @elseif($riderordert->status==1)
                                      <h5><span class="badge btn btn-info ">Pending </span></h5>
                                     @elseif($riderordert->status==2)
                                      <h5><span  class="badge btn btn-primary  ">Out For Delivery </span></h5>
                                       @elseif($riderordert->status==3)
                                       <h5> <span  class="badge btn btn-warning">Hold</span> </h5>
                                        @elseif($riderordert->status==4)
                                        <h5> <span  class="badge btn btn-danger">Retrun</span> </h5>
                                     @else
                                     <h5> <span  class="badge btn btn-success">Deliverd</span> </h5>
                                     @endif
                                 
                                    </td>
                                    <td>
                                     <a href="/edit_order/{{ $riderordert->id }}" class="btn btn-success" role="button" aria-pressed="true">Edit</a>
                                     <a href="/viewinvoice/{{ $riderordert->id }}" class="btn btn-info" role="button" aria-pressed="true">View</a>
                                    
                                 </td>
                             </tr>
                             @endforeach
                             @endif
                             {{-- Rider Table End --}}
                        </tbody>

                        
                    </table>


                  
                       
                    
                </div>
            </div>
        </div>




       









@endsection