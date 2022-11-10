<!-- page title -->
<section class="page-title-section overlay" data-background="{{ asset('frontend/images/backgrounds/page-title.jpg') }}">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <ul class="list-inline custom-breadcrumb mb-2">
                    <li class="list-inline-item"><a class="h2 text-primary font-secondary" href="{{ route($route) }}">{{$parent_page}}</a></li>
                    <li class="list-inline-item text-white h3 font-secondary nasted">{{ $page_title }}</li>
                </ul>
                <p class="text-lighten mb-0"></p>
            </div>
        </div>
    </div>
</section>
<!-- /page title -->