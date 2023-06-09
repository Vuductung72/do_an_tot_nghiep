@extends('admin.layouts.master')

@section('title')
    <title>Phụ cấp</title>
@endsection

@section('content')
<div class="container-fluid">
    <!-- row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Sửa phụ cấp</h4>
                </div>
                <div class="card-body">
                    <div class="form-validation">
                        <div class="col-xl-12">
                            <div class="row">
                                {{-- tên --}}
                                <div class="col-xl-4 mb-3">
                                    <div class="row"></div>
                                    <label for="name">Tên nhân viên:</label>
                                    <input type="text" class="form-control" name="name" id="name" value="{{$allowance->staff->name}}" disabled>
                                </div>

                                <div class="col-xl-4 mb-3">
                                    <label for="idPosition">Chức vụ:</label>
                                    <input type="text" class="form-control" name="idPosition" id="idPosition" value="{{$allowance->staff->position->name}}" disabled>
                                </div>

                                <div class="col-xl-4 mb-3">
                                    <label for="idDepartment">Phòng bán:</label>
                                    <input type="text" class="form-control" name="idDepartment" id="idDepartment" value="{{$allowance->staff->department->name}}" disabled>
                                </div>
                            </div>

                        </div>
                        <form class="needs-validation" enctype="multipart/form-data" action="{{ route('ad.allowances_update', ['id' => $allowance->id ]) }}" novalidate method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-xl-12">
                                    {{-- Tên phụ cấp --}}
                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="validationCustom01">Tên phụ cấp
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"  value="{{ $allowance->name }}">
                                            @error('name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- Tiền thưởng --}}
                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="money">Số tiền phụ cấp
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control input-money @error('money') is-invalid @enderror" name="money" id="money" value="{{ $allowance->money }}"  required>
                                            @error('money')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                            <div class="input-convert-amount">
                                                <p>= <span>{{ number_format($allowance->money) }}</span> VND</p>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Ghi chú --}}
                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="description">Ghi chú
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"  rows="5" required>{{ $allowance->description }}</textarea>
                                            @error('description')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <div class="col-lg-8 ms-auto">
                                            <button type="submit" class="btn btn-primary">Sửa</button>
                                            <a href="{{ route('ad.allowances_index') }}" class="btn btn-default">Quay lại</a>
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
