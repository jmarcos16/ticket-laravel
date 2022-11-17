@extends('layouts.app')
@section('title', 'Logar-se')
@section('content')
    <div class="row justify-content-center">
        <div class="col-xl-7 mt-5 mb-3">
            <h3>Sing-In</h3>
            <form action="{{ route('ticket.store') }}" method="POST">
                @csrf
                <div class="my-1">
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control shadow-none" id="email" name="email"
                            placeholder="Email">
                        <label for="title">Email</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control shadow-none" id="password" name="password"
                            placeholder="Password">
                        <label for="title">Password</label>
                    </div>

                </div>

                <button type="submit" class="btn btn-success w-25 mt-2">Send</button>
            </form>
        </div>
    </div>
@endsection
