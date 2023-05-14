@extends('web.layouts.master')

@section('title')   
    <title>Thông tin chi tiết tin tuyển dụng</title>
@endsection

@section('content')
    <section id="recruitment-detail">
        <div class="container">
            <h3 class="title">THÔNG TIN CHI TIẾT TIN TUYỂN DỤNG</h3>
            <div class="box-header">
                <div class="company-info">
                    <div class="img-logo">
                        <img src="{{asset('admins/images/logo_net5s.png')}}" alt="">
                    </div>
                    <div class="title-job">
                        <h3>{{$recruitment->title}}</h3>
                        <span>CÔNG TY CỔ PHẦN CÔNG NGHỆ VÀ TRUYỀN THÔNG NET5S</span>
                    </div>
                </div>
                <div class="recruitment-form">
                    @if (Auth::guard('user')->check())
                        @if ($apply->where('recruitment_id', $recruitment->id)->where('user_id', Auth::guard('user')->user()->id)->first() == null)
                            <form action="{{route('w.recruitment.recruitment', ['id'=>$recruitment->id])}}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-recruitment user">Ứng tuyển ngay</button>
                            </form>
                        @else
                        {{-- {{dd($apply->where('recruitment_id', $recruitment->id)->first()->status)}} --}}
                            @if ($apply->where('recruitment_id', $recruitment->id)->where('user_id', Auth::guard('user')->user()->id)->first()->status == 0)
                                <button class="btn btn-info" disabled>Yêu cầu của bạn đang được xử lí</button>
                            @elseif ($apply->where('recruitment_id', $recruitment->id)->where('user_id', Auth::guard('user')->user()->id)->first()->status == 1)
                                <button class="btn btn-success" disabled>Yêu cầu của bạn đã được xác nhận</button>
                            @endif 
                        @endif
                    @else
                        <div class="type">
                            <form action="{{route('w.recruitment.recruitment', ['id'=>$recruitment->id])}}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-recruitment">Ứng tuyển ngay</button>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
            <div class="body">
                <div class="detail-job">
                    <div class="detail-title-job">
                        <h3>Chi tiết tin tuyển dụng</h3>
                    </div>
                    <div class="box-info">
                        <h3>Thông tin chi tiết</h3>
                        <ul class="detail-job-list">
                            <li><b>Vị trí: </b>{{$recruitment->position}}</li>
                            <li><b>Kinh nghiệm:</b> {{$recruitment->experience}}</li>
                            <li><b>Số lương:</b> {{$recruitment->quantity}}</li>
                            <li><b>Lương:</b> {{number_format($recruitment->wage)}} VND</li>
                            <li><b>Hình thức làm việc:</b> {{$recruitment->type_work == 0 ? 'Parttime':'Fulltime'}}</li>
                        </ul>
                    </div>
                    <div class="box-info">
                        <h3>Địa chỉ làm việc</h3>
                        <p>144 Trần Vỹ, Mai Dịch, Cầu Giấy, Hà Nội</p>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.714620159207!2d105.77434439999999!3d21.044101800000004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313454ceceb5c4f5%3A0xdcf182dec2335f35!2zMTQ0IFRy4bqnbiBW4bu5LCBNYWkgROG7i2NoLCBD4bqndSBHaeG6pXksIEjDoCBO4buZaQ!5e0!3m2!1svi!2s!4v1681890759945!5m2!1svi!2s" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    <div class="job-description">
                        <h3>Mô tả công việc</h3>
                        <p>
                            {!!$recruitment->description!!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection