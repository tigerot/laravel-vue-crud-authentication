<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h3 class="text-center text-dark mt-2">Bor Holding Laravel Vue.js CRUD</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="card-header">
                    Add Record
                </div>
                <div class="card-body">
                    <form @submit.prevent="save">
                     
                    <div class="form-group">
                        <label>Vehicle Name</label>
                        <input type="text" v-model="vehicle.vehicle_name" class="form-control"  placeholder="Vehicle name">
                     
                    </div>
                    <div class="form-group">
                        <label>Vehicle Brand</label>
                        <input type="text" v-model="vehicle.vehicle_brand" class="form-control"  placeholder="Vehicle Brand">
                     
                    </div>
                     
                    <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
            <div class="col-md-8">
                <h2>Vehicles List</h2>
                    <table class="table table-dark">
                    <thead>
                        <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Vehicle Name</th>
                        <th scope="col">Vehicle Brand</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="vehicle in result" v-bind:key="vehicle.id">
                             
                            <td>{{ vehicle.id }}</td>
                            <td>{{ vehicle.vehicle_name }}</td>
                            <td>{{ vehicle.vehicle_brand }}</td>
                            <td>
                                <button type="button" class="btn btn-warning" @click="edit(vehicle)">Edit</button>
                                <button type="button" class="btn btn-danger"  @click="remove(vehicle)">Delete</button>
                            </td>
                            </tr>
                         
                    </tbody>
                    </table>
            </div>
        </div>
    </div>    
</template>
<script>
import axios from 'axios';
  
export default {
    name: 'VehicleView',
    data () {
      return {
        result: {},
        vehicle:{
                   id: '',
                   vehicle_name: '',
                   vehicle_brand: ''
        }
      }
    },
    created() { 
        this.VehicleLoad();
    },
    mounted() {
          console.log("mounted() called.......");
    },
  
    methods: {
           VehicleLoad()
           {
                 var page = "http://127.0.0.1:8000/api/vehicle";
                 axios.get(page)
                  .then(
                      ({data})=>{
                        console.log(data);
                        this.result = data;
                      }
                  );
           },
            
           save()
           {
            if(this.vehicle.id == '')
              {
                this.saveData();
              }
              else
              {
                this.updateData();
              }       
  
           },
           saveData()
           {
            axios.post("http://127.0.0.1:8000/api/vehicle", this.vehicle)
            .then(
              ({data})=>{
                alert("Saved.");
                this.VehicleLoad();
                this.vehicle.vehicle_name = '';
                this.vehicle.vehicle_brand = '',
                this.id = ''
              }
            )
  
           },
           edit(vehicle)
           {
            this.vehicle = vehicle;
           },
           updateData()
           {
              var editrecords = 'http://127.0.0.1:8000/api/vehicle/'+ this.vehicle.id;
              axios.put(editrecords, this.vehicle)
              .then(
                ({data})=>{
                  this.vehicle.vehicle_name = '';
                  this.vehicle.vehicle_brand = '',
                  this.id = ''
                  alert("Updated.");
                  this.VehicleLoad();
                }
              );
  
           },
  
           remove(vehicle){
              var url = `http://127.0.0.1:8000/api/vehicle/${vehicle.id}`;
              axios.delete(url);
              alert("Deleted.");
              this.VehicleLoad();
            }
      }
  }
  </script>