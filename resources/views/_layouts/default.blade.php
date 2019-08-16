<!DOCTYPE html>
<html>
<head>
    @include('_components.head')
    @include('_components.css')
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
            @include('_components.footer')
        </footer>
    </div><!-- end wrapper -->
    @include('_components.js')
</body>
</html>
