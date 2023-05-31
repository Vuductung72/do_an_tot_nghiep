@extends('admin.layouts.master')

@section('title')
    <title>Quản lí ngày nghỉ</title>
@endsection

@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Quản lí ngày nghỉ</h4>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-9">
                        <div class="dashboard_bar">
                            <form method="GET" action="{{route('ad.leave_search')}}">
                                <div class="form-group row">
                                    <div class="col-12 col-md-3">
                                        <label for="department">Phòng ban</label>
                                        <select id="department" class="default-select form-control wide" name="department" tabindex="null">
                                            <option selected value="">Chọn...</option>
                                            @foreach ($departments as $item)
                                                @if (isset($department))
                                                    <option value="{{ $item->id }}" {{$item->id == $department ? 'selected' : ''}}>{{ $item->name }}</option>
                                                @else
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-12 col-md-3">
                                        <label for="date">Ngày xin nghỉ</label>
                                        <input type="date" class="form-control" placeholder="Nhập ngày xin nghỉ cần tìm..." name="date" min="1" max="12" value="{{old('date', isset($date) ? $date : '')}}">
                                    </div>
                                    <div class="col-12 col-md-3" style="display:inherit;align-items:end;">
                                        <button type="submit" class="btn btn-primary">Tìm kiềm</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-responsive-md">
                        <thead>
                            <tr>
                                <th><strong>STT</strong></th>
                                <th><strong>Tên</strong></th>
                                <th><strong>Phòng ban</strong></th>
                                <th><strong>Chức vụ</strong></th>
                                <th><strong>Ngày nghỉ</strong></th>
                                <th width='450'><strong>Lí do</strong></th>
                                <th><strong>Trạng thái</strong></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($leaves as $item)
                            <tr>
                                {{-- <td><strong>{{ $item->id }}</strong></td> --}}
                                <td><strong>{{ $loop->index +1}}</strong></td>
                                <td><span class="w-space-no">{{ $item->staff->name }}</span></td>
                                <td>{{ $item->staff->department->name }}</td>
                                <td>{{ $item->staff->position->name }}</td>
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

