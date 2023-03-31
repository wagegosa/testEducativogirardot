<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use App\Toastr;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use function PHPUnit\Framework\returnArgument;

class QuestionController extends Controller
{
    //function __construct()
    //{
    //    $this->middleware('permission:preguntas-listar|preguntas-crear|preguntas-editar', ['only'=> ['index','store']]);
    //    $this->middleware('permission:preguntas-crear', ['only' => ['create','store']]);
    //    $this->middleware('permission:preguntas-editar', ['only' => ['edit','update']]);
    //    #$this->middleware('permission:role-delete', ['only' => ['destroy']]);
    //}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::where('user_id', Auth::id())->orderBy('id', 'desc')->paginate(5);
        return view('preguntas.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('preguntas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title'       => 'required|string|min:3',
            // 'description' => 'required|min:1|string',
            // 'is_correct'  => 'required'
        ]);

        DB::beginTransaction();
        try {
            // $content = $request->title;

            // $dom = new \DomDocument();
            // $dom->loadHtml($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
            // $imageFile = $dom->getElementsByTagName('img');

            // foreach($imageFile as $item => $image) {
            //     $data              = $image->getAttribute('src');
            //     list($type, $data) = explode(';', $data);
            //     list(, $data)      = explode(',', $data);
            //     $imgeData          = base64_decode($data);
            //     $image_name        = "/img/" . time().$item.'.png';
            //     $path              = public_path() . $image_name;

            //     file_put_contents($path, $imgeData);

            //     $image->removeAttribute('src');
            //     $image->setAttribute('src', $image_name);
            // }

            // $content = $dom->saveHTML();

            $data = [
                'title'   => trim($request->title),
                'value'   => 0,
                'user_id' => Auth::id()
            ];

            $question    = Question::create($data);
            $items       = $request->get('item');
            $description = $request->get('description');
            $cont        = 0;
            foreach ($items as $key => $item)
            {
                $data = [
                    'question_id' => $question->id,
                    'description' => $description[$key],
                    'is_correct'  => ($items[$key] == 1) ? 1 : 0,
                    'user_id'     => Auth::id()
                ];
                Answer::create($data);
                $cont++;
            }
            DB::commit();
            $toastr = Toastr::success('¡La información ha sido registrada con éxito!');
        } catch(\Exception $e) {
            DB::rollBack();
            $toastr = Toastr::error('Ha ocurrido un error en la solicitud. Código de excepción No. '.$e->getMessage());
        }

        return redirect()->back()->with($toastr);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $pregunta)
    {
        $question = $pregunta->id;
        $answers  = Answer::all()->where('question_id', $question);

        return view('preguntas.show', compact('pregunta', 'answers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $pregunta)
    {
        $answers = Answer::with('question')->where('question_id', $pregunta->id)->get();
        #return response()->json(['data' => $questions]);
        return view('preguntas.edit', compact('pregunta', 'answers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $pregunta)
    {
        $this->validate($request, ['title' => 'required|string|min:3']);
        DB::beginTransaction();
        try {
            $question = Question::findOrFail($pregunta->id);
            $data = [
                'title'   => trim($request->get('title')),
                'value'   => 0,
                'user_id' => Auth::id()
            ];
            $question->update($data);

            $items       = $request->get('item');
            $description = $request->get('description');
            $is_correct  = $request->get('is_correct');

            foreach ( $items as $key => $item ) {
                foreach ($is_correct as $k => $value)
                {
                    $value;
                }
                 ;
                $data = [
                    'question_id' => $question->id,
                    'description' => $description[$key],
                    'is_correct'  => ($item == $value) ? '1' : '0',
                    'user_id'     => Auth::id()
                ];
                Answer::findOrFail($item)->update($data);
            }

            DB::commit();
            $toastr = Toastr::success('¡La información ha sido actualizada con éxito!');
        } catch(\Exception $e){
            DB::rollBack();
            $toastr = Toastr::warning('Ha ocurrido un error en la solicitud. Código de excepción No. '.$e->getMessage());
        }

        return redirect()->route('preguntas.show', $pregunta->id)->with($toastr);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $pregunta)
    {
        //
    }
}
