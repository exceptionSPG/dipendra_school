<!-- teachers -->
<section class="section">
    <div class="container">
        <div class="hero-slider">


            @foreach($events as $item)
            <!-- slider item -->
            <div class="hero-slider-item ">
                <h2 class="section-title">
                    Our Teachers:
                </h2>
                <div class="row">
                    @foreach($teachers as $item)
                    <!-- teacher -->
                    <div class="col-lg-4 col-sm-6 mb-5">
                        <div class="card border-0 rounded-0 hover-shadow">
                            <img class="card-img-top rounded-0" width="340" height="383" src="{{ asset($item->photo) }}" alt="teacher">
                            <div class="card-body">
                                <a href="{{ route('teacher-details',$item->id) }}">
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
                </div>
            </div>
            <!-- slider item -->
            @endforeach






        </div>




    </div>
</section>
<!-- /teachers -->