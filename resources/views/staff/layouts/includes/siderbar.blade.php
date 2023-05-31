<!--Sidebar start-->
<div class="deznav">
    <div class="deznav-scroll">
        <ul class="metismenu" id="menu">
            <li>
                <a class="ai-icon" href="{{ route('staff.accounts_index') }}" aria-expanded="false">
                    <i class="fa-solid fa-circle-info"></i>
                    <span class="nav-text">Thông tin nhân viên</span>
                </a>
            </li>

            <li>
                <a class="ai-icon" href="{{ route('staff.attendance_index') }}" aria-expanded="false">
                    <i class="flaticon-381-networking"></i>
                    <span class="nav-text">Điểm danh</span>
                </a>
            </li>

            <li>
                <a class="ai-icon" href="{{route('staff.leave_index')}}" aria-expanded="false">
                    <i class="fa-solid fa-calendar-days"></i>
                    <span class="nav-text">Xin nghỉ</span>
                </a>
            </li>

            <li>
                <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="fa-solid fa-award"></i>
                    <span class="nav-text">Khen thưởng - kỉ luật</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('staff.achievement_index') }}">Thông tin khen thưởng</a></li>
                    <li><a href="{{ route('staff.disciplines_index') }}">Thông tin kỉ luật</a></li>
                </ul>
            </li>

            <li>
                <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="fa-solid fa-money-bill"></i>
                    <span class="nav-text">Lương, phụ cấp</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('staff.paycheck_index') }}">Bảng lương</a></li>
                    <li><a href="{{ route('staff.salary_index') }}">Thay đổi lương</a></li>
                    <li><a href="{{ route('staff.allowances_index') }}">Phụ cấp</a></li>
                </ul>
            </li>

        </ul>
    </div>
</div>
<!--Sidebar end-->
