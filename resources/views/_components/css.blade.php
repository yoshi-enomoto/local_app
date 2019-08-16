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
