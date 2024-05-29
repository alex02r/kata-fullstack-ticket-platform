@extends('layouts.app')

@section('content')
<div class="container ">
    <div class="row">
        <div class="col">{{ $operators->links() }}</div>
        <div class="col text-end"><a href="{{route('admin.operators.create')}}" class="btn btn-primary"><i class="fa-solid fa-plus"></i>Aggiungi un operatore</a></div>
      </div>
    <table class="table text-center">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Cognome</th>
                <th>Stato</th>
                <th>Controls</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($operators as $operator) 
            <tr>
                <td>{{$operator->first_name}}</td>
                <td>{{$operator->last_name}}</td>
                <td>{{$operator->available?'Disponibile':'Non disponibile'}}</td>
                <td >
                    <a class="color-dark" href="{{ route('admin.operators.show', $operator) }}"><i class="fa-solid fa-circle-info"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>

    </table>
    <div class="row">
        <div class="col">{{ $operators->links() }}</div>
        <div class="col text-end"><a href="{{route('admin.operators.create')}}" class="btn btn-primary"><i class="fa-solid fa-plus"></i>Aggiungi un operatore</a></div>
      </div>
    
</div>
@endsection