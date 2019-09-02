<!DOCTYPE html>
<html>
<head>
    @include('_components.head')
    @include('_components.css')
</head>

{{-- <body class="hold-transition @yield('body_class')"> --}}
<body class="hold-transition skin-purple sidebar-mini">
    <div class="wrapper">
        <!-- トップメニュー -->
        <header class="main-header">
            @include('_components.header')
        </header>

        <!-- サイドバー -->
        <aside class="main-sidebar">
            @include('_components.aside')
        </aside>

        <!-- コンテンツ -->
        <div class="content-wrapper">
            <section class="content-header">
                @yield('content-header')
            </section>
            <section class="content">
                @include('_components.message')
                @yield('content-body')
            </section>
            @yield('content')
        </div>

        <!-- フッター -->
        <footer class="main-footer">
            @include('_components.footer')
        </footer>
    </div>
    <!-- js -->
    @include('_components.js')
    @yield('unique_js')
</body>
</html>
