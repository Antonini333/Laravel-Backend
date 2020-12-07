<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::all();
        return $users;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input=$request->all();
        $input['password']=bcrypt($input['password']);
        $user = User::create($input);

        return $user;
    }

    public function login(Request $request)
    {
        if(Auth::attempt(['email'=>$request->email, 'password'=>$request->password])){
            $user = Auth::user();
            $token = $user->createToken('Clientes')->accessToken;

            $respuesta=[];
            $respuesta['name']= $user->name;
            $respuesta['phone']= $user->phone;
            $respuesta['address']= $user->address;
            $respuesta['DNI']= $user->DNI;
            $respuesta['age']= $user->age;
            $respuesta['nationality']= $user->nationality;
            $respuesta['role']= $user->role;
            $respuesta['token']= 'Bearer '.$token;
             return response()->json($respuesta,200);
        }else{
            return response()->json(['error' => 'No autenticado'],203);
        }
    }

    public function logout(Request $request)
    {
        $token = $request->user()->token();
        $token ->revoke();

        return response()->json(['User succesfully logged out'],200);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User         $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
