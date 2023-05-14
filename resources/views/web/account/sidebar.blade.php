<div class="col-12 col-lg-4">
    <div class="box-siderbar">
        <div class="account-name">
            <h3>{{ Auth::guard('user')->user()->name }}</h3>
            <ul class="tablist">
                <li>
                    <a href="{{route('w.account.index')}}" class="nav-link {{ request()->is(['thong-tin-tai-khoan']) ? 'active' : '' }}">Thông tin tài khoản</a>
                </li>
                <li>
                    <a href="{{route('w.account.list.recruitment')}}" class="nav-link {{ request()->is(['danh-sach-ung-tuyen']) ? 'active' : '' }}">Tin đã ứng tuyển</a>
                </li>
            </ul>
        </div>
    </div>
</div>