@extends('admin.layouts.master')

@section('title')
    <title>Phạt</title>
@endsection

@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Phạt</h4>
                <div class="actions">
                    <a href="{{ route('ad.staffs_index') }}" class="btn btn-sm btn-primary">Quay lại</a>
                </div>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="row">
                            {{-- tên --}}
                            <div class="col-xl-4 mb-3">
                                <div class="row"></div>
                                <label for="name">Tên nhân viên:</label>
                                <input type="text" class="form-control" name="name" id="name" value="{{$staff->name}}" disabled>
                            </div>

                            <div class="col-xl-4 mb-3">
                                <label for="idPosition">Chức vụ:</label>
                                <input type="text" class="form-control" name="idPosition" id="idPosition" value="{{$staff->position->name}}" disabled>
                            </div>

                            <div class="col-xl-4 mb-3">
                                <label for="idDepartment">Phòng bán:</label>
                                <input type="text" class="form-control" name="idDepartment" id="idDepartment" value="{{$staff->department->name}}" disabled>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="form-validation">
                    <form class="needs-validation" enctype="multipart/form-data" action="{{route('ad.punish_store', ['id'=> $staff->id])}}" novalidate method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-xl-6">
                                {{-- Tiền phụ cấp --}}
                                <div class="mb-3 row">
                                    <label class="col-lg-4 col-form-label" for="money">Số tiền phạt
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control input-money @error('money') is-invalid @enderror" name="money" id="money" placeholder="Nhập số tiền phạt..." value="{{ old('money') }}"  required>
                                        @error('money')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        <div class="input-convert-amount">
                                            <p>= <span>0</span> VND</p>
                                        </div>
                                    </div>
                                </div>
                                {{-- Ghi chú --}}
                                <div class="mb-3 row">
                                    <label class="col-lg-4 col-form-label" for="reason">Lí do phạt
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <textarea class="form-control @error('reason') is-invalid @enderror" id="reason" name="reason"  rows="5" placeholder="Lí do phạt" required></textarea>
                                        @error('reason')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 ms-auto">
                                    <button type="submit" class="btn btn-primary">Thêm</button>
                                    <a href="{{ route('ad.staffs_index') }}" class="btn btn-default">Quay lại</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-responsive-md">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th><strong>Ngày</strong></th>
                                <th><strong>Số phạt</strong></th>
                                <th width='500'><strong>Lý do</strong></th>
                                <th><strong>Actions</strong></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($punishs as $item)
                                <tr>
                                    <td><strong>{{ $loop->index +1}}</strong></td>
                                    <td>{{ $item->date }}</td>
                                    <td>{{ number_format($item->money) }} VND</td>
                                    <td>{{ $item->reason }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('ad.punish_edit', ['id' => $staff->id, 'id_punish' => $item->id]) }}" class="btn btn-primary shadow btn-xs sharp me-1" title="Chỉnh sửa"><i class="fas fa-pencil-alt"></i></a>
                                            <a href="{{ route('ad.punish_destroy', $item->id) }}" data-url="" class="btn btn-danger shadow btn-xs sharp" title="Xoá"><i class="fas fa-trash-alt"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="pagination justify-content-center">
                        {{ $punishs->links() }}
                    </div>

                </div>

            </div>
        </div>
    </div>

@push('scripts')
@endpush
@endsection
