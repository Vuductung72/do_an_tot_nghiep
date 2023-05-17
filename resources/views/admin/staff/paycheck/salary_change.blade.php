@extends('admin.layouts.master')

@section('title')
    <title>Thay đổi lương</title>
@endsection

@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Thay đổi lương</h4>
                <div class="actions">
                    <a href="{{ route('ad.staffs_index') }}" class="btn btn-sm btn-primary">Quay lại</a>
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
                                    <input type="text" class="form-control" name="name" id="name" value="{{$staff->name}}" disabled>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="col-lg-4 col-form-label" for="idPosition">Chức vụ:</label>
                            <div class="col-lg-8">
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" name="idPosition" id="idPosition" value="{{$staff->position->name}}" disabled>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="col-lg-4 col-form-label" for="idDepartment">Phòng bán:</label>
                            <div class="col-lg-8">
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" name="idDepartment" id="idDepartment" value="{{$staff->department->name}}" disabled>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="col-lg-4 col-form-label" for="id_staff">Lương cũ:</label>
                            <div class="col-lg-8">
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" name="id_staff" id="id_staff" value="{{number_format($staff->salary)}}" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="form-validation">
                    <form class="needs-validation" enctype="multipart/form-data" action="{{route('ad.staffs_calculatorSalaryChange', ['id'=> $staff->id])}}" novalidate method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                {{-- tổng lương --}}
                                <div class="mb-3 row">
                                    <label class="col-lg-2 col-form-label" for="new_salary">Lương mới </label>
                                    <div class="col-lg-4" style="position: relative">
                                        <input type="text" class="form-control input-money" name="new_salary" id="new_salary"  value="" >
                                        <span style="position: absolute; right: 30px; top: 15px">VND</span>
                                        <div class="input-convert-amount">
                                            <p>= <span>0</span> VND</p>
                                        </div>
                                    </div>

                                </div>
                                <div class="mb-3 row">
                                    <label class="col-lg-2 col-form-label" for="reason">Lý do tăng lương</label>
                                    <div class="col-lg-8 d-flex align-items-center">
                                        <textarea class="form-control" id="reason" name="reason" rows="5" placeholder="Lý do tăng lương" ></textarea>
                                    </div>
                                </div>
                                <div class="col-12 ms-auto">
                                    <button type="submit" class="btn btn-primary">Thay đổi</button>
                                    <a href="{{ route('ad.staffs_index') }}" class="btn btn-default">Quay lại</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-responsive-md">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th><strong>Tên</strong></th>
                                <th><strong>Lương cũ</strong></th>
                                <th><strong>Lương mới</strong></th>
                                <th width='500'><strong>Lý do</strong></th>
                                <th><strong>Ngày tạo</strong></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($salary_changes as $item)
                                <tr>
                                    <td><strong>{{ $loop->index +1}}</strong></td>
                                    <td>{{ $item->staff->name }}</td>
                                    <td>{{ number_format($item->old_salary) }}</td>
                                    <td>{{ number_format($item->new_salary) }}</td>
                                    <td>{{ $item->reason }}</td>
                                    <td>{{ $item->created_at->format('d/m/Y') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="pagination justify-content-center">

                    </div>

                </div>

            </div>
        </div>
    </div>

@push('scripts')
    <script>
        $(document).ready(function() {
        var today = new Date();
        var month = today.getMonth() + 1; // Lấy tháng hiện tại (tháng bắt đầu từ 0 nên cộng thêm 1)
        var year = today.getFullYear(); // Lấy năm hiện tại

        // Gán giá trị tháng và năm vào input
        $('#month').val(month);
        $('#year').val(year);
        });
    </script>
@endpush
@endsection
