{{-- vendorファイル内の分割ファイルを1つにまとめたもの --}}
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title_prefix', config('adminlte.title_prefix', ''))
        @yield('title', config('adminlte.title', 'AdminLTE 2'))
        @yield('title_postfix', config('adminlte.title_postfix', ''))</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/bootstrap/dist/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/font-awesome/css/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/Ionicons/css/ionicons.min.css') }}">

    @if(config('adminlte.plugins.select2'))
        <!-- Select2 -->
        {{-- 初期の状態から『https:』を付加する --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css">
    @endif

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/AdminLTE.min.css') }}">

    @if(config('adminlte.plugins.datatables'))
        <!-- DataTables with bootstrap 3 style -->
        {{-- 初期の状態から『https:』を付加する --}}
        <link rel="stylesheet" href="https://cdn.datatables.net/v/bs/dt-1.10.18/datatables.min.css">
    @endif

    {{-- 下記の1行を yieldで導入するかしないかで変わる --}}
    <link rel="stylesheet"
          href="{{ asset('vendor/adminlte/dist/css/skins/skin-yellow.min.css')}} ">

    @yield('adminlte_css')
        {{-- 出力では『/css/admin_custom.css』になるので、独自に追加する用？ --}}

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
{{-- <body class="hold-transition @yield('body_class')"> --}}
<!-- <body class="skin-yellow"> -->
<body class="skin-yellow">
    <div class="wrapper">

        <!-- トップメニュー -->
        <header class="main-header">

            <!-- ロゴ -->
            <a href="" class="logo">管理画面</a>

            <!-- トップメニュー -->
            <nav class="navbar navbar-static-top" role="navigation">
                <div class="collapse navbar-collapse" id="navbar-collapse">
<!--                     <a href="" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a> -->
                    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>

                    <ul class="nav navbar-nav">
                        <li><a href="">顧客管理</a></li>
                        <li><a href="">売上管理</a></li>
                        <li class="dropdown">
                            <a href="" class="dropdown-toggle" data-toggle="dropdown">その他<span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="">その他1</a></li>
                                <li><a href="">その他2</a></li>
                            </ul>
                        </li>
                    </ul>

                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <li><a href=""><i class="fa fa-sign-out"></i>ログアウト</a></li>
                        </ul>
                    </div>
                </div>
            </nav>

        </header><!-- end header -->


        <!-- サイドバー -->
        <aside class="main-sidebar">
            <section class="sidebar">
                <ul class="sidebar-menu" data-widget="tree">

                    <!-- メニューヘッダ -->
                    <li class="header">機能一覧</li>

                    <!-- メニュー項目 -->
                    <li class="active"><a href=""><i class="fa fa-circle-o"></i>新規登録</a>
                    <li><a href=""><i class="fa fa-circle-o"></i>検索</a></li>
                    <!-- treeview -->
                    <li class="treeview">
                        <a href="#"><i class="fa fa-circle-o"></i>その他<i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="">その他1</a></li>
                            <li><a href="">その他2</a></li>
                        </ul>
                    </li>

                </ul>
            </section>
        </aside><!-- end sidebar -->


        <!-- content -->
        <div class="content-wrapper">

            <!-- コンテンツヘッダ -->
            <section class="content-header">
                <h1>ページタイトル</h1>
                <!-- パンくずリスト -->
                <ol class="breadcrumb">
                    <li><a href="">Home</a></li>
                    <li>現在地</li>
                </ol>
            </section>

            <!-- メインコンテンツ -->
            <section class="content">

                <!-- コンテンツ1 -->
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">ボックスタイトル</h3>
                    </div>
                    <div class="box-body">
                        <p>ボックスボディー</p>
                    </div>
                </div>

                <div class="row">
                    <!-- col -->
                    <div class="col-xs-6">
                        <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title">ボックスタイトル左</h3>
                            </div>
                            <div class="box-body">
                                <p>ボックスボディ</p>
                            </div>
                        </div>
                    </div>

                    <!-- col -->
                    <div class="col-xs-6">
                        <div class="box box-danger">
                            <div class="box-header">
                                <h3 class="box-title">ボックスタイトル右</h3>
                            </div>
                            <div class="box-body">
                                <p>ボックスボディ</p>
                            </div>
                        </div>
                    </div>



            </section>

        </div><!-- end content -->

        <!-- フッター -->
        <footer class="main-footer">
            <div class="pull-right hidden-xs">Version1.0</div>
            <strong>Copyright &copy; 2015</strong>, All rights reserved.
        </footer><!-- end footer -->


    </div><!-- end wrapper -->

    <script src="{{ asset('vendor/adminlte/vendor/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/adminlte/vendor/jquery/dist/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('vendor/adminlte/vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- adminLTE -->
    {{-- 下記がないとサイドバーが展開しない --}}
    <script src="{{ asset('vendor/adminlte/dist/js/adminlte.min.js') }}"></script>

    @if(config('adminlte.plugins.select2'))
        <!-- Select2 -->
        {{-- 初期の状態から『https:』を付加する --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    @endif

    @if(config('adminlte.plugins.datatables'))
        <!-- DataTables with bootstrap 3 renderer -->
        {{-- 初期の状態から『https:』を付加する --}}
        <script src="https://cdn.datatables.net/v/bs/dt-1.10.18/datatables.min.js"></script>
    @endif

    @if(config('adminlte.plugins.chartjs'))
        <!-- ChartJS -->
        {{-- 初期の状態から『https:』を付加する --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js"></script>
    @endif

    @yield('adminlte_js')

</body>
</html>
