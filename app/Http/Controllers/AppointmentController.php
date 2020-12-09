<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;


class AppointmentController extends Controller
{
    
    public function indexAll()
    {
        return Appointment::all();
    }

    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     try {
        $user = Auth::user();
        $appointments = Appointment::where('user_id', '=', $user->id)->get();
        return response()->json($appointments, 208);
    } catch (\Exception $e) {
        return response()->json($e, 400);
    }
}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
        $input=$request->all();

        $rules=[
            'date' => 'required|min:10',
            'hour' => 'required',
            'symptoms' => 'required'
        ];

        $messages=[
            'date.required' => 'No has introducido una fecha',
            'date.min' => 'El formato de fecha debe ser YYYY-MM-DD',
            'hour.required' => 'Escoge una hora para la cita',
            'symptoms.required' => 'No has introducido ningún síntoma'
        ];

        $validator = Validator::make($input,$rules,$messages);

        if ($validator->fails()) {
            return response()->json([$validator->errors()],400);
        }

        $user = Auth::user();
        $appointment = new Appointment($input);
        $appointment->user_id = $user->id;
        $appointment->save();
        return response()->json($appointment, 201);
        } catch (\Exception $e) {
            return response()->json($e, 400);
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show(Appointment $appointment)
    {
        //
    }

    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Appointment $appointment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     *  @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        try {
            $deleted = Appointment::whereId($id)->delete();
            if ($deleted)
                return response()->json(['message' => 'Appointment deleted succesfully.'], 200);
            else
                return response()->json(['message' => 'Nothing to delete.'], 200);
        } catch (\Exception $e) {
            return response()->json($e, 400);
        }
    }        
}