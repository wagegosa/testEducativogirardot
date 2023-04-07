<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;'); // Desactivamos la revisión de claves foráneas.

        DB::table('permissions')->truncate(); // Eliminamos los registros en la tabla.
        DB::table('role_has_permissions')->truncate(); // Eliminamos los registros en la tabla.

        $permissions = [
            'usuarios-listar',
            'cuestionarios-crear',
            'cuestionarios-editar',
            'cuestionarios-listar',
            'permisos-crear',
            'permisos-editar',
            'permisos-eliminar',
            'permisos-listar',
            'preguntas-crear',
            'preguntas-editar',
            'preguntas-eliminar',
            'preguntas-listar',
            'respuestas-crear',
            'respuestas-editar',
            'respuestas-eliminar',
            'respuestas-listar',
            'roles-crear',
            'roles-editar',
            'roles-eliminar',
            'roles-listar',
            'usuarios-activar',
            'usuarios-cambiar-contraseña',
            'usuarios-crear',
            'usuarios-editar',
            'usuarios-eliminar',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        DB::statement('SET FOREIGN_KEY_CHECKS = 1;'); // Reactivamos la revisión de claves foráneas.
    }
}
