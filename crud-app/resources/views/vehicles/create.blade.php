@extends('vehicles.layout')
@section('content')
 
<div class="card">
  <div class="card-header">Create Vehicles</div>
  <div class="card-body">
      
      <form action="{{ url('vehicle') }}" method="post">
        {!! csrf_field() !!}
        <label>Vehicle Name</label></br>
        <input type="text" name="vehicle_name" id="vehicle_name" class="form-control"></br>
        <label>Vehicle Brand</label></br>
        <input type="text" name="vehicle_brand" id="vehicle_brand" class="form-control"></br>
        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>
   
  </div>
</div>
 
@stop