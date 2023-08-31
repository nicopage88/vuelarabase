<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fecha;

class ModalController extends Controller
{
    public function index()
    {
        $fechas = Fecha::all();
        return view('modal',compact('fechas'));
    }

    public function guardarFecha(Request $request)
    {
        $request->validate([
            'fecha' => 'required|date|after:today',
        ]);

        Fecha::create([
            'fecha' => $request->fecha,
        ]);

        return redirect('/modal')->with('success', 'Fecha guardada correctamente');
    }
}
