<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Paciente::latest()->paginate(5);

        return view('pacientes.index', compact('data'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pacientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = request()->validate([
            'nome' => 'required',
            'idade' => 'required|integer',
            'telefone' => 'required',
            'matricula' => 'required'
        ]);

        $paciente = Paciente::create($attributes);

        return redirect()->route('pacientes.index')
            ->with('success', 'Paciente criado com sucesso.');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function edit(Paciente $paciente)
    {
        return view('pacientes.edit', compact('paciente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Paciente $paciente)
    {
        $attributes = request()->validate([
            'nome' => 'required',
            'idade' => 'required|integer',
            'telefone' => 'required',
            'matricula' => 'required'
        ]);

        $paciente->update($attributes);

        return redirect()->route('pacientes.index')
            ->with('success', 'Paciente atualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paciente $paciente)
    {
        $paciente->delete();

        return redirect()->route('pacientes.index')
            ->with('success', 'Paciente arquivado.');
    }

    public function file()
    {
        return view('pacientes.file');
    }
}
