@extends('default')

@section('title')
    {{ trans('common.students') }}
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-10 text-center mt-3 mb-3">
                <h3 class="text-uppercase">{{ trans('common.list_of_students') }}</h3>
            </div>
            <div class="col-2 text-right mt-3 mb-3">
                <a href="{{ route('students.create') }}" class="btn btn-success">{{ trans('common.action.add') }} {{ trans('common.student') }}</a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card mb-3">
                    <div class="card-body">
                        <form action="{{ url()->current() }}">
                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <label for="first_name" class="col-form-label-sm">{{ trans('common.model.student.first_name') }}</label>
                                <input type="text" class="form-control form-control-sm" id="first_name" name="first_name" value="{{ request('first_name') }}" placeholder="{{ trans('common.action.fill') }} {{ trans('common.model.student.first_name') }}">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="last_name" class="col-form-label-sm">{{ trans('common.model.student.last_name') }}</label>
                                <input type="text" class="form-control form-control-sm" id="last_name" name="last_name" value="{{ request('last_name') }}" placeholder="{{ trans('common.action.fill') }} {{ trans('common.model.student.last_name') }}">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="patronymic" class="col-form-label-sm">{{ trans('common.model.student.patronymic') }}</label>
                                <input type="text" class="form-control form-control-sm" id="patronymic" name="patronymic" value="{{ request('patronymic') }}" placeholder="{{ trans('common.action.fill') }} {{ trans('common.model.student.patronymic') }}">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <label for="start_date" class="col-form-label-sm">{{ trans('common.start_date') }}</label>
                                <input type="date" class="form-control form-control-sm" id="start_date" name="start_date" value="{{ request('start_date') }}" placeholder="{{ trans('common.action.fill') }} {{ trans('common.start_date') }}">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="end_date" class="col-form-label-sm">{{ trans('common.end_date') }}</label>
                                <input type="date" class="form-control form-control-sm" id="end_date" name="end_date" value="{{ request('end_date') }}" placeholder="{{ trans('common.action.fill') }} {{ trans('common.end_date') }}">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="group_id" class="col-form-label-sm">{{ trans('common.group') }}</label>
                                <select name="group_id" class="form-control form-control-sm" id="group_id">
                                    <option value=""></option>
                                    @foreach($groups as $group)
                                        <option value="{{ $group->id }}"
                                        @if(request('group_id') == $group->id) selected @endif
                                        >#{{ $group->number }} / {{ trans('common.model.group.course') }} - {{ $group->course }} / {{ $group->faculty }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 text-right">
                                <a href="{{ route('students.index') }}" class="btn btn-warning">{{ trans('common.action.clear') }}</a>
                                <button class="btn btn-primary">{{ trans('common.action.filter') }}</button>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col">{{ trans('common.model.student.id') }}</th>
                        <th scope="col">{{ trans('common.model.student.first_name') }}</th>
                        <th scope="col">{{ trans('common.model.student.last_name') }}</th>
                        <th scope="col">{{ trans('common.model.student.patronymic') }}</th>
                        <th scope="col">{{ trans('common.model.student.dob') }}</th>
                        <th scope="col">{{ trans('common.group') }}</th>
                        <th scope="col">{{ trans('common.action.action') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($students && count($students) > 0)
                        @foreach($students as $student)
                            <tr>
                                <th scope="row">{{ $student->id }}</th>
                                <td>{{ $student->first_name }}</td>
                                <td>{{ $student->last_name }}</td>
                                <td>{{ $student->patronymic }}</td>
                                <td>{{ $student->date_of_birth }}</td>
                                <td>{{ $student->group_number }}</td>
                                <td class="text-center">
                                    <a href="{{ route('students.edit',$student->id) }}" class="btn btn-warning btn-sm">{{trans('common.action.edit')}}</a>
                                    <form action="{{ route('students.delete',$student->id) }}" method="post" class="d-inline-block">
                                        <input type="hidden" name="_method" value="delete" />
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm">{{trans('common.action.delete')}}</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <th colspan="4">No Data</th>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>

    </div>

@endsection