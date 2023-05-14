@extends('staff.layouts.master')

@section('title')
    <title>Thông tin khen thưởng nhân viên</title>
@endsection 

@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Thông tin khen thưởng nhân viên: {{ Auth::guard('staff')->user()->name }}</h4>
            </div>
            
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-responsive-md">
                        <thead>
                            <tr>
                                <th><strong>STT</strong></th>
                                <th><strong>Cấp độ</strong></th>
                                <th><strong>Lý do</strong></th>
                                <th><strong>Tiền thưởng</strong></th>
                                <th><strong>Ngày tạo</strong></th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($achievement as $item)
                            <tr>
                                <td><strong>{{ $loop->index +1}}</strong></td>
                                <td><strong>{{ $item->achievementType->name }}</strong></td>
                                <td>{{ $item->reason }}</td>
                                <td>{{ number_format($item->money)}} VND</td>
                                <td>{{ $item->created_at->format('d/m/Y') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection