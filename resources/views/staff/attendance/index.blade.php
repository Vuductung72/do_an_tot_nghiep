@extends('staff.layouts.master')

@section('title')
    <title>Điểm danh</title>
@endsection

@section('content')
<div class="container-fluid">
    <!-- row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Điểm danh</h4>
                </div>
                <div class="card-body">
                    <div class="form-validation">
                        @if ($status == 0)
                            <form class="needs-validation" enctype="multipart/form-data" action="{{ route('staff.attendance_checkIn') }}" novalidate method="POST">
                                @csrf
                                    <button type="submit" class="btn btn-primary" style="width: 100%;">Check in</button>
                            </form>

                        @elseif ($status == 1)
                            <form class="needs-validation" enctype="multipart/form-data" action="{{ route('staff.attendance_checkOut') }}" novalidate method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary" style="width: 100%;" >Check out</button>
                            </form>
                        @else
                                <button type="submit" class="btn btn-primary" style="width: 100%;" disabled>Check out</button>
                        @endif
                        
                        <table class="table table-responsive-md" style="margin-top: 50px;">
                            <thead>
                                <tr>
                                    <th><strong>STT</strong></th>
                                    <th><strong>Ngày</strong></th>
                                    <th><strong>Giờ vào làm</strong></th>
                                    <th><strong>Giờ nghỉ</strong></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($attendances as $item)
                                <tr>
                                    <td><strong>{{ $loop->index +1}}</strong></td>
                                    <td>{{ $item->date }}</td>
                                    <td>{{ $item->time_in }}</td>
                                    <td>{{ $item->time_out }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="pagination justify-content-center">
                            {{ $attendances->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection