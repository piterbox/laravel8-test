@extends('default')

@section('title')
    {{ trans('common.group') }} {{ isset($group) && !is_null($group) ? trans('common.action.edit') : trans('common.action.create') }}
@endsection

@section('content')
    <div class="container">
        <form action="{{ isset($group) && !is_null($group) ? route('groups.edit', $group->id) : route('groups.store') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-10 text-center mt-3 mb-3">
                    <h3 class="text-uppercase">
                        {{ isset($group) && !is_null($group) ? trans('common.action.edit') : trans('common.action.create')}} {{ trans('common.group') }}
                    </h3>
                </div>
                <div class="col-2 text-right mt-3 mb-3">
                    <a href="{{ route('groups.index') }}" class="btn btn-secondary">{{ trans('common.action.cancel') }}</a>
                    <button type="submit" class="btn btn-success">{{ trans('common.ok') }}</button>
                </div>
            </div>
            <fieldset>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="number">{{ trans('common.model.group.number') }}</label>
                            <input type="number" name="number" maxlength="6" max="999999" min="1" class="form-control {{ $errors->has('number') ? 'is-invalid' : '' }}" id="number" value="{{ old('number', data_get($group, 'number')) }}" placeholder="{{ trans('common.action.fill') }} {{ trans('common.model.group.number') }}">
                            <div class="invalid-feedback">{{ $errors->has('number') ? $errors->get('number')[0] : '' }}</div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="course">{{ trans('common.model.group.course') }}</label>
                            <input type="number" name="course" maxlength="1" max="5" min="1" class="form-control {{ $errors->has('course') ? 'is-invalid' : '' }}" id="course" value="{{ old('course', data_get($group, 'course')) }}" placeholder="{{ trans('common.action.fill') }} {{ trans('common.model.group.course') }}">
                            <div class="invalid-feedback">{{ $errors->has('course') ? $errors->get('course')[0] : '' }}</div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="faculty">{{ trans('common.model.group.faculty') }}</label>
                            <input type="text" name="faculty" class="form-control {{ $errors->has('faculty') ? 'is-invalid' : '' }}" id="faculty" value="{{ old('faculty', data_get($group, 'faculty')) }}" placeholder="{{ trans('common.action.fill') }} {{ trans('common.model.group.faculty') }}">
                            <div class="invalid-feedback">{{ $errors->has('faculty') ? $errors->get('faculty')[0] : '' }}</div>
                        </div>
                    </div>
                </div>


            </fieldset>

        </form>


    </div>

@endsection
