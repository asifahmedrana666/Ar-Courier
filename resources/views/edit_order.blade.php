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

  <form action="/updateorder/{{ $order->id }}" method="post">
    @csrf
  <div class="form-row">
    <div class="col">
      
      <input type="hidden" class="form-control" name="marcent_name" value="test" >
    </div>
    <div class="col">
      
      <input type="hidden" class="form-control" name="picup_address" value="test" >
      <div class="col">
      
        <input type="hidden" class="form-control" name="delivery_charge" value="{{ $order->delivery_charge }}" >
      </div>
    </div>
  </div>


  <div class="form-row">
    <div class="col">
      <label for="exampleInputBorderWidth2">Product Type</label>
      <select class="custom-select mr-sm-2" name="Product_Type">
        
        <option value="General / Dry" {{$order->Product_Type == 'General / Dry' ? 'selected' : ''}}>General / Dry</option>
        <option value="Document" {{$order->Product_Type == 'Document' ? 'selected' : ''}}>Document</option>
        <option value="Liquid" {{$order->Product_Type == 'Liquid' ? 'selected' : ''}}>Liquid</option>
        
        
      </select>
    </div>
    <div class="col">
      <label for="exampleInputBorderWidth2">Package Type</label>
      <select class="custom-select mr-sm-2" name="package_type">
        <option value="Bag" {{$order->package_type == 'Bag' ? 'selected' : ''}}>Bag</option>
        <option value="Box" {{$order->package_type == 'Box' ? 'selected' : ''}}>Box</option>
        <option value="Cartoon" {{$order->package_type == 'Cartoon' ? 'selected' : ''}}>Cartoon</option>
      </select>
    </div>
  </div>

  <div class="form-row">
    <div class="col">
      <label for="exampleInputBorderWidth2">Delivery Time</label>
      <select class="custom-select mr-sm-2" name="delivery_time">
        <option value="Normal Delivery" {{$order->delivery_time == 'Normal Delivery' ? 'selected' : ''}}>Normal Delivery</option>
        <option value="Same Day Delivery" {{$order->delivery_time == 'Same Day Delivery' ? 'selected' : ''}}>Same Day Delivery</option>
        <option value="Express Delivery (within 4-5 Hour)" {{$order->delivery_time == 'Express Delivery (within 4-5 Hour)' ? 'selected' : ''}}>Express Delivery (within 4-5 Hour)</option>
        
      </select>
    </div>
    <div class="col">
      <label for="exampleInputBorderWidth2">Weight</label>
      <select class="custom-select mr-sm-2" name="weight">
        <option value="0-1 Kg" {{$order->weight == '0-1 Kg' ? 'selected' : ''}}>0-1 Kg</option>
        <option value="1-2 Kg" {{$order->weight == '1-2 Kg' ? 'selected' : ''}}>1-2 Kg</option>
        <option value="2-3 Kg" {{$order->weight == '2-3 Kg' ? 'selected' : ''}}>2-3 Kg</option>
        <option value="3-4 Kg" {{$order->weight == '3-4 Kg' ? 'selected' : ''}}>3-4 Kg</option>
        <option value="4-5 Kg" {{$order->weight == '4-5 Kg' ? 'selected' : ''}}>4-5 Kg</option>
        <option value="5-6 Kg" {{$order->weight == '5-6 Kg' ? 'selected' : ''}}>5-6 Kg</option>
        <option value="6-7 Kg" {{$order->weight == '6-7 Kg' ? 'selected' : ''}}>6-7 Kg</option>
        <option value="7-8 Kg" {{$order->weight == '7-8 Kg' ? 'selected' : ''}}>7-8 Kg</option>
        <option value="8-9 Kg" {{$order->weight == '8-9 Kg' ? 'selected' : ''}}>8-9 Kg</option>
        <option value="9-10 Kg" {{$order->weight == '9-10 Kg' ? 'selected' : ''}}>9-10 Kg</option>

      </select>
    </div>
  </div>

  <div class="form-row">
    <div class="col">
      <label for="exampleInputBorderWidth2">Recipient Name</label>
      <input type="text" class="form-control" name="Recipient_Name" value="{{ $order->Recipient_Name }}" placeholder="Customar name">
    </div>
    <div class="col">
      <label for="exampleInputBorderWidth2">Recipient Phone</label>
      <input type="text" class="form-control" name="Recipient_Phone" value="{{ $order->Recipient_Phone }}" placeholder="Customar Phone number" required maxlength="11">
      @error('Recipient_Phone')
      {{ $message }}
     @enderror
    </div>
  </div>

  <div class="form-row">
    <div class="col">
      <label for="exampleInputBorderWidth2">Recipient Full Address</label>
      <input type="text" class="form-control" name="Recipient_Address" value="{{ $order->Recipient_Address }}" placeholder="Customar Address">
    </div>
    <div class="col">
      <label for="exampleInputBorderWidth2">Amount to Collect</label>
      <input type="text" class="form-control" name="Ammount_Collect" value="{{ $order->Ammount_Collect }}" >
    </div>
  </div>

  <div class="form-row">
    <div class="col">
      <label for="exampleInputBorderWidth2">Delivery status</label>
      <select class="custom-select mr-sm-2" name="status">
        
        <option value="0" {{$order->status == '0' ? 'selected' : ''}}>Picup Request</option>
        <option value="1" {{$order->status == '1' ? 'selected' : ''}}>Pending</option>
        <option value="2" {{$order->status == '2' ? 'selected' : ''}}>Out For Delivery</option>
        <option value="3" {{$order->status == '3' ? 'selected' : ''}}>Hold</option>
        <option value="4" {{$order->status == '4' ? 'selected' : ''}}>Retrun</option>
        <option value="5" {{$order->status == '5' ? 'selected' : ''}}>Deliverd</option>
        
        
      </select>
    </div>
    <div class="col">
      <label for="exampleInputBorderWidth2">Select Rider (Who Deliver This Product)</label>
      <select class="custom-select mr-sm-2" name="rider">
        @foreach ($rider as $rider)
        <option value="{{$rider->id}}">{{$rider->name}}</option>
        
        @endforeach
      </select>
    </div>
  </div>
  <button type="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
</form>
@endif

@if(auth()->user()->type=='Rider')

  <form action="/edit_order_rd/{{ $order->id }}" method="post">
    @csrf
    <div class="col">
      <label for="form-control form-control-lg">Delivery Status</label>
      <select class="form-control form-control-lg" name="status">
        <option value="0" {{$order->status == '0' ? 'selected' : ''}}>Picup Request</option>
        <option value="1" {{$order->status == '1' ? 'selected' : ''}}>Pending</option>
        <option value="2" {{$order->status == '2' ? 'selected' : ''}}>Out For Delivery</option>
        <option value="3" {{$order->status == '3' ? 'selected' : ''}}>Hold</option>
        <option value="4" {{$order->status == '4' ? 'selected' : ''}}>Retrun</option>
        <option value="5" {{$order->status == '5' ? 'selected' : ''}}>Deliverd</option>
      </select>
    </div>
    <br>
    <button type="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
</form>
@endif
@endsection