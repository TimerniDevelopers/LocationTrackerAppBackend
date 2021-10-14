@extends('backend.master')

@section('title')
    Edit Vehicle
@endsection

@section('content')
    <div class="content-wrapper" style="font-family: Roboto">
        {{-- <div class="content-header">
            <div class="container-fluid"> --}}
                {{-- <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1 class="m-0 text-dark" style="font-family: kalpurush">Add Vehicle</h1>
                    </div><!-- /.col -->
                </div><!-- /.row --> --}}
            {{-- </div>
        </div> --}}
        <br>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title" style="font-family: kalpurush">Edit Vehicle</h3>
                                <div class="fa-pull-right">
                                    <a href="{{ route('vehicle.manage') }}">
                                        <button class="btn btn-light"><i class="fa fa-arrow-left"></i><b> Back To Manage Vehicle</b></button>
                                    </a>
                                </div>
                            </div>
                            <form method="POST" action="{{ route('update.vehicle') }}" enctype="multipart/form-data" role="form">
                                @csrf
                                <div class="card-body">
                                    <div class="row" id="included_all_description">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Vehicle Name <span class='required-star'>*</span></label>
                                                <input type="text" name="vehicle_name" class="form-control @error('vehicle_name') is-invalid @enderror" placeholder="Enter the vehicle name" value="{{ $vehicle->vehicle_name }}"/>
                                                @error('vehicle_name')
                                                    <div class="text-danger">{{ $errors->first('vehicle_name') }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Description</label>
                                                <textarea type="text" name="description" class="form-control" value="{{ $vehicle->description }}" placeholder="Enter the description">{{ $vehicle->description }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Status<span class='required-star'></span></label>
                                                <select name="status" id="status" class="form-control select2">
                                                    <option @if($vehicle->status == 1) selected @endif value="1">Active</option>
                                                    <option @if($vehicle->status == 0) selected @endif value="0">Inactive</option>
                                                </select>
                                            </div>
                                        </div>
                                        <input type="hidden" name="id" value="{{ $vehicle->id }}" />
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-info float-right">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
    </div>
@endsection