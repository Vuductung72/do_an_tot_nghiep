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
                    <a href="{{route('w.login')}}" class="link-login">Tôi đã là thành viên</a>
                </div>
                <div class="col-lg-8">
                    <h3 class="title">Đăng kí tài khoản để ứng tuyển</h3>
                    <form action="{{route('w.register.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Họ và tên:</label>
                            <input type="text" class="form-control" name=name id="name" placeholder="Nhập họ và tên ..." value="{{ old('name') }}">
                            @error('name')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="gender">Giới tính</label>
                            <select class="form-control" id="gender" for='gender' name="gender">>
                                <option value="0">Nữ</option>
                                <option value="1">Nam</option>
                            </select>
                        </div>

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
                            <label for="address">Địa chỉ</label>
                            <input type="text" class="form-control" name="address" id="address" placeholder="Nhập địa chỉ địa chỉ ..." value="{{old('address')}}">
                            @error('address')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="phone">Số điện thoại</label>
                            <input type="text" class="form-control" name="phone" id="phone" placeholder="Nhập số điện thoại ..." value="{{old('phone')}}">
                            @error('phone')
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

                        <div class="form-group">
                            <label for="re-password">Nhập lại mật khẩu</label>
                            <input type="re-password" class="form-control" name="re-password" id="re-password" placeholder="Nhập lại mật khẩu...">
                            @error('re-password')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Đăng kí</button>
                    </form>
                </div>
                
            </div>
        </div>
    </section>
@endsection