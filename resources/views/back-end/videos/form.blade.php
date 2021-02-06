{{csrf_field()}}
<div class="row">
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">@lang('site.name')</label>
            <input type="text" name="name" value="{{ isset($row) ? $row->name : old('name') }}" class="form-control @error('name') is-invalid @enderror">
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">@lang('site.meta_keywords')</label>
            <input type="text" name="meta_keywords" value="{{ isset($row) ? $row->meta_keywords : old('meta_keywords') }}" class="form-control @error('meta_keywords') is-invalid @enderror">
            @error('meta_keywords')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">@lang('site.youtube')</label>
            <input type="url" name="youtube" value="{{ isset($row) ? $row->youtube : old('youtube') }}" class="form-control @error('youtube') is-invalid @enderror">
            @error('youtube')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="col-md-3">
        <div class="">
            <label>@lang('site.image')</label>
            <input type="file" name="image" value="" class="form-control image @error('image') is-invalid @enderror">
            @error('image')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="col-md-3" width="100px" height="60px">
        <div class="">
            <img alt="Architectural design Architicts Design" src="{{isset($row) ? asset('uploads/video_images/'. $row->image) : asset('uploads/video_images/default.png')}}" width="100px" height="60px" class="img-thumbnail img-preview">
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">@lang('site.video_statue')</label>
            <select name="published" class="form-control @error('published') is-invalid @enderror">
                <option value="1" {{isset($row) && $row->published == 1 ? 'selected' : ''}}>Published</option>
                <option value="0" {{isset($row) && $row->published == 0 ? 'selected' : ''}}>Hidden</option>
            </select>
            @error('published')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">@lang('site.category')</label>

            <select name="category_id" class="form-control @error('category_id') is-invalid @enderror">

                @foreach($categories as $category)
                    <option value="{{$category->id}}" {{isset($row) && $row->category_id == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                @endforeach
            </select>
            @error('published')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">@lang('site.skills')</label>

            <select name="skills[]" class="form-control @error('skills[]') is-invalid @enderror" multiple style="height: 100px">

                @foreach($skills as $skill)
                    <option value=" {{$skill->id}} " {{in_array($skill->id, $selected_skills) ? 'selected' : ''}}>{{$skill->name}}</option>
                @endforeach
            </select>
            @error('skills[]')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">@lang('site.tags')</label>

            <select name="tags[]" class="form-control @error('tags[]') is-invalid @enderror" multiple style="height: 100px">

                @foreach($tags as $tag)
                    <option value=" {{$tag->id}} " {{in_array($tag->id, $selected_tags) ? 'selected' : ''}}>{{$tag->name}}</option>
                @endforeach
            </select>
            @error('tags[]')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">@lang('site.video_desc')</label>
            <textarea name="description" class="form-control @error('video_desc') is-invalid @enderror" cols="30" rows="5" >{{ isset($row) ? $row->description : old('description') }}</textarea>
            @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">@lang('site.meta_desc')</label>
            <textarea name="meta_desc" class="form-control @error('meta_desc') is-invalid @enderror" cols="30" rows="5">{{ isset($row) ? $row->meta_desc : old('meta_desc') }}</textarea>
            @error('meta_desc')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
</div>
