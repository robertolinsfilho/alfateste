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


    <table class="table table-striped">
        <tr>
            <th>Nome</th>
            <th>Email</th>
            <th>Contato</th>
            <th>Action</th>

        </tr>
            <tr>
                <td>{{ $contact->name }}</td>
                <td>{{ $contact->email }}</td>
                <td>{{ $contact->contact }}</td>
                <td>
                    <form action="{{ route('contacts.destroy',$contact->id) }}" method="POST">
                        <a class="btn btn-primary" href="{{ route('contacts.edit',$contact->id) }}">Editar</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Deletar</button>
                    </form>
                </td>
            </tr>

    </table>
@endsection
