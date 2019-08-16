<!doctype html>
<head>
    <meta charset="utf-8">
    <!-- for responsive -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <!-- コマンド叩いて生成していれば問題なし -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/bootstrap/dist/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <!-- コマンド叩いて生成していれば問題なし -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/font-awesome/css/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <!-- コマンド叩いて生成していれば問題なし -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/Ionicons/css/ionicons.min.css') }}">
    <!-- Select2 -->
    {{-- <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css"> --}}
    <!-- adminLTE style -->
    <!-- コマンド叩いて生成していれば問題なし -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/AdminLTE.min.css') }}">
<!--     <link rel="stylesheet"
          href="{{ asset('vendor/adminlte/dist/css/skins/skin-' . config('adminlte.skin', 'blue') . '.min.css')}} "> -->
    <link rel="stylesheet"
          href="{{ asset('vendor/adminlte/dist/css/skins/skin-yellow.min.css')}} ">
    <title>adminLTE test</title>
</head>

<!-- <body class="skin-blue"> -->
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
    <!-- JS -->

    <!-- jquery -->
    <script src="{{ asset('vendor/adminlte/vendor/jquery/dist/jquery.min.js') }}"></script>
    {{-- <script src="plugins/jQuery/jQuery-2.1.4.min.js" type="text/javascript"></script> --}}
    <!-- bootstrap -->
    <script src="{{ asset('vendor/adminlte/vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    {{-- <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script> --}}
    <!-- adminLTE -->
    <script src="{{ asset('vendor/adminlte/dist/js/adminlte.min.js') }}"></script>
    {{-- <script src="dist/js/app.min.js" type="text/javascript"></script> --}}
</body>
</html>
