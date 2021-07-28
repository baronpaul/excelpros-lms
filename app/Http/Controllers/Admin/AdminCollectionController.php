<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\URL;

use Carbon\Carbon;

use Session;

use App\Collection;

use App\Question;

class AdminCollectionController extends Controller
{
    
    protected $redirectTo = '/admin/login';
    
    
    public function __construct()
    {
        $this->middleware('admin.auth:admin');
    }
    
    public function index()
    {
        $collections = Collection::all();

        return view('admin.collection.index')
        ->with('collection', $collection);
    }

    
    public function create()
    {
        return view('admin.collections.create');
    }

    
    public function store(Request $request)
    {
        $collection = new Collection;
        $collection->collection_title = $request->collection_title;
        $collection->save();

        Session::flash('success', 'You have successfully added a collection');

        return redirect()->route('admin.collections.index');
    }


    
    public function edit($id)
    {
        $collection = Collection::where('collection_id', $id)->first();

        return view('admin.collecitons.edit')
        ->with('collection', $collection);
    }

    
    public function update(Request $request)
    {
        $collection_id = $request->collection_id;
        $collection = Collection::where('collection_id', $collection_id)->first();
        $collection->collection_title = $request->collection_title;
        $collection->save();

        Session::flash('success', 'You have successfully updated a collection');

        return redirect()->route('admin.collections.index');
    }

    
    public function destroy($id)
    {
        //
    }
}
