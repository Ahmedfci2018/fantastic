
<table class="table" id="comment">
    <tbody>
    @foreach($comments as $comment)
        <tr>
            {{--<td>
                <div class="form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" value="" checked="">
                        <span class="form-check-sign">
                            <span class="check"></span>
                        </span>
                    </label>
                </div>
            </td>--}}
            <td>
                <h4>{{$comment->user->name}}</h4>
                <p>{{$comment->comment}}</p>
                <small>{{$comment->created_at}}</small>
            </td>
            <td class="td-actions text-right">
                <button type="button" rel="tooltip" title="" onclick="$(this).closest('tr').next('tr').slideToggle()" class="btn btn-white btn-link btn-sm" data-original-title="Edit Comment">
                    <i class="material-icons">edit</i>
                </button>
                <form action="{{route('comment.delete', $comment->id)}}" method="GET" style="display: inline-block">
                    {{csrf_field()}}
                    {{method_field('POST')}}
                    <button type="submit" rel="tooltip" title="" class="btn btn-white btn-link btn-sm" data-original-title="Remove">
                        <i class="material-icons">close</i>
                    </button>
                </form>
            </td>
        </tr>

        <tr style="display: none">
            <td>
                <form action="{{route('comment.update', $comment->id)}}" method="post">
                    {{csrf_field()}}
                    @include('back-end.comments.form' , ['row'=> $comment])
                    <input type="hidden" value="{{$row->id}}" name="video_id">
                    <button type="submit" class="btn btn-primary pull-right">@lang('site.edit') @lang('site.comment')</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
