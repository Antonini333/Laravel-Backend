<?php

use App\Http\Controllers\AppointmentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy bruilding your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//ADMIN
Route::group(['middleware' => ['role']], function () {

Route::get('Appointment', [AppointmentController::class,'indexAll']); // HEROKU CHECKED -> Muestra todos las citas de todos los usuarios (GET /api/Appointment)
Route::get('users', [UserController::class,'index']);  // HEROKU CHECKED -> Muestra todos los usuarios registrados (GET /api/users)

});

//LOGIN-REGISTER-LOGOUT
Route::post('register', [UserController::class,'store']); // HEROKU CHECKED -> Registra usuario en la base de datos (POST /api/register)
Route::post('login', [UserController::class,'login'])->name('login'); // HEROKU CHECKED -> Brinda nuevo token al usuario (POST /api/login)
Route::get('logout', [UserController::class,'logout'])->name('logout')->middleware('auth:api'); // HEROKU CHECKED -> Destruye el token del usuario (GET /api/logout)


//APPOINTMENTS
Route::post('Appointment', [AppointmentController::class,'store'])->middleware('auth:api'); // HEROKU CHECKED -> Crea cita enlazada al usuario del token a través de la columna "user_id" (POST /api/Appointment)
Route::delete('Appointment/{id}', [AppointmentController::class,'destroy'])->middleware('auth:api'); // HEROKU CHECKED -> Elimina cita de la DB usando su id (DELETE api/Appointment/{id})
Route::get('Appointment/show', [AppointmentController::class,'index'])->middleware('auth:api'); // HEROKU CHECKED -> Muestra las citas enlazadas al usuario logueado (GET /api/Appointment/show)


Route::group(['middleware' => ['role:1']], function () {

    Route::get('Appointment', [AppointmentController::class,'indexAll']); // HEROKU CHECKED -> Muestra todos las citas de todos los usuarios (GET /api/Appointment)
Route::get('users', [UserController::class,'index']);  // HEROKU CHECKED -> Muestra todos los usuarios registrados (GET /api/users)

});