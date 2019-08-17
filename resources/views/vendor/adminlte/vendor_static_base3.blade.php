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
    <link rel="stylesheet"
          href="{{ asset('vendor/adminlte/dist/css/skins/skin-' . config('adminlte.skin', 'blue') . '.min.css')}} ">
    <title>adminLTE test</title>
</head>

<body class="skin-blue">
    <div class="wrapper">

        <!-- トップメニュー -->
        <header class="main-header">

            <!-- ロゴ -->
            <a href="" class="logo">管理画面</a>

            <!-- トップメニュー -->
            <nav class="navbar navbar-static-top" role="navigation">
                <ul class="nav navbar-nav">
                    <li><a href="">顧客管理</a></li>
                </ul>
            </nav>

        </header><!-- end header -->


        <!-- サイドバー -->
        <aside class="main-sidebar">
            <section class="sidebar">
                <ul class="sidebar-menu">

                    <!-- メニューヘッダ -->
                    <li class="header">機能一覧</li>

                    <!-- メニュー項目 -->
                    <li><a href="">新規登録</a></li>

                </ul>
            </section>
        </aside><!-- end sidebar -->


        <!-- content -->
        <div class="content-wrapper">

            <!-- コンテンツヘッダ -->
            <section class="content-header">
                <h1>ページタイトル</h1>
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
