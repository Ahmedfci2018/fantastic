@extends('layouts.app')

@section('title')
    {{$page->name}}
@endsection
@section('meta_keywords', $page->meta_keywords)
@section('meta_desc', $page->meta_desc)

@section('content')
    <div class="section section-buttons text-center" style="min-height: 650px">
        <div class="container">
            <div class="title">
                <h1>
                    {{$page->name}}
                </h1>
            </div>
            <p>
                {{$page->description}}
            </p>
        </div>
    </div>

@endsection
