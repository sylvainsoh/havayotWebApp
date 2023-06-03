
<div class="form-group {{ $errors->has('label') ? 'has-error' : '' }}">
    <label for="label" class="col-md-2 control-label">{{ trans('questions.label') }}</label>
    <div class="col-md-10">
        <textarea class="form-control" name="label" cols="50" rows="10" id="label" required="true" placeholder="{{ trans('questions.label__placeholder') }}">{{ old('label', optional($question)->label) }}</textarea>
        {!! $errors->first('label', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('answer') ? 'has-error' : '' }}">
    <label for="answer" class="col-md-2 control-label">{{ trans('questions.answer') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="answer" type="text" id="answer" value="{{ old('answer', optional($question)->answer) }}" minlength="1" maxlength="255" required="true" placeholder="{{ trans('questions.answer__placeholder') }}">
        {!! $errors->first('answer', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('options') ? 'has-error' : '' }}">
    <label for="options" class="col-md-2 control-label">{{ trans('questions.options') }}</label>
    <div class="col-md-10">
        <textarea class="form-control" name="options" cols="50" rows="10" id="options" required="true" placeholder="{{ trans('questions.options__placeholder') }}">{{ old('options', optional($question)->options) }}</textarea>
        {!! $errors->first('options', '<p class="help-block">:message</p>') !!}
    </div>
</div>

