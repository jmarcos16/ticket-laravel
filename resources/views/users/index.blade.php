@extends('layouts.app')
@section('title', 'Dashbord Users System')
@section('content')

    <div class="row justify-content-center">
        <div class="col-xl-7 mt-5 mb-3">
            <div class="d-flex justify-content-between">
                <h3>All Users</h3>
                <a href="{{ route('user.create') }}" class="btn btn-primary">New User</a>
            </div>
            <table class="table table-triped">
                <thead>
                    <tr>
                        <th><input type="checkbox" name="" id=""></th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Type</th>
                        <th>Updated_at</th>
                        <th>Created_at</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($users['administrator'] as $user)
                        <tr>
                            <td><input type="checkbox" name="" id=""></td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>administrator</td>
                            <td>{{ $user->updated_at }}</td>
                            <td>{{ $user->created_at }}</td>
                        </tr>
                    @endforeach

                    @foreach ($users['technical'] as $user)
                        <tr>
                            <td><input type="checkbox" name="" id=""></td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>technical</td>
                            <td>{{ $user->updated_at }}</td>
                            <td>{{ $user->created_at }}</td>
                        </tr>
                    @endforeach

                    @foreach ($users['employee'] as $user)
                        <tr>
                            <td> <input type="checkbox" name="" id=""></td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>employee</td>
                            <td>{{ $user->updated_at }}</td>
                            <td>{{ $user->created_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
