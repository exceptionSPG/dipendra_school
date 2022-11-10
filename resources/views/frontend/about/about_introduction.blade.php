@extends('frontend.main_master')
@section('title')
Home - Dipendra Higher Secondary School
@endsection
@section('content')

@include('frontend.body.pages_title')


<!-- about -->
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <img class="img-fluid w-100 mb-4" width="1110" height="589" src="{{ asset($intro->thumbnail) }}" alt="about image">
                <h2 class="section-title">Introduction</h2>
                {!!$intro->description !!}
            </div>
        </div>
    </div>
</section>
<!-- /about -->

<!-- funfacts -->
<section class="section-sm bg-primary">
    <div class="container">
        <div class="row">
            <!-- funfacts item -->
            <div class="col-md-3 col-sm-6 mb-4 mb-md-0">
                <div class="text-center">
                    <h2 class="count text-white" data-count="{{$teachersCount}}">0</h2>
                    <h5 class="text-white">TEACHERS</h5>
                </div>
            </div>
            <!-- funfacts item -->
            <div class="col-md-3 col-sm-6 mb-4 mb-md-0">
                <div class="text-center">
                    <h2 class="count text-white" data-count="5">0</h2>
                    <h5 class="text-white">Committees</h5>
                </div>
            </div>
            <!-- funfacts item -->
            <div class="col-md-3 col-sm-6 mb-4 mb-md-0">
                <div class="text-center">
                    <h2 class="count text-white" data-count="50">0</h2>
                    <h5 class="text-white">Years</h5>
                </div>
            </div>
            <!-- funfacts item -->
            <div class="col-md-3 col-sm-6 mb-4 mb-md-0">
                <div class="text-center">
                    <h2 class="count text-white" data-count="20000">0</h2>
                    <h5 class="text-white">SATISFIED Students</h5>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /funfacts -->

<!-- success story -->
<section class="section bg-cover" data-background="images/backgrounds/success-story.jpg">
    <div class="container">
        <div class="row">

            <div class="col-lg-6 col-sm-8">
                <div class="bg-white p-5">
                    <h2 class="section-title">Our Mission</h2>
                    {!! $intro->mission !!}
                </div>
            </div>

            <div class="col-lg-6 col-sm-8">
                <div class="bg-white p-5">
                    <h2 class="section-title">Our Vision</h2>
                    {!! $intro !!}
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /success story -->

<!-- include('frontend.components.our_teachers') -->





@endsection