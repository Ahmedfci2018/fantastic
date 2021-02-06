{{csrf_field()}}
<div class="row">
    <div class="col-md-8">
        <div class="">
            <label>@lang('site.image')</label>
            <input type="file" name="image" class="form-control image @error('image') is-invalid @enderror">
            @error('image')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="col-md-4" width="100px" height="60px">
        <div class="">
            <img  src="{{isset($row) ? asset('uploads/project_images/'. $row->image) : asset('uploads/project_images/default.png')}}" width="100px" height="60px" class="img-thumbnail img-preview">
        </div>
    </div>

    <input type="hidden" name="project_id" value="{{isset($row)? $row->id :$id}}" id="">
</div>
