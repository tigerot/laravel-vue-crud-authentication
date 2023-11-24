<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Vehicle;

class VehicleController extends Controller
{
    protected $vehicle;
    public function __construct(){
        $this->vehicle = new Vehicle();
         
    }
 
    public function index()
    {
        return $this->vehicle->all();
    }
 
    public function store(Request $request)
    {
        return $this->vehicle->create($request->all());
    }
 
    public function show(string $id)
    {
        $student = $this->vehicle->find($id);  
    }
 
    public function update(Request $request, string $id)
    {
        $vehicle = $this->vehicle->find($id);
        $vehicle->update($request->all());
        return $vehicle;
    }
 
    public function destroy(string $id)
    {
        $vehicle = $this->vehicle->find($id);
        return $vehicle->delete();
    }
}
