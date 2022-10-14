@extends('layouts.app')
@section('title', 'All Tickets')
@section('content')

    <div class="row justify-content-center">
        <div class="col-xl-10 mt-5 mb-3">
            <h3>All Tikckets</h3>
            @foreach ($tickets as $ticket)
                <div class="card mt-2 p-1 px-3">
                    <h6>{{ $ticket->title }}</h6>
                    <p class="lh-1">{{ $ticket->content }}</p>
                    <div class="d-grid gap-1 d-md-flex justify-content-md-end">
                        <a class="btn btn-primary me-md-2" type="button">Editar</a>
                        <a href="{{ route('ticket.show', $ticket->id) }}" class="btn btn-primary" type="button">Detalhes</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
