@extends('admin.layouts.master')

@section('title')
    <title>Cấp độ khen thưởng</title>
@endsection

@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Danh sách cấp độ khen thưởng</h4>
                <div class="actions">
                    <a href="{{ route('ad.achievementTypes_create')}} " class="btn btn-sm btn-primary"> <i class="fa fa-plus"></i> Thêm mới</a>
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-responsive-md">
                        <thead>
                            <tr>
                                <th><strong>STT</strong></th>
                                <th><strong>Cấp độ khen thưởng</strong></th>
                                <th><strong>Actions</strong></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($achievement_types as $item)
                            <tr>
                                <td><strong>{{ $loop->index +1}}</strong></td>
                                <td><span class="w-space-no">{{ $item->name}}</span></td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('ad.achievementTypes_edit', ['id' => $item->id]) }}" class="btn btn-primary shadow btn-xs sharp me-1" title="Chỉnh sửa"><i class="fas fa-pencil-alt"></i></a>
                                        <a href="{{ route('ad.achievementTypes_destroy', ['id' => $item->id]) }}" data-url="" class="btn btn-danger shadow btn-xs sharp" title="Xoá"><i class="fas fa-trash-alt"></i></a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="pagination justify-content-center">
                        {{ $achievement_types->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
