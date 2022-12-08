@extends('frontend.main_master')
@section('title')
Events - Dipendra Higher Secondary School
@endsection
@section('content')

@include('frontend.components.custom_page_title')

<!-- courses -->
<section class="section">
    <div class="container">
        <div class="row">


            @forelse($events as $item)
            <!-- event -->
            <div class="col-lg-4 col-sm-6 mb-5">
                <div class="card border-0 rounded-0 hover-shadow">
                    <div class="card-img position-relative">
                        <img class="card-img-top rounded-0" src="{{ asset($item->thumbnail)}}" alt="event thumb">
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
            @empty

            <div class="card border-0 rounded-0 ">

                <div class="card-body">
                    <!-- location -->
                    <h2>No Upcoming Events</h2>
                    <p>Check us later.</p>

                </div>
            </div>

            @endforelse


        </div>
    </div>
</section>
<!-- /courses -->


@endsection