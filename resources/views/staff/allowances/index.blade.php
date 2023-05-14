@extends('staff.layouts.master')

@section('title')
    <title>Thông tin phụ cấp</title>
@endsection 

@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Thông tin phụ cấp nhân viên: {{ Auth::guard('staff')->user()->name }}</h4>
            </div>
            
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-responsive-md">
                        <thead>
                            <tr>
                                <th><strong>STT</strong></th>
                                <th><strong>Tên phụ cấp</strong></th>
                                <th><strong>Số tiền phụ cấp</strong></th>
                                <th><strong>Ngày tạo</strong></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($allowances as $item)
                            <tr>
                                <td><strong>{{ $loop->index +1}}</strong></td>
                                <td><strong>{{ $item->name }}</strong></td>
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