<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <!-- search form (Optional) -->
    
    <!-- /.search form -->

        <!-- Profile Image -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{asset(Auth::guard('admin')->user()->image)}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info" style="position: relative;left: 0;">
                <p>{{Auth::guard('admin')->user()->username}}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Đang Online</a>
            </div>
        </div>
          <!-- /.box -->

        <?php 
            $url =\Request::segments();
            if(isset($url[1])){
                $high = $url[1];
            }else{
                $high = "";
            }
        ?>

    @php
$array_menu = [];




$argv_1['header'] = 'Quản lý';
$argv_1['menu'] = [

        [
            'name' => 'Sản phẩm',
            'route' => 'admin.product.list',
            'high' => 'product',
            'icon' => 'fa fa-archive'
        ],
        [
            'name' => 'Danh mục',
            'route' => 'admin.category.list',
            'high' => 'category',
            'icon' => 'fa fa-align-center'
        ],
        [
            'name' => 'Thương hiệu',
            'route' => 'admin.brand.list',
            'high' => 'brand',
            'icon' => 'fa fa-star'
        ],
        [
            'name' => 'Đơn hàng',
            'route' => 'admin.bill.list',
            'high' => 'bill',
            'icon' => 'fa fa-newspaper-o'
        ],
       
        [
            'name' => 'Màu sắc',
            'route' => 'admin.color.list',
            'icon' => 'fa fa-leaf',
            'high' => 'color'
        ]
];

$array_menu[]= $argv_1;


$argv_2['header'] = 'Quản lý Người dùng';
$argv_2['menu'] = [

        [
            'name' => 'Người dùng',
            'route' => 'admin.user.list',
            'icon' => 'fa fa-user',
            'high' => 'user'
        ],
        [
            'name' => 'Phản hồi',
            'route' => 'admin.feedback.list',
            'icon' => 'fa fa-envelope',
            'high' => 'feedback'
        ]
];
$array_menu[]= $argv_2;

$argv_3['header'] = 'Tùy chỉnh';
$argv_3['menu'] = [
        [
            'name' => 'Thông tin cá nhân',
            'route' => 'admin.user.profile',
            'icon' => 'fa fa-edit',
            'high' => 'user-profile'
        ]
];
$array_menu[]= $argv_3;

@endphp

    <!-- Sidebar Menu -->
    <ul class="sidebar-menu" data-widget="tree">
        @foreach($array_menu as $item)
        <li class="header">{{$item['header']}}</li>
        <!-- Optionally, you can add icons to the links -->
            @foreach($item['menu'] as $menu)
            <li class="@if(isset($menu['submenu'])) treeview @endif  
            @if(isset($menu['high']) && $menu['high'] == $high) {{'active'}} @endif">
                <a href="{{ $menu['route'] != '' ? route($menu['route']) : '#' }}">
                    <i class="{{$menu['icon']}}"></i> 
                    <span>{{$menu['name']}}</span>
                    @if(isset($menu['submenu']))
                        <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    @endif
                </a>

                @if(isset($menu['submenu']))
                <ul class="treeview-menu">
                    @foreach($menu['submenu'] as $sub)
                        <li>
                            <a href="{{ $sub['route'] != '' ? route($sub['route']) : '#' }}"><i class="{{$sub['icon']}}"></i>{{ $sub['name'] }}</a>
                        </li>
                    @endforeach
                </ul>
                @endif

            </li>
            @endforeach
        @endforeach
    </ul>
    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>

