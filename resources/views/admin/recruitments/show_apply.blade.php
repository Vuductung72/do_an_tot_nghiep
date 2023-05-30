@extends('admin.layouts.master')

@section('title')
    <title>Thông tin người tuyển dụng</title>
@endsection

@section('content')
<div class="container-fluid">
    <!-- row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Thông tin người tuyển dụng</h4>
                </div>
                <div class="card-body">
                    <div class="form-validation">
                        <div class="row">
                            <div class="col-xl-6">
                                {{-- tên --}}
                                <div class="mb-3 row">
                                    <label class="col-lg-4 col-form-label" for="name">Tên</label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" name="name" id="name"  value="{{ $apply->user->name }}" disabled>
                                    </div>
                                </div>
                                {{-- giới tính --}}
                                <div class="mb-3 row">
                                    <label class="col-lg-4 col-form-label" for="gender">Giới tính</label>
                                    <div class="col-lg-6">
                                        <select class="default-select wide form-control" id="gender" for='gender' name="gender" disabled>
                                            <option value="{{ $apply->user->gender }}">{{ $apply->user->gender == 0 ? 'Nữ' : 'Nam' }}</option>
                                        </select>
                                    </div>
                                </div>
                                {{-- email --}}
                                <div class="mb-3 row">
                                    <label class="col-lg-4 col-form-label" for="email">Email </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" name="email" id="email" value="{{ $apply->user->email }}" disabled>
                                    </div>
                                </div>
                                {{-- sđt --}}
                                <div class="mb-3 row">
                                    <label class="col-lg-4 col-form-label" for="phone">Số điện thoại</label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" name="phone" id="phone" value="{{ $apply->user->phone }}" disabled>
                                    </div>
                                </div>
                                {{-- dia chi --}}
                                <div class="mb-3 row">
                                    <label class="col-lg-4 col-form-label" for="address">Địa chỉ </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" name="address" id="address" value="{{ $apply->user->address }}" disabled>
                                    </div>
                                </div>

                                {{-- cv --}}
                                <div class="mb-3 row">
                                    <label class="col-lg-4 col-form-label" for="cv">cv</label>
                                    <div class="col-lg-6">
                                        <a href="{{ route('ad.download_cv', ['id' => $apply->id]) }}">Tải về CV</a>
                                    </div>
                                </div>

                                {{-- trang thai --}}
                                <div class="mb-3 row">
                                    <label class="col-lg-4 col-form-label" for="type">Trạng thái </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" name="type" id="type" value="{{ $apply->type === 0 ? 'Chưa xác nhận' : 'Đã xác nhận' }}" disabled>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <div class="col-lg-8 ms-auto d-flex">
                                        @if ($apply->status == 0)
                                            <form id="status-form" action="{{ route('ad.recruitments_status_apply', ['id'=> $apply->id]) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-primary">
                                                    Xác nhận
                                                </button>
                                            </form>
                                        @else
                                            <button type="submit" class="btn btn-primary" disabled>
                                                Đã xác nhận
                                            </button>
                                        @endif
                                        <a href="{{ route('ad.recruitments_edit', ['id' => $apply->recruitment_id]) }}" class="btn btn-default">Quay lại</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
