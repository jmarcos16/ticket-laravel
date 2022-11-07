@extends('layouts.app')
@section('title', 'Criar novo Ticket')
@section('content')
    <div class="row justify-content-center">
        <div class="col-xl-7 mt-5 mb-3">
            <h3>New Ticket</h3>
            <form action="{{ route('ticket.store') }}" method="POST">
                <x-inputs-ticket />
                <button type="submit" class="btn btn-success w-25 mt-2">Send Ticket</button>
            </form>
        </div>
    </div>
@endsection
