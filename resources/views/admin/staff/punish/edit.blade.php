@extends('admin.layouts.master')

@section('title')
    <title>Sửa</title>
@endsection

@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Phạt</h4>
                <div class="actions">
                    <a href="{{ route('ad.punish_create', $punish->staff->id) }}" class="btn btn-sm btn-primary">Quay lại</a>
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
                                <input type="text" class="form-control" name="name" id="name" value="{{$punish->staff->name}}" disabled>
                            </div>

                            <div class="col-xl-4 mb-3">
                                <label for="idPosition">Chức vụ:</label>
                                <input type="text" class="form-control" name="idPosition" id="idPosition" value="{{$punish->staff->position->name}}" disabled>
                            </div>

                            <div class="col-xl-4 mb-3">
                                <label for="idDepartment">Phòng bán:</label>
                                <input type="text" class="form-control" name="idDepartment" id="idDepartment" value="{{$punish->staff->department->name}}" disabled>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="form-validation">
                    <form class="needs-validation" enctype="multipart/form-data" action="{{route('ad.punish_update', ['id' => $punish->staff->id, 'id_punish' => $punish->id])}}" novalidate method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-xl-6">
                                {{-- Tiền phạt --}}
                                <div class="mb-3 row">
                                    <label class="col-lg-4 col-form-label" for="date">Ngày
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="date" class="form-control" name="date" id="date" value="{{$punish->date}}"  readonly>
                                    </div>
                                </div>
                                {{-- Ghi chú --}}
                                {{-- Tiền phạt --}}
                                <div class="mb-3 row">
                                    <label class="col-lg-4 col-form-label" for="money">Số tiền phạt
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control input-money @error('money') is-invalid @enderror" name="money" id="money" placeholder="Nhập số tiền phạt..." value="{{ old('money', $punish->money) }}"  required>
                                        @error('money')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        <div class="input-convert-amount">
                                            <p>= <span>{{number_format($punish->money)}}</span> VND</p>
                                        </div>
                                    </div>
                                </div>
                                {{-- Ghi chú --}}
                                <div class="mb-3 row">
                                    <label class="col-lg-4 col-form-label" for="reason">Lí do phạt
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <textarea class="form-control @error('reason') is-invalid @enderror" id="reason" name="reason"  rows="5" placeholder="Lí do phạt" required>{{$punish->reason}}</textarea>
                                        @error('reason')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 ms-auto">
                                    <button type="submit" class="btn btn-primary">Sửa</button>
                                    <a href="{{ route('ad.punish_create', $punish->staff->id) }}" class="btn btn-default">Quay lại</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@push('scripts')
@endpush
@endsection
