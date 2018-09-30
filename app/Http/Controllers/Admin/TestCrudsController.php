<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;

class TestCrudsController extends Controller
{
    public function index()
    {
        if (! Gate::allows('test_crud_access')) {
            return abort(401);
        }
        return view('admin.test_cruds.index');
    }
}
