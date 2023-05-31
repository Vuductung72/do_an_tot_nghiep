@extends('admin.layouts.master')

@section('title')
    <title>Quản lí phụ cấp</title>
@endsection

@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Danh sách phụ cấp</h4>
            </div>

            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-lg-9">
                        <div class="dashboard_bar">
                            <form action="{{route('ad.allowances_search')}}" method="GET">
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
                                <th><strong>Tên phụ cấp</strong></th>
                                <th><strong>Nhân viên</strong></th>
                                <th><strong>Phòng</strong></th>
                                <th><strong>Chức vụ</strong></th>
                                <th><strong>Số tiền phụ cấp</strong></th>
                                <th><strong>Action</strong></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($allowances as $item)
                            <tr>
                                <td><strong>{{ $loop->index +1}}</strong></td>
                                <td><strong>{{ $item->name }}</strong></td>
                                <td><span class="w-space-no">{{ $item->staff->name}}</span></td>
                                <td><span class="w-space-no">{{ $item->staff->department->name }}</span></td>
                                <td><span class="w-space-no">{{ $item->staff->position->name }}</span></td>
                                <td>{{ number_format($item->money)}}</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('ad.allowances_edit', ['id' => $item->id]) }}" class="btn btn-primary shadow btn-xs sharp me-1" title="Chỉnh sửa"><i class="fas fa-pencil-alt"></i></a>
                                        <a href="{{ route('ad.allowances_destroy', ['id' => $item->id]) }}" data-url="" class="btn btn-danger shadow btn-xs sharp" title="Xoá"><i class="fas fa-trash-alt"></i></a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="pagination justify-content-center">
                        {{ $allowances->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
