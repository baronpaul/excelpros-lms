<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\URL;

use Carbon\Carbon;

use Session;

use Purifier;

use Image;

use App\Question;

use App\Collection;

class AdminQuestionsController extends Controller
{
    
    
protected $redirectTo = '/admin/login';


public function __construct()
{
    $this->middleware('admin.auth:admin');
}

public function index()
{
    $questions = Question::join('collections', 'collections.collection_id', '=', 'questions.collection_id')
    ->orderBy('questions.question_id', 'DESC')
    ->paginate(25);

    //$collections = Collection::join('training_programs', 'training_programs.program_id', '=', 'collections.program_id')->get();
    $collections = Collection::all();

    return view('admin.questions.index')
    ->with('collections', $collections)
    ->with('questions', $questions);
}


public function collection($id) {
    $questions = Question::join('collections', 'collections.collection_id', '=', 'questions.collection_id')
    ->where('collections.collection_id', '=', $id)
    ->orderBy('questions.question_id', 'DESC')
    ->get();

    /*
    $collection = Collection::join('training_programs', 'training_programs.program_id', '=', 'collections.program_id')
    ->where('collections.collection_id', '=', $id)->first();
    */
    $collection = Collection::where('collection_id', $id)->first();

    return view('admin.questions.collection')
    ->with('questions', $questions)
    ->with('collection', $collection);
}


public function create($id)
{
    $collections = Collection::orderBy('collection_id', 'DESC')->get();
    $collection = Collection::where('collection_id', $id)->first();

    return view('admin.questions.create')
    ->with('collection', $collection);
}


public function store(Request $request)
{
    $this->validate($request, [
        'collection_id' => 'required',
        'question_name' => 'required',
    ]);

    $question = new Question;
    $question->collection_id = $request->collection_id;
    $question->question_name = Purifier::clean($request->question_name);
    $question->answer1 = $request->answer1;
    $question->answer2 = $request->answer2;
    $question->answer3 = $request->answer3;
    $question->answer4 = $request->answer4;
    $question->answer5 = $request->answer5;
    $question->correct = $request->correct;
    $question->max_point = $request->max_point;
    if($request->hasFile('question_image')) {
        $file = $request->question_image;
        $newImageName = 'uploads/'.time().$file->getClientOriginalName();
        $img = Image::make($file)->orientate()->save($newImageName, 60);
        $question->question_image = $newImageName;
    }
    $question->save();

    Session::flash('success', 'You have successfully added a question');

    return redirect()->route('admin.questions.collection', ['collection_id' => $request->collection_id]);
}


public function view($id)
{
    $question = Question::join('collections', 'collections.collection_id', '=', 'questions.collection_id')
    ->where('questions.question_id', '=', $id)->first();

    return view('admin.questions.view')
    ->with('question', $question);
}


public function edit($id)
{
    $collections = Collection::all();
    $question = Question::where('question_id', $id)->first();

    return view('admin.questions.edit')
    ->with('collections', $collections)
    ->with('question', $question);
}


public function update(Request $request)
{
    $question_id = $request->question_id;

    $question = Question::where('question_id', $question_id)->first();
    $question->collection_id = $request->collection_id;
    $question->question_name = Purifier::clean($request->question_name);
    $question->answer1 = $request->answer1;
    $question->answer2 = $request->answer2;
    $question->answer3 = $request->answer3;
    $question->answer4 = $request->answer4;
    $question->answer5 = $request->answer5;
    $question->correct = $request->correct;
    $question->max_point = $request->max_point;
    if($request->hasFile('question_image')) {
        $file = $request->question_image;
        $newImageName = 'uploads/'.time().$file->getClientOriginalName();
        $img = Image::make($file)->orientate()->save($newImageName, 75);
        $question->question_image = $newImageName;
    }
    $question->save();

    Session::flash('success', 'You have successfully updated a question');

    return redirect()->route('admin.questions.index');
}


public function delete($id) {
    $question = Question::where('question_id', $id)->first();

    return view('admin.questions.delete')->with('question', $question);
}


public function destroy(Request $request, $id)
{
    $question = Question::where('question_id', $id)->first();
    $question->delete();

    Session::flash('success', 'You have successfully deleted a question');
    return redirect()->route('admin.questions.index');
}


}
