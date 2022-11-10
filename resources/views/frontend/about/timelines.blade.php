@extends('frontend.main_master')
@section('title')
Home - Dipendra Higher Secondary School
@endsection
@section('content')

@include('frontend.components.custom_page_title')




<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700|Poppins:400,500,600,700" rel="stylesheet">


<section class="experience pt-100 pb-100" id="experience">
    <div class="container">

        <div class="row">
            <div class="col-xl-8 mx-auto text-center">
                <div class="section-title">
                    <h4>Our Journey</h4>
                    <p>We have been growing through various phases and difficult moments.</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <ul class="timeline-list">
                    <!-- Single Experience -->

                    @foreach($timelines as $item)
                    <li>
                        <div class="timeline_content">
                            <span>{{$item->year}}</span>
                            <h4>{{$item->title}}</h4>
                            <p>{!!$item->description!!}</p>
                        </div>
                    </li>
                    <!-- Single Experience -->
                    @endforeach


                </ul>
            </div>
        </div>
    </div>
</section>







@endsection