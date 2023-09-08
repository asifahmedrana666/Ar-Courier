@extends('layouts.app')

@section('content')




<div id="layoutSidenav_content">
    
        <div class="container-fluid px-4">
            
            <div class="card mb-2">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Create User
                </div>

<form action="/edit_users_up/{{$users->id}}" method="post" enctype="multipart/form-data">
    @csrf
    <select class="form-control form-control-lg" aria-label=".form-select-sm example" name="type">

        <option value="Rider" {{$users->type == 'Rider' ? 'selected' : ''}}>Rider</option>
        <option value="Admin" {{$users->type == 'Admin' ? 'selected' : ''}}>Admin</option>
        <option value="Merchant" {{$users->type == 'Merchant' ? 'selected' : ''}}>Merchant</option>
      </select>
    <label for="exampleInputBorder"> Name </label>
        <input type="text" class="form-control form-control-lg" name="name"  value="{{ $users->name }}" placeholder="Enter name" required>
        <label for="exampleInputBorder"> Address </label>
        <input type="text" class="form-control form-control-lg" name="address" value="{{ $users->address }}" placeholder="Enter address" required>
        <label for="exampleInputBorder">Email</label>
        <label for="exampleInputBorder">Email</label>
        <input type="email" class="form-control form-control-lg" name="email"  value="{{ $users->email }}" placeholder="Enter Email" required>
        
        
        
        
    <button type="submit" class="btn btn-info btn-lg">Submit</button>
</form>

@endsection