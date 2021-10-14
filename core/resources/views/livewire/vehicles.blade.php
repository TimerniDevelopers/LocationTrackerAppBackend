<div>
    
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
                                <h3 class="card-title" style="font-family: kalpurush">Assign Vehicle</h3>
                            </div>
                            <form method="POST" wire:submit.prevent="submit" enctype="multipart/form-data" role="form">
                                @csrf
                                <div class="card-body">
                                    <div class="row" id="included_all_description">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Vehicle Name <span class='text-danger'>*</span></label>
                                                <select name="vehicle_id" id="vehicle_id" class="form-control @error('vehicle_id') is-invalid @enderror" wire:model ="vehicle_id">
                                                    <option selected>Select a one vehicle name</option>
                                                    @foreach ($vehicles as $vehicle)
                                                        <option value="{{ $vehicle->id }}">{{ $vehicle->vehicle_name }}</option>
                                                    @endforeach
                                                    
                                                </select>
                                                @error('vehicle_id')
                                                    <div class="text-danger">{{ $errors->first('vehicle_id') }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Volunteer Name <span class='text-danger'>*</span></label>
                                                
                                                <select name="user_id" wire:model='user_id' class="form-control @error('user_id') is-invalid @enderror">
                                                    <option selected value="null">Select a one volunteer name</option>
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->id }}">{{ $user->first_name }} {{ $user->last_name }}</option>
                                                    @endforeach
                                                    
                                                </select>
                                                @error('user_id')
                                                    <div class="text-danger">{{ $errors->first('user_id') }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Amount(in per kilometers)<span class='text-danger'>*</span></label>
                                                <input type="number" name="amount" class="form-control @error('amount') is-invalid @enderror" value="" placeholder="Enter the amount" wire:model="amount"/>
                                                @error('amount')
                                                    <div class="text-danger">{{ $errors->first('amount') }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Description</label>
                                                <textarea type="text" name="description" class="form-control" value="" placeholder="Enter the description" wire:model='description'></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Status<span class='required-star'></span></label>
                                                <select wire:model='status' name="status" class="form-control">
                                                    <option selected='selected' value="1" wire:key="1">Active</option>
                                                    <option value="0" wire:key="0">Inactive</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-info float-right">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
</div>
