<form method="POST" action="{{ route('save.request.demo') }}" class="form-horizontal" role="form">
    @csrf
    <div class="row">
        <div class="col-md-6">
            <div class="form-group has-float-label">
                <input id="name" class="form-control" name="name" placeholder="Name *" value="{{ old('name') }}"
                    type="text">
                <label for="name">Name *</label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group has-float-label">
                <input id="email" class="form-control" name="email" placeholder="Email *" value="{{ old('email') }}"
                    type="email">
                <label for="email">Email *</label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group has-float-label">
                <input id="phone" class="form-control" name="phone" placeholder="Phone *" value="{{ old('phone') }}"
                    type="number">
                <label for="phone">Phone *</label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group has-float-label">
                <input id="" class="form-control" name="company_name" placeholder="Comapany Name"
                    value="{{ old('company_name') }}" type="text">
                <label for="">Comapany Name</label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group has-float-label">
                <input id="" class="form-control" name="employee" placeholder="Number of Employee"
                    value="{{ old('employee') }}" type="number">
                <label for="">Number of Employee</label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group has-float-label">
                <select name="country_id" id="country_id" class="form-control select2">
                    <option selected disabled>Select Country</option>
                    @foreach ($countries as $country)
                        <option value="{{ $country->id }}">
                            {{ $country->country_name }}</option>
                    @endforeach
                </select>
                <label for="">Country</label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group has-float-label">
                {{-- <select name="division_id" id="division_id" class="form-control select2">
                                                            @foreach ($divisions as $division)
                                                                <option value="{{ $division->id }}">{{ $division->name }}</option>
                                                            @endforeach
                                                        </select> --}}
                <input id="" class="form-control" name="city_id" placeholder="State/City" value="{{ old('city') }}"
                    type="text">
                <label for="">City/State</label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group has-float-label">
                <input id="" class="form-control" name="industry_type" placeholder="Industry Type"
                    value="{{ old('industry_type') }}" type="text">
                <label for="">Industry Type</label>
            </div>
        </div>
    </div>

    <!--Text Area-->
    <div class="form-group textarea_group">
        <div class="inputGroupContainer">
            <div class="input-group">
                <textarea class="form-control border-group" name="address" rows="2" cols="6"
                    placeholder="Address">{{ old('address') }}</textarea>
            </div>
        </div>
    </div>
    <div class="form-group textarea_group">
        <div class="inputGroupContainer">
            <div class="input-group">
                <textarea class="form-control border-group" name="message" rows="3" cols="6"
                    placeholder="Type your message here.">{{ old('message') }}</textarea>
            </div>
        </div>
    </div>
    <!--SEND Button-->
    <div class="form-group text-center button_group">
        <label class="col-sm-2 control-label"></label>
        <div class="">
            <button type="submit" class="btn">Send Message<span class="glyphicon glyphicon-send"></span>
            </button>
        </div>
    </div>

</form>
