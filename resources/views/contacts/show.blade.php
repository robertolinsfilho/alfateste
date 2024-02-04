@extends('contacts.layout')

@section('content')
    <div class="row">
        <nav class="navbar navbar-light bg-light">
            <div class="container-fluid">
                <span class="navbar-brand mb-0 h1">Contato</span>
                <span class="navbar-brand mb-0 h1"><a class="btn btn-primary" href="{{ route('contacts.index') }}"> Voltar</a></span>
            </div>
        </nav>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nome:</strong>
                {{ $contact->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                {{ $contact->email }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Contato:</strong>
                {{ $contact->contact }}
            </div>
        </div>
    </div>


    <table class="table table-striped">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Contact</th>
        </tr>
            <tr>
                <td>{{ $contact->name }}</td>
                <td>{{ $contact->email }}</td>
                <td>{{ $contact->contact }}</td>
            </tr>

    </table>
@endsection
