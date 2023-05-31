@extends('admin.layouts.master')

@section('title')
    <title>Sửa tin tuyển dụng</title>
@endsection

@section('content')
<div class="container-fluid">
    <!-- row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Sửa tin tuyển dụng</h4>
                </div>
                <div class="card-body">
                    <div class="form-validation">
                        <form class="needs-validation" action="{{ route('ad.recruitments_update', ['id' => $recruitment->id]) }}" novalidate method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="title">Tiêu đề
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title"  placeholder="Nhập tên chức vụ.." value="{{ $recruitment->title }}">
                                            @error('title')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="position">Vị trí <span
                                                class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control @error('position') is-invalid @enderror" name="position" id="position"  placeholder="Nhập vị trí tuyển dụng.." value="{{ $recruitment->position }}">
                                            @error('position')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="experience">Kinh nghiệm làm viêc(năm)
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control @error('experience') is-invalid @enderror" name="experience" id="experience"  placeholder="Nhập kinh nghiệm làm việc.." value="{{ $recruitment->experience }}">
                                            @error('experience')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="quantity">Số lượng
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control @error('quantity') is-invalid @enderror" name="quantity" id="quantity"  placeholder="Nhập số lượng tuyển dụng..." value="{{ $recruitment->quantity }}">
                                            @error('quantity')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="wage">Lương
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control input-money @error('wage') is-invalid @enderror" name="wage" id="wage"  placeholder="Nhập số lượng tuyển dụng..." value="{{ $recruitment->wage }}">
                                            @error('wage')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                            <div class="input-convert-amount">
                                                <p>= <span>{{ number_format($recruitment->wage) }}</span> VND</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="type_work">Hình thức làm việc
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <select class="default-select wide form-control" id="type_work" for='type_work' name="type_work">
                                                <option value="{{ $recruitment->type_work }}">{{ $recruitment->type_work == '0' ? 'Parttime' : 'Fulltime' }}</option>
                                                    @if($recruitment->type_work == "0")
                                                        <option value="1"> Fulltime </option>
                                                    @else
                                                        <option value="0"> Parttime </option>
                                                    @endif
                                            </select>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="type">Ẩn hiện tin
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <select class="default-select wide form-control" id="type" for='type' name="type">
                                                <option value="{{ $recruitment->type }}">{{ $recruitment->type == '0' ? 'Ẩn' : 'Hiện' }}</option>
                                                    @if($recruitment->type == "0")
                                                        <option value="1"> Hiện </option>
                                                    @else
                                                        <option value="0"> Ẩn </option>
                                                    @endif
                                            </select>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="count">Số người đã ứng tuyển
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" name="count" id="count" value="{{$applysCount}}" disabled>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-12">
                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="description">Mô tả công việc
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-12">
                                            <textarea class="form-control tinymce @error('description') is-invalid @enderror" id="description" name="description"  rows="5" placeholder="Mô tả công việc..." required>{{ $recruitment->description }}</textarea>
                                            @error('description')
                                                <div class="invalid-feedback">
                                                    {{!! $message !!}}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <div class="col-lg-8 ms-auto">
                                            <button type="submit" class="btn btn-primary">Sửa</button>
                                            <a href="{{ route('ad.recruitments_index') }}" class="btn btn-default">Quay lại</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <hr>

                    <div class="table-responsive">
                        <h2 class="text-center text-primary mb-3">Danh sách người ứng tuyển cho tin này</h2>
                        <table class="table table-responsive-md">
                            <thead>
                                <tr>
                                    <th><strong>STT</strong></th>
                                    <th><strong>Người tuyển dụng</strong></th>
                                    <th><strong>Email</strong></th>
                                    <th><strong>Số điện thoại</strong></th>
                                    <th><strong>Trạng thái</strong></th>
                                    <th><strong>Action</strong></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($applys as $item)
                                <tr>
                                    <td><strong>{{ $loop->index +1}}</strong></td>
                                    <td><strong>{{ $item->user->name }}</strong></td>
                                    <td><strong>{{ $item->user->email }}</strong></td>
                                    <td><strong>{{ $item->user->phone}}</strong></td>
                                    <td><strong>{{ $item->status == 0 ? 'Chưa xác nhận' : 'Đã xác nhận' }}</strong></td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('ad.apply_recruitments_show', ['id'=> $item->id]) }}" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fa-solid fa-circle-info"></i></a>
                                            <form id="status-form" action="{{ route('ad.recruitments_status_apply', ['id'=> $item->id]) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-primary shadow btn-xs sharp me-1 w-100">
                                                    {{$item->status == 0 ? 'Xác nhận' : 'Huỷ xác nhận'}}
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="pagination justify-content-center">
                            {{ $applys->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@prepend('scripts')
    @include('admin.lib.tinymce-setup')
@endprepend
