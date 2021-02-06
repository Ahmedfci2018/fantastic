{{csrf_field()}}
<div class="row">
    

    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">@lang('site.title')</label>
            <input type="text" name="title" value="{{ isset($row) ? $row->title : old('title') }}" class="form-control @error('title') is-invalid @enderror">
            @error('title')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="col-md-3">
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

    <div class="col-md-3" width="90px" height="50px">
        <div class="">
            <img alt="Architectural design Architicts Design" src="{{isset($row) ? asset('uploads/slider_images/'. $row->image) : asset('uploads/slider_images/default.png')}}" width="100px" height="60px" class="img-thumbnail img-preview">
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">@lang('site.description')</label>
            <textarea name="description" class="form-control" cols="30" rows="10">{{ isset($row) ? $row->description : old('description') }}</textarea>
            @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

</div>
