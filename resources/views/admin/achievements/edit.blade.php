@extends('admin.layouts.master')

@section('title')
    <title>Khen thưởng</title>
@endsection

@section('content')
<div class="container-fluid">
    <!-- row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Sửa khen thưởng</h4>
                </div>
                <div class="card-body">
                    <div class="form-validation">
                        <form class="needs-validation" enctype="multipart/form-data" action="{{  route('ad.achievements_update', ['id' => $achievement->id]) }} }}" novalidate method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-xl-12">
                                    {{-- nhân viên --}}
                                    <div class="mb-3 row">
                                        <label class="col-lg-2 col-form-label" for="idStaff">Nhân viên
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-8">
                                            <select class="default-select wide form-control" for='idStaff' name="idStaff">>
                                                @foreach ($staffs as $item)
                                                    <option value="{{ $item->id }}" {{ $item->id == $achievement->staff->id ? 'selected' : '' }}>{{ $item->name }} - Phòng: {{ $item->department->name }} - Chức vụ: {{ $item->position->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    {{-- Cấp độ khen thưởng --}}
                                    <div class="mb-3 row">
                                        <label class="col-lg-2 col-form-label" for="type">Cấp độ khen thưởng
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-8">
                                            <select class="default-select wide form-control" id="type" for='type' name="type">>
                                                @foreach ($achievementTypes as $item)
                                                    <option value="{{ $item->id }}" {{ $item->id == $achievement->achievementType->id ? 'selected' : '' }}>{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
 
                                    {{-- cccd --}}
                                    <div class="mb-3 row">
                                        <label class="col-lg-2 col-form-label" for="validationCustom01">Lý do khen thưởng
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control @error('reason') is-invalid @enderror" name="reason" id="reason"  value="{{ $achievement->reason }}">
                                            @error('reason')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    {{-- Tiền thưởng --}}
                                    <div class="mb-3 row">
                                        <label class="col-lg-2 col-form-label" for="money">Số tiền thưởng
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control input-money @error('money') is-invalid @enderror" name="money" id="money" value="{{ $achievement->money }}"  required>
                                            @error('money')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                            <div class="input-convert-amount">
                                                <p>= <span>{{ number_format($achievement->money) }}</span> VND</p>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Ghi chú --}}
                                    <div class="mb-3 row">
                                        <label class="col-lg-2 col-form-label" for="description">Ghi chú 
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-8">
                                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"  rows="5" required>{{ $achievement->description }}</textarea>
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