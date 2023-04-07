<?php

    use App\Http\Controllers\CareerController;
    use App\Http\Controllers\ImportExportExcelController;
    use App\Http\Controllers\PermissionController;
    use App\Http\Controllers\QuestionController;
    use App\Http\Controllers\QuestionnaireController;
    use App\Http\Controllers\RoleController;
    use App\Http\Controllers\UserController;
    use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('home');

Route::get('/pdf', [App\Http\Controllers\HomeController::class, 'generar_pdf'])
    ->middleware(['auth', 'verified'])
    ->name('descargar-pdf');

Route::get('/excel/export-students', [ImportExportExcelController::class, 'export_students'])->name('export_students');
Route::get('/excel/export_questionnaires', [ImportExportExcelController::class, 'export_questionnaires'])->name('export_questionnaires');

#Ruta para usuarios administrativos del sistema.
Route::group(['prefix'=>'admin', 'middleware' => ['auth', 'verified', 'role:Super-Admin|Administrador']],
    function(){
    #Roles/Perfiles de usuario
    Route::resource('/sistema/roles', RoleController::class)
        ->names('roles');
    Route::get('/sistema/roles/{role}/permissions', [RoleController::class,'role_permission'])
        ->name('roles.permissions');
    Route::match(['put', 'patch'], '/sistema/roles/{role}/permissions',
                 [RoleController::class,'role_permission_update'])
        ->name('roles.updatePermissions');

    #Permisos de acceso
    Route::resource('/sistema/permisos', PermissionController::class)
        ->names('permisos');
    Route::get('/sistema/permisos/search', [PermissionController::class, 'search'])
        ->name('permisos.search');

    #Usuarios
    Route::resource('/sistema/usuarios', UserController::class)
        ->names('usuarios');
    Route::get('/sistema/usuarios/{usuario}/profile', [UserController::class, 'profile'])
        ->name('usuarios.perfil');
    Route::match(['put', 'patch'], '/sistema/usuarios', [UserController::class, 'updateProfile'])
        ->name('usuarios.updateProfile');

    Route::resource('/programas',CareerController::class)->names('pregrado');
});

#Ruta para usuarios docentes del sistema
Route::group(['prefix'=>'modules', 'middleware' => ['auth', 'verified', 'role:Docente']], function(){
    Route::resource('/preguntas',QuestionController::class);
});

#Ruta para usuarios estudiantes del sistema.
Route::group(['prefix' => 'student', 'middleware' => ['auth', 'verified', 'role:Estudiante']], function() {
    Route::get('/{usuario}/profile', [UserController::class, 'profile'])
        ->name('estudiante.perfil');
    Route::get('cuestionario', [QuestionnaireController::class, 'create'])->name('cuestionario.create');
    Route::post('cuestionario', [QuestionnaireController::class, 'store'])->name('cuestionario.store');
});
