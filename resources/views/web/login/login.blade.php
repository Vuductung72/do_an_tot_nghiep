@extends('web.layouts.master')

@section('title')   
    <title>Đăng kí tài khoản</title>
@endsection

@section('content')
    <section id="register">
        <div class="container">
            <div class="box-content">
                <div class="col-12 col-lg-4">
                    <img src="{{asset('web/assets/img/logo_net5s.png')}}" alt="">
                    <a href="{{route('w.home')}}" class="link-login">Trở về trang chủ</a>
                </div>
                <div class="col-12 col-lg-8">
                    <h3 class="title">Đăng nhập</h3>
                    <form action="" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Nhập địa chỉ email ..." value="{{old('email')}}">
                            @error('email')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">Mật khẩu</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Nhập mật khẩu...">
                            @error('password')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Đăng Nhập</button>
                    </form>
                </div>
                
            </div>
        </div>
    </section>
@endsection