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
                    <form action="/user" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Username :</label>
                                    <input type="text" name="username" placeholder="silahkan isi username" id=""
                                        class="form-control">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">No Telp :</label>
                                    <input type="text" name="phone" placeholder="silahkan isi no telpon" id=""
                                        class="form-control">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-flex form-group">
                                    <label for="">Gender :</label>
                                    <div class="mt-1">
                                        <div class="custom-control custom-radio custom-control-inline ml-5">
                                            <input type="radio" id="laki" name="gender"
                                                class="custom-control-input ml-5" value="Laki-laki">
                                            <label class="custom-control-label ml-5" for="laki"> Laki-laki </label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline ml-5">
                                            <input type="radio" id="Perempuan" name="gender"
                                                class="custom-control-input ml-5" value="Perempuan">
                                            <label class="custom-control-label ml-5" for="Perempuan"> Perempuan </label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline ml-5">
                                            <input type="radio" id="lain" name="gender"
                                                class="custom-control-input ml-5" value="Lain-lain">
                                            <label class="custom-control-label ml-5" for="lain"> Laki-laki </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="role">Role User : </label>
                                    <select name="role" id="" class="form-control">
                                        <option value="" selected hidden>Silahkan pilih role user</option>
                                        <option value="Admin">Admin</option>
                                        <option value="Admin">Petugas Gudang</option>
                                        <option value="Admin">Wakasek</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" id="" class="form-control">
                                </div>
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
