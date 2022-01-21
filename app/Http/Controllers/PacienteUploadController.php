<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;

class PacienteUploadController extends Controller
{
    public function index()
    {
        return view('pacientes.file');
    }

    public function store()
    {
        request()->validate([
            'file' => 'required|file'
        ]);

        $file = request()->file('file')->get();

        $lines = collect($file)->map(function ($item) {
            return explode("\r\n", $item);
        })[0];

        foreach ($lines as $line) {
            $data = explode("\t", $line);

            Paciente::create([
                'nome' => $data[0],
                'idade' => $data[1],
                'telefone' => $data[2],
                'matricula' => $data[3],
            ]);
        }

        return redirect()->route('pacientes.index')
            ->with('success', 'Arquivo importado com sucesso.');
    }
}
