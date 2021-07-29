@extends('frontend.master')

@section('title')
    Cookie Policy | Dcotrack
@endsection

@section('content')
<section class="about-area content-padding-t mt-5 mb-5" id="about">
    <div class="container">
        <div class="section-heading text-center" data-aos="zoom-in">
            <h1 class="common-color pt-4">Cookie Policy</h1>
            <p>
                {!! $cookie->name !!}
            </p>
        </div>
    </div>
</section>

@endsection
