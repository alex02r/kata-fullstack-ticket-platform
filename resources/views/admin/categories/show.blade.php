@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row row-gap-4 justify-content-center">
            <div class="col-12">
                <h1>Visualizzazione Categoria</h1>
                <a href="{{route('admin.categories.index')}}" class="btn btn-primary">Torna indietro</a>
            </div>
            <div class="col-12 col-md-4">
                <div class="card mb-3">
                    <div class="card-body">
                      <h3 class="card-title">{{ $category->name}}</h3>
                      <p class="card-text">Id della categoria: {{ $category->id }}</p>
                      <a href="#" class="btn btn-warning">Modifica</a>
                      <a href="#" class="btn btn-danger">Elimina</a>
                    </div>
                </div>
            </div>
        </div>
    </div>  
@endsection