@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Ricerca Ticket</h1>
    <form id="searchForm">
        @csrf
        @method ('POST')
        <div class="row row-cols-2 g-3">
            <div class="col">
                <input type="date" name="date" id="date" class="form-control">
            </div>
            <div class="col">
                <select name="status" id="status" class="form-select">
                    <option value="">Seleziona Stato</option>
                    @foreach($statuses as $status)
                    <option value="{{ $status->id }}">{{ $status->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col">
                <select name="category" id="category" class="form-select">
                    <option value="">Seleziona Categoria</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col">
                <input type="number" name="operator_id" id="operator_id" placeholder="ID Operatore" class="form-control">
            </div>
    </div>
        <button type="submit" class="btn btn-primary my-3">Cerca</button>
    </form>
    <div id="results"></div>
    {{-- {{ $tickets->links() }} --}}
</div>
@endsection

@section('js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('#searchForm').on('submit', function(event) {
        event.preventDefault();
        fetchResults($(this).serialize());
    });

    $(document).on('click', '.pagination a', function(event) {
        event.preventDefault();
        let page = $(this).attr('href').split('page=')[1];
        let formData = $('#searchForm').serialize();
        fetchResults(formData + '&page=' + page);
    });

    function fetchResults(data) {
        $.ajax({
            url: '{{ route('api.tickets.search') }}',
            method: 'GET',
            data: data,
            success: function(response) {
                if (response.error) {
                    $('#results').html('<p>' + response.error + '</p>');
                } else {
                    let html = '<table class="table table-striped"><tr><th>ID</th><th>Data</th><th>Stato</th><th>Categoria</th><th>Operatore</th></tr>';
                    response.data.forEach(ticket => {
                        html += '<tr>';
                        html += '<td>' + ticket.id + '</td>';
                        html += '<td>' + (ticket.date ? ticket.date : '') + '</td>';
                        html += '<td>' + (ticket.status ? ticket.status.name : '') + '</td>';
                        html += '<td>' + (ticket.category ? ticket.category.name : '') + '</td>';
                        html += '<td>' + (ticket.operator ? ticket.operator.name : '') + '</td>';
                        html += '</tr>';
                    });
                    html += '</table>';

                    html += '<nav><ul class="pagination">' + renderPagination(response) + '</ul></nav>';

                    $('#results').html(html);
                }
            }
        });
    }

    function renderPagination(data) {
        let paginationHtml = '';

        if (data.current_page > 1) {
            paginationHtml += '<li class="page-item"><a class="page-link" href="?page=1">&laquo;</a></li>';
            paginationHtml += '<li class="page-item"><a class="page-link" href="?page=' + (data.current_page - 1) + '">&lsaquo;</a></li>';
        }

        for (let i = 1; i <= data.last_page; i++) {
            if (i == data.current_page) {
                paginationHtml += '<li class="page-item active"><span class="page-link">' + i + '</span></li>';
            } else {
                paginationHtml += '<li class="page-item"><a class="page-link" href="?page=' + i + '">' + i + '</a></li>';
            }
        }

        if (data.current_page < data.last_page) {
            paginationHtml += '<li class="page-item"><a class="page-link" href="?page=' + (data.current_page + 1) + '">&rsaquo;</a></li>';
            paginationHtml += '<li class="page-item"><a class="page-link" href="?page=' + data.last_page + '">&raquo;</a></li>';
        }

        return paginationHtml;
    }
});


</script>
@endsection
