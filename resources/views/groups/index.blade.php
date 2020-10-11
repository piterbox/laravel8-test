@extends('default')

@section('title')
    {{ trans('common.groups') }}
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-10 text-center mt-3 mb-3">
                <h3 class="text-uppercase">List of Groups</h3>
            </div>
            <div class="col-2 text-right mt-3 mb-3">
                <a href="{{ route('groups.create') }}" class="btn btn-success">{{ trans('common.action.add') }} {{ trans('common.group') }}</a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col">{{ trans('common.model.group.id') }}</th>
                        <th scope="col">{{ trans('common.model.group.number') }}</th>
                        <th scope="col">{{ trans('common.model.group.course') }}</th>
                        <th scope="col">{{ trans('common.model.group.faculty') }}</th>
                        <th scope="col">{{ trans('common.action.action') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($groups && count($groups) > 0)
                    @foreach($groups as $group)
                    <tr>
                        <th scope="row">{{ $group->id }}</th>
                        <td><a href="{{ route('groups.view', $group->id) }}" target="_blank">{{ $group->number }}</a></td>
                        <td>{{ $group->course }}</td>
                        <td>{{ $group->faculty }}</td>
                        <td class="text-center">
                            <a href="{{ route('groups.edit',$group->id) }}" class="btn btn-warning btn-sm">{{trans('common.action.edit')}}</a>

                            <form action="{{ route('groups.delete',$group->id ) }}" method="post" class="d-inline-block">
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
