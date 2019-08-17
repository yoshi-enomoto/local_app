{{-- （samples）フォルダ --}}
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
