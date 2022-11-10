@extends('frontend.main_master')
@section('title')
Home - Dipendra Higher Secondary School
@endsection
@section('content')

@include('frontend.components.custom_page_title')



<!-- teacher details -->
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-5 mb-5">
                <img class="img-fluid w-100" width="445" height="501" src="{{ asset($teacher->photo) }}" alt="teacher">
            </div>
            <div class="col-md-6 mb-5">
                <h3>{{ $teacher->name }}</h3>
                <h6 class="text-color">{{ $teacher->designation }}</h6>
                {!! $teacher->description !!}
                <div class="row">
                    <div class="col-md-6 mb-5 mb-md-0">
                        <h4 class="mb-4">CONTACT INFO:</h4>
                        <ul class="list-unstyled">
                            <li class="mb-3"><a class="text-color" href="mailto:{{$teacher->email}}"><i class="ti-email mr-2"></i>{{ $teacher->email }}</a></li>
                            <li class="mb-3"><a class="text-color" href="tel:{{$teacher->phone}}"><i class="ti-mobile mr-2"></i>{{$teacher->phone}}</a></li>
                            <li class="mb-3"><a class="text-color" href="{{$teacher->facebook}}"><i class="ti-facebook mr-2"></i>{{$teacher->name}}</a></li>
                            <li class="mb-3"><a class="text-color" href="{{$teacher->instagram}}"><i class="ti-instagram mr-2"></i>{{$teacher->name}}</a></li>
                            <li class="mb-3"><a class="text-color" href="{{$teacher->youtube}}"><i class="ti-youtube mr-2"></i>{{$teacher->name}}</a></li>
                            <!-- <li class="mb-3"><a class="text-color" href="teacher-single.html"><i class="ti-world mr-2"></i>johnDoe.com</a></li> -->
                            <li class="mb-3"><a class="text-color" href="http://maps.google.com/"><i class="ti-location-pin mr-2"></i>{{$teacher->address}}</a></li>
                        </ul>
                    </div>


                </div>
            </div>
            <div class="col-12">
                <h4 class="mb-4">BIOGRAPHY</h4>
                <p class="mb-5">{!! $teacher->biography !!}</p>
                <div class="row">
                    <div class="col-md-6">
                        <h6 class="mb-4">EDUCATION:</h6>
                        <!-- {!! $teacher->interests !!} -->
                        <label>Qualification: <strong>{{$teacher->qualification}}</strong></label><br>
                        <label>Experience: <strong>{{$teacher->experience}}</strong></label><br>
                        <label>Joined DHSS: <strong>{{ Carbon\Carbon::parse($teacher->since)->diffForHumans() }}</strong></label>
                    </div>
                    <div class="col-md-6">
                        <h6 class="mb-4">SUMMARY OF ACTIVITIES/INTERESTS</h6>
                        <!-- {!! $teacher->interests !!} -->
                        <ul class="list-unstyled">

                            {!! $teacher->interests !!}
                            <!-- <li class="mb-3">Computer Security</li>
                            <li class="mb-3">Human Computer Interfacing</li> -->
                        </ul>
                    </div>
                </div><br>
            </div>

        </div>
        <div class="row justify-content-center">
            <div class="col-12">
                <h4 class="mb-4">MESSAGE FOR STUDENTS:</h4>
                {!! $teacher->mfs !!}
            </div>


        </div>
    </div>
</section>
<!-- /teacher details -->




@endsection