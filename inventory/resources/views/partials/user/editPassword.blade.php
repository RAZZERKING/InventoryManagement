@extends('layouts.main')

@section('component')
    <div class="row">
        <div class="col-lg-12">
            @if (session()->has('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @elseif (session()->has('error'))
                <div class="alert alert-danger">{{ session('danger') }}</div>
            @endif

            <div class="card shadow">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title text-primary">
                            Change Password
                        </h4>
                    </div>
                </div>
                <div class="card-body">
                    <form action="/user/{{ $id }}/password" method="post">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="oldPass">Old Password :</label>
                                    <input type="password" name="oldPassword" id="" class="form-control">
                                </div>
                            </div>
                            <div class="col-6">
                                <label for=""></label>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
