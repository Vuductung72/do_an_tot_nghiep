@extends('admin.layouts.master')

@section('title')
    <title>Ngày xin nghỉ của nhân viên {{$staff->name}}</title>
@endsection

@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Ngày xin nghỉ của nhân viên {{$staff->name}}</h4>
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
                                <th><strong>Ngày xin nghỉ</strong></th>
                                <th width='500'><strong>Lý do</strong></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($leaves as $item)
                            <tr>
                                <td><strong>{{ $loop->index +1}}</strong></td>
                                <td> {{$item->staff->name }}</td>
                                <td>{{ $item->date }}</td>
                                <td>{{ $item->reason }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="pagination justify-content-center">
                        {{ $leaves->links() }}
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
