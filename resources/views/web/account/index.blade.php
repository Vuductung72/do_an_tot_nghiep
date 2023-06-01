@extends('web.layouts.master')

@section('title')
    <title>Thông tin tài khoản</title>
@endsection

@section('content')
    <section id="account-information">
        <div class="container" id="account-information-box">
            @include('web.account.sidebar')
            <div class="col-12 col-lg-8">
                <div class="box-content">
                    <h3 class="title">Thông tin tài khoản của bạn</h3>
                    <form action="{{ route('w.account.update', Auth::guard('user')->user()) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Họ và tên:</label>
                            <input type="text" class="form-control" name=name id="name" placeholder="Nhập họ và tên ..." value="{{ Auth::guard('user')->user()->name }}">
                            @error('name')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>

                        {{-- cv --}}
                        <div class="form-group">
                            <label for="cv">CV</label>
                            <input type="file" class="form-file-input form-control" name="cv">
                        </div>

                        <div class="form-group">
                            <label for="cv_link">Đường dẫn CV</label>
                            <input type="text" class="form-file-input form-control" name="cv_link" placeholder="Đường dẫn tới nơi lưu cv của bạn..." value="{{Auth::guard('user')->user()->cv_link}}">
                        </div>

                        <div class="form-group">
                            <label for="gender">Giới tính</label>
                            <select class="form-control" id="gender" for='gender' name="gender">>
                                <option value="{{ Auth::guard('user')->user()->gender }}">{{ Auth::guard('user')->user()->gender == '0' ? 'Nữ' : 'Nam' }}</option>
                                @if(Auth::guard('user')->user()->gender == "0")
                                    <option value="1"> Nam </option>
                                @else
                                    <option value="0"> Nữ </option>
                                @endif
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Nhập địa chỉ email ..." value="{{Auth::guard('user')->user()->email}}" disabled>
                            @error('email')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="address">Địa chỉ</label>
                            <input type="text" class="form-control" name="address" id="address" placeholder="Nhập địa chỉ địa chỉ ..." value="{{Auth::guard('user')->user()->address}}">
                            @error('address')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="phone">Số điện thoại</label>
                            <input type="text" class="form-control" name="phone" id="phone" placeholder="Nhập số điện thoại ..." value="{{Auth::guard('user')->user()->phone}}">
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
                        <button type="submit" class="btn btn-update">Cập nhập</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
