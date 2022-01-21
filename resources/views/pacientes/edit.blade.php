@extends('pacientes.layout')

@section('content')
    <div class="row" style="margin-top: 5rem;">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Editar Paciente</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('pacientes.index') }}"> Voltar</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Ooops!</strong> Verifique as informações.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pacientes.update',$paciente->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nome:</strong>
                    <input type="text" name="nome" class="form-control" placeholder="Nome e Sobrenome" value="{{ $paciente->nome }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Idade:</strong>
                    <input type="text" name="idade" class="form-control" placeholder="Digite a Idade do Paciente" value="{{ $paciente->idade }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Telefone:</strong>
                    <input type="text" name="telefone" class="form-control" placeholder="(xx) xxxxx-xxxx" value="{{ $paciente->telefone }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Matrícula:</strong>
                    <input type="text" name="matricula" class="form-control" placeholder="Matrícua" value="{{ $paciente->matricula }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Pronto</button>
            </div>
        </div>

    </form>
@endsection
