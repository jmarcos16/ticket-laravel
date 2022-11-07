@extends('layouts.app')
@section('title', 'Criar new Technical User')
@section('content')

    <div class="row justify-content-center">
        <div class="col-xl-7 mt-5 mb-3">
            <h3>New User</h3>
            <form action="{{ route('user.store') }}" method="POST">
                <x-inputs-create-new-user />
                <button type="submit" class="btn btn-success w-25 mt-2">Send</button>
            </form>
        </div>
    </div>

@endsection
