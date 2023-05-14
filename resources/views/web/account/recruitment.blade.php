@extends('web.layouts.master')

@section('title')   
    <title>Tin đã ứng tuyển</title>
@endsection

@section('content')
    <section id="account-information">
        <div class="container" id="account-information-box">
            @include('web.account.sidebar')
            <div class="col-12 col-lg-8">
                <div class="box-content">
                    <h3 class="title">Danh sách tin đã ứng tuyển</h3>
                    <ul class="list-recruiments">
                        @if ($applys->count())
                            @foreach ($applys as $item)
                                <li class="recruitment-item">
                                    <a href="{{route('w.recruitment.show', ['id' => $item->recruitment->id])}}" class="recruiments-link">
                                        <div class="img-logo">
                                            <img src="{{asset('admins/images/logo_net5s.png')}}" alt="">
                                        </div>
                                        <div class="job-requirements">
                                            <h4 class="title-recruitment">{{$item->recruitment->title}} <i class="fa-solid fa-check" style="color: #f5a700;"></i></h4>
                                            <ul>
                                                <li>
                                                    <span><b>Số lượng</b>: {{$item->recruitment->quantity}}</span>
                                                </li>
                                                <li>
                                                    <span><b>Kinh nghiệm</b>: {{$item->recruitment->experience}}</span>
                                                </li>
                                                <li>
                                                    <span><b>Hình thức</b>: {{$item->recruitment->type_work == 0 ? 'Parttime':'Fulltime'}}</span>
                                                </li>
                                                <li>
                                                    <span><b>Ví trí tuyển dụng</b>: {{$item->recruitment->position}}</span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="type">
                                            @if ($item->status == 0)
                                                <button class="btn btn-info" disabled="disabled">Yêu cầu đang được xử lí</button>
                                            @else
                                                <button class="btn btn-success" disabled="disabled">Yêu cầu đã được xử lí</button>
                                            @endif
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                        @else
                            <h3 class="text-center">Bạn chưa ứng tuyển tin tuyển dụng nào</h3>
                            <p class="text-center">Vào <a href="{{route('w.recruitment')}}" class="page-link">trang tin tuyển dụng</a> để ứng tuyển</p>
                        @endif
                        
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection