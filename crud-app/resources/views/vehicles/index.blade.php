@extends('vehicles.layout')
@section('content')
    <div class="container">
        <div class="row">
 
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h2>Bor Holding Laravel Vue.js CRUD</h2>
                    </div>
                    <div class="card-body">
                        <a href="{{ url('/vehicle/create') }}" class="btn btn-success btn-sm" title="Add a new vehicle">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add a new vehicle
                        </a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Vehicle Name</th>
                                        <th>Vehicle Brand</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($vehicles as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->vehicle_name }}</td>
                                        <td>{{ $item->vehicle_brand }}</td>
 
                                        <td>
                                            <a href="{{ url('/vehicle/' . $item->id) }}" title="View Vehicle"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/vehicle/' . $item->id . '/edit') }}" title="Edit Vehicle"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
 
                                            <form method="POST" action="{{ url('/vehicle' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Vehicle" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
 
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection