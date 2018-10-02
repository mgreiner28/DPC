<?php

namespace App\Http\Controllers\Admin;

use App\TestChild;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreTestChildrenRequest;
use App\Http\Requests\Admin\UpdateTestChildrenRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

class TestChildrenController extends Controller
{
    /**
     * Display a listing of TestChild.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('test_child_access')) {
            return abort(401);
        }
        if ($filterBy = Input::get('filter')) {
            if ($filterBy == 'all') {
                Session::put('TestChild.filter', 'all');
            } elseif ($filterBy == 'my') {
                Session::put('TestChild.filter', 'my');
            }
        }

        if (request('show_deleted') == 1) {
            if (! Gate::allows('test_child_delete')) {
                return abort(401);
            }
            $test_children = TestChild::onlyTrashed()->get();
        } else {
            $test_children = TestChild::all();
        }

        return view('admin.test_children.index', compact('test_children'));
    }

    /**
     * Show the form for creating new TestChild.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('test_child_create')) {
            return abort(401);
        }
        
        $created_bies = \App\User::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');
        $created_by_teams = \App\Team::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');

        return view('admin.test_children.create', compact('created_bies', 'created_by_teams'));
    }

    /**
     * Store a newly created TestChild in storage.
     *
     * @param  \App\Http\Requests\StoreTestChildrenRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTestChildrenRequest $request)
    {
        if (! Gate::allows('test_child_create')) {
            return abort(401);
        }
        $test_child = TestChild::create($request->all());



        return redirect()->route('admin.test_children.index');
    }


    /**
     * Show the form for editing TestChild.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('test_child_edit')) {
            return abort(401);
        }
        
        $created_bies = \App\User::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');
        $created_by_teams = \App\Team::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');

        $test_child = TestChild::findOrFail($id);

        return view('admin.test_children.edit', compact('test_child', 'created_bies', 'created_by_teams'));
    }

    /**
     * Update TestChild in storage.
     *
     * @param  \App\Http\Requests\UpdateTestChildrenRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTestChildrenRequest $request, $id)
    {
        if (! Gate::allows('test_child_edit')) {
            return abort(401);
        }
        $test_child = TestChild::findOrFail($id);
        $test_child->update($request->all());



        return redirect()->route('admin.test_children.index');
    }


    /**
     * Display TestChild.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('test_child_view')) {
            return abort(401);
        }
        $test_child = TestChild::findOrFail($id);

        return view('admin.test_children.show', compact('test_child'));
    }


    /**
     * Remove TestChild from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('test_child_delete')) {
            return abort(401);
        }
        $test_child = TestChild::findOrFail($id);
        $test_child->delete();

        return redirect()->route('admin.test_children.index');
    }

    /**
     * Delete all selected TestChild at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('test_child_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = TestChild::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore TestChild from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('test_child_delete')) {
            return abort(401);
        }
        $test_child = TestChild::onlyTrashed()->findOrFail($id);
        $test_child->restore();

        return redirect()->route('admin.test_children.index');
    }

    /**
     * Permanently delete TestChild from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('test_child_delete')) {
            return abort(401);
        }
        $test_child = TestChild::onlyTrashed()->findOrFail($id);
        $test_child->forceDelete();

        return redirect()->route('admin.test_children.index');
    }
}
