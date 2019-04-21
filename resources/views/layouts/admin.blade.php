<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="{{asset('css')}}/bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('css')}}/font-awesome.min.css" rel="stylesheet">
    <link href="{{asset('css')}}/datepicker3.css" rel="stylesheet">
    <link href="{{asset('css')}}/styles.css" rel="stylesheet">

    <!--Custom Font-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="{{asset('js')}}/html5shiv.js"></script>
    <script src="{{asset('js')}}/respond.min.js"></script>

    <![endif]-->
</head>
<body>

<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <div class="profile-sidebar">
        <div class="profile-userpic">
            <img src="http://placehold.it/50/30a5ff/fff" class="img-responsive" alt="">
        </div>
        <div class="profile-usertitle">
            <div class="profile-usertitle-name">{{$userData->name}}</div>
            <div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
        </div>
        <div class="clear"></div>
    </div>
    <div class="divider"></div>
    <form role="search">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Search">
        </div>
    </form>
    <ul class="nav menu">
        <li class=""><a href="{{route('admin')}}"><em class="fa fa-cart-arrow-down">&nbsp;</em>Products</a></li>
        <li class=""><a href="{{route('addProduct')}}"><em class="fa fa-cart-plus">&nbsp;</em>Insert Products</a></li>
        <li><a href="widgets.html"><em class="fa fa-drivers-license">&nbsp;</em>Customers</a></li>
        <li><a href="{{route('showOrders')}}"><em class="fa fa-bar-chart">&nbsp;</em>Orders</a></li>
    </ul>
</div><!--/.sidebar-->

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="{{route('allProducts')}}">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Dashboard</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Dashboard</h1>
        </div>
    </div><!--/.row-->
</div>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">

    <script src="{{asset('js')}}/jquery.min.js"></script>
    <div class="panel panel-container">
             @yield('center')
        </div><!--/.row-->
    </div>

<!--/.main-->

<script src="{{asset('js')}}/jquery-1.11.1.min.js"></script>
<script src="{{asset('js')}}/bootstrap.min.js"></script>
<script src="{{asset('js')}}/chart.min.js"></script>
<script src="{{asset('js')}}/chart-data.js"></script>
<script src="{{asset('js')}}/easypiechart.js"></script>
<script src="{{asset('js')}}/easypiechart-data.js"></script>
<script src="{{asset('js')}}/bootstrap-datepicker.js"></script>
<script src="{{asset('js')}}/custom.js"></script>
<script>
    window.onload = function () {
        var chart1 = document.getElementById("line-chart").getContext("2d");
        window.myLine = new Chart(chart1).Line(lineChartData, {
            responsive: true,
            scaleLineColor: "rgba(0,0,0,.2)",
            scaleGridLineColor: "rgba(0,0,0,.05)",
            scaleFontColor: "#c5c7cc"
        });
    };
</script>

</body>
</html>