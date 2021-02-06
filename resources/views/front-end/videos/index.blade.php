@extends('layouts.app')

@section('title')
    {{$video->name}}
@endsection

@section('content')

    <div class="section section-buttons">
        <div class="container">
            <div class="card card-blog">
                <div class="card-header card-header-image">
                    <a href="#pablo">
                        @php
                            $url = getYoutubeId($video->youtube);
                        @endphp

                        @if($url)
                            <iframe width="100%" height="500" src="https://www.youtube.com/embed/{{$url}}" frameborder="0"  allowfullscreen></iframe>
                        @endif

                        <div class="card-title">
                            <i class="fa fa-calendar"></i></i> {{$video->created_at}}
                            <i class="fa fa-user"></i></i> {{$video->user->name}}
                            <i class="fa fa-clone"></i></i> {{$video->category->name}}
                        </div>
                    </a>
                    <div class="colored-shadow colored-shadow-big" style="background-image: url(&quot;https://images.unsplash.com/photo-1511439817358-bee8e21790b5?auto=format&amp;fit=crop&amp;w=750&amp;q=80&amp;ixid=dW5zcGxhc2guY29tOzs7Ozs%3D&quot;); opacity: 1;"></div></div>
                    <div class="card-body">
                    <h6 class="card-category text-info">{{$video->name}}</h6>
                    <p class="card-description">
                        <i class="fa fa-info-circle" ></i>{{$video->description}}
                    </p>
                </div>
            </div>
            <div class="card" style="width: 20rem;">
                <div class="card-body">
                    <h6 class="card-subtitle mb-2 text-muted">@lang('skills')</h6>
                    @foreach($video->skills as $skill)
                        <a href="{{route('front.skill', $skill->id)}}">
                            <span class="badge badge-primary">{{$skill->name}}</span>
                        </a>
                    @endforeach
                </div>
            </div>

            <div class="card" style="width: 20rem;">
                <div class="card-body">
                    <h6 class="card-subtitle mb-2 text-muted">@lang('tags')</h6>
                    @foreach($video->tags as $tag)
                        <a href="{{route('front.tag', $tag->id)}}">
                            <span class="badge badge-info">{{$tag->name}}</span>
                        </a>
                    @endforeach
                </div>
            </div>

            <div class="card card-nav-tabs col-md-12" id="comments">
                @php
                    $comments = $video->comments
                @endphp
                <div class="card-header card-header-warning">
                    <h5 style="display: inline-block"><i class="fa fa-comments" ></i> @lang('site.comments')</h5> <small>({{count($comments)}})</small>
                </div>
                <div class="card-body">
                    @foreach($comments as $comment)

                        <p class="card-text">{{$comment->comment}}</p>
                        <small><i class="fa fa-comment" ></i>: <a href="{{route('front.profile', ['id'=>$comment->user->id , 'slug'=>slug($comment->user->name)])}}">{{$comment->user->name}}</a> </small>
                        <small><i class="fa fa-calendar" ></i> :{{$comment->created_at}}</small>
                        @if(auth()->user())
                            @if(auth()->user()->group == 'admin' || auth()->user()->id == $comment->user_id)
                               | <a href="#" class="line" onclick="$(this).next('div').toggle(1000);return false">Edit</a>
                                <div class="form-group" style="display: none">
                                    <form action="{{route('front.commentUpdate', $comment->id)}}" method="POST">
                                        {{csrf_field()}}
                                        <textarea name="comment" class="form-control @error('comment') is-invalid @enderror" cols="30" rows="4">{{$comment->comment}}</textarea>
                                        @error('comment')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <button class="btn btn-outline-primary btn-sm" type="submit" >@lang('site.edit')</button>
                                    </form>
                                </div>
                            @endif
                        @endif
                        @if(!$loop->last)
                            <hr>
                        @endif
                    @endforeach


                </div>

            </div>

            <div class="form-group">
                <form action="{{route('front.commentStore', $video->id)}}" method="POST">
                    {{csrf_field()}}
                    <label for="comment">@lang('site.add') @lang('site.comment')</label>
                    <textarea name="commentNew" class="form-control @error('commentNew') is-invalid @enderror" cols="30" rows="4">{{old('commentNew')}}</textarea>
                    @error('commentNew')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <button class="btn btn-outline-primary btn-sm" type="submit" >@lang('site.add')</button>
                </form>
            </div>
        </div>

@endsection
