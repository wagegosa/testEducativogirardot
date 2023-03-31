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
            'usuarios-crear',
            'usuarios-editar',
            'usuarios-eliminar',
            'usuarios-cambiar-contraseña',
            'usuarios-activar',
            'roles-listar',
            'roles-crear',
            'roles-editar',
            'roles-eliminar',
            'permisos-listar',
            'permisos-crear',
            'permisos-editar',
            'permisos-eliminar',
            //'clientes-listar',
            //'clientes-crear',
            //'clientes-editar',
            //'clientes-eliminar',
            //'modalidades-de-pago-listar',
            //'modalidades-de-pago-crear',
            //'modalidades-de-pago-editar',
            //'modalidades-de-pago-eliminar',
            //'tasas-de-interes-listar',
            //'tasas-de-interes-crear',
            //'tasas-de-interes-editar',
            //'tasas-de-interes-eliminar',
            //'tipos-de-gasto-listar',
            //'tipos-de-gasto-crear',
            //'tipos-de-gasto-editar',
            //'tipos-de-gasto-eliminar',
            //'cajas-listar',
            //'cajas-crear',
            //'cajas-editar',
            //'cajas-eliminar',
            //'cajas-cierre-diario',
            //'prestamos-listar',
            //'prestamos-crear',
            //'prestamos-editar',
            //'prestamos-eliminar',
            //'cobros-listar',
            //'cobros-crear',
            //'cobros-editar',
            //'cobros-eliminar',
            //'ingresos-listar',
            //'egresos-listar',
            //'egresos-crear',
            //'egresos-editar',
            //'egresos-eliminar',
            //'reportes-listar',
            //'reportes-libro-ingresos-egresos',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        DB::statement('SET FOREIGN_KEY_CHECKS = 1;'); // Reactivamos la revisión de claves foráneas.
    }
}
