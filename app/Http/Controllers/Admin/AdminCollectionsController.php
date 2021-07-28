<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\URL;

use Carbon\Carbon;

use Session;

use App\Question;

use App\Collection;

use App\TrainingProgram;

use App\Course;

class AdminCollectionsController extends Controller
{
    
    protected $redirectTo = '/admin/login';
    
    
    public function __construct()
    {
        $this->middleware('admin.auth:admin');
    }
    
    public function index()
    {
        //$collections = Collection::join('training_programs', 'training_programs.program_id', '=', 'collections.program_id')->get();
        $collections = Collection::all();
        
        return view('admin.collections.index')
        ->with('collections', $collections);
    }


    public function filter($id) {
        /*
        $collections = Collection::join('training_programs', 'training_programs.program_id', '=', 'collections.program_id')
        ->where('training_programs.program_id', '=', $id)
        ->get();
        */
        $collections = Collection::all();

        return view('admin.collections.index')
        ->with('collections', $collections);
    }

    
    public function create()
    {
        $training_programs = TrainingProgram::all();

        return view('admin.collections.create')
        ->with('training_programs', $training_programs);
    }

    
    public function store(Request $request)
    {
        $collection = new Collection;
        //$collection->program_id = $request->program_id;
        $collection->collection_title = $request->collection_title;
        $collection->save();

        Session::flash('success', 'You have successfully added a collection');
        return redirect()->route('admin.collections.index');
    }

    
    public function view($id) {
        $collection = Collection::where('collection_id', $id)->first();
        $questions = Question::where('collection_id', $id)->get();

        return view('admin.collections.view')
        ->with('collection', $collection)
        ->with('questions', $questions);
    }

    public function edit($id)
    {
        $collection = Collection::where('collection_id', $id)->first();
        $training_programs = TrainingProgram::all();

        return view('admin.collections.edit')
        ->with('collection', $collection)
        ->with('training_programs', $training_programs);
    }

    
    public function update(Request $request, $id)
    {
        $collection = Collection::where('collection_id', $id)->first();
        //$collection->program_id = $request->program_id;
        $collection->collection_title = $request->collection_title;
        $collection->save();

        Session::flash('success', 'You have successfully updated the collection');
        return redirect()->route('admin.collections.index');
    }


    public function delete($id) {
        $collection = Collection::where('collection_id', $id)->first();
        return view('admin.collections.delete')
        ->with('collection', $collection);
    }
    
    public function destroy(Request $request, $id)
    {
        $collection = Collection::where('collection_id', $id)->first();
        $questions = Question::where('collection_id', $id)->get();
        foreach($questions as $question) {
            $question->delete();
        }
        $collection->delete();
        Session::flash('success', 'You have successfully deleted the collection');
        return redirect()->route('admin.collections.index');
    }
}
