<section class="sidebar">
    <!-- Sidebar user panel -->


    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        @foreach($directories_for_menu as $directory)
        <li class="treeview">
            <a href="#">
                <i class="fa fa-book"></i>
                <span>{{$directory->title}}</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{route('admin.categories',$directory->slug)}}">Categories</a></li>
                <li><a href="{{route('admin.listings',$directory->slug)}}">Listings</a></li>
            </ul>
        </li>
        @endforeach

        <li class="treeview active">
            <a href="#">
                <i class="fa fa-edit"></i>
                <span>Setup Listings</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{route('directory.index')}}"><i class="fa fa-folder-o"></i> Directories Manager</a></li>
                <li><a href="{{route('fields.index')}}"><i class="fa fa-circle-o"></i> Fields Manager</a></li>

            </ul>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-users"></i>
                <span>Users</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i> Add New User</a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i> Manage Users</a></li>

            </ul>
        </li>
        <li><a href="{{route('directory.type.index')}}"><i class="fa fa-info"></i><span>Ono Modules Info</span></a></li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-cogs"></i>
                <span>Settings</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                @foreach($setting_prefixes as $prefix)
                    <li><a href="{{route('settings.prefix',$prefix->prefix)}}"><i class="fa fa-cog"></i>{{$prefix->prefix}}</a></li>
                @endforeach
            </ul>
        </li>

    </ul>
</section>