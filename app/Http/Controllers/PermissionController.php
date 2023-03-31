<?php

namespace App\Http\Controllers;

use App\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $permission_name = $request->get('name');
        $permissions     = Permission::permission($permission_name)->latest()->paginate(5);

        return view('sistema.permisos.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sistema.permisos.create');
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
            'name' => 'required|string|min:3',
        ]);

        DB::beginTransaction();
        try {
            $data = [
                'name' => trim($request->get('name'))
            ];

            Permission::create($data);
            DB::commit();

            $toastr = Toastr::success('¡La información ha sido registrada con éxito!');
        } catch (\Exception $e) {
            DB::rollBack();
            $toastr = Toastr::warning('Ha ocurrido un error en la solicitud. Código de excepción No. '.$e->getCode());
        }

        return redirect()->route('permisos.create', compact('toastr'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Permissions  $permiso
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permiso)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Permissions  $permiso
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permiso)
    {
        return view('sistema.permisos.edit', compact('permiso'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Permissions  $permiso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permiso)
    {
        $this->validate($request, [
            'name' => 'required|string|min:3',
        ]);
        $data = [
            'name' => trim($request->get('name'))
        ];


        DB::beginTransaction();
        try {
            $permission = Permission::findOrFail($permiso->id);
            $permission->update($data);
            DB::commit();
            $toastr = Toastr::success('¡La información ha sido actualizada con éxito!');
        } catch (\Exception $e) {
            DB::rollBack();
            $toastr = Toastr::warning('Ha ocurrido un error en la solicitud. Código de excepción No. '.$e->getCode());
        }

        return redirect()->route('permisos.index', compact('toastr'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Permissions  $permiso
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permiso)
    {
        //
    }

    public function search(Request $request)
    {
        $search_text = $_GET['query'];
        $permissions = Permission::where('name', 'LIKE', '%'.$search_text.'%')->get();
    }
}
