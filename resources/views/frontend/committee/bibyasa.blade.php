@extends('frontend.main_master')
@section('title')
बिद्यालय व्यवस्थापन समिति - Dipendra Higher Secondary School
@endsection
@section('content')

@include('frontend.components.custom_page_title')


<!-- about -->
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <img class="img-fluid w-100 mb-4" width="1110" height="589" src="{{ asset($bibyasa->thumbnail) }}" alt="about image">
                <h2 class="section-title">{{$bibyasa->name}} </h2>
                {!!$bibyasa->about !!}
            </div>
        </div>
    </div>
</section>
<!-- /about -->



<!-- success story -->
<section class="section bg-cover" data-background="{{ asset('frontend/images/backgrounds/success-story.jpg') }}">
    <div class="container">
        <div class="row">

            <div class="col-lg-6 col-sm-8">
                <div class="bg-white p-5">
                    <h2 class="section-title">Our Mission</h2>
                    {!! $bibyasa->mission !!}
                </div>
            </div>

            <div class="col-lg-6 col-sm-8">
                <div class="bg-white p-5">
                    <h2 class="section-title">Our Vision</h2>
                    {!! $bibyasa->vision !!}
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /success story -->

<!-- include('frontend.components.our_teachers') -->

<!-- teachers -->
<section class="section">
    <div class="container">
        <h2 class="p-4">Our Members</h2>



        <!-- teacher list -->

        <div class="row ">


            @foreach($members as $item)
            <!-- teacher -->
            <div class="col-lg-4 col-sm-6 mb-5">
                <div class="card border-0 rounded-0 hover-shadow">
                    <img class="card-img-top rounded-0" width="340" height="383" src="{{ asset($item->photo) }}" alt="teacher">
                    <div class="card-body">

                        <h4 class="card-title">{{ $item->name }}</h4>
                        <p>{{ $item->designation }}</p>

                        <ul class="list-inline">
                            <li class="list-inline-item"><strong>Phone:</strong><a class="text-color" target="blank" href="tel:{{$item->phone}}">{{$item->phone}}</a></li><br>

                            <strong>Profession:</strong>{{$item->profession}} <br>
                            <strong>Address:</strong>{{$item->address}} <br>
                            @if($item->email != null)
                            <li class="list-inline-item"><strong>email:</strong><a class="text-color" target="blank" href="mailto:{{$item->email}}">{{$item->email}}</a></li><br>
                            @else
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
            <!-- teacher -->

            @endforeach

            <!-- aru individual teacher code are removed. -->
        </div>
    </div>
</section>
<!-- /teachers -->




@endsection