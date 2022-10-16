@extends('layouts.app')
@section('title', 'Criar novo Ticket')
@section('content')

    <div class="row justify-content-center">
        <div class="col-xl-10 mt-5 mb-3">
            <h3>New Ticket</h3>
            <form action="{{ route('ticket.create') }}" method="POST">
                @csrf
                <div class="my-1">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control shadow-none" id="title" name="title"
                            placeholder="Title Ticket">
                        <label for="title">Title Ticket</label>
                    </div>
                    <div class="form-floating">
                        <textarea class="form-control shadow-none" name="content" id="content" cols="20" rows="50"
                            placeholder="Description Ticket" style="height: 150px"></textarea>
                        <label for="content">Description Ticket</label>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
