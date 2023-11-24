@extends('vehicles.layout')
@section('content')
 
<div class="card">
  <div class="card-header">Edit Vehicles</div>
  <div class="card-body">
      
      <form action="{{ url('vehicle/' .$vehicles->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$vehicles->id}}" id="id" />
        <label>Vehicle Name</label></br>
        <input type="text" name="vehicle_name" id="vehicle_name" value="{{$vehicles->vehicle_name}}" class="form-control"></br>
        <label>Vehicle Brand</label></br>
        <input type="text" name="vehicle_brand" id="vehicle_brand" value="{{$vehicles->vehicle_brand}}" class="form-control"></br>
        <input type="submit" value="Update" class="btn btn-success"></br>
    </form>
   
  </div>
</div>
 
@stop