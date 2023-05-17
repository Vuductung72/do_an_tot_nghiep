@extends('staff.layouts.master')

@section('title')
    <title>Bảng thay dổi lương</title>
@endsection

@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Bảng thay đổi lương: {{ Auth::guard('staff')->user()->name }}</h4>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-responsive-md">
                        <thead>
                            <tr>
                                <th><strong>STT</strong></th>
                                <th><strong>Lương cũ</strong></th>
                                <th><strong>Lương mới</strong></th>
                                <th width='500'><strong>Lý do</strong></th>
                                <th><strong>Ngày tạo</strong></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($salary as $item)
                            <tr>
                                <td><strong>{{ $loop->index +1}}</strong></td>
                                <td><strong>{{ number_format($item->old_salary)}} VND</strong></td>
                                <td><strong>{{ number_format($item->new_salary)}} VND</strong></td>
                                <td><strong>{{ $item->reason }}</strong></td>
                                <td>{{ $item->created_at->format('d/m/Y') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="pagination justify-content-center">
                        {{ $salary->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
