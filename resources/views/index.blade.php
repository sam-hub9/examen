@extends('layouts.app')

@section('content')
    <h1 class="text-center">List des Livres</h1>
    <div class="d-flex justify-content-center align-items-center my-3">
        <a href="{{route('create')}}" class="btn btn-primary"> Ajouter Livre</a>
    </div>
    @if (session('success'))
        <div class="alert alert-success text-center alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    
    <div class="table-responsive">
        <table id="table" class="table table-striped table-hover text-center">
            <thead class="bg-secondary text-dark">
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Auteur</th>
                    <th>Avis</th>
                    <th>Note</th>
                    <th>Date Creation</th>
                    <th>Date modification</th> 
                    <th>Parametre</th>
                </tr> 
            </thead>
            <tbody>
                @foreach ($livres as $livre)
                    <tr>
                        <td>{{ $livre->id }}</td>
                        <td>{{ $livre->book_name }}</td>
                        <td>{{ $livre->writer_name }}</td>
                        <td>{{ $livre->notice }}</td>
                        <td>{{ $livre->note }}</td>
                        <td>{{ $livre->created_at }}</td>
                        <td>{{ $livre->updated_at }}</td>
                        <td>
                            <a href="{{route('edit', $livre->id)}}" class="btn btn-secondary">Modifier</a>
                            <form action="{{route('delete', $livre->id)}}" method="post" class="d-inline">
                            @csrf
                            @method('delete')
                            <input type="submit" value="suprimer" class="btn btn-danger">
                        </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
