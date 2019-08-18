<section class="sidebar">
    <ul class="sidebar-menu" data-widget="tree">
        <!-- メニューヘッダ -->
        <li class="header">機能一覧</li>
        <!-- メニュー項目 -->
        <li class="treeview">
            <a href="#"><i class="fa fa-star"></i><span>カテゴリー管理</span><i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
                <li><a href="{{ route('mock_categories', ['index']) }}"><i class="fa fa-circle-o"></i>カテゴリー一覧</a></li>
                <li><a href="{{ route('mock_categories', ['create']) }}"><i class="fa fa-circle-o"></i>カテゴリー登録</a></li>
            </ul>
        </li>
        <li class="treeview">
            <a href="#"><i class="fa fa-star"></i><span>タスク管理</span><i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
                <li><a href="{{ route('mock_tasks', ['index']) }}"><i class="fa fa-circle-o"></i>タスク一覧</a></li>
                <li><a href="{{ route('mock_tasks', ['create']) }}"><i class="fa fa-circle-o"></i>タスク登録</a></li>
            </ul>
        </li>
        <li class="treeview">
            <a href="#"><i class="fa fa-star"></i><span>時間数管理</span><i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
                <li><a href="{{ route('mock_hours', ['create']) }}"><i class="fa fa-circle-o"></i>時間入力</a></li>
                <li><a href="{{ route('mock_hours', ['index_this_month']) }}"><i class="fa fa-circle-o"></i>当月一覧</a></li>
                <li><a href="{{ route('mock_hours', ['index_month']) }}"><i class="fa fa-circle-o"></i>月一覧</a></li>
            </ul>
        </li>
    </ul>
</section>
