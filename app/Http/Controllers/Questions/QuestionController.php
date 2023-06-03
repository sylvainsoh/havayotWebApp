<?php

namespace App\Http\Controllers\Questions;

use App\Http\Controllers\Controller;
use App\Http\Requests\QuestionsFormRequest;
use App\Models\Question;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

class QuestionController extends Controller
{

    /**
     * Display a listing of the questions.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $questions = Question::paginate(25);

        return view('questions.questions.index', compact('questions'));
    }

    /**
     * Show the form for creating a new question.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {


        return view('questions.questions.create');
    }

    /**
     * Store a new question in the storage.
     *
     * @param QuestionsFormRequest $request
     *
     * @return RedirectResponse
     */
    public function store(QuestionsFormRequest $request)
    {
        try {

            $data = $request->getData();

            Question::create($data);

            return redirect()->route('questions.question.index')
                ->with('success_message', trans('questions.model_was_added'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('questions.unexpected_error')]);
        }
    }

    /**
     * Display the specified question.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $question = Question::findOrFail($id);

        return view('questions.questions.show', compact('question'));
    }

    /**
     * Show the form for editing the specified question.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $question = Question::findOrFail($id);


        return view('questions.questions.edit', compact('question'));
    }

    /**
     * Update the specified question in the storage.
     *
     * @param int $id
     * @param App\Http\Requests\QuestionsFormRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse | Redirector
     */
    public function update($id, QuestionsFormRequest $request)
    {
        try {

            $data = $request->getData();

            $question = Question::findOrFail($id);
            $question->update($data);

            return redirect()->route('questions.question.index')
                ->with('success_message', trans('questions.model_was_updated'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('questions.unexpected_error')]);
        }
    }

    /**
     * Remove the specified question from the storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse | Redirector
     */
    public function destroy($id)
    {
        try {
            $question = Question::findOrFail($id);
            $question->delete();

            return redirect()->route('questions.question.index')
                ->with('success_message', trans('questions.model_was_deleted'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('questions.unexpected_error')]);
        }
    }



}
