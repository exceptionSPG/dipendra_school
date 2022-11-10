@extends('frontend.main_master')
@section('title')
Home - Dipendra Higher Secondary School
@endsection
@section('content')

@include('frontend.body.pages_title')


<!-- teachers -->
<section class="section">
    <div class="container">
        <div class="row center-block">
            <div class="col-md-4"></div>

            <div class="col-lg-4  col-sm-6 mb-5">
                <div class="card border-0 rounded-0 hover-shadow">
                    <img class="card-img-top rounded-0" src="{{ asset($principal->photo) }}" alt="teacher">
                    <div class="card-body">
                        <a href="teacher-single.html">
                            <h4 class="card-title">{{ $principal->name }}</h4>
                        </a>
                        <p>{{ $principal->designation }}</p>
                        <ul class="list-inline">
                            <li class="list-inline-item"><a class="text-color" href="{{$principal->facebook}}"><i class="ti-facebook"></i></a></li>
                            <li class="list-inline-item"><a class="text-color" href="{{$principal->instagram}}"><i class="ti-instagram"></i></a></li>
                            <li class="list-inline-item"><a class="text-color" href="{{$principal->youtube}}"><i class="ti-youtube"></i></a></li>
                            <!-- <li class="list-inline-item"><a class="text-color" href="{{$principal->facebook}}"><i class="ti-linkedin"></i></a></li> -->
                        </ul>
                    </div>
                </div>



            </div>

            <div class="col-lg-12  col-sm-6 mb-5">


                <div class="card border-0 rounded-0 hover-shadow">
                    <div class="card-body">
                        <h4 class="card-title text-center">Message for Students</h4>
                        {!! $principal->mfs !!}
                    </div>
                </div>

            </div>

        </div>
        <div class="row">
            <div class="col-12">

            </div>
        </div>



        <!-- teacher list -->
        <h2>Our Teachers</h2>
        <div class="row ">


            @foreach($teachers as $item)
            <!-- teacher -->
            <div class="col-lg-4 col-sm-6 mb-5">
                <div class="card border-0 rounded-0 hover-shadow">
                    <img class="card-img-top rounded-0" src="{{ asset($item->photo) }}" alt="teacher">
                    <div class="card-body">
                        <a href="teacher-single.html">
                            <h4 class="card-title">{{ $item->name }}</h4>
                        </a>
                        <p>{{ $item->designation }}</p>

                        <ul class="list-inline">
                            <li class="list-inline-item"><a class="text-color" target="blank" href="{{ $item->facebook }}"><i class="ti-facebook"></i></a></li>
                            <li class="list-inline-item"><a class="text-color" href="{{ $item->instagram }}"><i class="ti-instagram"></i></a></li>
                            <li class="list-inline-item"><a class="text-color" target="blank" href="{{ $item->youtube }}"><i class="ti-youtube"></i></a></li>
                            <!-- <li class="list-inline-item"><a class="text-color" href="https://instagram.com/themefisher/"><i class="ti-linkedin"></i></a></li> -->
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