<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserRolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Deshabilita las restricciones de clave externa.
        Schema::disableForeignKeyConstraints();

        // Vacía la tabla por completo antes de crear los registros en la base de datos.
        DB::table('users')->truncate();
        DB::table('roles')->truncate();
        DB::table('model_has_roles')->truncate();

        // Usuario Super-Administrador
        $userSuperAdmin = User::create([
            'name'              => 'John Doe',
            'email'             => 'john.doe@superadmin.com',
            'password'          => bcrypt('user.super.admin'),
            'email_verified_at' => Carbon::now()
        ]);

        // Role Super-Admin
        $roleSuperAdmin = Role::create(['name' => 'Super-Admin']);
        $userSuperAdmin->assignRole('Super-Admin');

        // Asigna permisos al rol Super-Admin
        $permissions = Permission::pluck('id','id')->all();
        $roleSuperAdmin->syncPermissions($permissions);

        // Usuario Administrador
        $userAdmin = User::create([
            'name'              => 'Jane Doe',
            'email'             => 'jane.doe@admin.com',
            'password'          => bcrypt('user.admin'),
            'email_verified_at' => Carbon::now()
        ]);

        // Role Administrador
        $roleAdmin = Role::create(['name' => 'Administrador']);
        $userAdmin->assignRole('Administrador');

        // Usuario Supervisor
        $userSupervisor = User::create([
            'name'              => 'Richard Roe',
            'email'             => 'richard.roe@supervisor.com',
            'password'          => bcrypt('user.supervisor'),
            'email_verified_at' => Carbon::now()
        ]);

        // Role Administrador
        $roleSupervisor = Role::create(['name' => 'Supervisor']);
        $userSupervisor->assignRole('Supervisor');

        // Usuario Docente
        $userDocente = User::create([
            'name'              => 'Gabriela Mistral',
            'email'             => 'gabriela.mistral@docente.com',
            'date_birth'        => '1889-04-07',
            'gender'            => 'female',
            'identity_number'   => '18890407',
            'career_id'         => 6,
            'password'          => bcrypt('user.docente'),
            'email_verified_at' => Carbon::now()
        ]);

        // Role Docente
        $roleDocente = Role::create(['name' => 'Docente']);
        $userDocente->assignRole('Docente');

        // Usuario Estudiante
        $userEstudiante = User::create([
            'name'              => 'Malala Yousafzai',
            'email'             => 'malala@estudiante.com',
            'date_birth'        => '1997-06-12',
            'gender'            => 'female',
            'identity_number'   => '19970612',
            'career_id'         => 6,
            'password'          => bcrypt('user.estudiante'),
            'email_verified_at' => Carbon::now()
        ]);

        // Role Estudiante
        $roleEstudiante = Role::create(['name' => 'Estudiante']);
        $userEstudiante->assignRole('Estudiante');

        // Consulta los permisos
        $permisos = Permission::pluck('id', 'id')->all();
        // Asigna al rol Super-Admin todos los permisos
        $roleSuperAdmin->syncPermissions($permisos);

        // Habilita las restricciones de clave externa.
        Schema::enableForeignKeyConstraints();
    }
}
