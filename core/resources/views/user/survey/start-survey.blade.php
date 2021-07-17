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
        <section class="content">
            <div class="col-sm-12">
                <div class="card">
                    <div class="container-fluid mt-2 mb-3">
                        <form action="{{ route('submit.survey') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <label class="control-label">Patient Name <span class="text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control" value="{{ old('name') }}"
                                        placeholder="Patient Name">
                                </div>
                                <div class="col-sm-6">
                                    <label class="control-label">Patient Phone Number <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="phone" class="form-control" value="{{ old('phone') }}"
                                        placeholder="Patient Phone Number">
                                </div>
                                <div class="col-sm-6">
                                    <label class="control-label">Patient Unique ID </label>
                                    <input type="number" min="1" name="unique_id" class="form-control" value="{{ old('unique_id') }}"
                                        placeholder="Unique ID">
                                </div>
                            </div>
                            <hr>
                            <div class="row mb-3">

                                <input type="hidden" name="question_length" value="{{ $inputQuestions->count() }}">
                                @foreach ($inputQuestions as $index => $inputQuestion)
                                    @if ($inputQuestion->type == 1)
                                        <div class="form-group col-sm-6">
                                            <label class="control-label">{{ $i++ }}. {{ $inputQuestion->name }}</label>
                                            <input type="text" name="input_ans{{$index + 1}}" value="" class="form-control">
                                            <input type="hidden" name="question_id{{$index + 1}}" value="{{ $inputQuestion->id }}" class="form-control">
                                            <input type="hidden" name="question_type{{$index + 1}}" value="{{ $inputQuestion->type }}" class="form-control">
                                        </div>
                                    @endif

                                    @if ($inputQuestion->type == 3)
                                        <div class="form-group col-sm-6">
                                            <label class="control-label">{{ $i++ }}. {{ $inputQuestion->name }}</label>
                                            @foreach ($inputQuestion->options as $key => $mcqItem)
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio"
                                                        name="mcq_ans{{$index + 1}}"
                                                        value="{{ $mcqItem->option }}" id="mcqQue{{ $mcqItem }}">
                                                    <label class="form-check-label" for="mcqQue{{ $mcqItem }}">
                                                        {{ $mcqItem->option }}
                                                    </label>
                                                </div>
                                            @endforeach
                                            <input type="hidden" name="question_type{{$index + 1}}" value="{{ $inputQuestion->type }}" class="form-control">
                                            {{-- <input type="text" name="mcq_ans{{$index + 1}}[]" class="form-control" placeholder="Comment Others"> --}}
                                            <input type="hidden" name="question_id{{$index + 1}}" value="{{ $inputQuestion->id }}" class="form-control">
                                        </div>
                                    @endif

                                    @if ($inputQuestion->type == 4)
                                        <div class="form-group col-sm-6">
                                            <label class="control-label">{{ $i++ }}.
                                                {{ $inputQuestion->name }}</label>
                                            @foreach ($inputQuestion->options as $checkboxItem)
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="checkbox_ans{{$index + 1}}"
                                                        value="{{ $checkboxItem->option }}"
                                                        id="defaultCheck{{ $checkboxItem->id }}">
                                                    <label class="form-check-label"
                                                        for="defaultCheck{{ $checkboxItem->id }}">
                                                        {{ $checkboxItem->option }}
                                                    </label>
                                                </div>
                                            @endforeach
                                            <input type="hidden" name="question_type{{$index + 1}}" value="{{ $inputQuestion->type }}" class="form-control">
                                            {{-- <input type="text" name="checkbox_ans{{$index + 1}}[]" class="form-control" placeholder="Comment Others"> --}}
                                            <input type="hidden" name="question_id{{$index + 1}}" value="{{ $inputQuestion->id }}" class="form-control">
                                        </div>
                                    @endif

                                    @if ($inputQuestion->type == 2)
                                        <div class="form-group col-sm-6">
                                            <label class="control-label d-block">{{ $i++ }}.
                                                {{ $inputQuestion->name }}</label>
                                            <select name="dropdown_ans{{$index + 1}}" class="form-control">
                                                <option selected disabled>Select Option</option>
                                                @foreach ($inputQuestion->options as $dropdownItem)
                                                    <option value="{{ $dropdownItem->option }}">
                                                        {{ $dropdownItem->option }}</option>
                                                @endforeach
                                            </select>
                                            <input type="hidden" name="question_type{{$index + 1}}" value="{{ $inputQuestion->type }}" class="form-control">
                                            <input type="hidden" name="question_id{{$index + 1}}" value="{{ $inputQuestion->id }}" class="form-control">
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
