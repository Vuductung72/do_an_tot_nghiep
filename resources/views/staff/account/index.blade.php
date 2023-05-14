@extends('staff.layouts.master')

@section('title')
    <title>Tài khoản nhân viên</title>
@endsection

@section('content')
<div class="container-fluid">
    <!-- row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Thông tin tài khoản nhân viên: {{ Auth::guard('staff')->user()->name}} </h4>
                </div>
                <div class="card-body">
                    <div class="form-validation">
                        <form class="needs-validation" enctype="multipart/form-data" action="{{ route('staff.accounts.update', Auth::guard('staff')->user())}}" novalidate method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-xl-6">
                                    {{-- tên --}}
                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="validationCustom01">Tên</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" name="name" id="name"  value="{{ Auth::guard('staff')->user()->name}} " disabled>
                                            
                                        </div>
                                    </div>
                                    {{-- hình ảnh --}}
                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="validationCustom01">Hình ảnh</label>
                                        <div class="col-lg-6">
                                            <div style="margin: 0 auto;">
                                                <img src="{{Auth::guard('staff')->user()->image}}" alt="" style="width: 200px;">
                                            </div>
                                        </div>
                                        
                                    </div>
                                    {{-- cccd --}}
                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="validationCustom01">Căn cước công dân</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" name="identityCard" id="identityCard"  value="{{Auth::guard('staff')->user()->identityCard}}" disabled>
                                        </div>
                                    </div>
                                    {{-- dân tộc --}}
                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="validationCustom01">Dân tộc</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" name="ethnic" id="ethnic"  value="{{Auth::guard('staff')->user()->ethnic}}" disabled>
                                        </div>
                                    </div>
                                    {{-- ngày sinh --}}
                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="validationCustom01">Ngày sinh</label>
                                        <div class="col-lg-6">
                                            <input type="date" class="form-file-input form-control" name="dateOfBird" value="{{Auth::guard('staff')->user()->dateOfBird}}" disabled>
                                        </div>
                                    </div>
                                    {{-- giới tính --}}
                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="gender">Giới tính</label>
                                        <div class="col-lg-6">
                                            <select class="default-select wide form-control" id="gender" for='gender' name="gender" disabled>
                                                <option value="{{ Auth::guard('staff')->user()->gender }}">{{ Auth::guard('staff')->user()->gender == '1' ? 'Nam' : 'Nữ' }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    {{-- email --}}
                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="validationCustom02">Email </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" name="email" id="email" value="{{Auth::guard('staff')->user()->email}}" disabled>
                                        </div>
                                    </div>
                                    {{-- sđt --}}
                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="validationCustom08">
                                            Số điện thoại
                                            <span class="text-danger">*</span></label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone" value="{{Auth::guard('staff')->user()->phone}}">
                                            @error('phone')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    {{-- dia chi --}}
                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="address">
                                            Địa chỉ
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" id="address" value="{{Auth::guard('staff')->user()->address}}">
                                            @error('address')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    {{-- mk --}}
                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="validationCustom03">
                                            Mật khẩu
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
                                        <label class="col-lg-4 col-form-label" for="idPosition">Phòng ban</label>
                                        <div class="col-lg-6">
                                            <select class="default-select wide form-control" for='idDepartment' name="idDepartment" disabled>
                                                @foreach ($departments as $item)
                                                    <option value="{{ $item->id }}" {{ $item->id == Auth::guard('staff')->user()->department->id ? 'selected' : '' }}>{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    {{-- chuc vu --}}
                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="idPosition">Chức vụ</label>
                                        <div class="col-lg-6">
                                            <select class="default-select wide form-control" for='idPosition' name="idPosition" disabled>
                                                @foreach ($positions as $item)
                                                    <option value="{{ $item->id }}" {{ $item->id == Auth::guard('staff')->user()->position->id ? 'selected' : '' }}>{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    {{-- lương --}}
                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="validationCustom03">Lương</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" name="salary" id="salary" value="{{ number_format(Auth::guard('staff')->user()->salary) }}" disabled>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="status">Trạng thái</label>
                                        <div class="col-lg-6">
                                            <select class="default-select wide form-control" id="status" for='status' name="status" disabled>
                                                <option value="{{ Auth::guard('staff')->user()->status }}">{{ Auth::guard('staff')->user()->status == '0' ? 'Đang làm việc' : 'Đã nghỉ việc' }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-10">
                                        <button type="submit" class="btn btn-primary" style="width: 100%;">Sửa thông tin tài khoản</button>
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