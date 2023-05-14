@extends('admin.layouts.master')

@section('title')
    <title>Sửa tài khoản nhân viên</title>
@endsection

@section('content')
<div class="container-fluid">
    <!-- row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Sửa tài khoản nhân viên</h4>
                </div>
                <div class="card-body">
                    <div class="form-validation">
                        <form class="needs-validation" enctype="multipart/form-data" action="{{ route('ad.staffs_update', ['id' => $staff->id]) }}" novalidate method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-xl-6">
                                    {{-- tên --}}
                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="validationCustom01">Tên
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"  value="{{ $staff->name }}">
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
                                            <div style="margin: 0 auto;">
                                                <img src="{{ $staff->image }}" alt="" style="width: 200px;">
                                            </div>
                                        </div>
                                        
                                    </div>
                                    {{-- cccd --}}
                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="validationCustom01">Căn cước công dân
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control @error('identityCard') is-invalid @enderror" name="identityCard" id="identityCard"   value="{{ $staff->identityCard }}">
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
                                            <input type="text" class="form-control @error('ethnic') is-invalid @enderror" name="ethnic" id="ethnic"  placeholder="Nhập dân tộc..." value="{{ $staff->ethnic }}">
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
                                            <input type="date" class="form-file-input form-control @error('dateOfBird') is-invalid @enderror" name="dateOfBird" value="{{ $staff->dateOfBird }}">
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
                                                <option value="{{ $staff->gender }}">{{ $staff->gender == '1' ? 'Nam' : 'Nữ' }}</option>
                                                    @if($staff->gender == "1")
                                                        <option value="0"> Nữ </option>
                                                    @else
                                                        <option value="1"> Nam </option>
                                                    @endif
                                            </select>
                                        </div>
                                    </div>
                                    {{-- email --}}
                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="validationCustom02">Email <span
                                                class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ $staff->email }}">
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
                                            <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone" value="{{ $staff->phone }}">
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
                                            <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" id="address" value="{{ $staff->address }}">
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
                                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" required>
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
                                                    <option value="{{ $item->id }}" {{ $item->id == $staff->department->id ? 'selected' : '' }}>{{ $item->name }}</option>
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
                                                @foreach ($positions as $item)
                                                    <option value="{{ $item->id }}" {{ $item->id == $staff->position->id ? 'selected' : '' }}>{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    {{-- lương --}}
                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="validationCustom03">Lương hiện tại</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control input-money" name="salary" id="salary" value="{{ number_format($staff->salary) }}" readonly>
                                        </div>
                                    </div>

                                    {{-- status --}}
                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="status">Trạng thái
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <select class="default-select wide form-control" id="status" for='status' name="status">>
                                                <option value="{{ $staff->status }}">{{ $staff->status == '0' ? 'Đang làm việc' : 'Đã nghỉ việc' }}</option>
                                                    @if($staff->status == "0")
                                                        <option value="1"> Đã nghỉ việc </option>
                                                    @else
                                                        <option value="0"> Đang làm việc </option>
                                                    @endif
                                            </select>
                                        </div>
                                    </div
                                    <div class="mb-3 row">
                                        <div class="col-lg-8 ms-auto">
                                            <button type="submit" class="btn btn-primary">Sửa</button>
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