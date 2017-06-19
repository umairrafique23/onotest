{{--{!! $menu_admin->asUl() !!}--}}
<section class="sidebar">
    <div class="user-panel">
        <div class="pull-left image">
            <img src="/AdminLTE/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
            <p>Alexander Pierce</p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
    </div>
    <ul class="sidebar-menu">
        <li class="header">Admin Navigation</li>

        @foreach($menu_admin->roots() as $item)
            @if(!$item->hasChildren())
                <li><a class="item" href="{!! $item->url() !!}">
                        {!! $item->prependIcon()->title !!}
                    </a>
                </li>
                @else
                <li class="treeview">
                    <a href="#">
                        <span>{!! $item->prependIcon()->title !!}</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        @foreach($item->children() as $child)
                            <li><a href="{!! $child->url() !!}">{!! $child->prependIcon()->title !!}</a></li>
                        @endforeach
                    </ul>
                </li>
            @endif
        @endforeach

    </ul>

</section>