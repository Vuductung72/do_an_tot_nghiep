@extends('admin.layouts.master')

@section('title')
    <title>Quản lí nhân viên</title>
@endsection 

@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Danh sách nhân viên</h4>
                <div class="actions">
                    <a href="{{ route('ad.staffs_index') }}" class="btn btn-sm btn-primary">Quay lại</a>
                </div>
            </div>
            
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-responsive-md">
                        <thead>
                            <tr>
                                <th><strong>STT</strong></th>
                                <th><strong>Tên</strong></th>
                                <th><strong>Ngày</strong></th>
                                <th><strong>Check in</strong></th>
                                <th><strong>Check out</strong></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($attendance as $item)
                            <tr>
                                <td><strong>{{ $loop->index +1}}</strong></td>
                                <td><span class="w-space-no">{{ $item->staff->name }}</span></td>
                                <td>{{ $item->date }}</td>
                                <td>{{ $item->time_in }}</td>
                                <td>{{ $item->time_out }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                </div>
                
            </div>
        </div>
    </div>
@endsection