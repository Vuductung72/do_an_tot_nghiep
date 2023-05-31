@extends('staff.layouts.master')

@section('title')
    <title>Xin nghỉ</title>
@endsection

@section('content')
<div class="container-fluid">
    <!-- row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Xin nghỉ</h4>
                </div>
                <div class="card-body">
                    <div class="form-validation">
                            <form class="needs-validation" enctype="multipart/form-data" action="{{ route('staff.leave_post') }}" novalidate method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="mb-3 row">
                                            <label for="date">Ngày xin nghỉ</label>
                                            <input type="date" name="date" id="date" class="form-control">
                                        </div>

                                        <div class="mb-3 row">
                                            <textarea class="form-control @error('reason') is-invalid @enderror" name="reason" id="reason" rows="4" placeholder="Lý do xin nghỉ"></textarea>
                                            @error('reason')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="mb-3 row">
                                            <button type="submit" class="btn btn-primary" style="width: 100%;">Xin nghỉ</button>
                                        </div>
                                    </div>
                                </div>

                            </form>

                        <table class="table table-responsive-md" style="margin-top: 50px;">
                            <thead>
                                <tr>
                                    <th><strong>STT</strong></th>
                                    <th><strong>Ngày</strong></th>
                                    <th width='500'><strong>Lý do</strong></th>
                                    <th><strong>Trạng thái</strong></th>
                                    <th><strong>Action</strong></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($leaves as $item)
                                <tr>
                                    <td><strong>{{ $loop->index +1}}</strong></td>
                                    <td>{{ $item->date }}</td>
                                    <td>{{ $item->reason }}</td>
                                    <td>{{ $item->status == 1 ? 'Chưa xác nhận' : 'Đã xác nhận' }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('staff.leave_destroy', ['id' => $item->id]) }}" data-url="" class="btn btn-danger shadow btn-xs sharp" title="Xoá"><i class="fas fa-trash-alt"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="pagination justify-content-center">
                            {{ $leaves->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
