@extends('web.layouts.master')

@section('title')
    <title>Trang chủ</title>
@endsection

@section('content')
    @include('web.layouts.includes.slider')
    <section id="introduce">
        <div class="container">
            <h3 class="title">NET5S – THIẾT KẾ WEBSITE CHUYÊN NGHIỆP</h3>
            <div class="body">
                <p>
                    <b><i>Net5s là một trong những đơn vị thiết kế website chuyên nghiệp uy tín được thành lập nhằm mang đến cho cá nhân, đơn vị, doanh nghiệp các website thu hút khách hàng. </i></b>
                    <br>
                    <h4>Sự hình thành và phát triển</h4>
                    <br>
                    <b>Net5s</b> với đội ngũ khởi nghiệp là các chuyên viên kỹ thuật am hiểu về Công nghệ thông tin. Đặc biệt, hiểu được nhu cầu của khách hàng ngày càng muốn mở rộng và phát triển, nâng cao định vị thương hiệu và tầm ảnh hưởng, dịch vụ thiết kế website chuyên nghiệp của Rao Thuê sẽ giúp khách hàng thực hiện điều đó, mang đến cho đơn vị và doanh nghiệp của bạn lợi ích tuyệt vời.
                    <br>
                    <b>Net5s</b> đã và đang trở thành đơn vị cung cấp các dịch vụ về website chuyên nghiệp, giải quyết những nhu cầu sử dụng dịch vụ cho khách hàng, đảm bảo tiết kiệm chi phí.
                    <br>
                    Đơn vị sở hữu đội ngũ nhân viên chuyên nghiệp, thực chiến, có nhiều kinh nghiệm, liên tục được đào tạo, không ngừng học hỏi những điều mới để áp dụng vào công việc, mang lại hiệu quả cao. Đội ngũ cộng tác viên rộng khắp cả nước, có kiến thức và được đào tạo bài bản, đảm bảo hỗ trợ và phục vụ tốt nhu cầu của khách hàng khi cần.
                    <br>
                    <h4>Sứ mệnh</h4>
                    <br>
                    <b>Net5s</b> cam kết chất lượng thiết kế website chuyên nghiệp, hấp dẫn, mang lại lợi ích cho khách hàng, giúp các các đơn vị, doanh nghiệp thu hút khách hàng, truyền thông hiệu quả. Từ đó nâng cao thương hiệu và định vị doanh nghiệp trong lòng khách hàng của bạn.
                    <br>
                    <b>Net5s</b> không ngừng cập nhật các công nghệ, kỹ thuật cùng các kiến thức mới nhằm nâng cao hiệu quả, đóng góp cho sự phát triển của doanh nghiệp đối tác và sự phát triển của xã hội.
                    <br>
                    <h4>Tầm nhìn</h4>
                    <br>
                    Nhận thấy sự phát triển của công nghệ hiện nay cũng như xu hướng phát triển trong tương lai, cùng những điều kiện sẵn có, chúng tôi đang ngày càng nỗ lực mở rộng và không ngừng thay đổi để phù hợp với sự phát triển của xã hội.
                    <br>
                    Trong thời đại công nghệ thông tin ngày càng lớn mạnh, các dịch vụ trên không gian mạng được rất nhiều khách hàng chú trọng, tìm hiểu. Rao Thuê sẽ nỗ lực trở thành đơn vị số 1 về cung cấp dịch vụ website, thiết kế website chuyên nghiệp hiệu quả, hướng đến lợi ích tối đa cho khách hàng.
                    <br>
                    <img src="{{ asset('web/assets/img/introduce.png') }}" alt="">
                    <br>
                    <b>Net5s</b> phụng sự bằng trái tim, cống hiến cho xã hội bằng ngành nghề công nghệ và sức lao động chất xám giá rẻ.
                </p>
            </div>
        </div>
    </section>

    <section id="how-to-apply">
        <div class="container">
            <h3 class="title text-center">CÁCH THỨC ỨNG TUYỂN VỚI CHÚNG TÔI</h3>
            <div class="row align-items-center">
                <div class="col-12 col-lg-6">
                    <p>Đăng kí tài khoản để tham gia ứng tuyển. Chúng tôi sẽ nhanh chóng kết nối với bạn.</p>
                    <div class="how-to-perform">
                        <a href="{{route('w.register')}}" class="nav-link active">
                            <div class="number">
                                1
                            </div>
                            <div class="box-content">
                                <h4>Đăng kí tài khoản</h4>
                                <p>Do được sử dụng rộng rãi làm văn bản bổ sung cho bố cục, tính không đọc được có tầm quan trọng rất lớn.</p>
                            </div>
                        </a>
                        <a href="{{route('w.recruitment')}}" class="nav-link">
                            <div class="number">
                                2
                            </div>
                            <div class="box-content">
                                <h4>Tìm công việc phù hợp</h4>
                                <p>Có nhiều biến thể của các đoạn avaibookmark-nhãn, nhưng phần lớn biến đổi ở một số dạng.</p>
                            </div>
                        </a>
                        <a href="{{route('w.recruitment')}}" class="nav-link">
                            <div class="number">
                                3
                            </div>
                            <div class="box-content">
                                <h4>Tham gia ứng tuyển</h4>
                                <p>Một thực tế đã được khẳng định từ lâu là người đọc sẽ bị phân tâm bởi nội dung có thể đọc được của một trang.</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <img src="{{asset('web/assets/img/process-01.png')}}" alt="">
                </div>
            </div>
        </div>
    </section>

    @if ($recruitments->count())
        <section id="home-recruitments">
            <div class="container">
                <h3 class="title">TIN TUYỂN DỤNG MỚI NHẤT</h3>
                <div class="row">
                    @foreach ($recruitments as $item)
                        <div class="col-12 col-lg-4">
                            <a href="{{route('w.recruitment.show', ['slug' => $item->slug])}}" class="recruitment-item">
                                <div class="text-center"><span class="name">{{$item->title}}</span></div>
                                <img src="{{asset('web/assets/img/logo_net5s.png')}}" alt="">
                                <ul>
                                    <li><b>Vị trí: </b>{{$item->position}}</li>
                                    <li><b>Kinh nghiệm:</b> {{$item->experience}}</li>
                                    <li><b>Số lương:</b> {{$item->quantity}}</li>
                                    <li><b>Hình thức làm việc:</b> {{$item->type_work == 0 ? 'Parttime':'Fulltime'}}</li>
                                </ul>
                            </a>
                        </div>
                    @endforeach
                </div>
                <div class="col-12 text-center" style="margin-top: 8px;">
                    <a href="{{route('w.recruitment')}}" title="Danh sách tin tuyển dụng" class="btn recruitments-link">Xem thêm</a>
                </div>
            </div>
        </section>
    @endif
@endsection
