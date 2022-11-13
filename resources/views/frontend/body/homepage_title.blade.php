<!-- hero slider -->
<section class="hero-section overlay bg-cover" data-background="{{ asset('frontend/images/banner/banner-1.jpg') }}">
    <div class="container">
        <div class="hero-slider">


            @foreach($events as $item)
            <!-- slider item -->
            <div class="hero-slider-item ">
                <h2 class="text-white">
                    Upcoming Events:
                </h2>
                <div class="row">
                    <div class="col-md-8">

                        <h1 class="text-white" data-animation-out="fadeOutRight" data-delay-out="5" data-duration-in=".3" data-animation-in="fadeInLeft" data-delay-in=".1">{{ $item->title }}</h1>


                        <br>
                        <a href="{{ route('event.single',$item->id) }}" class="btn btn-primary" data-animation-out="fadeOutRight" data-delay-out="5" data-duration-in=".3" data-animation-in="fadeInLeft" data-delay-in=".7">See More</a>

                    </div>
                </div>
            </div>
            <!-- slider item -->
            @endforeach






        </div>
    </div>

</section>
<!-- /hero slider -->