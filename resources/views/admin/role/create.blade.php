@extends('admin.layouts.master')

@section('title')
    <title>Thêm mới quyền truy cập</title>
@endsection

@section('content')
<div class="container-fluid">
    <!-- row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Thêm mới quyền truy cập</h4>
                </div>
                <div class="card-body">
                    <div class="form-validation">
                        <form class="needs-validation" action="{{ route('ad.roles_store') }}" novalidate method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="name">Tên quyền
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"  placeholder="Nhập tên quyền.." value="{{ old('name') }}">
                                            @error('name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="display_name">Mô tả <span
                                                class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control @error('display_name') is-invalid @enderror" name="display_name" id="display_name"  placeholder="Nhập mô tả.." value="{{ old('display_name') }}">
                                            @error('display_name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3 row">
                                        <label for="permissions">Permissions</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="checkall" id="checkall" value="" class="cb-element">
                                            <label class="form-check-label" for="checkall">
                                                Chọn tất cả
                                            </label>
                                        </div>

                                        @foreach($permissions as $permission)
                                            <div class="form-check" style="width: 25%">
                                                <input class="form-check-input checkbox" type="checkbox" name="permissions[]" id="permission_{{ $permission->id }}" value="{{ $permission->id }}">
                                                <label class="form-check-label" for="permission_{{ $permission->id }}">
                                                    {{ $permission->label }}
                                                </label>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="mb-3 row">
                                        <div class="col-lg-8 ms-auto">
                                            <button type="submit" class="btn btn-primary">Tạo mới</button>
                                            <a href="{{ route('ad.roles_index') }}" class="btn btn-default">Quay lại</a>
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

@push('scripts')
    <script>
        // This is the second section with checkbox
    $(document).ready(function() {

        // Select With Checkbox(Extra Feature)
        $("#checkall").change(function() {
            var checked = $(this).is(":checked");
            if (checked) {
            $(".checkbox").each(function() {
                $(this).prop("checked", true);
            });
            } else {
            $(".checkbox").each(function() {
                $(this).prop("checked", false);
            });
            }
        });

        // Changing state of CheckAll checkbox
        $(".checkbox").click(function() {
            if ($(".checkbox").length == $(".checkbox:checked").length) {
            $("#checkall").prop("checked", true);
            } else {
            // $("#checkall").removeAttr("checked");
            $("#checkall").prop("checked", false);
            }
        });
    });
    </script>

@endpush
