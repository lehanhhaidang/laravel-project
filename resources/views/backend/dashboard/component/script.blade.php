    <script src="backend/vendor/jquery/jquery.min.js"></script>
    <script src="backend/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="backend/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="backend/js/sb-admin-2.min.js"></script>
    <script src="backend/library/library.js"></script>



    <!-- Page level plugins -->
    {{-- <script src="backend/vendor/chart.js/Chart.min.js"></script>
    <script src="backend/js/demo/chart-area-demo.js"></script>
    <script src="backend/js/demo/chart-pie-demo.js"></script> --}}

    {{-- asdfasdffd --}}
    @if(isset($config['js'])&& is_array($config['js']))
        @foreach ($config['js'] as $key =>$val)
            {!!'<script src="'.$val.'"></script>'!!}
        @endforeach
    @endif
