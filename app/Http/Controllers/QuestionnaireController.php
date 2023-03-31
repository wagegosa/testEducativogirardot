<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use App\Models\Questionnaire;
use App\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Collection;

class QuestionnaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $questions = Question::with('answers')->take(3)->get();
        return view('cuestionario.create', compact('questions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $questions = $request->get('question_id');
        $answers = $request->get('is_correct');

        #Crea un nuevo array, usando una matriz para las claves y otra para sus valores
        $array_questionnaires = array_combine($questions, $answers);

        DB::beginTransaction();
        try{
            foreach ($array_questionnaires as $key => $value){
                $data = [
                    'student_id' => Auth::id(),
                    'question_id' => $key,
                    'answer_id' => $value
                ];
                Questionnaire::create($data);
                DB::commit();
            }
            $toastr = Toastr::success('¡La información ha sido registrada con éxito!');
        } catch (\Exception $e){
            DB::rollBack();
            $toastr = Toastr::warning('Ha ocurrido un error en la solicitud. Código de excepción No. '.$e->getMessage());
        }


        return redirect()->route('home')->with($toastr);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Questionnaire  $questionnaire
     * @return \Illuminate\Http\Response
     */
    public function show(Questionnaire $questionnaire)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Questionnaire  $questionnaire
     * @return \Illuminate\Http\Response
     */
    public function edit(Questionnaire $questionnaire)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Questionnaire  $questionnaire
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Questionnaire $questionnaire)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Questionnaire  $questionnaire
     * @return \Illuminate\Http\Response
     */
    public function destroy(Questionnaire $questionnaire)
    {
        //
    }
}
