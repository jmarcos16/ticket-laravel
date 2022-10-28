@extends('layouts.app')
@section('title', 'Dashboard Admin')
@section('content')

    <div class="row justify-content-center">
        <div class="col-xl-7 mt-5 mb-3">
            <h3>All Users System</h3>
            <table class="table" id="datatable">
                <thead>
                    <tr>
                        <th><input type="checkbox" name="" id=""></th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Type</th>
                        <th>Updated_at</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($technicals as $technical)
                        <tr>
                            <td><input type="checkbox" name="" id=""></td>
                            <td>{{ $technical->name }}</td>
                            <td>{{ $technical->email }}</td>
                            <td>technical</td>
                            <td>{{ date('d-m-Y', strtotime($technical->updated_at)) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
