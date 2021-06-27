@extends('layouts.app')

@section('content')
    <h1 class="text-center text-danger"> Nouvelle Livre</h1>
    <div class="container">
        <form action="{{ route('store') }}" method="post">
            @csrf
            <div class="form-group my-3">
                <label for="book_name">Nom</label>
                <input type="text" name="book_name" class="form-control" id="book_name" value="{{ old('book_name') }}">
                <div class="text-danger">{{ $errors->first('book_name', ':message') }}</div>
            </div>
            <div class="form-group my-3">
                <label for="writer_name">Auteur</label>
                <input type="text" name="writer_name" class="form-control" id="writer_name"
                    value="{{ old('writer_name') }}">
                <div class="text-danger">{{ $errors->first('writer_name', ':message') }}</div>
            </div>
            <div class="form-group my-3">
                <label for="notice">Avis</label>
                <textarea name="notice" id="notice" class="form-control" rows="5">{{ old('notice') }}</textarea>

                                <div class="text-danger">{{ $errors->first('notice', ':message') }}</div>
            </div>
            <div class="form-group my-3">
                <label for="note">Note</label>
                <input type="text" name="note" class="form-control" id="note" value="{{ old('note') }}">
                <div class="text-danger">{{ $errors->first('note', ':message') }}</div>
            </div>
            <div class="form-groupe">
                <input type="submit" class="btn btn-success">
            </div>
        </form>
    </div>
@endsection
