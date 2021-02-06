{{csrf_field()}}
<div class="row">

    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">@lang('site.name')</label>
            <input type="text" name="title" value="{{ isset($row) ? $row->title : old('title') }}" class="form-control @error('title') is-invalid @enderror">
            @error('title')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">@lang('site.code')</label>
            <input type="text" name="code" value="{{ isset($row) ? $row->code : old('code') }}" class="form-control @error('code') is-invalid @enderror">
            @error('code')
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
            @error('category_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    {{-- <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">@lang('site.client')</label>

            <select name="client_id" class="form-control @error('client_id') is-invalid @enderror">
                @foreach($clients as $client)
                    <option value="{{$client->id}}" {{isset($row) && $row->client_id == $client->id ? 'selected' : ''}}>{{$client->name}}</option>
                @endforeach
            </select>
            @error('client_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div> --}}

    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">@lang('site.tag')</label>

            <select name="tag_id" class="form-control @error('tag_id') is-invalid @enderror">
                @foreach($tags as $tag)
                    <option value="{{$tag->id}}" {{isset($row) && $row->tag_id == $tag->id ? 'selected' : ''}}>{{$tag->name}}</option>
                @endforeach
            </select>
            @error('tag_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    {{-- <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">@lang('site.architect')</label>
            <input type="text" name="architect" value="{{ isset($row) ? $row->architect : old('architect') }}" class="form-control @error('architect') is-invalid @enderror">
            @error('architect')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div> --}}

    <div class="col-md-6">
        <div class="">
            <label>@lang('site.catalog')</label>
            <input type="file" name="catalog" class="form-control catalog @error('catalog') is-invalid @enderror">
            @error('catalog')
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
            <img src="{{isset($row) ? asset('uploads/project_images/'. $row->image) : asset('uploads/project_images/default.png')}}" width="100px" height="60px" class="img-thumbnail img-preview">
        </div>
    </div>

    {{-- <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">@lang('site.startsOn')</label>
            <input type="date" name="startsOn" value="{{ isset($row) ? $row->startsOn : old('startsOn') }}" class="form-control @error('startsOn') is-invalid @enderror">
            @error('startsOn')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">@lang('site.endsOn')</label>
            <input type="date" name="endsOn" value="{{ isset($row) ? $row->endsOn : old('endsOn') }}" class="form-control @error('endsOn') is-invalid @enderror">
            @error('endsOn')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div> --}}


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
