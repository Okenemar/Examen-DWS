<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mensaje;

class MensajeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Mensaje::create([
            'mensaje' => $request->input('mensaje'),
            'nombre' => $request->input('nombre'),
            'edad' => $request->input('edad')
            
        ]);

        return redirect()->route('mensajes');
    }
    /**
     * Display the specified resource.
     */
    public function show(Mensaje $mensajes)
    {
        $mensajes = Mensaje::all(); // Obtener todos los mensajes de la base de datos

        return view('mensajes', ['mensajes' => $mensajes]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mensaje $mensaje)
    {
        return view('edit', compact('mensaje'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'mensaje' => 'required|string', // Otras reglas de validación según sea necesario
            'nombre' => 'required|string',
            'edad' => 'required|integer'
        ]);
    
        $mensaje = Mensaje::where('id', $request->input('mensaje_id'))->first();
    
        $mensaje->update([
            'mensaje' => $request->input('mensaje'),
            'nombre' => $request->input('nombre'),
            'edad' => $request->input('edad')
        ]);
    
        return redirect()->route('mensajes');
    }
    
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mensaje $mensaje)
    {
        $mensaje->delete();

        return redirect()->route('mensajes');
    }
}
