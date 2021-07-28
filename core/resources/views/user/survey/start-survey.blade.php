@extends('user.master')

@section('title')
    Start Survey | DcoTrack
@endsection

@section('content')
    <?php $i = 1; ?>
    <div class="content-wrapper" style="font-family: Roboto">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1 class="m-0 text-dark" style="font-family: kalpurush">Survey</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <div class="container">
            @if (session()->has('success'))
                <div class="alert alert-dismissable alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>
                        {{ session()->get('message') }}
                    </strong>
                </div>
            @endif
        </div>
        <section class="content">
            <div class="col-sm-12">
                <div class="card">
                    <div class="container-fluid mt-2 mb-3">
                        <form action="{{ route('submit.survey') }}" method="POST">
                            @csrf
                            <div class="row mt-3">
                                <div class="col-sm-6 mb-2">
                                    <div class="card">
                                        <div class="container mt-1 mb-1">
                                            <label class="control-label">New or Old Patient <span
                                                    class="text-danger">*</span></label>
                                            <div class="d-flex">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="patient"
                                                        onclick="getNewPatient()" value="1" id="patient1" checked>
                                                    <label class="form-check-label" for="patient1">
                                                        New Patient
                                                    </label>
                                                </div>
                                                <div class="form-check ml-4">
                                                    <input class="form-check-input" type="radio" name="patient"
                                                        onclick="getOldPatient()" value="2" id="patient2">
                                                    <label class="form-check-label" for="patient2">
                                                        Old Patient
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 mb-2 appendField2" style="display: none">
                                    <label class="control-label">Patient Unique ID <span
                                            class="text-danger">*</span></label>
                                    <select name="unique_id" id="unique_id" onchange="getNamePhone(this.value)"
                                        class="form-control select2" style="width: 100%">
                                        <option selected disabled>Search Patient ID</option>
                                        @foreach ($uniques as $unique)
                                            <option value="{{ $unique->unique_id }}">{{ $unique->unique_id }} - {{ $unique->phone }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="row col-sm-12 appendField2" id="namePhone_id">

                                </div>
                                <div class="col-sm-6 mb-2 appendField">
                                    <label class="control-label">Patient Name <span class="text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                                </div>
                                <div class="col-sm-6 mb-2 appendField">
                                    <label class="control-label">Patient Phone Number <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="phone" class="form-control" value="{{ old('phone') }}">
                                </div>
                                <div class="col-sm-6 mb-2 appendField">
                                    <label class="control-label">NID </label>
                                    <input type="number" min="1" name="nid" class="form-control"
                                        value="{{ old('nid') }}">
                                </div>
                                <div class="col-sm-6 mb-2 appendField">
                                    <label class="control-label">Father Name </label>
                                    <input type="text" name="f_name" class="form-control" value="{{ old('f_name') }}">
                                </div>
                                <div class="col-sm-6 mb-2 appendField">
                                    <label class="control-label">Occupation </label>
                                    <input type="text" name="occupation" class="form-control"
                                        value="{{ old('occupation') }}">
                                </div>
                                <div class="col-sm-6 mb-2 appendField">
                                    <label class="control-label">Blood Group </label>
                                    <select name="blood_group" class="form-control">
                                        <option selected disabled>Select Blood Group</option>
                                        <option value="A+">A+</option>
                                        <option value="O+">O+</option>
                                        <option value="B+">B+</option>
                                        <option value="AB+">AB+</option>
                                        <option value="A-">A-</option>
                                        <option value="O-">O-</option>
                                        <option value="B-">B-</option>
                                        <option value="AB-">AB-</option>
                                    </select>
                                </div>
                                <div class="col-md-6 appendField">
                                    <div class="form-group">
                                        <label>Select Division <span class='text-danger'>*</span></label>
                                        <select name="division_id" id="division_id" onchange="getDistrict();"
                                            class="form-control select2">
                                            <option selected disabled>Select Division</option>
                                            @foreach ($divisions as $division)
                                                <option value="{{ $division->id }}">{{ $division->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 appendField">
                                    <div class="form-group">
                                        <label>Select District <span class='text-danger'>*</span></label>
                                        <select name="district_id" id="district_id" onchange="getUpazila()"
                                            class="form-control">
                                            <option selected disabled>Select District</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 appendField">
                                    <div class="form-group">
                                        <label>Select Upazila / Thana <span class='text-danger'>*</span></label>
                                        <select name="upazilla_id" id="upazilla_id" class="form-control">
                                            <option selected disabled>Select Upazila / Thana</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <div class="row mb-3">

                                <input type="hidden" name="question_length" value="{{ $inputQuestions->count() }}">
                                @foreach ($inputQuestions as $index => $inputQuestion)
                                    @if ($inputQuestion->type == 1)
                                        <div class="form-group col-sm-6">
                                            <label class="control-label">{{ $i++ }}.
                                                {{ $inputQuestion->name }}</label>
                                            <input type="text" name="input_ans{{ $index + 1 }}" value=""
                                                class="form-control">
                                            <input type="hidden" name="question_id{{ $index + 1 }}"
                                                value="{{ $inputQuestion->id }}" class="form-control">
                                            <input type="hidden" name="question_type{{ $index + 1 }}"
                                                value="{{ $inputQuestion->type }}" class="form-control">
                                        </div>
                                    @endif

                                    @if ($inputQuestion->type == 3)
                                        <div class="form-group col-sm-6">
                                            <label class="control-label">{{ $i++ }}.
                                                {{ $inputQuestion->name }}</label>
                                            @foreach ($inputQuestion->options as $key => $mcqItem)
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio"
                                                        name="mcq_ans{{ $index + 1 }}" value="{{ $mcqItem->option }}"
                                                        id="mcqQue{{ $mcqItem }}">
                                                    <label class="form-check-label" for="mcqQue{{ $mcqItem }}">
                                                        {{ $mcqItem->option }}
                                                    </label>
                                                </div>
                                            @endforeach
                                            <input type="hidden" name="question_type{{ $index + 1 }}"
                                                value="{{ $inputQuestion->type }}" class="form-control">
                                            <input type="text" name="others{{ $index + 1 }}" class="form-control"
                                                placeholder="If others type here">
                                            <input type="hidden" name="question_id{{ $index + 1 }}"
                                                value="{{ $inputQuestion->id }}" class="form-control">
                                        </div>
                                    @endif

                                    @if ($inputQuestion->type == 4)
                                        <div class="form-group col-sm-6">
                                            <label class="control-label">{{ $i++ }}.
                                                {{ $inputQuestion->name }}</label>
                                            @foreach ($inputQuestion->options as $checkboxItem)
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox"
                                                        name="checkbox_ans{{ $index + 1 }}"
                                                        value="{{ $checkboxItem->option }}"
                                                        id="defaultCheck{{ $checkboxItem->id }}">
                                                    <label class="form-check-label"
                                                        for="defaultCheck{{ $checkboxItem->id }}">
                                                        {{ $checkboxItem->option }}
                                                    </label>
                                                </div>
                                            @endforeach
                                            <input type="hidden" name="question_type{{ $index + 1 }}"
                                                value="{{ $inputQuestion->type }}" class="form-control">
                                            <input type="text" name="others{{ $index + 1 }}" class="form-control"
                                                placeholder="If others type here">
                                            <input type="hidden" name="question_id{{ $index + 1 }}"
                                                value="{{ $inputQuestion->id }}" class="form-control">
                                        </div>
                                    @endif

                                    @if ($inputQuestion->type == 2)
                                        <div class="form-group col-sm-6">
                                            <label class="control-label d-block">{{ $i++ }}.
                                                {{ $inputQuestion->name }}</label>
                                            <select name="dropdown_ans{{ $index + 1 }}" class="form-control">
                                                <option selected disabled>Select Option</option>
                                                @foreach ($inputQuestion->options as $dropdownItem)
                                                    <option value="{{ $dropdownItem->option }}">
                                                        {{ $dropdownItem->option }}</option>
                                                @endforeach
                                            </select>
                                            <input type="hidden" name="question_type{{ $index + 1 }}"
                                                value="{{ $inputQuestion->type }}" class="form-control">
                                            <input type="hidden" name="question_id{{ $index + 1 }}"
                                                value="{{ $inputQuestion->id }}" class="form-control">
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            <div class="form-group m-auto">
                                <div class="col-sm-4">
                                    <button class="btn btn-primary">Submit Survey</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
