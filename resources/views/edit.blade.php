@extends('layouts.app')
@section('content')
    <h1 class="text-center text-danger"> Modification</h1>
    <div class="container">
        <form action="{{route('update', $livre->id)}}" method="post">
            @csrf
            @method('put')
            <div class="form-group my-3">
                <label for="book_name">Nom</label>
                <input type="text" name="book_name" class="form-control" id="book_name" value="{{$livre->book_name}}">
                <div class="text-danger">{{ $errors->first('book_name', ':message') }}</div>
            </div>
            <div class="form-group my-3">
                <label for="writer_name">Auteur</label>
                <input type="text" name="writer_name" class="form-control" id="writer_name"
                    value="{{$livre->writer_name}}">
                <div class="text-danger">{{ $errors->first('writer_name', ':message') }}</div>
            </div>
            <div class="form-group my-3">
                <label for="notice">Avis</label>
                <textarea name="notice" id="notice" class="form-control" rows="5">{{$livre->notice}}</textarea>
                <div class="text-danger">{{ $errors->first('notice', ':message') }}</div>
            </div>
            <div class="form-group my-3">
                <label for="note">Note</label>
                <input type="text" name="note" class="form-control" id="note" value="{{$livre->note}}">
                <div class="text-danger">{{ $errors->first('note', ':message') }}</div>
            </div>
            <div class="form-groupe">
                <input type="submit" class="btn btn-success">
            </div>
        </form>
    </div>
@endsection
