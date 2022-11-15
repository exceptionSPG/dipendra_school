@extends('frontend.main_master')
@section('title')
$blog->title - Dipendra Higher Secondary School
@endsection
@section('content')

@include('frontend.components.custom_page_title')


<!-- blog details -->
<section class="section-sm bg-gray">
    <div class="container">
        <div class="row">

            <div class="col-12 mb-4">
                <img src="{{ asset($blog->image) }}" width="690" height="382" alt="blog-thumb" class="img-fluid w-100">
            </div>
            <div class="col-12">
                <ul class="list-inline">
                    <li class="list-inline-item mr-4 mb-3 mb-md-0 text-light"><span class="font-weight-bold mr-2">Post:</span>{{$blog->author}}</li>
                    <li class="list-inline-item mr-4 mb-3 mb-md-0 text-light">{{$blog->date}}</li>
                    <!-- <li class="list-inline-item mr-4 mb-3 mb-md-0 text-light"><i class="ti-book mr-2"></i>Read 289</li>
                    <li class="list-inline-item mr-4 mb-3 mb-md-0 text-light"><i class="ti-share mr-2"></i>289</li> -->

                </ul>
            </div>
            <!-- border -->
            <div class="col-12 mt-4">
                <div class="border-bottom border-primary"></div>
            </div>
            <!-- blog contect -->
            <div class="col-12 mb-5">
                <h2>{{ $blog->title }}</h2>
                {!! $blog->detail !!}
            </div>

            <!-- comment box -->
            <div class="col-12">


                <div class="fb-comments" data-href="http://127.0.0.1:8000/news/details/&#123;id&#125;" data-width="" data-numposts="5"></div>

            </div>


        </div>
    </div>
</section>
<!-- /blog details -->

@php

$blogs = App\Models\Backend\Blog::where('id','!=',$blog->id)->orderBy('created_at', 'desc')->limit(3)->get();
@endphp

<!-- recommended post -->
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="section-title">Recommended</h2>
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
<!-- /recommended post -->





@endsection