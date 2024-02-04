@extends('contacts.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 10</h2>
            </div>
            <div style="margin-bottom: 2%;" class="pull-right">
                <a class="btn btn-success" href="{{ route('contacts.create') }}"> Criar novo Contato</a>
            </div>

        </div>
    </div>

    @if ($message = Session::get('success'))
        <div style="margin-top:5%" class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Contact</th>
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

                        <a class="btn btn-primary" href="{{ route('contacts.edit',$contact->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $contacts->links() !!}

@endsection
