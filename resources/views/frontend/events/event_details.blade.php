@extends('frontend.main_master')
@section('title')
बिद्यालय व्यवस्थापन समिति - Dipendra Higher Secondary School
@endsection
@section('content')

@include('frontend.components.custom_page_title')


<!-- event single -->
<section class="section-sm">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="section-title">{{ $event->title }}</h2>
            </div>
            <!-- event image 690 × 345 -->
            <div class="col-12 mb-4">
                <img src="{{ asset($event->thumbnail) }}" width="690" height="345" alt="event thumb" class="img-fluid w-100">
            </div>
        </div>
        <!-- event info -->
        <div class="row align-items-center mb-5">
            <div class="col-lg-9">
                <ul class="list-inline">
                    <li class="list-inline-item mr-xl-5 mr-4 mb-3 mb-lg-0">
                        <div class="d-flex align-items-center">
                            <i class="ti-location-pin text-primary icon-md mr-2"></i>
                            <div class="text-left">
                                <h6 class="mb-0">LOCATION</h6>
                                <p class="mb-0">{{$event->location}}</p>
                            </div>
                        </div>
                    </li>
                    <li class="list-inline-item mr-xl-5 mr-4 mb-3 mb-lg-0">
                        <div class="d-flex align-items-center">
                            <i class="ti-calendar text-primary icon-md mr-2"></i>
                            <div class="text-left">
                                <h6 class="mb-0">DATE</h6>
                                <p class="mb-0">{{ Carbon\Carbon::parse($event->date)->format('d F y') }}</p>
                            </div>
                        </div>
                    </li>
                    <li class="list-inline-item mr-xl-5 mr-4 mb-3 mb-lg-0">
                        <div class="d-flex align-items-center">
                            <i class="ti-time text-primary icon-md mr-2"></i>
                            <div class="text-left">
                                <h6 class="mb-0">TIME</h6>
                                <p class="mb-0">{{ $event->time }}</p>
                            </div>
                        </div>
                    </li>
                    <!-- <li class="list-inline-item mr-xl-5 mr-4 mb-3 mb-lg-0">
                        <div class="d-flex align-items-center">
                            <i class="ti-wallet text-primary icon-md mr-2"></i>
                            <div class="text-left">
                                <h6 class="mb-0">ENTRY FEE</h6>
                                <p class="mb-0">From: $699</p>
                            </div>
                        </div>
                    </li> -->
                </ul>
            </div>
            <!-- <div class="col-lg-3 text-lg-right text-left">
                <a href="event-single.html" class="btn btn-primary">Apply now</a>
            </div> -->
            <!-- border -->
            <div class="col-12 mt-4 order-4">
                <div class="border-bottom border-primary"></div>
            </div>
        </div>
        <!-- event details -->
        <div class="row">
            <div class="col-12 mb-50">
                <h3>About Event</h3>
                {!!$event->description !!}
            </div>
        </div>
        <!-- ShareThis BEGIN -->
        <div class="sharethis-inline-share-buttons"></div><!-- ShareThis END -->

        <!-- comment box -->
        <div class="col-12">


            <div class="fb-comments" data-href="http://127.0.0.1:8000/event/details/&#123;id&#125;" data-width="" data-numposts="5"></div>

        </div>

    </div>
</section>
<!-- /event single -->

@php

$events = App\Models\Backend\Event::where('id','!=',$event->id)->where('date','>=',Carbon\Carbon::now()->format('Y-m-d'))->limit(3)->get();
@endphp


<!-- more event -->
<section class="section pt-0">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="section-title">More Events</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            @foreach($events as $item)
            <!-- event -->
            <div class="col-lg-4 col-sm-6 mb-5 mb-lg-0">
                <div class="card border-0 rounded-0 hover-shadow">
                    <div class="card-img position-relative">
                        <img class="card-img-top rounded-0" width="330" height="282" src="{{ asset($item->thumbnail)}}" alt="event thumb">
                        <!-- 330 × 282  -->
                        @php
                        $day = Carbon\Carbon::parse($item->date)->day;
                        $month = Carbon\Carbon::parse($item->date)->format('F');
                        @endphp
                        <div class="card-date"><span>{{ $day }}</span><br>{{$month}}</div>
                    </div>
                    <div class="card-body">
                        <!-- location -->
                        <p><i class="ti-location-pin text-primary mr-2"></i>{{ $item->location }}</p>
                        <a href="{{ route('event.single',$item->id) }}">
                            <h4 class="card-title">{{ $item->title }}</h4>
                        </a>
                    </div>
                </div>
            </div>
            <!-- event -->

            @endforeach


        </div>
    </div>
</section>
<!-- /more event -->

@endsection