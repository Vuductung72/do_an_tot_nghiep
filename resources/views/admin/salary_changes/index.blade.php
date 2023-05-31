@extends('admin.layouts.master')

@section('title')
    <title>Danh sách tăng lương</title>
@endsection

@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Danh sách tăng lương</h4>
            </div>

            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-lg-9">
                        <div class="dashboard_bar">
                            <form action="{{route('ad.salary_change_search')}}" method="GET">
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
                                <th><strong>Tên</strong></th>
                                <th><strong>Phòng ban</strong></th>
                                <th><strong>Chức vụ</strong></th>
                                <th><strong>Lương cũ</strong></th>
                                <th><strong>Lương hiện tại</strong></th>
                                <th><strong>Action</strong></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($salarys as $item)
                            <tr>
                                {{-- <td><strong>{{ $item->id }}</strong></td> --}}
                                <td><strong>{{ $loop->index +1}}</strong></td>
                                <td><span class="w-space-no">{{ $item->staff->name }}</span></td>
                                <td>{{ $item->staff->department->name }}</td>
                                <td>{{ $item->staff->position->name }}</td>
                                <td>{{ number_format($item->old_salary) }}</td>
                                <td>{{ number_format($item->new_salary) }}</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{route('ad.salary_change_show', ['id' => $item->id])}}" class="btn btn-primary shadow btn-xs sharp me-1" title="Xem chi tiết"><i class="fa-solid fa-eye"></i></a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="pagination justify-content-center">
                        {{ $salarys->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

