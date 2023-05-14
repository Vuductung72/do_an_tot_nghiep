@extends('admin.layouts.master')

@section('title')
    <title>Xem chi tiết thay đổi lương</title>
@endsection 

@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Xem chi tiết thay đổi lương</h4>
                <div class="actions">
                    <a href="{{ route('ad.salary_change_index') }}" class="btn btn-sm btn-primary">Quay lại</a>
                </div>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-xl-6">
                        {{-- tên --}}
                        <div class="mb-3 row">
                            <label class="col-lg-4 col-form-label" for="name">Tên nhân viên:</label>
                            <div class="col-lg-8">
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" name="name" id="name" value="{{$salary->staff->name}}" disabled>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="col-lg-4 col-form-label" for="idPosition">Chức vụ:</label>
                            <div class="col-lg-8">
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" name="idPosition" id="idPosition" value="{{$salary->staff->position->name}}" disabled>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="col-lg-4 col-form-label" for="idDepartment">Phòng bán:</label>
                            <div class="col-lg-8">
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" name="idDepartment" id="idDepartment" value="{{$salary->staff->department->name}}" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                        
                    <div class="col-xl-6">
                        <div class="mb-3 row">
                            <label class="col-lg-4 col-form-label" for="salary_basic">Lương ban đầu:</label>
                            <div class="col-lg-8">
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" name="salary_basic" id="salary_basic" value="{{number_format($salary->staff->salary_basic)}}" disabled>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="col-lg-4 col-form-label" for="old_salary">Lương cũ:</label>
                            <div class="col-lg-8">
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" name="old_salary" id="old_salary" value="{{number_format($salary->old_salary)}}" disabled>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="col-lg-4 col-form-label" for="new_salary">Lương thay đổi:</label>
                            <div class="col-lg-8">
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" name="new_salary" id="new_salary" value="{{number_format($salary->new_salary)}}" disabled>
                                </div>
                            </div>
                        </div>
                        
                    </div>

                    <div class="col-12">
                        {{-- tổng lương --}}
                        
                        <div class="mb-3 row">
                            <label class="col-lg-2 col-form-label" for="reason">Lý do tăng lương</label>
                            <div class="col-lg-10 d-flex align-items-center">
                                <textarea class="form-control" id="reason" name="reason" rows="5" placeholder="Lý do tăng lương" disabled >{{$salary->reason}}</textarea>
                            </div>
                        </div>
                    </div>
                    
 
                </div>
            </div>
            
        </div>
    </div>
@endsection