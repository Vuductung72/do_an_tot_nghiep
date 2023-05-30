@extends('admin.layouts.master')

@section('title')
    <title>Danh sách bảng lương</title>
@endsection

@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Danh sách bảng lương</h4>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-9">
                        <div class="dashboard_bar">
                            <form method="GET" action="{{route('ad.paychecks_search')}}">
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
                                        <label for="month">Tháng</label>
                                        <input type="number" class="form-control" placeholder="Nhập tháng cần tìm..." name="month" min="1" max="12" value="{{old('month', isset($month) ? $month : '')}}">
                                    </div>
                                    <div class="col-12 col-md-3">
                                        <label for="year">Năm</label>
                                        <input type="number" class="form-control" placeholder="Nhập năm cần tìm..." name="year" value="{{old('year', isset($year) ? $year : '')}}">
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
                                <th><strong>Tháng</strong></th>
                                <th><strong>Năm</strong></th>
                                <th><strong>Lương</strong></th>
                                <th><strong>Action</strong></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($paychecks as $item)
                            <tr>
                                {{-- <td><strong>{{ $item->id }}</strong></td> --}}
                                <td><strong>{{ $loop->index +1}}</strong></td>
                                <td><span class="w-space-no">{{ $item->staff->name }}</span></td>
                                <td>{{ $item->staff->department->name }}</td>
                                <td>{{ $item->staff->position->name }}</td>
                                <td>{{ $item->month }}</td>
                                <td>{{ $item->year }}</td>
                                <td>{{ number_format($item->total_salary) }}</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{route('ad.paychecks_show', ['id' => $item->id])}}" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fa-solid fa-eye"></i></a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="pagination justify-content-center">
                        {{ $paychecks->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

