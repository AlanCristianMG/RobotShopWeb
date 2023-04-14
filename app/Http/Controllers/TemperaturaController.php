<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\temperatura;
use App\Http\Requests\StoretemperaturaRequest;
use App\Http\Requests\UpdatetemperaturaRequest;
use Illuminate\Http\Request;

class TemperaturaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $temperatura = new temperatura();
        $temperatura->temperatura = $request->temperatura;
        date_default_timezone_set("America/Mexico_City");
        $temperatura->hora = date("H:i:s");
        $temperatura->save();
        
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function comprobarBD(){
        $sql = 'SELECT * FROM temperaturas';
        $datos = DB::select($sql);
        if ($datos!=NULL) {
            return true;
        }else{
            return false;
        }
    }
    public function datos(Request $request)
    {
        $ultimosRegistros = DB::table('temperaturas')
                        ->latest()
                        ->limit(10)
                        ->get();

    return response()->json($ultimosRegistros);
        // $datos = temperatura::all();
        // return $datos;
        //Esta función nos devolvera todas las temperaturas que tenemos en nuestra BD
    }
    public function datosMovil(Request $request)
    {
        $ultimosRegistros = DB::table('temperaturas')
                        ->latest()
                        ->limit(5)
                        ->get();

        return response()->json($ultimosRegistros);
        // $datos = temperatura::all();
        // return $datos;
        //Esta función nos devolvera todas las temperaturas que tenemos en nuestra BD
    }
    public function temperaturaGrafica()
    {
        $sql = 'SELECT * FROM temperaturas ORDER BY hora ASC LIMIT 10 ';
        $datos= DB::select($sql);
        $data = [];
        foreach ($datos as $dato) {
            $data['label'][] = $dato->hora;
            $data['data'][] = $dato->temperatura;
        }
        $data['data'] = json_encode($data);
        return view('pages.dashboard',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoretemperaturaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(temperatura $temperatura)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(temperatura $temperatura)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatetemperaturaRequest $request, temperatura $temperatura)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(temperatura $temperatura)
    {
        //
    }
}
