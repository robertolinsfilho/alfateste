@extends('contacts.layout')

@section('content')
    <div class="row">
        <nav class="navbar navbar-light bg-light">
            <div class="container-fluid">
                <span class="navbar-brand mb-0 h1">Editar Contato</span>
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

    <form action="{{ route('contacts.update',$contact->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 mt-1">
                <div class="form-group">
                    <label  class="form-label">Nome</label>
                    <input type="text" name="name" value="{{ $contact->name }}" class="form-control" placeholder="Nome">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-1">
                <div class="form-group">
                    <label  class="form-label">Email</label>
                    <input class="form-control"  name="email" value="{{ $contact->email }}" placeholder="Email">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-1">
                <div class="form-group">
                    <label  class="form-label">Contato</label>
                    <input class="form-control"  name="contact"  value="{{ $contact->contact }}" placeholder="Contato">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 mt-5 text-center">
                <button type="submit" id="btn-editar" class="btn btn-lg">Editar</button>
            </div>

        </div>

    </form>
@endsection
