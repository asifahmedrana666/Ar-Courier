@extends('layouts.app')
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
@section('content')




<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Total Order</h1>
            
            
            <a href="create_order" class="btn btn-success" role="button" aria-pressed="true">create order</a>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    All Order
                </div>

       

                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>SN</th>
                                <th>Recipient_Name</th>
                                <th>Recipient_Phone</th>
                                <th>Recipient_Address</th>
                                <th>Ammount_Collect</th>
                                <th>Status</th>
                                <th>Action</th>
                                
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>SN</th>
                                <th>Recipient_Name</th>
                                <th>Recipient_Phone</th>
                                <th>Recipient_Address</th>
                                <th>Ammount_Collect</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        
                        <tbody>
                            @foreach ($adminorder as $key=>$adminorder)
                            <tr>
                                <td>{{ $adminorder->id}}</td>
                                <td>{{$adminorder->Recipient_Name}}</td>
                                <td>{{$adminorder->Recipient_Phone}}</td>
                                <td>{{$adminorder->Recipient_Address}}</td>
                                <td>{{$adminorder->Ammount_Collect}}</td>
                                <td>
                                    @if($adminorder->status==0)
                                    <span class="btn btn-danger">Pending                   <div class="overlay">
                                        <i class="fas fa-0x fa-sync-alt fa-spin"></i>
                                      </div></span>
                    
                                @else
                                    <span  class="btn btn-success">Deliverd</span> 
                                @endif
                                   </td>
                                <td>
                                    <a href="/edit_order/{{ $adminorder->id }}" class="btn btn-success" role="button" aria-pressed="true">Edit</a>
                                    <a href="/delete_order/{{ $adminorder->id }}" class="btn btn-danger" role="button" aria-pressed="true">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                         
                          
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
@endsection