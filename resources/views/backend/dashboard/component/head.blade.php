    <base href="{{env('APP_URL')}}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="backend/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="backend/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="backend/css/customize.css" rel="stylesheet">
    <link href="backend/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="">
    <script src="backend/js/jquery-3.1.1.min.js"></script>
    @if(isset($config['css'])&& is_array($config['css']))
    @foreach ($config['css'] as $key =>$val)
        {!!'<link href="'.$val.'" rel="stylesheet"></link>'!!}
    @endforeach
@endif
