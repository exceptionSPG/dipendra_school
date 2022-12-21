@extends('frontend.main_master')
@section('title')
Contact Us - Dipendra Higher Secondary School
@endsection
@section('content')

@include('frontend.components.custom_page_title')

<!-- courses -->
<section class="section">
    <div class="container">
        <div class="row">


            <!-- contact -->
            <section class="section bg-gray">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <h2 class="section-title">Contact Us</h2>
                        </div>
                    </div>
                    <div class="row">
                        <!-- 	name	email	subject	message	status	reply_message	created_at	updated_at	 -->
                        <div class="col-lg-7 mb-4 mb-lg-0">
                            <form action="{{route('mail.store')}}" method="POST">
                                @csrf
                                <input type="text" class="form-control mb-3" id="name" name="name" placeholder="Your Name" required>
                                <input type="email" class="form-control mb-3" id="mail" name="email" placeholder="Your Email" required>
                                <input type="text" class="form-control mb-3" id="subject" name="subject" placeholder="Subject" required>
                                <textarea name="message" id="message" class="form-control mb-3" placeholder="Your Message" required></textarea>
                                <button type="submit" value="send" class="btn btn-primary">SEND MESSAGE</button>
                            </form>
                        </div>
                        <div class="col-lg-5">
                            <p class="mb-5">{!! Str::limit($about->description,250) !!}</p>
                            <a href="tel:{{$site->phone_one}}" class="text-color h5 d-block">{{$site->phone_one}}</a>
                            <a href="mailto:{{ $site->email }}" class="mb-5 text-color h5 d-block">{{ $site->email }}</a>
                            <p>{{ $site->school_address}}</p>
                        </div>
                    </div>
                </div>
            </section>
            <!-- /contact -->

            <!-- gmap -->
            <section class="section pt-0">
                <!-- Google Map 27.6681133,83.8378486 -->
                <div id="map_canvas" data-latitude="27.6681133" data-longitude="83.8378486"></div>
            </section>
            <!-- /gmap -->

        </div>
    </div>
</section>
<!-- /courses -->

<script>
    function initialize() {
        var myLatlng = new google.maps.LatLng(27.6681133, 83.8378486);
        var myOptions = {
            zoom: 15,
            center: myLatlng,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        }
        var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
    };
</script>

@endsection