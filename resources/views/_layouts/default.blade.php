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
            @include('_components.header')
        </header>

        <!-- サイドバー -->
        <aside class="main-sidebar">
            @include('_components.aside')
        </aside>

        <!-- content -->
        <div class="content-wrapper">
            @include('_components.message')
            @yield('content')
        </div><!-- end content -->

        <!-- フッター -->
        <footer class="main-footer">
            @include('_components.footer')
        </footer>
    </div>
    <!-- js -->
    @include('_components.js')
</body>
</html>
