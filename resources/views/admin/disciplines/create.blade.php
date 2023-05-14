@extends('admin.layouts.master')

@section('title')
    <title>Kỉ luật</title>
@endsection

@section('content')
<div class="container-fluid">
    <!-- row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Thêm mới kỉ luật</h4>
                </div>
                <div class="card-body">
                    <div class="form-validation">
                        <form class="needs-validation" enctype="multipart/form-data" action="{{ route('ad.disciplines_store') }}" novalidate method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-xl-12">
                                    {{-- nhân viên --}}
                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="idStaff">Nhân viên
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <select class="default-select wide form-control" for='idStaff' name="idStaff">>
                                                @foreach ($staffs as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }} - Phòng: {{ $item->department->name }} - Chức vụ: {{ $item->position->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    {{-- Cấp độ khen thưởng --}}
                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="type">Cấp độ kỉ luật
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <select class="default-select wide form-control" id="type" for='type' name="type">>
                                                @foreach ($disciplineTypes as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
 
                                    {{-- cccd --}}
                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="validationCustom01">Lý do kỉ luật
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control @error('reason') is-invalid @enderror" name="reason" id="reason"  placeholder="Nhập lý do kỉ luật..." value="{{ old('reason') }}">
                                            @error('reason')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- Ghi chú --}}
                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="description">Ghi chú 
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"  rows="5" placeholder="Ghi chú..." required></textarea>
                                            @error('description')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <div class="col-lg-8 ms-auto">
                                            <button type="submit" class="btn btn-primary">Tạo mới</button>
                                            <a href="{{ route('ad.achievements_index') }}" class="btn btn-default">Quay lại</a>
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