@extends('admin.layouts.master')

@section('title')
    <title>Quản lí Admin</title>
@endsection

@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Admins</h4>
                <div class="actions">
                    <a href="{{ route('ad.admins_create') }}" class="btn btn-sm btn-primary"> <i class="fa fa-plus"></i> Thêm mới</a>
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-responsive-md">
                        <thead>
                            <tr>
                                <th><strong>STT</strong></th>
                                <th><strong>Tên</strong></th>
                                <th><strong>Email</strong></th>
                                <th><strong>Vai trò</strong></th>
                                <th><strong>Action</strong></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($admins as $item)
                            <tr>
                                <td><strong>{{ $loop->index +1}}</strong></td>
                                <td><div class="d-flex align-items-center"><img src="images/avatar/1.jpg" class="rounded-lg me-2" width="24" alt=""/> <span class="w-space-no">{{ $item->name }}</span></div></td>
                                <td>{{ $item->email }}	</td>
                                <td>{{ $item->role->name }}</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('ad.admins_show', ['id' => $item->id]) }}" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                                        <a href="{{ route('ad.admins_destroy', ['id' => $item->id]) }}" data-url="" class="btn btn-danger shadow btn-xs sharp"><i class="fas fa-trash-alt"></i></a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="pagination justify-content-center">
                        {{ $admins->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
