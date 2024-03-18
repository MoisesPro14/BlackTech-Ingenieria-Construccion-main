<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportesController;


Route::get('/', function () {
    return view('welcome');
});



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dash', function () {
        return view('dash.index');
    })->name('dash');
});

//rutas para modulo de configuracion de usuario
Route::get('/NewPassword',  [App\Http\Controllers\UserSettingsControllerController::class, 'NewPassword'])->name('NewPassword')->middleware('auth');
Route::post('/change/password',  [App\Http\Controllers\UserSettingsControllerController::class, 'changePassword'])->name('changePassword');

// rutas para modulo de membresia (roles y permisos)
Route::group(['middleware' => ['auth']], function () {
    Route::resource('roles', App\Http\Controllers\RolController::class);
    Route::resource('usuarios', App\Http\Controllers\UsuarioController::class);
});


//rutas para modulo de mantenimiento
Route::group(['middleware' => ['auth']], function () {
    Route::resource('estados', App\Http\Controllers\EstadosObraController::class);
    Route::resource('categorias', App\Http\Controllers\CategoriasController::class);
    Route::resource('tipos', App\Http\Controllers\TiposController::class);
    Route::resource('marcas', App\Http\Controllers\MarcasController::class);
    Route::resource('catalogos', App\Http\Controllers\CatalogoController::class);
    Route::resource('obras', App\Http\Controllers\ObrasController::class);
    Route::resource('categoriatrabajadores',  App\Http\Controllers\CategoriaTrabajadorController::class);
    Route::resource('trabajador', App\Http\Controllers\TrabajadorController::class);
});

//rutas para gestion de proyectos
Route::group(['middleware' => ['auth']], function () {
    Route::resource('almacen', App\Http\Controllers\AlmacenController::class);
    Route::resource('libretatiempo', App\Http\Controllers\LibretaTiempoController::class);
    Route::resource('entregaproducto', App\Http\Controllers\EntregaProductoController::class);
});

//rutas para reportes graficos
Route::controller(ReportesController::class)->group(function () {

    Route::get('/Reportes/{id}/inicio', 'inicio')->name('reportes.pages.inicio')->middleware('auth');
    Route::get('/Reportes/{id}/inicio/epptrabajador', 'eppTrabajador')->name('epptrabajador')->middleware('auth');
    Route::get('/Reportes/{id}/inicio/horassemana', 'horasSemana')->name('horassemana')->middleware('auth');
    Route::get('/Reportes/{id}/inicio/acumuladohoras', 'acumuladoHoras')->name('acumuladohoras')->middleware('auth');
    Route::get('/Reportes/{id}/inicio/eppsemana', 'eppSemana')->name('eppsemana')->middleware('auth');
    Route::get('/Reportes/{id}/inicio/acumuladoepp', 'acumuladoEpp')->name('acumuladoepp')->middleware('auth');
    Route::get('/Reportes/{id}/inicio/epcsemana', 'epcSemana')->name('epcsemana')->middleware('auth');
    Route::get('/Reportes/{id}/inicio/acumuladoepc', 'acumuladoEpc')->name('acumuladoepc')->middleware('auth');
});

//rutas para cambiar el estado de un trabajador y una categoria ,segun el id
Route::post('cambestadotra/{id}', [App\Http\Controllers\TrabajadorController::class, 'cambiarEstado']);


Route::post('camestadocat/{id}', [App\Http\Controllers\CategoriasController::class, 'cambiarEstado']);

Route::post('camestadousu/{id}', [App\Http\Controllers\UsuarioController::class, 'cambiarEstado']);