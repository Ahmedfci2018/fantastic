<div class="section section-dark text-center">
    <div class="container">
        <h2 class="title">Our Numbers</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="card  card-plain">
                    <div class="card-body">
                        <a href="#paper-kit">
                            <div class="author">
                                <h2 class="card-title" style="font-size:50px" id="videos" data-value="{{$videos_count}}">{{$videos_count}}</h2>
                                <h6 class="card-category">Videos</h6>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card  card-plain">
                    <div class="card-body">
                        <a href="#paper-kit">
                            <div class="author">
                                <h2 class="card-title" style="font-size:50px" id="comments" data-value="{{$comments_count}}">{{$comments_count}}</h2>
                                <h6 class="card-category">@lang('site.comments')</h6>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card  card-plain">
                    <div class="card-body">
                        <a href="#paper-kit">
                            <div class="author">

                                <h2 class="card-title" style="font-size:50px" id="tags" data-value="{{$tags_count}}">{{$tags_count}}</h2>
                                <h6 class="card-category">@lang('site.tags')</h6>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('script')
    <script type="text/javascript">

        var tags = $("#tags").data('value');
        $("#tags").numScroll({
            number:tags ,
            symbol: true,

        });

        var comments = $("#comments").data('value');
        $("#comments").numScroll({
            number:comments ,
            symbol: true,

        });

        var videos = $("#videos").data('value');
        $("#videos").numScroll({
            number:videos ,
            symbol: true,

        });
    </script>
@endpush


