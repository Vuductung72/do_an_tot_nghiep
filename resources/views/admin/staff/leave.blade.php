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
                                <th><strong>Trạng thái</strong></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($leaves as $item)
                            <tr>
                                <td><strong>{{ $loop->index +1}}</strong></td>
                                <td> {{$item->staff->name }}</td>
                                <td>{{ $item->date }}</td>
                                <td>{{ $item->reason }}</td>
                                <td>
                                    <form id="status-form" action="{{ route('ad.leave_status', $item->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-primary shadow btn-xs" data-url="" title="{{$item->status == '1' ? 'Xác nhận' : 'Huỷ xác nhận'}}">
                                            {{$item->status == 1 ? 'Xác nhận' : 'Huỷ xác nhận'}}
                                        </button>
                                    </form>
                                </td>
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
