@extends('pacientes.layout')

@section('content')
<div class="row" style="margin-top: 5rem;">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Importar arquivo com Pacientes</h2>
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

<form action="/pacientes/import" method="POST" enctype="multipart/form-data">
    @csrf

     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Arquivo:</strong>
                <input type="file" name="file" class="form-control" placeholder="Importar arquivo Txt">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Pronto</button>
        </div>
    </div>

</form>
@endsection
