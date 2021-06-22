@extends('backend.master')

@section('title')
    Update Question
@endsection

@section('content')
    <div class="content-wrapper" style="font-family: Roboto">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1 class="m-0 text-dark" style="font-family: kalpurush">Update Question</h1>
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
                                <h3 class="card-title" style="font-family: kalpurush">Update Question</h3>
                            </div>
                            <form method="POST" action="{{ route('update.question') }}" enctype="multipart/form-data" role="form">
                                @csrf
                                <div class="card-body">
                                    <div class="row" id="included_all_description">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Question Type <span class='required-star'>*</span></label>
                                                <select name="type" class="form-control">
                                                    @if($question->type == 1)
                                                        <option value="1" onclick="inputCheck()">Input/Text</option>
                                                        <option value="2" onclick="dropdownCheck()">Dropdown</option>
                                                        <option value="3" onclick="mcqCheck()">MCQ</option>
                                                    @elseif($question->type == 2)
                                                        <option value="2" onclick="dropdownCheck()">Dropdown</option>
                                                        <option value="3" onclick="mcqCheck()">MCQ</option>
                                                        <option value="1" onclick="inputCheck()">Input/Text</option>
                                                    @elseif($question->type == 3)
                                                        <option value="3" onclick="mcqCheck()">MCQ</option>
                                                        <option value="1" onclick="inputCheck()">Input/Text</option>
                                                        <option value="2" onclick="dropdownCheck()">Dropdown</option>
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Question <span class='required-star'>*</span></label>
                                                <input type="text" name="name" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ $question->name ?? '' }}" autofocus>
                                                <input type="hidden" name="id" value="{{ $question->id }}">
                                            </div>
                                        </div>
                                        @if($question->type == 2 or 3)
                                        <div class="col-md-6" id="option1Id">
                                            <div class="form-group">
                                                <label>Option 1 <span class='required-star text-danger'>*</span></label>
                                                <input type="text" name="option1" class="form-control {{ $errors->has('option1') ? ' is-invalid' : '' }}" value="{{ $question->option1 }}" autofocus>
                                            </div>
                                        </div>
                                        <div class="col-md-6" id="option2Id">
                                            <div class="form-group">
                                                <label>Option 2 <span class='required-star text-danger'>*</span></label>
                                                <input type="text" name="option2" class="form-control {{ $errors->has('option2') ? ' is-invalid' : '' }}" value="{{ $question->option2 }}" autofocus>
                                            </div>
                                        </div>
                                        <div class="col-md-6" id="option3Id">
                                            <div class="form-group">
                                                <label>Option 3 <span class='required-star text-danger'>*</span></label>
                                                <input type="text" name="option3" class="form-control {{ $errors->has('option3') ? ' is-invalid' : '' }}" value="{{ $question->option3 }}" autofocus>
                                            </div>
                                        </div>
                                        <div class="col-md-6" id="option4Id">
                                            <div class="form-group">
                                                <label>Option 4 <span class='required-star'></span></label>
                                                <input type="text" name="option4" class="form-control {{ $errors->has('option4') ? ' is-invalid' : '' }}" value="{{ $question->option4 }}" autofocus>
                                            </div>
                                        </div>
                                        @endif
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Status <span class='required-star'>*</span></label>
                                                <select name="status" class="form-control">
                                                    @if($question->status == 1)
                                                        <option value="1">Active</option>
                                                        <option value="0">Inactive</option>
                                                    @else
                                                        <option value="0">Inactive</option>
                                                        <option value="1">Active</option>
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                        {{--                                        <div class="col-md-1" style="margin-top:35px">--}}
                                        {{--                                            <a class="add_include" onclick="addMedicalDescription()" style="background-color: #17a2b8; height: 30px; color: #fff; "><i class="fa fa-plus"></i></a></button>--}}
                                        {{--                                        </div>--}}
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
