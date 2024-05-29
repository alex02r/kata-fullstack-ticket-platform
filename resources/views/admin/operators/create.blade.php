@extends('layouts.app')

@section('content')
<div class="container ">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Aggiungi un operatore') }}
                </div>
                <div class="card-body">
                    <form action="{{route('admin.operators.store')}}" method="post">
                        @csrf
                        @method('POST')
                        <div class="input-group mb-3">
                            <label for="first_name" class="input-group-text">Nome</label>
                            <input type="text" value="{{ old('first_name', $operator->first_name) }}" class="form-control" id="first_name" name="first_name" required>
                        </div>
                        <div class="input-group mb-3">
                            <label for="last_name" class="input-group-text">Cognome</label>
                            <input type="text" value="{{ old('last_name', $operator->last_name) }}" class="form-control" id="last_name" name="last_name" required>
                        </div>
                        <div class="input-group mb-3">
                            <label for="email" class="input-group-text">Email</label>
                            <input type="text" value="{{ old('email', $operator->email) }}" class="form-control" id="email" name="email" required>
                        </div>
                        <button class="btn btn-primary mt-3" type="submit">Invia</button>
                    </form>
                </div>
            </div>  
        </div>
    </div>
</div>
@endsection