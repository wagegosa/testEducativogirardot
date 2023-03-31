<?php

namespace App\Http\Controllers;

use App\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = DB::table('roles')->select('id', 'name', 'created_at', 'updated_at')->paginate(5);
        return view('sistema.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $permissions     = Permission::all()->pluck('name', 'id');
        $rolePermissions = DB::table("role_has_permissions")
            ->where("role_id",$role->id)
            ->pluck('permission_id','permission_id')
            ->all();

        return view('sistema.roles.edit', compact('role', 'permissions', 'rolePermissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $this->validate($request, [
            'name' => 'required|min:3',
        ]);

        DB::beginTransaction();
        try {
            $roleUser = Role::findOrFail($role->id);
            $roleUser->update(['name' => trim($request->get('name'))]);
            DB::commit();

            $toastr = Toastr::success('¡La información ha sido actualizada con éxito!');
        } catch (\Exception $e){
            DB::rollBack();
            $toastr = Toastr::warning('Ha ocurrido un error en la solicitud- Código de excepción No. '.$e->getCode());
        }

        return redirect()->route('roles.index', compact('toastr'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        //
    }

    public function role_permission(Role $role)
    {
        $permissions     = Permission::all()->pluck('name', 'id');
        $rolePermissions = DB::table("role_has_permissions")
            ->where("role_id",$role->id)
            ->pluck('permission_id','permission_id')
            ->all();

        return view('sistema.roles.assign-permissions', compact('role', 'permissions', 'rolePermissions'));
    }

    public function role_permission_update(Request $request, Role $role)
    {
        $this->validate($request, [
            'permission' => 'required'
        ]);

        DB::beginTransaction();
        try {
            $roleUser = Role::findOrFail($role->id);
            #Sinronizar múltiples permisos a un rol.
            $roleUser->syncPermissions($request->get('permission'));
            DB::commit();

            $toastr = Toastr::success('¡Los permisos fueron asignados con éxito!');
        } catch (\Exception $e){
            DB::rollBack();
            $toastr = Toastr::warning(
                'Ha ocurrido un error en la solicitud- Código de excepción No. '.
                $e->getCode()
            );
        }

        return redirect()->route('roles.index', compact('toastr'));
    }
}
