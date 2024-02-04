@extends('contacts.layout')

@section('content')
    <div class="row">
        <nav class="navbar navbar-light bg-light">
            <div class="container-fluid">
                <span class="navbar-brand mb-0 h1">AlfaSoft</span>
                <span class="navbar-brand mb-0 h1"><a class="btn btn-success" href="{{ route('contacts.create') }}"> Criar novo Contato</a></span>
            </div>
        </nav>
    </div>

    @if ($message = Session::get('success'))
        <div style="margin-top:3%" class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    @if ($message = Session::get('error'))
        <div style="margin-top:3%" class="alert alert-danger">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-striped">
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Contato</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($contacts as $contact)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $contact->name }}</td>
                <td>{{ $contact->email }}</td>
                <td>{{ $contact->contact }}</td>
                <td>
                    <form action="{{ route('contacts.destroy',$contact->id) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('contacts.show',$contact->id) }}">Show</a>

                        <a class="btn btn-primary" href="{{ route('contacts.edit',$contact->id) }}">Editar</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Deletar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $contacts->links() !!}

@endsection
