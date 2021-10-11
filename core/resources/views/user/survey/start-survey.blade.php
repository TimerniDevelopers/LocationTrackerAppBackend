@extends('user.master')

@section('title')
    Start Survey | DcoTrack
@endsection
<style>

</style>
@section('content')
    <?php $i = 1; ?>
    <div class="content-wrapper" style="font-family: Roboto">
        <div class="content-header">
            
        </div>
        <section class="content">
            <div class="col-sm-12">
                <div class="card">
                    <div class="container-fluid mt-2 mb-3">
                        <form action="{{ route('submit.survey') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <fieldset class="form-group border py-1 px-3"
                                    id="survey_info_main">
                                    <legend class="w-auto px-2">Survey Info:
                                    </legend>
                            <div class="row mb-3" id="patient_info">
                                <input type="hidden" name="question_length" value="{{ $inputQuestions->count() }}">
                                @foreach ($inputQuestions as $index => $inputQuestion)
                                    @if ($inputQuestion->type == 1)
                                        <div class="form-group col-sm-4">
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
                                        <div class="form-group col-sm-4">
                                            <label class="control-label">{{ $i++ }}.
                                                {{ $inputQuestion->name }}</label>
                                            @foreach ($inputQuestion->options as $key => $mcqItem)
                                                <div class="form-check <?php if ($key >= 1) { echo 'hide'; } ?>">
                                                    <input class="form-check-input" type="radio"
                                                        name="mcq_ans{{ $index + 1 }}" value="{{ $mcqItem->option }}"
                                                        id="mcqQue{{ $mcqItem }}">
                                                    <label class="form-check-label" for="mcqQue{{ $mcqItem }}">
                                                        {{ $mcqItem->option }}
                                                    </label>
                                                </div>
                                                
                                            @endforeach
                                            <div class="hide">
                                                <input type="hidden" name="question_type{{ $index + 1 }}"
                                                    value="{{ $inputQuestion->type }}" class="form-control">
                                                <input type="text" name="others{{ $index + 1 }}" class="form-control"
                                                    placeholder="If others type here">
                                                <input type="hidden" name="question_id{{ $index + 1 }}"
                                                    value="{{ $inputQuestion->id }}" class="form-control">
                                            </div>

                                         <button type="button" class="btn btn-success btn-sm see-button" value="0" onclick="getSee(this)">See more</button>
                                        </div>
                                        
                                    @endif

                                    @if ($inputQuestion->type == 4)
                                        <div class="form-group col-sm-4">
                                            <label class="control-label">{{ $i++ }}.
                                                {{ $inputQuestion->name }}</label>
                                            @foreach ($inputQuestion->options as $key => $checkboxItem)
                                                <div class="form-check <?php if ($key >= 1) { echo 'hide'; } ?>">
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
                                            <div class="hide">
                                                <input type="hidden" name="question_type{{ $index + 1 }}"
                                                    value="{{ $inputQuestion->type }}" class="form-control">
                                                <input type="text" name="others{{ $index + 1 }}" class="form-control"
                                                    placeholder="If others type here">
                                                <input type="hidden" name="question_id{{ $index + 1 }}"
                                                    value="{{ $inputQuestion->id }}" class="form-control">
                                            </div>

                                                <button type="button" class="btn btn-success btn-sm see-button" value="0" onclick="getSee(this)">See more</button>
                                        </div>
                                    @endif

                                    @if ($inputQuestion->type == 2)
                                        <div class="form-group col-sm-4">
                                            <label class="control-label">{{ $i++ }}.{{ $inputQuestion->name }}</label>
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
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Image/Audio/Video <span class='required-star'></span></label>
                                        <input id="file-input" type="file" name="images[]" class="form-control {{ $errors->has('image') ? ' is-invalid' : '' }}" value="{{ old('document') }}" multiple autofocus>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div id="preview"></div>
                                </div>
                            </div>
                        </fieldset>
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
@section('js')
<script>
    $(document).ready(function() {
        var i = 0;
        $(".hide").css("display", "none");
        $(".see-button").html("See more");
    })
    function getSee(data) {
        var count = $(data).val();
        $(data).parent().children(".hide").toggle();
        if (count == 0) {
            $(data).html("See less");
            $(data).val(1);
        } else {
            $(data).html("See more");
            $(data).val(0);
        }
    }
function previewImages() {

    var preview = document.querySelector('#preview');
    
    if (this.files) {
      [].forEach.call(this.files, readAndPreview);
    }
  
    function readAndPreview(file) {
  
      // Make sure `file.name` matches our extensions criteria
      if (!/\.(jpe?g|png|gif)$/i.test(file.name)) {
        return alert(file.name + " is not an image");
      } // else...
      
      var reader = new FileReader();
      
      reader.addEventListener("load", function() {
        var image = new Image();
        image.height = 100;
        image.width = 100;
        image.title  = file.name;
        image.src    = this.result;
        preview.appendChild(image);
      });
      
      reader.readAsDataURL(file);
      
    }
  
  }
  
  document.querySelector('#file-input').addEventListener("change", previewImages);
  </script>
@endsection
