@extends('backend.master')

@section('title')
    Add Question
@endsection

@section('content')
    <div class="content-wrapper" style="font-family: Roboto">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1 class="m-0 text-dark" style="font-family: kalpurush">Add Question</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title" style="font-family: kalpurush">Add Question</h3>
                            </div>
                            <form method="POST" action="{{ route('save.question') }}" enctype="multipart/form-data" role="form">
                                @csrf
                                <div class="card-body">
                                    <div class="row" id="included_all_description">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Question Type <span class='required-star text-danger'>*</span></label>
                                                <select name="type" class="form-control">
                                                    <option value="1" onclick="inputCheck();">Input/Text</option>
                                                    <option value="2" onclick="dropdownCheck();">Dropdown</option>
                                                    <option value="3" onclick="mcqCheck();">MCQ</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Question <span class='required-star text-danger'>*</span></label>
                                                <input type="text" name="name" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ old('name') }}" autofocus>
                                            </div>
                                        </div>
                                        <div class="col-md-6" id="option1Id" style="display: none">
                                            <div class="form-group">
                                                <label>Option 1 <span class='required-star text-danger'>*</span></label>
                                                <input type="text" name="option1" class="form-control {{ $errors->has('option1') ? ' is-invalid' : '' }}" value="{{ old('option1') }}" autofocus>
                                            </div>
                                        </div>
                                        <div class="col-md-6" id="option2Id" style="display: none">
                                            <div class="form-group">
                                                <label>Option 2 <span class='required-star text-danger'>*</span></label>
                                                <input type="text" name="option2" class="form-control {{ $errors->has('option2') ? ' is-invalid' : '' }}" value="{{ old('option2') }}" autofocus>
                                            </div>
                                        </div>
                                        <div class="col-md-6" id="option3Id" style="display: none">
                                            <div class="form-group">
                                                <label>Option 3 <span class='required-star text-danger'>*</span></label>
                                                <input type="text" name="option3" class="form-control {{ $errors->has('option3') ? ' is-invalid' : '' }}" value="{{ old('option3') }}" autofocus>
                                            </div>
                                        </div>
                                        <div class="col-md-6" id="option4Id" style="display: none">
                                            <div class="form-group">
                                                <label>Option 4 <span class='required-star'></span></label>
                                                <input type="text" name="option4" class="form-control {{ $errors->has('option4') ? ' is-invalid' : '' }}" value="{{ old('option4') }}" autofocus>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Status <span class='required-star'>*</span></label>
                                                <select name="status" class="form-control">
                                                    <option value="1">Active</option>
                                                    <option value="0">Inactive</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="button" class="btn btn-danger">Close</button>
                                    <button type="submit" class="btn btn-info float-right">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
