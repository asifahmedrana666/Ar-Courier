@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="https://pidex.biz/3rd-party/bootstrap/css/bootstrap.min.css">

<link rel="stylesheet" href="https://pidex.biz/commons/css/fonts/nunito.css">
    <link rel="stylesheet" href="https://pidex.biz/3rd-party/font-awesome/all.min.css">


<div id="layoutSidenav_content">
    
        <div class="container-fluid px-4">
            
            <div class="card mb-2">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    DataTable Example
                </div>
  @if(session()->has('success'))
                            <div class="btn btn-success">
                                {{ session()->get('success') }}
                            </div>
                        @endif

{{-- <form action="/stororder" method="post">
    @csrf
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputEmail4"></label>
        <input type="hidden" class="form-control" name="marcent_name" value= {{ $users }} required>
      </div>
    </div>
      <div class="form-group col-md-6">
        <label for="inputPassword4"></label>
        <input type="hidden" class="form-control" name="picup_address" value="test" >
      
    </div>
    <div class="form-row">
      <div class="col">
    <label for="exampleInputBorderWidth2">Product Type</label>
    <input type="text" class="form-control" name="Recipient_Name" >
                              </div>
                            </div>
                            <div class="col">
                                <label for="exampleInputBorderWidth2">Product Type</label>
                              <input type="text" class="form-control" name="Recipient_Name" >
                                                          </div>
                                <div class="form-row">
                                  <div class="form-group col-md-6">
                                    <label for="inputEmail4">Customar Name</label>
                                    <input type="text" class="form-control" name="Recipient_Name" >
                                  </div>
                                  <div class="form-group col-md-6">
                                    <label for="inputPassword4">Customar Phone</label>
                                    <input type="number" class="form-control" name="Recipient_Phone" placeholder="Customar Phone number" required maxlength="11">
                                    @error('Recipient_Phone')
                                    {{ $message }}
                                   @enderror
                                  </div>
                                </div>
                                
    <div class="form-group">
      <label for="inputAddress">Customar Address</label>
      <input type="text" class="form-control" name="Recipient_Address" placeholder="Customar Address">
    </div>
  
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputCity">Ammount To Collect</label>
        <input type="text" class="form-control" name="Ammount_Collect">
      </div>
      <div class="form-group">
        <label for="exampleFormControlTextarea1">Description</label>
        <textarea input type="text" class="form-control" name="Description" ></textarea>
      </div>
      <label for="exampleInputBorderWidth2"></label>
      <input class="form-control" type="hidden" name="status" value="0" placeholder="Enter host name" required>


    </div>
    <div class="form-group">

    </div>
    <button type="submit" class="btn btn-info btn-sm">Save</button>
</form> --}}


<form action="/stororder" method="post">
  @csrf

  <div class="form-row">
    <div class="col">
      
      <input type="text" class="form-control" name="marcent_name" value= "{{$users->name}}">
    </div>
    <div class="col">
      
      <input type="text"  class="form-control" value= "{{$users->address}}" name="picup_address">
    </div>
  </div>


  <div class="form-row">
    <div class="col">
      <label for="exampleInputBorderWidth2">Product Type</label>
      <select class="custom-select mr-sm-2" name="Product_Type">
        <option value="General / Dry" selected>General / Dry</option>
        <option value="Document">Document</option>
        <option value="Liquid">Liquid</option>
        
      </select>
    </div>
    <div class="col">
      <label for="exampleInputBorderWidth2">Package Type</label>
      <select class="custom-select mr-sm-2" name="package_type">
        <option value="Bag" selected>Bag</option>
        <option value="Box">Box</option>
        <option value="Cartoon">Cartoon</option>
        
      </select>
    </div>
  </div>

  <div class="form-row">
    <div class="col">
      <label for="exampleInputBorderWidth2">Delivery Time</label>
      <select class="custom-select mr-sm-2" name="delivery_time">
        <option value="Normal Delivery" selected>Normal Delivery</option>
        <option value="Same Day Delivery">Same Day Delivery</option>
        <option value="Express Delivery (within 4-5 Hour)">Express Delivery (within 4-5 Hour)</option>
        
      </select>
    </div>
    <div class="col">
      <label for="exampleInputBorderWidth2">Weight</label>
      <select class="custom-select mr-sm-2" name="weight">
        <option value="0-1 Kg" selected>0-1 Kg</option>
        <option value="1-2 Kg">1-2 Kg</option>
        <option value="2-3 Kg">2-3 Kg</option>
        <option value="3-4 Kg">3-4 Kg</option>
        <option value="4-5 Kg">4-5 Kg</option>
        <option value="5-6 Kg">5-6 Kg</option>
        <option value="6-7 Kg">6-7 Kg</option>
        <option value="7-8 Kg">7-8 Kg</option>
        <option value="8-9 Kg">8-9 Kg</option>
        <option value="9-10 Kg">9-10 Kg</option>
      </select>
    </div>
  </div>

  <div class="form-row">
    <div class="col">
      <label for="exampleInputBorderWidth2">Recipient Name</label>
      <input type="text" class="form-control" name="Recipient_Name" placeholder="Customar name">
    </div>
    <div class="col">
      <label for="exampleInputBorderWidth2">Recipient Phone</label>
      <input type="text" class="form-control" name="Recipient_Phone" placeholder="Customar Phone number" required maxlength="11">
      @error('Recipient_Phone')
      {{ $message }}
     @enderror
    </div>
  </div>

  <div class="form-row">
    <div class="col">
      <label for="exampleInputBorderWidth2">Recipient Full Address</label>
      <input type="text" class="form-control" name="Recipient_Address" placeholder="Customar Address">
    </div>
    <div class="col">
      <label for="exampleInputBorderWidth2">Amount to Collect</label>
      <input type="text" class="form-control" name="Ammount_Collect">
    </div>
  </div>
  <button type="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
</form>

@endsection