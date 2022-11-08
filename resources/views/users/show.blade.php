@extends('layouts.app')
@section('title', 'Show ' . $user->name)
@section('content')
    <div class="row justify-content-center">
        <div class="col-xl-7 mt-5 mb-3">
            <div class="d-flex justify-content-between">
                <h3>Show {{ $user->name }}</h3>
            </div>

            <div>

            </div>
        </div>
    </div>

@endsection
