@extends('frontend.main_master')
@section('title')
Notices - Dipendra Higher Secondary School
@endsection
@section('content')

@include('frontend.components.custom_page_title')

<!-- notice -->
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <ul class="list-unstyled">

                    @forelse($notices as $item)
                    <!-- notice item -->
                    <li class="d-md-table mb-4 w-100 border-bottom hover-shadow">
                        @php
                        $day = Carbon\Carbon::parse($item->notice_date)->day;
                        $month = Carbon\Carbon::parse($item->notice_date)->format('M');
                        $year = Carbon\Carbon::parse($item->notice_date)->format('Y');
                        @endphp
                        <div class="d-md-table-cell text-center p-4 bg-primary text-white mb-4 mb-md-0"><span class="h2 d-block">{{ $day }}</span> {{$month}},{{$year}}</div>
                        <div class="d-md-table-cell px-4 vertical-align-middle mb-4 mb-md-0">
                            <a href="{{ route('notice.single',$item->id) }}" class="h4 mb-3 d-block">{{ $item->title }}</a>
                            <p class="mb-0">{!! Str::limit($item->description,200) !!}</p>
                        </div>
                        <div class="d-md-table-cell text-right pr-0 pr-md-4"><a href="{{ route('notice.single',$item->id) }}" class="btn btn-primary">read more</a></div>
                    </li>
                    @empty

                    @endforelse


                </ul>
            </div>
        </div>
    </div>
</section>
<!-- /notice -->


@endsection