@extends('vehicles.layout')
@section('content')
 
 
<div class="card">
  <div class="card-header">Show Vehicles</div>
  <div class="card-body">
   
 
        <div class="card-body">
        <p class="card-title">Vehicle Name : {{ $vehicles->vehicle_name }}</p>
        <p class="card-text">Vehicle Brand : {{ $vehicles->vehicle_brand }}</p>
  </div>
       
    </hr>
  
  </div>
</div>