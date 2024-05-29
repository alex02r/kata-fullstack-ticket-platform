@extends('layouts.app')

@section('content')
<div class="container ">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dettagli Operatore') }}
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title fs-4">Nome</h5>
                            <p class="card-text">{{ $operator->first_name }}</p>
                            <h5 class="card-title fs-4">Cognome</h5>
                            <p class="card-text">{{ $operator->last_name }}</p>
                            <h5 class="card-title fs-4">Email</h5>
                            <p class="card-text">{{ $operator->email }}</p>
                        </div>
                        <div class="col">
                            <h5 class="card-title fs-4">Stato</h5>
                            <p class="card-text">{{ $operator->isAvailable()? 'Disponibile' : 'Non Disponibile' }}</p>
                            <form action="{{ route('admin.operators.update-available', $operator) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <label class="switch ">
                                    <input type="checkbox" id="available" @checked($operator->available)
                                        name="available">
                                    <span class="slider"></span>
                                </label>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card-footer d-flex">
                    <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-link text-danger ms-auto">Elimina Operatore</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade text-black" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Vuoi eliminare l'operatore?</h1>
        </div>
        <div class="modal-body">
          Una volta confermato l'eliminazione sarà permanente
        </div>
        <div class="modal-footer row g-2">
            <div class="col">
                <button type="button" class="btn btn-secondary w-100" data-bs-dismiss="modal">Chiudi</button>
            </div>

          <form action="{{ route('admin.operators.destroy', $operator) }}" method="POST" class="col">
            @method('DELETE')
            @csrf

            <button type="submit" class="btn btn-danger w-100">Elimina</button>
        </form>
          {{-- <button type="button" class="btn btn-danger col">Elimina</button> --}}
        </div>
      </div>
    </div>
  </div>
@endsection

@section('css')
<style>
    .switch {
                font-size: 17px;
                position: relative;
                display: inline-block;
                width: 3.5em;
                height: 2em;
            }

            /* Hide default HTML checkbox */
            .switch input {
                opacity: 0;
                width: 0;
                height: 0;
            }

            /* The slider */
            .slider {
                position: absolute;
                cursor: pointer;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background-color: #fff;
                border: 1px solid #adb5bd;
                transition: .4s;
                border-radius: 30px;
                transform: scale(0.7);
            }

            .slider:before {
                position: absolute;
                content: "";
                height: 1.4em;
                width: 1.4em;
                border-radius: 20px;
                left: 0.27em;
                bottom: 0.25em;
                background-color: #adb5bd;
                transition: .4s;
            }

            input:checked+.slider {
                background-color: #007bff;
                border: 1px solid #007bff;
            }

            input:focus+.slider {
                box-shadow: 0 0 1px #007bff;
            }

            input:checked+.slider:before {
                transform: translateX(1.4em);
                background-color: #fff;
            }
</style>
@endsection

@section('js')

    <script>
         window.addEventListener('DOMContentLoaded', (event) => {
        console.log('DOM fully loaded and parsed');

        const checkbox = document.getElementById('available');
        if (checkbox) {
            checkbox.addEventListener('change', () => {
                const form = checkbox.closest('form');
                form.submit();
            });
        } else {
            console.error('Checkbox with id "available" not found');
        }
    });
    </script>
@endsection