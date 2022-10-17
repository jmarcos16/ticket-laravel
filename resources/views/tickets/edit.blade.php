@extends('layouts.app')
@section('title', 'Editando Ticket')
@section('content')

    <div class="row justify-content-center">
        <div class="col-xl-10 mt-5 mb-3">
            <h3>Editando Ticket #{{ $ticket->id }}</h3>
            <form action="{{ route('ticket.update', $ticket->id) }}" method="POST">
                @method('PUT')
                <x-inputs-ticket :ticket="$ticket" />
                <button type="submit" class="btn btn-success w-25 mt-2 shadow-none">Update Ticket</button>
            </form>
        </div>
    </div>

@endsection
