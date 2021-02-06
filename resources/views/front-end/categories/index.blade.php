@extends('layouts.app')

@section('title', $category->name)
@section('meta_keywords', $category->meta_keywords)
@section('meta_desc', $category->meta_desc)


@section('content')

    <div class="section section-buttons">
        <div class="container">
            <div class="title">
                <h1>
                    {{$category->name}}
                </h1>
            </div>

            @include('front-end.partials.video-row')
        </div>

@endsection
