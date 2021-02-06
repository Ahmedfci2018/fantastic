<div class="form-group bmd-form-group">
    <label class="bmd-label-floating">@lang('site.comment')</label>
    <textarea name="comment" class="form-control" cols="30" rows="5">{{ isset($row) ? $row->comment : old('comment') }}</textarea>
    @error('comment')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>
