@extends('admin.layouts.master')

@section('title')
    <title>Sửa tài khoản Admin</title>
@endsection

@section('content')
<div class="container-fluid">
    <!-- row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Sửa tài khoản Admin</h4>
                </div>
                <div class="card-body">
                    <div class="form-validation">
                        <form class="needs-validation" action="{{ route('ad.admins_update', ['id' => $admin->id])}}" novalidate method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="validationCustom01">Tên
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" name="name" id="name"  value="{{$admin->name}}" required>
                                            <div class="invalid-feedback">
                                                Please enter a username.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="validationCustom02">Email <span
                                                class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" name="email" id="email"  value="{{ $admin->email}}" required  value="" disabled>
                                            <div class="invalid-feedback">
                                                Please enter a Email.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="validationCustom03">Mật khẩu
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="password" class="form-control" name="password" id="password" value="" required>
                                            <div class="invalid-feedback">
                                                Please enter a password.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="role_id">Vai trò
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <select class="default-select wide form-control" for='role_id' name="role_id">>
                                                @foreach ($roles as $item)
                                                    <option value="{{ $item->id }}" {{ $item->id == $admin->role->id ? 'selected' : '' }}>{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <div class="col-lg-8 ms-auto">
                                            <button type="submit" class="btn btn-primary">Sửa</button>
                                            <a href="{{ route('ad.admins_index') }}" class="btn btn-default">Quay lại</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
