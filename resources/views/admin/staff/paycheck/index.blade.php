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
                    <a href="{{ route('ad.staffs_index') }}" class="btn btn-sm btn-primary">Quay lại</a>
                </div>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-xl-6">
                        {{-- tên --}}
                        <div class="mb-3 row">
                            <label class="col-lg-4 col-form-label" for="validationCustom01">Tên nhân vien</label>
                            <div class="col-lg-8">
                                <select class="default-select wide form-control" for='idDepartment' name="idDepartment" disabled>
                                        <option value="{{ $staff->id }}" selected>{{ $staff->name }}</option>
                                </select>
                            </div>
                        </div>

                        {{-- Tháng --}}
                        <div class="mb-3 row">
                            <label class="col-lg-4 col-form-label" for="validationCustom03">Tháng
                            </label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control @error('salary') is-invalid @enderror" name="month" id="month" disabled>
                            </div>
                        </div>

                        {{-- Năm --}}
                        <div class="mb-3 row">
                            <label class="col-lg-4 col-form-label" for="validationCustom03">Năm
                            </label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" name="year" id="year" disabled>
                            </div>
                        </div>                       
                    </div>
                    <div class="col-xl-6">
                        {{-- lương --}}
                        <div class="mb-3 row">
                            <label class="col-lg-4 col-form-label" for="validationCustom03">Lương</label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" name="salary" id="salary" value="{{ number_format($staff->salary) }}" disabled>
                            </div>
                        </div>

                        {{-- Ngày công --}}
                        <div class="mb-3 row">
                            <label class="col-lg-4 col-form-label" for="validationCustom01">Số ngày đi làm</label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" name="total_day_working" id="total_day_working"   value="{{ $totalDay }}" disabled>
                            </div>
                        </div>

                        {{-- phụ cấp --}}
                        <div class="mb-3 row">
                            <label class="col-lg-4 col-form-label" for="validationCustom01">Phụ cấp</label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" name="id_allowances" id="id_allowances"  value="{{ number_format( $totalAllowances ) }}" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        {{-- tổng lương --}}
                        <div class="mb-3 row">
                            <label class="col-lg-2 col-form-label" for="validationCustom01">Tổng lương </label>
                            <div class="col-lg-4 d-flex align-items-center" style="position: relative">
                                <input type="text" class="form-control" name="total_salary" id="total_salary"  value="{{ number_format($totalSalary) }}" disabled>
                                <span style="position: absolute; right: 30px">VND</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="form-validation">
                    <form class="needs-validation" enctype="multipart/form-data" action="{{ route('ad.staffs_calculatorSalary', ['id'=> $staff->id]) }}" novalidate method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-12 ms-auto">
                                <button type="submit" class="btn btn-primary">Tính lương</button>
                                <a href="{{ route('ad.staffs_index') }}" class="btn btn-default">Quay lại</a>
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
                                <th><strong>Tháng</strong></th>
                                <th><strong>Năm</strong></th>
                                <th><strong>Tổng lương</strong></th>
                                <th><strong>Ngày tạo</strong></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($paychecks as $item)
                            <tr>
                                <td><strong>{{ $loop->index +1}}</strong></td>
                                <td><span class="w-space-no">{{ $item->staff->name }}</span></td>
                                <td>{{ $item->month }}</td>
                                <td>{{ $item->year }}</td>
                                <td>{{ number_format($item->total_salary) }} VND</td>
                                <td>{{ $item->created_at->format('d/m/Y') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="pagination justify-content-center">
                        {{ $paychecks->links() }}
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