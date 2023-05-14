@extends('admin.layouts.master')

@section('title')
    <title>Thêm mới tin tuyển dụng</title>
@endsection

@section('content')
<div class="container-fluid">
    <!-- row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Thêm mới tin tuyển dụng</h4>
                </div>
                <div class="card-body">
                    <div class="form-validation">
                        <form class="needs-validation" action="{{ route('ad.recruitments_store') }}" novalidate method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="title">Tiêu đề
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title"  placeholder="Nhập tên chức vụ.." value="{{ old('title') }}">
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
                                            <input type="text" class="form-control @error('position') is-invalid @enderror" name="position" id="position"  placeholder="Nhập vị trí tuyển dụng.." value="{{ old('position') }}">
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
                                            <input type="text" class="form-control @error('experience') is-invalid @enderror" name="experience" id="experience"  placeholder="Nhập kinh nghiệm làm việc.." value="{{ old('experience') }}">
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
                                            <input type="text" class="form-control @error('quantity') is-invalid @enderror" name="quantity" id="quantity"  placeholder="Nhập số lượng tuyển dụng..." value="{{ old('quantity') }}">
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
                                            <input type="text" class="form-control input-money @error('wage') is-invalid @enderror" name="wage" id="wage"  placeholder="Nhập số lượng tuyển dụng..." value="{{ old('wage') }}">
                                            @error('wage')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                            <div class="input-convert-amount">
                                                <p>= <span>0</span> VND</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="type_work">Hình thức làm việc
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <select class="default-select wide form-control" id="type_work" for='type_work' name="type_work">
                                                <option value="0">Parttime</option>
                                                <option value="1">Fulltime</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="type">Ẩn hiện tin
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <select class="default-select wide form-control" id="type" for='type' name="type">
                                                <option value="0">Ẩn</option>
                                                <option value="1">Hiện</option>
                                            </select>
                                        </div>
                                    </div>                      
                                </div>
                                <div class="col-12">
                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="description">Mô tả công việc
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-12">
                                            <textarea class="form-control tinymce @error('description') is-invalid @enderror" id="description" name="description"  rows="5" placeholder="Mô tả công việc..." required></textarea>
                                            @error('description')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <div class="col-lg-8 ms-auto">
                                            <button type="submit" class="btn btn-primary">Tạo mới</button>
                                            <a href="{{ route('ad.recruitments_index') }}" class="btn btn-default">Quay lại</a>
                                        </div>
                                    </div>  
                                </div>
                            </div>
                        </form>
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

