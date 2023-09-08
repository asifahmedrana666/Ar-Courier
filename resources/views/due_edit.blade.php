@extends('layouts.app')

@section('content')


<link rel="stylesheet" href="https://pidex.biz/3rd-party/bootstrap/css/bootstrap.min.css">

<link rel="stylesheet" href="https://pidex.biz/commons/css/fonts/nunito.css">
    <link rel="stylesheet" href="https://pidex.biz/3rd-party/font-awesome/all.min.css">


<div id="layoutSidenav_content">
    
        <div class="container-fluid px-4">
          <h1 class="mt-4">Edit Delivery</h1>
            <div class="card mb-2">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Edit Delivery
                </div>


{{-- <form action="/updateorder/{{ $order->id }}" method="post">
    @csrf
    <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputEmail4">Marcent Name</label>
          <input type="text" class="form-control" name="marcent_name" value="{{ $order->marcent_name }}" placeholder="Enter name" required>
        </div>
        <div class="form-group col-md-6">
          <label for="inputPassword4">Picup Address</label>
          <input type="text" class="form-control" name="picup_address" value="{{ $order->picup_address }}" >
        </div>
      </div>
  
      <label for="exampleInputBorderWidth2">Product Type</label>
      <select class="form-control" name="Product_Type">
                                      <option value="General/dry" >General/dry</option>
                                      <option value="Documents" >Documents</option>
                                      <option value="Liquid" >Liquid</option>
                                  </select>
                                  <div class="form-row">
                                    <div class="form-group col-md-6">
                                      <label for="inputEmail4">Customar Name </label>
                                      <input type="text" class="form-control" name="Recipient_Name" value="{{ $order->Recipient_Name }}">
                                    </div>
                                    <div class="form-group col-md-6">
                                      <label for="inputPassword4">Customar Phone </label>
                                      <input type="text" class="form-control" name="Recipient_Phone" value="{{ $order->Recipient_Phone }}">
                                    </div>
                                  </div>
                                  
      <div class="form-group">
        <label for="inputAddress">Customar Address</label>
        <input type="text" class="form-control" name="Recipient_Address" value="{{ $order->Recipient_Address }}">
      </div>
    
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputCity">Ammount To Collect</label>
          <input type="text" class="form-control" name="Ammount_Collect" value="{{ $order->Ammount_Collect }}">
        </div>
        <div class="form-group">
          <label for="exampleFormControlTextarea1">Description</label>
          <input type="text" class="form-control" name="Description" value="{{ $order->Description }}">
        </div>
        
  
  
      </div>
      <div class="form-group">
  
      </div>
      <label for="exampleInputBorderWidth2">Delivery status</label>
      <select class="btn btn-success" name="status">
                                      <option value="0" {{$order->status == '0' ? 'selected' : ''}}>Picup Request</option>
                                      <option value="1" {{$order->status == '1' ? 'selected' : ''}}>Out For Delivery</option>
                                      <option value="2" {{$order->status == '2' ? 'selected' : ''}}>Deliverd</option>
                                      <option value="3" {{$order->status == '3' ? 'selected' : ''}}>Retrun</option>
                                      <option value="4" {{$order->status == '4' ? 'selected' : ''}}>Hold</option>
                                  </select>
      <div class="row">
        <select class="form-control form-control-lg" aria-label=".form-select-sm example" name="rider">
          
          @foreach ($rider as $rider)
          <option value="{{$rider->id}}">{{$rider->name}}</option>
          @endforeach
        </select>
      <button type="submit" class="btn btn-info btn-sm">Update</button>
  </form> --}}







  @if(auth()->user()->type=='Admin')

  <form action="/due_edit_up/{{ $order->id }}" method="post">
    @csrf
  


  

  <div class="form-row">
    <div class="col">
      <label for="exampleInputBorderWidth2">Marcent Name</label>
      <input type="text" class="form-control"  value="{{ $order->marcent_name }}" placeholder="Customar name" disabled>
    </div>
    <div class="col">
      <label for="exampleInputBorderWidth2">Recipient Name</label>
      <input type="text" class="form-control"  value="{{ $order->Recipient_Name }}" placeholder="Customar name" disabled>
    </div>
  </div>

  <div class="form-row">
    <div class="col">
      <label for="exampleInputBorderWidth2">Recipient Full Address</label>
      <input type="text" class="form-control"  value="{{ $order->Recipient_Address }}" placeholder="Customar Address"disabled>
    </div>
    <div class="col">
        <label for="exampleInputBorderWidth2">Recipient Phone</label>
        <input type="text" class="form-control" value="{{ $order->Recipient_Phone }}" placeholder="Customar Phone number" required maxlength="11" disabled>
        @error('Recipient_Phone')
        {{ $message }}
       @enderror
      </div>
    </div>

  <div class="form-row">
    <div class="col">
        <label for="exampleInputBorderWidth2">Due Ammount</label>
        <input type="text" class="form-control" value="{{$order->Ammount_Collect-$order->delivery_charge}}" disabled>
      </div>
    <div class="col">
      <label for="exampleInputBorderWidth2">Due status</label>
      <select class="custom-select mr-sm-2" name="merchant_Due">
        
        <option value="yes" {{$order->merchant_Due == 'yes' ? 'selected' : ''}}>Pending</option>
        <option value="Paid" {{$order->merchant_Due == 'Paid' ? 'selected' : ''}}>Paid</option>

        
        
      </select>
    </div>
  </div>
  <button type="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
</form>
@endif

@endsection