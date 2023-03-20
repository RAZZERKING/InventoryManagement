@extends('layouts.main')

@section('component')
    <div class="row">
        <div class="col-lg-12">
            @if (session()->has('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @elseif (session()->has('error'))
                <div class="alert alert-danger">{{ session('danger') }}</div>
            @endif

            <div class="card shadow text-primary">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title text-primary">
                            Change Password
                        </h4>
                    </div>
                </div>
                <div class="card-body">
                    <form action="/user/{{ $id }}/password" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="oldPass">Old Password :</label>
                                    <input type="password" name="oldPassword" id=""
                                        class="form-control @error('oldPassword') 'invalid' @enderror">
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="">New Password :</label>
                                <input type="password" name="password" id=""
                                    class="form-control @error('password') 'invalis' @enderror">
                            </div>
                            <div class="col-6">
                                <label for="">Confirm New Password :</label>
                                <input type="password" name="newPassword" id="" class="form-control">
                            </div>
                            <div class="col-12 p-3">
                                <a href="">
                                    <button class="btn btn-danger">Cancel</button>
                                </a>
                                <div class="float-right">
                                    <button type="reset" class="btn btn-warning mr-2">Reset</button>
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
