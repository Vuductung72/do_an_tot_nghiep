@extends('admin.layouts.master')

@section('title')
    <title>Thêm phụ cấp</title>
@endsection

@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Thêm phụ cấp</h4>
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
                    <form class="needs-validation" enctype="multipart/form-data" action="{{route('ad.post.staffs_allowance', ['id'=> $staff->id])}}" novalidate method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-xl-6">
                                {{-- Tên phụ cấp --}}
                                <div class="mb-3 row">
                                    <label class="col-lg-4 col-form-label" for="validationCustom01">Tên phụ cấp
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"  placeholder="Nhập tên phụ cấp" value="{{ old('name') }}">
                                        @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                {{-- Tiền phụ cấp --}}
                                <div class="mb-3 row">
                                    <label class="col-lg-4 col-form-label" for="money">Số tiền phụ cấp
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control input-money @error('money') is-invalid @enderror" name="money" id="money" placeholder="Nhập số tiền phụ cấp..." value="{{ old('money') }}"  required>
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
                                    <label class="col-lg-4 col-form-label" for="description">Ghi chú
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"  rows="5" placeholder="Ghi chú" required></textarea>
                                        @error('description')
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
                                <th><strong>Tên</strong></th>
                                <th><strong>Số tiền phụ cấp</strong></th>
                                <th width='500'><strong>Lý do</strong></th>
                                <th><strong>Ngày tạo</strong></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($allowances as $item)
                                <tr>
                                    <td><strong>{{ $loop->index +1}}</strong></td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ number_format($item->money) }}</td>
                                    <td>{{ $item->description }}</td>
                                    <td>{{ $item->created_at->format('d/m/Y') }}</td>
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

@push('scripts')
@endpush
@endsection
