@extends('layouts.app')

@section('content')
<div class="container">
    <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Titolo</th>
            <th scope="col">Categoria</th>
            <th scope="col">Priorità</th>
            <th scope="col">Operatore</th>
            <th scope="col">Stato</th>
            <th scope="col">Data</th>
            <th scope="col">Controlli</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($tickets as $ticket)
            <tr>
                <th scope="row">{{$ticket->id}}</th>
                <td>{{$ticket->title}}</td>
                <td>{{$ticket->category->name}}</td>
                <td>{{$ticket->priority->name}}</td>
                <td>{{$ticket->operator->first_name}} {{ $ticket->operator->last_name}}</td>
                <td>{{$ticket->status->name}}</td>
                <td>{{$ticket->date}}</td>
                <td class="text-center">
                    <a class="color-dark" href="{{ route('admin.tickets.show', $ticket) }}"><i class="fa-solid fa-circle-info"></i></a>
                    <a class="color-dark" href="{{ route('admin.tickets.edit', $ticket) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
      </table>
      {{ $tickets->links() }}
</div>
@endsection

@section('css')
@endsection