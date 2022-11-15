@extends('frontend.main_master')
@section('title')
Home - Dipendra Higher Secondary School
@endsection
@section('content')

@include('frontend.body.homepage_title')

<!-- banner-feature -->
<section class="bg-gray overflow-md-hidden">
    <div class="container-fluid p-0">
        <div class="row no-gutters">
            <div class="col-xl-4 col-lg-5 align-self-end">
                <h2 class="text-center p-4">दिपेन्द्रका विशेषताहरु ?</h2>
                <img class="img-fluid w-100" src="{{ asset('frontend/images/banner/banner-feature.png') }}" alt="banner-feature">
            </div>
            <div class="col-xl-8 col-lg-7">
                <div class="row feature-blocks bg-gray justify-content-between">

                    @foreach($bisestas as $item)

                    <div class="col-sm-6 col-xl-5 mb-xl-5 mb-lg-3 mb-4 text-center text-sm-left">
                        <i class="{{$item->icon}} mb-xl-4 mb-lg-3 mb-4 feature-icon"></i>
                        <h3 class="mb-xl-4 mb-lg-3 mb-4">{{ $item->title }}</h3>
                        <p>{{ $item->description }}</p>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section>
<!-- /banner-feature -->

<!-- about us -->
<section class="section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 order-2 order-md-1">
                <h2 class="section-title">About Dipendra</h2>
                <p>{!! $about->description !!} </p>

                <a href="{{ route('frontend.about.introduction') }}" class="btn btn-outline-primary">Learn more</a>
            </div>
            <div class="col-md-6 order-1 order-md-2 mb-4 mb-md-0">
                <img class="img-fluid w-100" width="540" height="334" src="{{ asset($about->thumbnail) }}" alt="about image">
            </div>
        </div>
    </div>
</section>
<!-- /about us -->

<!-- committees -->
<section class="section-sm">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex align-items-center section-title justify-content-between">
                    <h2 class="mb-0 text-nowrap mr-3">Our Committees</h2>
                    <div class="border-top w-100 border-primary d-none d-sm-block"></div>

                </div>
            </div>
        </div>
        <!-- course list -->
        <div class="row justify-content-center">

            @foreach($committee as $item)
            <!-- course item -->
            <div class="col-lg-4 col-sm-6 mb-5">
                <div class="card p-0 border-primary rounded-0 hover-shadow">
                    <img class="card-img-top rounded-0" src="{{ asset($item->thumbnail) }}" alt="course thumb">
                    <div class="card-body">

                        <a href="{{ route('bibyasa') }}">
                            <h4 class="card-title">{{$item->name}}</h4>
                        </a>
                        <p class="card-text mb-4"> {!! Str::limit($item->about,200) !!}</p>
                        <a href="@if($item->id == 1)
                        {{ route('bibyasa') }}
                        @elseif($item->id == 2)
                        {{ route('siawsa') }}
                        @else
                        {{ route('bhupu_bidhyarthi') }}
                        @endif
                        " class="btn btn-primary btn-sm">See More</a>
                    </div>
                </div>
            </div>
            <!-- course item -->

            @endforeach

        </div>
        <!-- /course list -->

    </div>
</section>
<!-- /committees -->



<!-- success story -->
<section class="section bg-cover" data-background="images/backgrounds/success-story.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-sm-4 position-relative success-video">
                <a class="play-btn venobox" href="https://youtu.be/nA1Aqp0sPQo" data-vbtype="video">
                    <i class="ti-control-play"></i>
                </a>
            </div>
            <div class="col-lg-6 col-sm-8">
                <div class="bg-white p-5">
                    <h2 class="section-title">Success Stories</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                        dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
                        ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                        fugiat nulla pariatur. Excepteur sint occaecat.</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                        dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /success story -->

<!-- events -->
<section class="section bg-gray">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex align-items-center section-title justify-content-between">
                    <h2 class="mb-0 text-nowrap mr-3">Upcoming Events</h2>
                    <div class="border-top w-100 border-primary d-none d-sm-block"></div>
                    <div>
                        <a href="{{ route('events') }}" class="btn btn-sm btn-outline-primary ml-sm-3 d-none d-sm-block">see all</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            @forelse($events as $item)
            <!-- event -->
            <div class="col-lg-4 col-sm-6 mb-5 mb-lg-0">
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
            @endforeach

        </div>
        <!-- mobile see all button -->
        <div class="row">
            <div class="col-12 text-center">
                <a href="{{ route('events') }}" class="btn btn-sm btn-outline-primary d-sm-none d-inline-block">See all</a>
            </div>
        </div>
    </div>
</section>
<!-- /events -->

<!-- components home_teacher ma xa -->

<!-- blog -->
<section class="section pt-0">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="section-title">Latest News</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            @foreach($blogs as $item)
            <!-- blog post -->
            <article class="col-lg-4 col-sm-6 mb-5 mb-lg-0">
                <div class="card rounded-0 border-bottom border-primary border-top-0 border-left-0 border-right-0 hover-shadow">
                    <img class="card-img-top rounded-0" width="330" height="223" src="{{ asset($item->image) }}" alt="Post thumb">
                    <div class="card-body">
                        <!-- post meta -->
                        <ul class="list-inline mb-3">
                            <!-- post date -->
                            <li class="list-inline-item mr-3 ml-0">{{ $item->date }}</li>
                            <!-- author -->
                            <li class="list-inline-item mr-3 ml-0">By {{ $item->author }}</li>
                        </ul>
                        <a href="{{ route('news.single',$item->id) }}">
                            <h4 class="card-title">{{ $item->title }}</h4>
                        </a>
                        <p class="card-text">{!! Str::limit($item->detail,200) !!}</p>
                        <a href="{{ route('news.single',$item->id) }}" class="btn btn-primary btn-sm">read more</a>
                    </div>
                </div>
            </article>
            <!-- blog post -->
            @endforeach

        </div>
    </div>
</section>
<!-- /blog -->

@endsection