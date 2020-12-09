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
Route::get('Appointment', [AppointmentController::class,'indexAll']); // FUNCIONA -> Muestra todos las citas de todos los usuarios (GET /api/Appointment)
Route::apiResource('users', UserController::class);  // FUNCIONA -> Muestra todos los usuarios registrados (GET /api/users)


//LOGIN-REGISTER-LOGOUT
Route::post('register', [UserController::class,'store']); // FUNCIONA -> Registra usuario en la base de datos (POST /api/register)
Route::post('login', [UserController::class,'login'])->name('login'); // FUNCIONA -> Brinda nuevo token al usuario (POST /api/login)
Route::get('logout', [UserController::class,'logout'])->name('logout')->middleware('auth:api'); // FUNCIONA -> Destruye el token del usuario (GET /api/logout)


//APPOINTMENTS
Route::post('Appointment', [AppointmentController::class,'store'])->middleware('auth:api'); // FUNCIONA -> Crea cita enlazada al usuario del token a través de la columna "user_id" (POST /api/Appointment)
Route::delete('Appointment/{id}', [AppointmentController::class,'destroy'])->middleware('auth:api'); // FUNCIONA -> Elimina cita de la DB usando su id (DELETE api/Appointment/{id})
Route::get('Appointment/show', [AppointmentController::class,'index'])->middleware('auth:api'); // FUNCIONA -> Muestra las citas enlazadas al usuario logueado (GET /api/Appointment/show)
