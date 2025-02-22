<?php
namespace App\Repositories;

use App\Models\Questions;
use App\Models\Quizze;
 

class QuestionsRepository implements QuestionsRepositoryInterface
{
    public function index()
    {

        $questions = Questions::select('id','quizze_id','title','answer','right_answer','score')->latest()->get();
        return view('pages.questions.index_question', compact('questions'));
    }
    public function create()
    {
        $data['quizzes'] = Quizze::select('nameQuizze', 'id')->get();

        return view('pages.questions.create_question', $data);
    }
    public function store($request)
    {
        try {
            Questions::create([
                'title' => $request->title,
                'answer' => $request->answer,
                'right_answer' => $request->right_answer,
                'quizze_id' => $request->quizze_id,
                'score' => $request->score,
            ]);
            toastr()->success('تم الحفظ ' . $request->nameExams);
            return redirect()->route('question.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    public function edit($request)
    {
        $data['Question'] = Questions::findOrFail($request->edit);
         
        $data['quizzes'] = Quizze::select('nameQuizze', 'id')->get();
 
         return view('pages.questions.edit_question', $data );
    }
    public function update($request)
    {

        try {

           $questions = Questions::findOrFail($request->id);

            $questions ->update([
                'title' => $request->title,
                'answer' => $request->answer,
                'right_answer' => $request->right_answer,
                'quizze_id' => $request->quizze_id,
                'score' => $request->score,
            ]);
            toastr()->success('تم التعديل '  );
            return redirect()->route('question.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }
    }
    public function destroy($request)
    {
        try {
            $question = Questions::findOrFail($request->id);
            $question->delete();
            toastr()->error(' تم الخذف ');
            return redirect()->back();

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}