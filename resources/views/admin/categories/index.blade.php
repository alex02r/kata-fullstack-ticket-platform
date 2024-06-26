@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row row-gap-4 justify-content-center">
            <div class="col-12">
                <h1>Lista categorie</h1>
                <a href="{{route('admin.categories.create')}}" class="btn btn-success">Aggiungi nuova categoria <i class="fas fa-plus"></i></a>
            </div>
            <div class="col-12 col-md-8">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Tools</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                <td>
                                    <a href="{{route("admin.categories.show", $category)}}" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></a>
                                    <a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-sm btn-warning"><i class="fas fa-pen"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>  
@endsection