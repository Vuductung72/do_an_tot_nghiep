<!--Sidebar start-->
<div class="deznav">
    <div class="deznav-scroll">
        <ul class="metismenu" id="menu">
            <li>
                <a class="ai-icon" href="{{ route('ad.index')}}" aria-expanded="false">
                    <i class="fa-solid fa-house"></i>
                    <span class="nav-text">Trang chủ</span>
                </a>
            </li>

            <li>
                <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="fa-solid fa-money-bill"></i>
                    <span class="nav-text">Quản lí admin</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('ad.admins_index')}}">Quản lí tài khoản admin</a></li>
                    <li><a href="{{ route('ad.roles_index') }}">Danh sách vai trò</a></li>
                    <li><a href="{{ route('ad.permissions_index') }}">Quản lí hành động</a></li>
                </ul>
            </li>

            <li>
                <a class="ai-icon" href="{{ route('ad.departments_index')}}" aria-expanded="false">
                    <i class="fa-solid fa-house-laptop"></i>
                    <span class="nav-text">Quản lí phòng ban</span>
                </a>
            </li>

            <li>
                <a class="ai-icon" href="{{ route('ad.positions_index')}}" aria-expanded="false">
                    <i class="fa-solid fa-user-plus"></i>
                    <span class="nav-text">Quản lí chức vụ</span>
                </a>
            </li>

            <li>
                <a class="ai-icon" href="{{ route('ad.staffs_index') }}" aria-expanded="false">
                    <i class="fa-solid fa-users"></i>
                    <span class="nav-text">Quản lí nhân viên</span>
                </a>
            </li>

            <li>
                <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="fa-solid fa-money-bill"></i>
                    <span class="nav-text">Quản lí lương</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('ad.paychecks_index') }}">Danh sách bảng lương</a></li>
                    <li><a href="{{route('ad.salary_change_index')}}">Danh sách tăng lương</a></li>
                    <li><a href="{{ route('ad.allowances_index') }}">Quản lí phụ cấp</a></li>
                </ul>
            </li>

            <li>
                <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="fa-solid fa-award"></i>
                    <span class="nav-text">Khen thưởng - kỉ luật</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('ad.achievements_index') }}">Quản lí khen thưởng</a></li>
                    <li><a href="{{ route('ad.achievementTypes_index') }}">Cấp độ khen thưởng</a></li>
                    <li><a href="{{ route('ad.disciplines_index') }}">Quản lí kỉ luật</a></li>
                    <li><a href="{{ route('ad.disciplinesTypes_index') }}">Cấp độ kỉ luật</a></li>
                </ul>
            </li>

            <li>
                <a class="ai-icon" href="{{ route('ad.recruitments_index') }}" aria-expanded="false">
                    <i class="fa-solid fa-newspaper"></i>
                    <span class="nav-text"> Tin tuyển dụng</span>
                </a>
            </li>



        </ul>
    </div>
</div>
<!--Sidebar end-->
