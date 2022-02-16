<?php

namespace App\Http\Controllers;

use App\Models\cita;
use App\Models\Servicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CitaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::id();
        $citas = Cita::where('user_id', $id)->get();
        return view('dashboard', ['citas' => $citas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $servicios = Servicio::all();
        return view('createCita', ['servicios' => $servicios]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //creamos una cita y se guarda en la bd
        $cita = new Cita;
        $cita->fecha = $request->get('fecha');
        $cita->hora = $request->get('hora');
        $cita->observaciones = $request->get('observaciones');
        $cita->user_id = Auth::id();
        $cita->servicio_id = $request->get('servicio');
        $cita->save();

        //Redirigimos al index
        return redirect()->route('citas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\cita  $cita
     * @return \Illuminate\Http\Response
     */
    public function show(cita $cita)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\cita  $cita
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cita = Cita::find($id);
        $servicios = Servicio::all();
        //Sacar las horas libres esa fecha
        $horas = Cita::select('hora')->where('fecha', $cita->fecha)->get();
        $horasTotales = collect(['hora' => 10, 'hora' => 11, 'hora' => 12, 'hora' => 13, 'hora' => 17, 'hora' => 18, 'hora' => 19, 'hora' => 20]);
        $horasLibres = $horasTotales->diffAssoc($horas);
        var_dump($horas);
        return view('editCita', ['cita' => $cita, 'servicios' => $servicios]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\cita  $cita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, cita $cita)
    {
        echo ("actualizando");
        //Redirigimos al index
        //return redirect()->route('citas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\cita  $cita
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cita::destroy($id);
        return redirect()->route('citas.index');
    }
}
