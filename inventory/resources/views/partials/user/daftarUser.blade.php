@extends('layouts.main')

@section('component')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                @if (session()->has('success'))
                    <div class="toast fade show bg-success text-white border-0 rounded p-2 mt-3 mb-2" role="alert"
                        aria-live="assertive" aria-atomic="true">
                        <div class="toast-header bg-success text-white">
                            <svg class="bd-placeholder-img rounded mr-2" width="20" height="20"
                                xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false"
                                role="img">
                                <rect width="100%" height="100%" fill="#fff"></rect>
                            </svg>
                            <strong class="mr-auto text-white">{{ session('success') }}</strong>
                            <small>now</small>
                            <button type="button" class="ml-2 mb-1 close text-white" data-dismiss="toast"
                                aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="toast-body">
                        </div>
                    </div>
                    <meta http-equiv="refresh" content="1;url=/user">
                @elseif (session()->has('error'))
                    <div class="toast fade show bg-warning text-white border-0 rounded p-2 mt-3 mb-2" role="alert"
                        aria-live="assertive" aria-atomic="true">
                        <div class="toast-header bg-warning text-white">
                            <svg class="bd-placeholder-img rounded mr-2" width="20" height="20"
                                xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false"
                                role="img">
                                <rect width="100%" height="100%" fill="#fff"></rect>
                            </svg>
                            <strong class="mr-auto text-white">{{ session('error') }}</strong>
                            <small>now</small>
                            <button type="button" class="ml-2 mb-1 close text-white" data-dismiss="toast"
                                aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="toast-body">
                        </div>
                    </div>
                    {{-- <meta http-equiv="refresh" content="1;url=/barang"> --}}
                @endif
            </div>
            <div class="col-lg-12">
                <div class="d-flex flex-wrap align-items-center justify-content-between mb-4 text-primary">
                    <div>
                        <h1 class="mb-3">Users List</h1>
                    </div>
                    <a href="/user/create" class="btn btn-primary add-list"><i class="las la-plus mr-3"></i>Add
                        User</a>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="table-responsive rounded mb-3">
                    <table class="table bg-white data-tables shadow dataTable text-center">
                        <thead class="bg-white text-uppercase">
                            <tr class="ligth ligth-data">
                                <th>Id</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Phone</th>
                                <th>Gender</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="ligth-body">
                            @foreach ($user as $users)
                                <tr>
                                    <td>{{ $users->id }}</td>
                                    <td>{{ $users->nama }}</td>
                                    <td class="text-uppercase"><b>{{ $users->username }}</b></td>
                                    <td>{{ $users->phone }}</td>
                                    <td>{{ $users->gender }}</td>
                                    <td>{{ $users->role }}</td>
                                    <td>
                                        <div class="d-flex align-items-center list-action">
                                            <a href="/user/{{ $users->id }}/password" class="mr-3"
                                                data-toggle="tooltip" data-placement="top"
                                                data-original-title="Change Password">
                                                <button class="btn btn-info p-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                        fill="currentColor" class="bi bi-key-fill" viewBox="0 0 16 16">
                                                        <path
                                                            d="M3.5 11.5a3.5 3.5 0 1 1 3.163-5H14L15.5 8 14 9.5l-1-1-1 1-1-1-1 1-1-1-1 1H6.663a3.5 3.5 0 0 1-3.163 2zM2.5 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                                                    </svg>
                                                </button>
                                            </a>
                                            <a class="mr-3" data-toggle="tooltip" data-placement="top" title=""
                                                data-original-title="Edit" href="user/{{ $users->id }}/edit">
                                                <button class="btn btn-success p-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21"
                                                        fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                                        <path
                                                            d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                                                    </svg>
                                                </button>
                                            </a>
                                            <form action="user/{{ $users->id }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger p-2"
                                                    onclick="confirm('yakin??')" data-toggle="tooltip" data-placement="top"
                                                    data-original-title="Delete">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21"
                                                        fill="#FFFFFF" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                                        <path
                                                            d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
                                                    </svg>
                                                </button>
                                            </form>

                                            {{-- <form action="/user/{{ $users->id }}"></form> --}}
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Page end  -->
    </div>
@endsection
