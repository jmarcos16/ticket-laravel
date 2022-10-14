@extends('layouts.app')
@section('title', 'Ticket #' . $ticket->id)
@section('content')

    <div class="row justify-content-center">
        <div class="col-xl-10 mt-5 mb-3">
            <span>#{{ $ticket->id }}</span>
            <div class="card p-2 d-flex justify-content-center w-100">
                <h4>{{ $ticket->title }}</h4>
                <div>
                    <p>{{ $ticket->content }}</p>
                </div>

            </div>
        </div>
    </div>

@endsection
