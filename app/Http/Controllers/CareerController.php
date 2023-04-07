<?php

namespace App\Http\Controllers;

use App\Models\Career;
use App\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CareerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $careers = Career::orderBy('id', 'desc')->paginate(5);
        return view('programas.index', compact('careers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('programas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['career' => 'required|string|min:3']);

        DB::beginTransaction();
        try {
            $data = [
                'career' => $request->get('career')
            ];
            Career::create($data);
            DB::commit();

            $toastr = Toastr::success('¡La información ha sido registrada con éxito!');
        } catch(\PDOException $e) {
            DB::rollBack();
            $toastr = Toastr::warning('Ha ocurrido un error en la solicitud. Código de excepción No. '.$e->getCode());
        }

        return redirect()->route('pregrado.index')->with('toastr');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Career  $career
     * @return \Illuminate\Http\Response
     */
    public function show(Career $career)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Career  $career
     * @return \Illuminate\Http\Response
     */
    public function edit(Career $programa)
    {
        return view('programas.edit', compact('programa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Career  $career
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Career $programa)
    {
        $request->validate(['career' => 'required|string|min:3']);

        DB::beginTransaction();
        try {
            $data = [
                'career' => $request->get('career')
            ];
            Career::findOrFail($programa->id)->update($data);
            DB::commit();

            $toastr = Toastr::success('¡La información ha sido actualizada con éxito!');
        } catch(\PDOException $e) {
            DB::rollBack();
            $toastr = Toastr::warning('Ha ocurrido un error en la solicitud. Código de excepción No. '.$e->getCode());
        }

        return redirect()->route('pregrado.index')->with('toastr');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Career  $career
     * @return \Illuminate\Http\Response
     */
    public function destroy(Career $career)
    {
        //
    }
}
