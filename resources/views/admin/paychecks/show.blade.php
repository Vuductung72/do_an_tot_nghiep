@extends('admin.layouts.master')

@section('title')
    <title>Lương</title>
@endsection 

@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Lương</h4>
                <div class="actions">
                    <a href="{{ route('ad.paychecks_index') }}" class="btn btn-sm btn-primary">Quay lại</a>
                </div>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-xl-6">
                        {{-- tên --}}
                        <div class="mb-3 row">
                            <label class="col-lg-4 col-form-label" for="validationCustom01">Tên nhân viên</label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" name="idStaff" id="idStaff" value="{{$paycheck->staff->name}}" disabled>
                            </div>
                        </div>
                        {{-- Phong --}}
                        <div class="mb-3 row">
                            <label class="col-lg-4 col-form-label" for="validationCustom01">Phòng ban</label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" name="" id="" value="{{$paycheck->staff->department->name}}" disabled>
                            </div>
                        </div>
                        {{-- chuc vu --}}
                        <div class="mb-3 row">
                            <label class="col-lg-4 col-form-label" for="validationCustom01">Chức vụ</label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" name="" id="" value="{{$paycheck->staff->position->name}}" disabled>
                            </div>
                        </div>

                        {{-- Tháng --}}
                        <div class="mb-3 row">
                            <label class="col-lg-4 col-form-label" for="validationCustom03">Tháng
                            </label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" name="month" id="month" value="{{$paycheck->month}}" disabled>
                            </div>
                        </div>

                        {{-- Năm --}}
                        <div class="mb-3 row">
                            <label class="col-lg-4 col-form-label" for="validationCustom03">Năm
                            </label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" name="year" id="year" value="{{$paycheck->year}}" disabled>
                            </div>
                        </div>  
                        
                        {{-- lương --}}
                        <div class="mb-3 row">
                            <label class="col-lg-4 col-form-label" for="validationCustom03">Lương</label>
                            <div class="col-lg-8" style="position: relative">
                                <input type="text" class="form-control" name="salary" id="salary" value="{{ number_format($paycheck->staff->salary) }}" disabled>
                                <span style="position: absolute; right: 30px; top:15px;">VND</span>
                            </div>
                        </div>

                        {{-- Ngày công --}}
                        <div class="mb-3 row">
                            <label class="col-lg-4 col-form-label" for="validationCustom01">Số ngày đi làm</label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" name="total_day_working" id="total_day_working"   value="{{ $paycheck->total_day_working }}" disabled>
                            </div>
                        </div>

                        {{-- phụ cấp --}}
                        <div class="mb-3 row">
                            <label class="col-lg-4 col-form-label" for="validationCustom01">Phụ cấp</label>
                            <div class="col-lg-8" style="position: relative">
                                <input type="text" class="form-control" name="id_allowances" id="id_allowances"   value="{{ number_format($paycheck->total_allowances) }}" disabled>
                                <span style="position: absolute; right: 30px; top:15px;">VND</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        {{-- tổng lương --}}
                        <div class="mb-3 row">
                            <label class="col-lg-2 col-form-label" for="validationCustom01">Tổng lương </label>
                            <div class="col-lg-4 d-flex align-items-center" style="position: relative">
                                <input type="text" class="form-control" name="total_salary" id="total_salary"  value="{{ number_format($paycheck->total_salary) }} " disabled>
                                <span style="position: absolute; right: 30px">VND</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


@endsection