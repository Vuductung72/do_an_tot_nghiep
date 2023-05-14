@extends('admin.layouts.master')

@section('title')
    <title>Quản lí tin tuyển dụng</title>
@endsection 

@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Danh sách tin tuyển dụng</h4>
                <div class="actions">
                    <a href="{{ route('ad.recruitments_create') }}" class="btn btn-sm btn-primary"> <i class="fa fa-plus"></i> Thêm mới</a>
                </div>
            </div>

            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-lg-9">
                        <div class="dashboard_bar">
                            <form action="{{route('ad.recruitments_search')}}" method="GET">
                                <div class="form-group row">
                                    <div class="col-12 col-md-6">
                                        <label for="name">Tiêu đề tuyển dụng</label>
                                        <input type="text" class="form-control" placeholder="Nhập tiêu đề tuyển dụng cần tìm..." name="name" min="1" max="12" value="{{old('name', isset($name) ? $name : '')}}">
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
                                <th><strong>Tiêu đề</strong></th>
                                <th><strong>Vị trí</strong></th>
                                <th><strong>Hình thức</strong></th>
                                <th><strong>Trạng thái</strong></th>
                                <th><strong>Số người đã ứng tuyển</strong></th>
                                <th><strong>Action</strong></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($recruitments as $item)
                            <tr>
                                <td><strong>{{ $loop->index +1}}</strong></td>
                                <td><strong>{{ $item->title }}</strong></td>
                                <td><strong>{{ $item->position }}</strong></td>
                                <td><strong>{{ $item->type_work == '0' ? 'Parttime' : 'Fulltime' }}</strong></td>
                                <td><strong>{{ $item->type == '0' ? 'Ẩn' : 'Hiện' }}</strong></td>
                                <td><strong>{{ $applyCount->where('recruitment_id', $item->id)->count() }}</strong></td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('ad.recruitments_edit', ['id' => $item->id]) }}" class="btn btn-primary shadow btn-xs sharp me-1" title="Chỉnh sửa tin tuyển dụng"><i class="fas fa-pencil-alt"></i></a>
                                        <form id="status-form" action="{{ route('ad.recruitments_status', ['id' => $item->id]) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-primary shadow btn-xs sharp me-1" data-url="" title="{{$item->type == '0' ? 'Click để ẩn tin tuyển dụng' : 'Click để hiện tin tuyển dụng'}}">
                                                <i class="fa-solid {{ $item->type == '0' ? 'fa-eye-slash' : 'fa-eye'}}"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="pagination justify-content-center">
                        {{ $recruitments->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            
        })
    </script>
@endpush