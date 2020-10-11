<?php

namespace App\Http\Controllers;

use App\Group;
use App\Http\Requests\StudentRequest;
use App\Student;


class StudentsController extends Controller
{
    public function index()
    {

        if(request()->hasAny(['first_name', 'last_name', 'start_date', 'end_date', 'patronymic', 'group_id'])){
            $students = Student::select('*');
            if(request('first_name')){
                $students = $students->where('first_name', 'like', '%'.request('first_name').'%');
            }
            if(request('last_name')){
                $students = $students->where('last_name', 'like', '%'.request('last_name').'%');
            }
            if(request('patronymic')){
                $students = $students->where('patronymic', 'like', '%'.request('patronymic').'%');
            }
            if(request('group_id')){
                $students = $students->where('group_id', request('group_id'));
            }
            if(request('start_date')){
                $students = $students->where('date_of_birth', '>=', request('start_date'));
            }
            if(request('end_date')){
                $students = $students->where('date_of_birth', '<=', request('end_date'));
            }
            $students = $students->get();
        } else {
            $students = Student::all();
        }
        $groups = Group::all();
        return view('students.index', compact('students', 'groups'));
    }

    public function create()
    {
        $student = null;
        $groups = Group::all();
        return view('students.form', compact('groups','student'));
    }

    public function store(StudentRequest $request)
    {
        $data = $request->validated();
        $student = Student::create($data);

        return redirect()->route('students.index')->with('success', trans('common.success_message.student.create'));
    }

    public function edit($id)
    {
        if(!$student = Student::find($id)){
            return redirect()->route('students.index')->with('error', trans('common.error_message.student.not_found'));
        }
        $groups = Group::all();
        return view('students.form', compact('groups','student'));
    }

    public function update($id, StudentRequest $request)
    {
        if(!$student = Student::find($id)){
            return redirect()->route('students.index')->with('error', trans('common.error_message.student.not_found'));
        }
        $data = $request->validated();
        $student->fill($data)->save();
        return redirect()->route('students.index')->with('success', trans('common.success_message.student.update'));
    }

    public function delete($id)
    {
        if(!$student = Student::find($id)){
            return redirect()->route('students.index')->with('error', trans('common.error_message.student.not_found'));
        }

        $student->delete();
        return redirect()->route('students.index')->with('success', trans('common.success_message.student.delete'));
    }
}
