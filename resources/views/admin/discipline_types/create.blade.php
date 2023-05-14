@extends('admin.layouts.master')

@section('title')
    <title>Thêm cấp độ kỉ luật</title>
@endsection

@section('content')
<div class="container-fluid">
    <!-- row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Thêm mới cấp độ kỉ luật</h4>
                </div>
                <div class="card-body">
                    <div class="form-validation">
                        <form class="needs-validation" action="{{ route('ad.disciplinesTypes_store') }}" novalidate method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="validationCustom01">Cấp độ kỉ luật
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"  placeholder="Nhập loại kỉ luật.." value="{{ old('name') }}">
                                            @error('name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <div class="col-lg-8 ms-auto">
                                            <button type="submit" class="btn btn-primary">Tạo mới</button>
                                            <a href="{{ route('ad.disciplinesTypes_index') }}" class="btn btn-default">Quay lại</a>
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