<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg" alt="User Image">
        <div>
            <p class="app-sidebar__user-name">John Doe</p>
            <p class="app-sidebar__user-designation">Frontend Developer</p>
        </div>
    </div>
    <ul class="app-menu">
        <li><a class="app-menu__item active" href="index.php?page=dashboard"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
        <!--dropdown -->
        <li class="treeview">
            <a class="app-menu__item" href="#" data-toggle="treeview">
                <i class="app-menu__icon fa fa-users"></i>
                <span class="app-menu__label">Master Karyawan</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a class="treeview-item" href="index.php?page=datakaryawan">
                        <i class="icon fa fa-star-o"></i>
                        <span>Data Karyawan</span>
                    </a>
                </li>
                <li>
                    <a class="treeview-item" href="index.php?page=datapenilaian">
                        <i class="icon fa fa-star-o"></i>
                        <span>Data Penilaian</span>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a class="app-menu__item" href="index.php?page=penilaian">
                <i class="app-menu__icon fa fa-check-circle"></i>
                <span class="app-menu__label">Penilaian</span>
            </a>
        </li>
    </ul>
</aside>