@extends('backend.master')

@section('title')
    Update Cookie Policy
@endsection

@section('content')
    <div class="content-wrapper" style="font-family: Roboto">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1 class="m-0 text-dark" style="font-family: kalpurush">Update Cookie Policy</h1>
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
                                <h3 class="card-title" style="font-family: kalpurush">Update Cookie Policy</h3>
                            </div>
                            <form method="POST" action="{{ route('update.cookie.policy') }}" enctype="multipart/form-data" role="form">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Cookie Policy <span class='required-star'>*</span></label>
                                                <textarea type="text" id="editor1" name="name" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}"
                                                    autofocus>{{ $cookie->name ?? '' }}</textarea>
                                                <input type="hidden" name="id" value="{{ $cookie->id ?? '' }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="button" class="btn btn-danger">Close</button>
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

@section('js')
<script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'editor1' );
</script>
@endsection


