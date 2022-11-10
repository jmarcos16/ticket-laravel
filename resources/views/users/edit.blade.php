@extends('layouts.app')
@section('title', 'Edit User ' . $user->name)
@section('content')

    <div class="row justify-content-center">
        <div class="col-xl-7 mt-5 mb-3">
            <h3>New User</h3>
            <form action="{{ route('user.update', $user->id) }}" method="POST">
                @method('PUT')

                <input type="hidden" name="provider" value="{{ rtrim($user->getTable(), 's') }}">
                <x-inputs-create-new-user :user="$user" />
                <button type="submit" class="btn btn-success w-25 mt-2">Send</button>
            </form>
        </div>
    </div>

@endsection
