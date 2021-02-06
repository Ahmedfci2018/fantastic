<div class="section text-center">
    <div class="container">
        <div class="row">
            <div class="col-md-8 ml-auto mr-auto">
                <h2 class="title">@lang('site.latest')</h2>
                <h5 class="description">Keep Learning , Latest Videos based on publishing date.</h5>
            </div>
        </div>
        <br>
        <br>
        @include('front-end.partials.video-row')
        <br>
        <a href="{{route('home')}}" class="btn btn-danger btn-round">@lang('site.more_videos')</a>
    </div>
</div>
