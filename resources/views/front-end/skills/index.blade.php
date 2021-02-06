@extends('layouts.app')

@section('title', $skill->name)
@section('meta_keywords', $skill->meta_keywords)
@section('meta_desc', $skill->meta_desc)

@section('content')

    <div class="section section-buttons">
        <div class="container">
            <div class="title">
                <h1>
                    {{$skill->name}}
                </h1>
            </div>

            @include('front-end.partials.video-row')
        </div>

@endsection
