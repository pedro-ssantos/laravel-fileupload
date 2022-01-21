@extends('pacientes.layout')

@section('content')
    <div class="row" style="margin-top: 5rem;">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Pacientes</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('pacientes.create') }}"> Criar novo Paciente</a>
                <a class="btn btn-secondary" href="/pacientes/import"> Importar Arquivo</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>Nome</th>
            <th>Idade</th>
            <th>Telefone</th>
            <th>Matrícula</th>
            <th width="280px">Ação</th>
        </tr>
        @foreach ($data as $paciente)
        <tr>
            <td>{{ $paciente->nome }}</td>
            <td>{{ $paciente->idade }}</td>
            <td>{{ $paciente->telefone }}</td>
            <td>{{ $paciente->matricula }}</td>
            <td>
                <form action="{{ route('pacientes.destroy',$paciente->id) }}" method="POST">
                    <a class="btn btn-primary" href="{{ route('pacientes.edit',$paciente->id) }}">Editar</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Arquivar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    {!! $data->links() !!}
@endsection
