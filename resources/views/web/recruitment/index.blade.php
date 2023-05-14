@extends('web.layouts.master')

@section('title')   
    <title>Tin tuyển dụng</title>
@endsection

@section('content')
    <section id="recruitment">
        <div class="container">
            <h3 class="title">TIN TUYỂN DỤNG</h3>
            <ul class="recruitment-list">
                @if ($recruitments->count() != 0)
                    @foreach ($recruitments as $item)
                        <li class="recruitment-item">
                            <a href="{{route('w.recruitment.show', ['id' => $item->id])}}">
                                <div class="img-logo">
                                    <img src="{{asset('admins/images/logo_net5s.png')}}" alt="">
                                </div>
                                <div class="job-requirements">
                                    <h4 class="title-recruitment">{{$item->title}} <i class="fa-solid fa-check" style="color: #f5a700;"></i></h4>
                                    <ul>
                                        <li>
                                            <span><b>Số lượng</b>: {{$item->quantity}}</span>
                                        </li>
                                        <li>
                                            <span><b>Kinh nghiệm</b>: {{$item->experience}}</span>
                                        </li>
                                        <li>
                                            <span><b>Hình thức</b>: {{$item->type_work == 0 ? 'Parttime':'Fulltime'}}</span>
                                        </li>
                                        <li>
                                            <span><b>Ví trí tuyển dụng</b>: {{$item->position}}</span>
                                        </li>
                                    </ul>
                                </div>
                            </a>
                            @if (Auth::guard('user')->check())
                                @if ($apply->where('recruitment_id', $item->id)->where('user_id', Auth::guard('user')->user()->id)->first() == null)
                                    <div class="type">
                                        <form action="{{route('w.recruitment.recruitment', ['id'=>$item->id])}}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-recruitment user">Ứng tuyển ngay</button>
                                        </form>
                                    </div>
                                @else
                                {{-- {{dd($apply->where('recruitment_id', $item->id)->first()->status)}} --}}
                                    @if ($apply->where('recruitment_id', $item->id)->where('user_id', Auth::guard('user')->user()->id)->first()->status == 0)
                                        <div class="type">
                                            <button class="btn btn-info" disabled>Yêu cầu của bạn đang được xử lí</button>
                                        </div>
                                    @elseif ($apply->where('recruitment_id', $item->id)->where('user_id', Auth::guard('user')->user()->id)->first()->status == 1)
                                        <div class="type">
                                            <button class="btn btn-success" disabled>Yêu cầu của bạn đã được xác nhận</button>
                                        </div>
                                    @endif 
                                @endif
                            @else
                                <div class="type">
                                    <form action="{{route('w.recruitment.recruitment', ['id'=>$item->id])}}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-recruitment">Ứng tuyển ngay</button>
                                    </form>
                                </div>
                            @endif
                        </li>
                    @endforeach
                @else
                    <h3 class="text-center">Hiện tại không có tin tuyển dụng nào!</h3>
                @endif
                
            </ul>
            <div class="paginate">
                {{ $recruitments->links() }}
            </div>
        </div>
    </section>
@endsection