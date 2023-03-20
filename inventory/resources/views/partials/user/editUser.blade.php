@extends('layouts.main')

@section('component')
    <div class="row">
        <div class="col-lg-12">
            @if (session()->has('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @elseif (session()->has('error'))
                <div class="alert alert-danger">{{ session('danger') }}</div>
            @endif
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">
                            Form Add User
                        </h4>
                    </div>
                </div>
                <div class="card-body">
                    <form action="/user/{{ $user->id }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="nama">Nama : </label>
                                    <input type="text" name="nama" id="" class="form-control"
                                        placeholder="Silahkan isi nama lengkap" value="{{ old('nama', $user->nama) }}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="username">Username :</label>
                                    <input type="text" name="username" placeholder="silahkan isi username" id=""
                                        class="form-control" value="{{ old('username', $user->username) }}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">No Telp :</label>
                                    <input type="text" name="phone" placeholder="silahkan isi no telpon" id=""
                                        class="form-control" value="{{ old('phone', $user->phone) }}">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-flex form-group">
                                    <label for="">Gender :</label>
                                    <div class="mt-1">
                                        <div class="custom-control custom-radio custom-control-inline ml-5">
                                            <input type="radio" id="laki" name="gender"
                                                class="custom-control-input ml-5" value="Laki-laki"
                                                {{ old('gender', $user->gender) === 'Laki-laki' ? 'checked' : '' }}>
                                            <label class="custom-control-label ml-5" for="laki"> Laki-laki </label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline ml-5">
                                            <input type="radio" id="Perempuan" name="gender"
                                                class="custom-control-input ml-5" value="Perempuan"
                                                {{ old('gender', $user->gender) === 'Perempuan' ? 'checked' : '' }}>
                                            <label class="custom-control-label ml-5" for="Perempuan"> Perempuan </label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline ml-5">
                                            <input type="radio" id="lain" name="gender"
                                                class="custom-control-input ml-5" value="Lain-lain"
                                                {{ old('gender', $user->gender) === 'Lain-lain' ? 'checked' : '' }}>
                                            <label class="custom-control-label ml-5" for="lain"> Lain-lain </label>
                                        </div>
                                    </div>
                                </div>
                                @can('admin')
                                    <div class="form-group">
                                        <label for="role">Role User : </label>
                                        <select name="role" id="" class="form-control">
                                            <option value="" selected hidden
                                                {{ old('role', $user->role) !== null ? 'selected' : '' }}>Silahkan pilih
                                                role user</option>
                                            <option value="Admin"
                                                {{ old('role', $user->role) === 'Admin' ? 'selected' : '' }}>
                                                Admin
                                            </option>
                                            <option value="Petugas Gudang"
                                                {{ old('role', $user->role) === 'Petugas Gudang' ? 'selected' : '' }}>
                                                Petugas
                                                Gudang
                                            </option>
                                            <option value="Wakasek"
                                                {{ old('role', $user->role) === 'Wakasek' ? 'selected' : '' }}>
                                                Wakasek</option>
                                        </select>
                                    </div>
                                @endcan
                                <a href=""><button class="btn btn-danger">Cancel</button></a>
                                <div class="float-right">
                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
