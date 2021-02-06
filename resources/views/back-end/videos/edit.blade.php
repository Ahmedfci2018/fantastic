@extends('back-end.layout.app')

@php

@endphp
@section('title')
    @lang('site.'.$module_name_plural)
@endsection

@section('content')

    @component('back-end.layout.nav-bar')

        @slot('nav_title')
            @lang('site.'.$module_name_plural)
        @endslot

    @endcomponent
<div class="row">
    <div class="col-md-8">

        {{--card--}}
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">@lang('site.edit') @lang('site.'.$module_name_singular)</h4>
                <p class="card-category">@lang('site.edit_desc')</p>
            </div>

            {{--card body--}}
            <div class="card-body">

                <form action="{{route($module_name_plural.'.update', $row->id)}}" method="post" enctype="multipart/form-data">
                    {{method_field('PUT')}}
                    @include('back-end.'.$module_name_plural.'.form')
                    <button type="submit" class="btn btn-primary pull-right">@lang('site.edit') @lang('site.'.$module_name_singular)</button>
                    <div class="clearfix"></div>

                </form> {{--end of form--}}

            </div> {{--end of card body--}}

        </div> {{--end of card--}}

    </div> {{--end of colum 8--}}

    <div class="col-md-4">

        {{--card--}}
        <div class="card">

            {{--card body--}}
            <div class="card-body">
                @php
                    $url = getYoutubeId($row->youtube);
                @endphp

                @if($url)
                    <iframe width="100%" height="315" src="https://www.youtube.com/embed/{{$url}}" frameborder="0"  allowfullscreen></iframe>
                @endif

                <img alt="Architectural design Architicts Design" src="{{asset('uploads/video_images/'. $row->image)}}" width="100%">
            </div> {{--end of card body--}}

        </div> {{--end of card--}}

    </div> {{--end of colum 4--}}

    <div class="col-md-8">

        {{--card--}}
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">@lang('site.edit') @lang('site.comment')</h4>
                <p class="card-category">@lang('site.edit_desc')</p>
            </div>
            {{--card body--}}
            <div class="card-body">
               @include('back-end.comments.index')
            </div> {{--end of card body--}}

        </div> {{--end of card--}}

    </div> {{--end of colum 4--}}

    <div class="col-md-4">

        {{--card--}}
        <div class="card">

            {{--card body--}}
            <div class="card-body">
                @include('back-end.comments.create')
            </div> {{--end of card body--}}

        </div> {{--end of card--}}

    </div> {{--end of colum 4--}}

</div> {{--end of row--}}
@endsection

