@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row row-gap-4">
            <div class="col-12">
                <h1>Modifica categoria</h1>
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
                <form method="post" action="{{route('admin.categories.update', $category)}}">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">Modifica il nome della categoria</label>
                        <input type="text" id="name" name="name" class="form-control w-50" value="{{ old('name') ?? $category->name }}" required>
                    </div>
                    <button type="submit" class="btn btn-warning">
                        Modifica
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection