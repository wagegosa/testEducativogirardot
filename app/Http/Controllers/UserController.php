<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Toastr;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use function PHPUnit\Framework\returnArgument;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filter = trim($request->get('name'));
       #Lista todos los usuarios; excepto con rol 'Super-Admin' y el actualmente conectado.
        $users = User::with('roles')
                    ->whereHas('roles', function($query) {
                        $query->where('name', '!=', 'Super-Admin');
                    })
                    ->where('id', '!=', Auth::id())
                    ->name($filter)
                    ->paginate(5);

        return view('sistema.usuarios.index', compact('users', 'filter'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all()->whereNotIn('id', [1])->pluck('name', 'name');

        return view('sistema.usuarios.create', compact('roles'));
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
            'name'     => 'required|string|min:3',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles'    => 'required'
        ]);

        DB::beginTransaction();
        try {
            $input = $request->all();
            $input['password'] = Hash::make($input['password']);
            $user = User::create($input);
            $user->assignRole($request->input('roles'));
            DB::commit();
            $toastr = Toastr::success('¡La información ha sido registrada con éxito!');
        } catch (\Exception $e) {
            DB::rollBack();
            $toastr = Toastr::warning('Ha ocurrido un error en la solicitud - Código de excepción No. '.$e->getCode());
        }

        return redirect()->route('usuarios.index', compact('toastr'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $usuario)
    {
        $pemissionsRoleUser = $usuario->getAllPermissions();

        $toastr = Toastr::info('Detalles del usuario '.$usuario->name);

        return view('sistema.usuarios.show', compact('usuario', 'pemissionsRoleUser', 'toastr'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $usuario)
    {
        $roles    = Role::all()->whereNotIn('id', [1])->pluck('name', 'name');
        $userRole = $usuario->roles()->pluck('name', 'name')->all();
        #return response()->json(['user' => $usuario, 'role' => $roles, 'user role' => $userRole]);

        return view('sistema.usuarios.edit', compact('usuario', 'roles', 'userRole'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $usuario)
    {
        $this->validate($request, [
            'name'     => 'required|string|min:3',
            'email'    => 'required|email|unique:users,email'.$usuario,
            'password' => 'same:confirm-password',
            'roles.*'  => 'required'
        ]);

        $input = $request->all();
        if ( !empty($input['password']) ) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input = Arr::except($input['password']);
        }

        $user = User::find($usuario);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id', $usuario)->delete();
        $user->assignRole($request->input('roles'));

        return redirect()->route('usuarios.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $usuario)
    {
        User::find($usuario)->delete();

        return redirect()->route('usuarios.index');
    }

    public function profile(User $usuario)
    {
        $pemissionsRoleUser = $usuario->getAllPermissions();
        return view('sistema.usuarios.profile', compact('usuario', 'pemissionsRoleUser'));
    }

    public function updateProfile(Request $request, User $usuario)
    {

    }
}
