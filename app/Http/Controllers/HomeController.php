<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Rol de usuario.
        $role = Auth::user()->getRoleNames()->first();
        if ($role == 'Estudiante') {
            $student = User::with('career')->where('id', Auth::user()->id)->first();
            $questionnaire = DB::table('questionnaires AS t1')
                            ->join('questions AS t2', 't1.question_id', '=', 't2.id')
                            ->join('learning_styles AS t3', 't2.learning_style_id', '=', 't3.id')
                            ->join('answers AS t4', 't2.id', '=', 't4.id')
                            ->where('t1.student_id', '=', Auth::user()->id)
                            ->groupBy('t3.learning_style')
                            ->select('t3.learning_style', DB::raw('count(t4.description) AS total'))
                            ->get();
            $answers = DB::table('questionnaires AS t1')
                        ->join('questions AS t2', 't1.question_id', '=', 't2.id')
                        ->join('answers AS t3', 't1.answer_id', '=', 't3.id')
                        ->select('t2.title', 't3.description')
                        ->get();

            return view('home', compact('student', 'role', 'questionnaire', 'answers'));
        }

        $users = User::with('career')->whereHas('roles', function($query) {
            $query->where('name', '=', 'Estudiante');
        })->paginate();
        #return response()->json(['data' => $users]);
        return view('home', compact('role', 'users'));
    }

    public function generar_pdf()
    {
        $role = Auth::user()->getRoleNames()->first();

        $student = User::with('career')->where('id', Auth::user()->id)->first();
        $questionnaire = DB::table('questionnaires AS t1')
            ->join('questions AS t2', 't1.question_id', '=', 't2.id')
            ->join('learning_styles AS t3', 't2.learning_style_id', '=', 't3.id')
            ->join('answers AS t4', 't2.id', '=', 't4.id')
            ->where('t1.student_id', '=', Auth::user()->id)
            ->groupBy('t3.learning_style')
            ->select('t3.learning_style', DB::raw('count(t4.description) AS total'))
            ->get();
        $answers = DB::table('questionnaires AS t1')
            ->join('questions AS t2', 't1.question_id', '=', 't2.id')
            ->join('answers AS t3', 't1.answer_id', '=', 't3.id')
            ->select('t2.title', 't3.description')
            ->get();

        #return view('pdf', compact('student', 'role', 'questionnaire', 'answers'));

        $pdf = Pdf::loadview('pdf', compact('student', 'role', 'questionnaire', 'answers'));
        return $pdf->download('estudiante.pdf');
    }
}
