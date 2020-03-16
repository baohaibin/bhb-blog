<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>

    <link href="/admin/css/bootstrap.min.css" rel="stylesheet">
    <link href="/admin/css/datepicker3.css" rel="stylesheet">
    <link href="/admin/css/styles.css" rel="stylesheet">
    <link href="/admin/css/bootstrap-table.css" rel="stylesheet">

    <!--[if lt IE 9]>
    <script src="/admin/js/html5shiv.js"></script>
    <script src="/admin/js/respond.min.js"></script>
    <![endif]-->

</head>

<body>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><span>BHBBlog</span>Admin</a>
            <ul class="user-menu">
                <li class="dropdown pull-right">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> {{auth()->guard('admin')->user()->name }} <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{ url('admin/login/logout') }}"><span class="glyphicon glyphicon-log-out"></span> 退出登录</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div><!-- /.container-fluid -->
</nav>

<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <ul class="nav menu">
        <li><a href="index.html"><span class="glyphicon glyphicon-dashboard"></span> 统计</a></li>
        <li><a href="{{url('admin/article/index')}}"><span class="glyphicon glyphicon-th"></span> 文章</a></li>
        <li><a href="{{url('admin/type/index')}}"><span class="glyphicon glyphicon-stats"></span> 分类</a></li>
        <li><a href="{{url('admin/tag/index')}}"><span class="glyphicon glyphicon-list-alt"></span> 标签</a></li>
        <li><a href="{{url('admin/nav/index')}}"><span class="glyphicon glyphicon-list-alt"></span> 导航</a></li>
        <li><a href="forms.html"><span class="glyphicon glyphicon-pencil"></span> 用户</a></li>
        <li><a href="forms.html"><span class="glyphicon glyphicon-pencil"></span> 评论</a></li>
        <li><a href="panels.html"><span class="glyphicon glyphicon-info-sign"></span> 友情链接</a></li>
        <li class="parent ">
            <a href="#">
                <span class="glyphicon glyphicon-list"></span> 设置 <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="glyphicon glyphicon-s glyphicon-plus"></em></span>
            </a>
            <ul class="children collapse" id="sub-item-1">
                <li>
                    <a class="" href="#">
                        <span class="glyphicon glyphicon-share-alt"></span> Sub Item 1
                    </a>
                </li>
                <li>
                    <a class="" href="#">
                        <span class="glyphicon glyphicon-share-alt"></span> Sub Item 2
                    </a>
                </li>
                <li>
                    <a class="" href="#">
                        <span class="glyphicon glyphicon-share-alt"></span> Sub Item 3
                    </a>
                </li>
            </ul>
        </li>
        <li role="presentation" class="divider"></li>
    </ul>
</div><!--/.sidebar-->

@yield('main')

<script src="/admin/js/jquery-1.11.1.min.js"></script>
<script src="/admin/js/bootstrap.min.js"></script>
<script src="/admin/js/chart.min.js"></script>
{{--<script src="/admin/js/chart-data.js"></script>--}}
<script src="/admin/js/easypiechart.js"></script>
{{--<script src="/admin/js/easypiechart-data.js"></script>--}}
<script src="/admin/js/bootstrap-datepicker.js"></script>
<script src="/admin/js/bootstrap-table.js"></script>
<script>
    $('#sidebar-collapse').children('ul').children('li').each(function () {
        var navmenuurl = $(this).children('a').attr('href');
        if(window.location.pathname.indexOf(navmenuurl)!=-1)
            $(this).addClass('active');
    });
    !function ($) {
        $(document).on("click","ul.nav li.parent > a > span.icon", function(){
            $(this).find('em:first').toggleClass("glyphicon-minus");
        });
        $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
    }(window.jQuery);

    $(window).on('resize', function () {
        if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
    })
    $(window).on('resize', function () {
        if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
    })
</script>
<script>
    $(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    })
</script>
@yield('js')
</body>

</html>
