@extends('default')

@section('title')
    {{ trans('common.group') }} - {{ $group->number }}
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card mt-3">
                    <h3 class="card-header text-uppercase">{{ trans('common.group') }} - <strong>{{ $group->number }}</strong></h3>
                    <div class="card-body">
                        <h5 class="card-title">{{ trans('common.model.group.course') }} - <strong>{{ $group->course }}</strong><br>
                            {{ trans('common.model.group.faculty') }} - <strong>{{ $group->faculty }}</strong></h5>
                        <a href="{{ route('groups.edit',$group->id) }}" class="btn btn-warning btn-sm">{{trans('common.action.edit')}}</a>
                        @if(count($students) == 0)
                        <form action="{{ route('groups.delete',$group->id ) }}" method="post" class="d-inline-block">
                            <input type="hidden" name="_method" value="delete" />
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm">{{trans('common.action.delete')}}</button>
                        </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 mt-3 mb-3 text-center">
                <h4 class="text-uppercase">{{ trans('common.list_of_students') }}</h4>
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