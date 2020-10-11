<?php

namespace App\Http\Controllers;

use App\Group;
use App\Http\Requests\GroupRequest;


class GroupsController extends Controller
{
    /**
     * return view
     */
    public function index()
    {
        $groups = Group::all();
        return view('groups.index', compact('groups'));
    }

    public function view($id)
    {
        if(!$group = Group::find($id)){
            return redirect()->route('groups.index')->with('error', trans('common.error_message.group.not_found'));
        }
        $students = $group->students;
        return view('groups.view', compact('group', 'students'));
    }

    public function create()
    {
        $group = null;
        return view('groups.form', compact('group'))->with('success',trans('common.success_message.group.create'));
    }

    public function store(GroupRequest $request )
    {
        $data = $request->validated();
        $group = Group::create($data);

        return redirect(route('groups.index'))->with('success', trans('common.success_message.group.create'));
    }

    public function edit($id)
    {
        if(!$group = Group::find($id)){
            return redirect()->route('groups.index')->with('error', trans('common.error_message.group.not_found'));
        }
        return view('groups.form', compact('group'));
    }

    public function update(GroupRequest $request, $id)
    {
        if(!$group = Group::find($id)){
            return redirect()->route('groups.index')->with('error', trans('common.error_message.group.not_found'));
        }
        $data = $request->validated();
        $group->fill($data)->save();
        return redirect(route('groups.index'))->with('success', trans('common.success_message.group.update'));
    }

    public function delete($id)
    {
        if(!$group = Group::find($id)){
            return redirect()->route('groups.index')->with('error', trans('common.error_message.group.not_found'));
        }
        if(!$group->students->isEmpty()){
            return redirect()->route('groups.index')->with('error', trans('common.error_message.group.has_students'));
        }

        $group->delete();
        return redirect(route('groups.index'))->with('success', trans('common.success_message.group.delete'));
    }
}
