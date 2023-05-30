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
                    <a href="{{ route('ad.staffs_create') }}" class="btn btn-sm btn-primary"> <i class="fa fa-plus"></i> Thêm mới</a>
                </div>
            </div>

            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-lg-9">
                        <div class="dashboard_bar">
                            <form action="{{ route('ad.staffs_search') }}" method="GET">
                                <div class="form-group row">
                                    <div class="col-12 col-md-3">
                                        <label for="name">Tên nhân viên</label>
                                        <input type="text" class="form-control" placeholder="Nhập tên nhân viên cần tìm..." name="name" min="1" max="12" value="{{old('name', isset($name) ? $name : '')}}">
                                    </div>
                                    <div class="col-12 col-md-3">
                                        <label for="department">Phòng ban</label>
                                        <select id="department" class="default-select form-control wide" name="department" tabindex="null">
                                            <option value="">Chọn...</option>
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
                                        <label for="position">Chức vụ</label>
                                        <select id="position" class="default-select form-control wide" name="position" tabindex="null">
                                            <option selected value="">Chọn...</option>
                                            @foreach ($positions as $item)
                                                @if (isset($position))
                                                    <option value="{{ $item->id }}" {{$item->id == $position ? 'selected' : ''}}>{{ $item->name }}</option>
                                                @else
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
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
                                <th><strong>Hình ảnh</strong></th>
                                <th><strong>Tên</strong></th>
                                <th><strong>Phòng ban</strong></th>
                                <th><strong>Chức vụ</strong></th>
                                <th><strong>Trạng thái</strong></th>
                                <th><strong>Bảng công</strong></th>
                                <th><strong>Phụ cấp</strong></th>
                                <th><strong>Bảng lương</strong></th>
                                <th><strong>Lương</strong></th>
                                <th><strong>Action</strong></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($staffs as $item)
                            <tr>
                                {{-- <td><strong>{{ $item->id }}</strong></td> --}}
                                <td><strong>{{ $loop->index +1}}</strong></td>
                                <td>
                                    <img src="{{ $item->image }}" alt="image-staff" style="width: 60px"></td>
                                <td><span class="w-space-no">{{ $item->name }}</span></td>
                                <td>{{ $item->department->name }}</td>
                                <td>{{ $item->position->name }}</td>
                                <td>{{ $item->status == 0 ? 'Đang làm việc' : 'Đã nghỉ việc' }}</td>
                                <td><a href="{{route('ad.staffs_attendance', ['id' => $item->id])}}">Bảng công</a></td>
                                <td><a href="{{route('ad.staffs_allowance', ['id' => $item->id])}}">Phụ cấp</a></td>
                                <td><a href="{{route('ad.staffs_litspaycheck', ['id' => $item->id])}}">Tính lương</a></td>
                                <td><a href="{{route('ad.staffs_change', ['id' => $item->id])}}">Lương</a></td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('ad.staffs_edit', ['id' => $item->id]) }}" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                                        <a href="{{ route('ad.staffs_destroy', ['id' => $item->id]) }}" data-url="" class="btn btn-danger shadow btn-xs sharp"><i class="fas fa-trash-alt"></i></a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="pagination justify-content-center">
                        {{ $staffs->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

