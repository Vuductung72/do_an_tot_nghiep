@extends('staff.layouts.master')

@section('title')
    <title>Bảng lương</title>
@endsection 

@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Bảng lương nhân viên: {{ Auth::guard('staff')->user()->name }}</h4>
            </div>
            
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-responsive-md">
                        <thead>
                            <tr>
                                <th><strong>STT</strong></th>
                                <th><strong>Số ngày đi làm</strong></th>
                                <th><strong>Tháng</strong></th>
                                <th><strong>Năm</strong></th>
                                <th><strong>Phụ cấp</strong></th>
                                <th><strong>Tổng lương</strong></th>
                                <th><strong>Ngày tạo</strong></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($paychecks as $item)
                            <tr>
                                <td><strong>{{ $loop->index +1}}</strong></td>
                                <td><strong>{{ $item->total_day_working}}</strong></td>
                                <td><strong>{{ $item->month }}</strong></td>
                                <td><strong>{{ $item->year }}</strong></td>
                                <td>{{ number_format($item->total_allowances)}} VND</td>
                                <td>{{ number_format($item->total_salary)}} VND</td>
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
@endsection