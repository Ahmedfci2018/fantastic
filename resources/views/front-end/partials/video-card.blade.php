<div class="card" style="width: 20rem;">
    <a href="{{route('front.video', $video->id)}}">
        <img class="card-img-top" src="{{asset('uploads/video_images/'. $video->image)}}" alt="Card image cap">
        <div class="card-body">
            <h4 class="card-title">{{$video->name}}</h4>
            <br>
            <small>{{$video->created_at}}</small>

        </div>
    </a>
</div>
