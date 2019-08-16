@if(config('adminlte.layout') != 'top-nav')
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">

        {{-- 書き換える為、下記すべてを入れ替え --}}
        <section class="sidebar">
            <ul class="sidebar-menu">

                <!-- メニューヘッダ -->
                <li class="header">機能一覧</li>

                <!-- メニュー項目 -->
                <li><a href="">新規登録</a></li>

            </ul>
        </section>

    </aside>
@endif
