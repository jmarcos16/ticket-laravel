@extends('layouts.app')
@section('title', 'Dashbord Users System')
@push('extra-css')
    <link rel="stylesheet" href="{{ url('/css/dashboard.users.style.css') }}">
@endpush
@section('content')

    <div class="row justify-content-center ">
        <div class="col-xl-7 mt-5 mb-3">

            <div class="d-flex justify-content-between ">
                <h3>All Users</h3>
                <div class="search-users d-flex w-25">
                    <i class='bx bx-search-alt'></i>
                    <input class="form-control shadow-none" type="text" placeholder="Search">
                </div>
                {{-- <a href="{{ route('user.create') }}" class="btn btn-primary">New User</a> --}}
            </div>

            <div class="d-flex justify-content-between align-items-center py-1 border-bottom pb-2">
                <div class="d-flex w-25 align-items-center">
                    Mostrar
                    <select class="form-control shadow-none w-auto align-items-center mx-1" name="" id="">
                        <option value="">10</option>
                        <option value="">20</option>
                        <option value="">30</option>
                        <option value="">Todos</option>
                    </select>

                    Items
                </div>

                <div class="btn-actions d-flex">
                    <a href="" id="button-edit" class="btn-action">
                        <i class='bx bxs-edit-alt'></i>
                        <span>Editar</span>
                    </a>
                    <a href="" id="button-delete" class="btn-action">
                        <i class='bx bx-trash'></i>
                        <span>Deletar</span>
                    </a>

                    <a href="" class="btn-action">
                        <i class='bx bx-plus'></i>
                        <span>Create</span>
                    </a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table align-middle text-center">
                    <thead>
                        <tr>
                            <th><input type="checkbox" name="" id=""></th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Type</th>
                            <th>Updated_at</th>
                            <th>Created_at</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody class="list-users">


                        @foreach ($users as $user)
                            <tr id="{{ $user->id }}">
                                <td><input type="checkbox" name="" id=""></td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <span class="badge text-bg-secondary value-provider">{{ $user->type_user }}</span>
                                </td>
                                <td>{{ $user->updated_at }}</td>
                                <td>{{ $user->created_at }}</td>
                                <td>
                                    <a
                                        href="{{ route('user.show', $user->id . '/' . 'administrator') }}"class="btn btn-success">Editar
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

@push('extra-js')
    <script src="{{ url('/js/dashboard.users.style.js') }}" defer></script>
@endpush
