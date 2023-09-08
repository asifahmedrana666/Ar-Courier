@extends('layouts.app')
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
@section('content')




<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Hold Delivery</h1>
            <div class="card mb-4">
                
                
                
                
                <div class="card-body">
                    <table id="datatablesSimple">
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
                         @foreach ($admin as $key=>$admin)
                         <tr>
                             <td>{{ $key+1}}</td>
                             <td>{{$admin->marcent_name}}</td>
                             <td>{{$admin->picup_address}}</td>
                             <td>{{$admin->Recipient_Name}}</td>
                             <td>{{$admin->Recipient_Phone}}</td>
                             <td>{{$admin->Recipient_Address}}</td>
                             <td>{{$admin->Ammount_Collect}}</td>
                             <td>
                                 
                                <h5> <span  class="badge btn btn-warning">Hold</span> </h5>
                                  
                             
                                </td>
                                <td>
                                 <a href="/edit_order/{{ $admin->id }}" class="btn btn-success" role="button" aria-pressed="true">Edit</a>
                                 <a href="/delete_order/{{ $admin->id }}" class="btn btn-danger" role="button" aria-pressed="true">Delete</a>
                                 <a href="/viewinvoice/{{ $admin->id }}" class="btn btn-info" role="button" aria-pressed="true">View</a>
                                 <a href="/tracking/{{ $admin->id }}" class="btn btn-warning" role="button" aria-pressed="true">Track</a>
                             </td>
                         </tr>
                         @endforeach
                         @endif
                         {{-- Admin Table End --}}
                          {{-- Merchant Table Start --}}
                          @if(auth()->user()->type=='Merchant')
                          @foreach ($merchant as $key=>$merchant)
                          <tr>
                              <td>{{ $key+1}}</td>
                              <td>{{$merchant->Recipient_Name}}</td>
                              <td>{{$merchant->Recipient_Phone}}</td>
                              <td>{{$merchant->Recipient_Address}}</td>
                              <td>{{$merchant->delivery_charge}}</td>
                              <td>{{$merchant->Ammount_Collect}}</td>
                              <td>
                                <h5> <span  class="badge btn btn-warning">Hold</span> </h5>
                              
                                 </td>
                                 <td>
                                  
                                  <a href="/viewinvoice/{{ $merchant->id }}" class="btn btn-info" role="button" aria-pressed="true">View</a>
                                  <a href="/tracking/{{ $merchant->id }}" class="btn btn-warning" role="button" aria-pressed="true">Track</a>
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
                              <td>{{$rider->Recipient_Name}}</td>
                              <td>{{$rider->Recipient_Phone}}</td>
                              <td>{{$rider->Recipient_Address}}</td>
                              <td>{{$rider->Ammount_Collect}}</td>
                              <td>
                                <h5> <span  class="badge btn btn-warning">Hold</span> </h5>
                                 </td>
                                 <td>
                                  <a href="/edit_order/{{ $rider->id }}" class="btn btn-success" role="button" aria-pressed="true">Edit</a>
                                  <a href="/viewinvoice/{{ $rider->id }}" class="btn btn-info" role="button" aria-pressed="true">View</a>
                                 
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