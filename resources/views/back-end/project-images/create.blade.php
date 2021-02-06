@extends('back-end.layout.app')


@section('title')
    @lang('site.image')
@endsection

@section('content')

    @component('back-end.layout.nav-bar')

        @slot('nav_title')
            @lang('site.image')
        @endslot

    @endcomponent

    <div class="col-md-8">

        {{--card--}}
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">@lang('site.add') @lang('site.image')</h4>
                <p class="card-category">@lang('site.edit_desc')</p>
            </div>

            {{--card body--}}
            <div class="card-body">
                <form action="{{route('projects.storeImages')}}" method="post" enctype="multipart/form-data">
                    @include('back-end.project-images.form')
                    <button type="submit" class="btn btn-primary pull-right">@lang('site.add') @lang('site.images')</button>
                    <div class="clearfix"></div>
                </form>
            </div> {{--end of card body--}}

        </div> {{--end of card--}}

    </div> {{--end of colum 8--}}

@endsection

