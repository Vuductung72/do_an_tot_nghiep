@extends('admin.layouts.master')

@section('title')
    <title>Thêm mới tài khoản nhân viên</title>
@endsection

@section('content')
<div class="container-fluid">
    <!-- row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Thêm mới tài khoản nhân viên</h4>
                </div>
                <div class="card-body">
                    <div class="form-validation">
                        <form class="needs-validation" enctype="multipart/form-data" action="{{ route('ad.staffs_store') }}" novalidate method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-xl-6">
                                    {{-- tên --}}
                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="validationCustom01">Tên
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"  placeholder="Nhập tên.." value="{{ old('name') }}">
                                            @error('name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    {{-- hình ảnh --}}
                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="validationCustom01">Hình ảnh
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="file" class="form-file-input form-control @error('image') is-invalid @enderror" name="image">
                                            @error('image')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        </div>
                                    </div>
                                    {{-- cccd --}}
                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="validationCustom01">Căn cước công dân
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control @error('identityCard') is-invalid @enderror" name="identityCard" id="identityCard"  placeholder="Nhập CCCD..." value="{{ old('identityCard') }}">
                                            @error('identityCard')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    {{-- dân tộc --}}
                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="validationCustom01">Dân tộc
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control @error('ethnic') is-invalid @enderror" name="ethnic" id="ethnic"  placeholder="Nhập dân tộc..." value="{{ old('ethnic') }}">
                                            @error('ethnic')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    {{-- ngày sinh --}}
                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="validationCustom01">Ngày sinh
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="date" class="form-file-input form-control @error('dateOfBird') is-invalid @enderror" name="dateOfBird" value="{{ old('dateOfBird') }}">
                                            @error('dateOfBird')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    {{-- giới tính --}}
                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="gender">Giới tính
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <select class="default-select wide form-control" id="gender" for='gender' name="gender">>
                                                <option value="1">Nam</option>
                                                <option value="2">Nữ</option>
                                            </select>
                                        </div>
                                    </div>
                                    {{-- email --}}
                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="validationCustom02">Email <span
                                                class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="email"  placeholder="Nhập địa chỉ email.." value="{{ old('email') }}">
                                            @error('email')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    {{-- sđt --}}
                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="validationCustom08">Số điện thoại
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone" placeholder="Nhập số điện thoại" value="{{ old('phone') }}">
                                            @error('phone')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    {{-- dia chi --}}
                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="address">Địa chỉ <span
                                                class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" id="address"  placeholder="Nhập địa chỉ ..." value="{{ old('address') }}">
                                            @error('address')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    {{-- mk --}}
                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="validationCustom03">Mật khẩu
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Nhập mật khâu.." required>
                                            @error('password')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    {{-- phong ban --}}
                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="idPosition">Phòng ban
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <select class="default-select wide form-control" for='idDepartment' name="idDepartment">>
                                                @foreach ($departments as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    {{-- chuc vu --}}
                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="idPosition">Chức vụ
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <select class="default-select wide form-control" for='idPosition' name="idPosition">>
                                                {{-- <option value="0">Danh mục</option> --}}
                                                @foreach ($positions as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    {{-- lương --}}
                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="validationCustom03">Lương cơ bản
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control input-money @error('salary') is-invalid @enderror" name="salary" id="salary" placeholder="Nhập số lương cơ bản..." value="{{ old('salary') }}"  required>
                                            @error('salary')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                            <div class="input-convert-amount">
                                                <p>= <span>0</span> VND</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <div class="col-lg-8 ms-auto">
                                            <button type="submit" class="btn btn-primary">Tạo mới</button>
                                            <a href="{{ route('ad.staffs_index') }}" class="btn btn-default">Quay lại</a>
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

