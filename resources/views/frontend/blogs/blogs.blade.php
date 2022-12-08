@extends('frontend.main_master')
@section('title')
News - Dipendra Higher Secondary School
@endsection
@section('content')

@include('frontend.components.custom_page_title')

<!-- blogs -->
<section class="section">
    <div class="container">
        <div class="row">

            @foreach($blogs as $item)

            <!-- blog post -->
            <article class="col-lg-4 col-sm-6 mb-5">
                <div class="card rounded-0 border-bottom border-primary border-top-0 border-left-0 border-right-0 hover-shadow">
                    <img class="card-img-top rounded-0" width="330" height="223" src="{{ asset($item->image) }}" alt="Post thumb">
                    <div class="card-body">
                        <!-- post meta -->
                        <ul class="list-inline mb-3">
                            <!-- post date -->
                            <li class="list-inline-item mr-3 ml-0">{{$item->date}}</li>
                            <!-- author -->
                            <li class="list-inline-item mr-3 ml-0">By {{$item->author}}</li>
                        </ul>
                        <a href="{{ route('news.single',$item->id) }}">
                            <h4 class="card-title">{{$item->title}}</h4>
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
<!-- /blogs -->


@endsection