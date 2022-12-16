<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>

                <li class="active">
                    <a href="{{ route('dashboard') }}"><i class="fe fe-home"></i> <span>Dashboard</span></a>
                </li>

                <li class="submenu">
                    <a href="#"><i class="fe fe-users"></i> <span> Tài khoản </span> <span
                            class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="users.html">Tài khoản quản trị</a></li>
                        <li><a href="blocked-users.html">Quản lý quyền hạn</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fe fe-gear"></i> <span> Cài đặt chung </span> <span
                            class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="general.html">Thông tin chung</a></li>
                        <li><a href="admob.html"> </a></li>
                        <li><a href="sinch-settings.html">Sinch Settings </a></li>
                        <li><a href="firebase-settings.html">Firebase Settings </a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>