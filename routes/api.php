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

Route::apiResource('Appointment', AppointmentController::class); // FUNCIONA -> Muestra todos las citas de todos los usuarios (GET /api/Appointment)
Route::apiResource('users', UserController::class);  // FUNCIONA -> Muestra todos los usuarios registrados (GET /api/users)


//LOGIN-REGISTER-LOGOUT
Route::post('register', [UserController::class,'store']); // FUNCIONA -> Registra usuario en la base de datos
Route::post('login', [UserController::class,'login'])->name('login'); // FUNCIONA -> Brinda nuevo token al usuario
Route::get('logout', [UserController::class,'logout'])->name('logout')->middleware('auth:api'); // FUNCIONA -> Destruye el token del usuario

//APPOINTMENTS
Route::post('appointment/create', [AppointmentController::class,'store'])/* ->middleware('auth:api') */; 

