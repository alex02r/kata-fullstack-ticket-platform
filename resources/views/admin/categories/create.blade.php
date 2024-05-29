@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row row-gap-4">
            <div class="col-12">
                <h1>Creazione nuova categoria</h1>
                <a href="{{ route('admin.categories.index') }}" class="btn btn-primary">Torna indietro</a>
            </div>
            <div class="col-12 col-md-8">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form method="POST" action="{{route('admin.categories.store')}}">
                    @csrf
                    @method('POST')
                    <div class="mb-3">
                        <label for="name" class="form-label">Inserisci il nome della categoria</label>
                        <input type="text" id="name" name="name" class="form-control w-50" required>
                    </div>
                    <button type="submit" class="btn btn-success">
                        Crea
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection