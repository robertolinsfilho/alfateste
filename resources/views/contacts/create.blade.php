@extends('contacts.layout')

@section('content')
    <div class="row">
        <nav class="navbar navbar-light bg-light">
            <div class="container-fluid">
                <span class="navbar-brand mb-0 h1">Adicionar Novo Contato</span>
                <span class="navbar-brand mb-0 h1"><a class="btn btn-primary" href="{{ route('contacts.index') }}"> Voltar</a></span>
            </div>
        </nav>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('contacts.store') }}" method="POST">
        @csrf

        <div style="background-color: darkgrey;border-radius: 10px" class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 mt-1">
                <div class="form-group">
                    <label  class="form-label">Nome</label>
                    <input type="text" name="name" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-1">
                <div class="form-group">
                    <label  class="form-label">Email</label>
                    <input class="form-control" type="email"  name="email" placeholder="Email">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-1">
                <div class="form-group">
                    <label  class="form-label">Contato</label>
                    <input class="form-control" type="text" maxlength="9" name="contact" placeholder="Contato">
                    <div class="form-text">Apenas 9 numeros</div>
                </div>
            </div>


            <div class="col-xs-12 col-sm-12 col-md-12 mt-5 mb-2 text-center">
                <button type="submit" class="btn  btn-primary btn-lg">Criar</button>
            </div>
        </div>

    </form>
@endsection
