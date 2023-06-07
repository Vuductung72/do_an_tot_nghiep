@extends('staff.layouts.master')

@section('title')
    <title>Bảng phạt</title>
@endsection

@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Bảng phạt nhân viên: {{ Auth::guard('staff')->user()->name }}</h4>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-responsive-md">
                        <thead>
                            <tr>
                                <th><strong>STT</strong></th>
                                <th><strong>Ngày</strong></th>
                                <th><strong>Số tiền phạt</strong></th>
                                <th><strong>Lí do</strong></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($punishes as $item)
                            <tr>
                                <td><strong>{{ $loop->index +1}}</strong></td>
                                <td><strong>{{ $item->date}}</strong></td>
                                <td><strong>{{ number_format($item->money) }} VND</strong></td>
                                <td><strong>{{ $item->reason }}</strong></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="pagination justify-content-center">
                        {{ $punishes->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
