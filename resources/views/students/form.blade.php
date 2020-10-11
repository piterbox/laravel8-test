@extends('default')

@section('title')
    {{ trans('common.student') }} {{ isset($student) && !is_null($student) ? trans('common.action.edit') : trans('common.action.create') }}
@endsection

@section('content')
    <div class="container">
        <form action="{{ isset($student) && !is_null($student) ? route('students.update', $student->id) : route('students.store') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-10 text-center mt-3 mb-3">
                    <h3 class="text-uppercase">
                        {{ isset($student) && !is_null($student) ? trans('common.action.edit') : trans('common.action.create')}} {{ trans('common.student')}}
                    </h3>
                </div>
                <div class="col-2 text-right mt-3 mb-3">
                    <a href="{{ route('students.index') }}" class="btn btn-secondary">{{ trans('common.action.cancel') }}</a>
                    <button type="submit" class="btn btn-success">{{ trans('common.ok') }}</button>
                </div>
            </div>
            <fieldset>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="first_name">{{ trans('common.model.student.first_name') }}</label>
                            <input type="text" class="form-control {{ $errors->has('first_name') ? 'is-invalid' : '' }}" id="first_name" name="first_name" value="{{ old('first_name', data_get($student, 'first_name')) }}" placeholder="{{ trans('common.action.fill') }} {{ trans('common.model.student.first_name') }}">
                            <div class="invalid-feedback">{{ $errors->has('first_name') ? $errors->get('first_name')[0] : '' }}</div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="last_name">{{ trans('common.model.student.last_name') }}</label>
                            <input type="text" class="form-control {{ $errors->has('last_name') ? 'is-invalid' : '' }}" id="last_name" name="last_name" value="{{ old('last_name', data_get($student, 'last_name')) }}" placeholder="{{ trans('common.action.fill') }} {{ trans('common.model.student.last_name') }}">
                            <div class="invalid-feedback">{{ $errors->has('last_name') ? $errors->get('last_name')[0] : '' }}</div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="patronymic">{{ trans('common.model.student.patronymic') }}</label>
                            <input type="text" class="form-control {{ $errors->has('patronymic') ? 'is-invalid' : '' }}" id="patronymic" name="patronymic" value="{{ old('patronymic', data_get($student, 'patronymic')) }}" placeholder="{{ trans('common.action.fill') }} {{ trans('common.model.student.patronymic') }}">
                            <div class="invalid-feedback">{{ $errors->has('patronymic') ? $errors->get('patronymic')[0] : '' }}</div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="date_of_birth">{{ trans('common.model.student.dob') }}</label>
                            <input type="date" class="form-control {{ $errors->has('date_of_birth') ? 'is-invalid' : '' }}" id="date_of_birth" name="date_of_birth" value="{{ old('date_of_birth', data_get($student, 'date_of_birth')) }}" placeholder="{{ trans('common.action.fill') }} {{ trans('common.model.student.date_of_birth') }}">
                            <div class="invalid-feedback">{{ $errors->has('date_of_birth') ? $errors->get('date_of_birth')[0] : '' }}</div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="group_id">{{ trans('common.group') }}</label>
                            <select name="group_id" class="form-control {{ $errors->has('group_id') ? 'is-invalid' : '' }}" id="group_id">
                                <option value=""></option>
                                @foreach($groups as $group)
                                    <option value="{{ $group->id }}"
                                            @if(old('group_id', data_get($student, 'group_id')) === $group->id) selected @endif
                                    >#{{ $group->number }} / {{ trans('common.model.group.course') }} - {{ $group->course }} / {{ $group->faculty }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">{{ $errors->has('group_id') ? $errors->get('group_id')[0] : '' }}</div>
                        </div>
                    </div>
                </div>


            </fieldset>

        </form>


    </div>

@endsection
