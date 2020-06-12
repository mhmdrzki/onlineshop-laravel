<!doctype html>
<html lang="en">

<head>
	<title>Dashboard | Online Shop</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="{{asset('admin/assets/vendor/bootstrap/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('admin/assets/vendor/font-awesome/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{asset('admin/assets/vendor/linearicons/style.css')}}">
	<link rel="stylesheet" href="{{asset('admin/assets/vendor/chartist/css/chartist-custom.css')}}">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="{{asset('admin/assets/css/main.css')}}">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="{{asset('admin/assets/css/demo.css')}}">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="{{asset('admin/assets/img/apple-icon.png')}}">
	<link rel="icon" type="image/png" sizes="96x96" href="{{asset('admin/assets/img/favicon.png')}}">
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="brand">
				<a href="index.html"><img src="{{asset('admin/assets/img/logo2.png')}}" alt="Klorofil Logo" class="img-responsive logo"></a>
			</div>
			<div class="container-fluid">


				<div id="navbar-menu">
					<ul class="nav navbar-nav navbar-right">
						<?php $pesanans = \App\Pesanan::where('status', 1)->get();?>

						<li class="dropdown">

							<a href="#" class="dropdown-toggle icon-menu" data-toggle="dropdown">
								<i class="lnr lnr-alarm"></i>
								<span class="badge bg-danger">{{count($pesanans)}}</span>
							</a>
							<ul class="dropdown-menu notifications">
								@if(count($pesanans) >= 1)
								<li><a href="{{url('/transaksi')}}" class="notification-item"><span class="dot bg-success"></span>Anda memiliki {{count($pesanans)}} pesanan baru</a></li>
								@else
								<li><a href="#" class="notification-item"><span class="dot bg-success"></span>Anda tidak memiliki pesanan</a></li>
								@endif
							</ul>
						</li>

						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="{{asset('admin/assets/img/user.png')}}" class="img-circle" alt="Avatar"> <span>{{auth()->guard('admin')->user()->name}}</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
							<ul class="dropdown-menu">
								<li><a href="#"><i class="lnr lnr-user"></i> <span>My Profile</span></a></li>
								<li><a href="{{ url('admin-logout') }}" onclick="event.preventDefault();
                                 	document.getElementById('logout-form').submit();">
                                 	<i class="lnr lnr-exit"></i> <span>Logout</span></a>
                             	</li>
                             <form id="logout-form" action="{{ url('admin-logout') }}" method="POST" style="display: none;">
				                @csrf
				            </form>
							</ul>
						</li>
						<!-- <li>
							<a class="update-pro" href="https://www.themeineed.com/downloads/klorofil-pro-bootstrap-admin-dashboard-template/?utm_source=klorofil&utm_medium=template&utm_campaign=KlorofilPro" title="Upgrade to Pro" target="_blank"><i class="fa fa-rocket"></i> <span>UPGRADE TO PRO</span></a>
						</li> -->
					</ul>
				</div>
			</div>
		</nav>
		<!-- END NAVBAR -->
		<!-- LEFT SIDEBAR -->
		<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
						<li><a href="{{url('/dashboard')}}" class="active"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
						<li>
							<a href="#subPages1" data-toggle="collapse" class="collapsed" aria-expanded="false"><i class="fa fa-usd"></i> <span>Transaksi</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPages1" class="collapse" aria-expanded="false" style="height: 0px;">
								<ul class="nav">
									<li><a href="{{url('/transaksi')}}" class="">Pesanan Baru</a></li>
									<li><a href="{{url('/transaksi/selesai')}}" class="">Pesanan Selesai</a></li>
									<li><a href="{{url('/transaksi/gagal')}}" class="">Pesanan Gagal</a></li>
								</ul>
							</div>
						</li>
						<li>
							<a href="#subPages" data-toggle="collapse" class="collapsed" aria-expanded="false"><i class="fa fa-database"></i> <span>Data Master</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPages" class="collapse" aria-expanded="false" style="height: 0px;">
								<ul class="nav">
									<li><a href="{{url('/barang')}}" class="">Barang</a></li>
									<li><a href="{{url('/kategori')}}" class="">Kategori Barang</a></li>
								</ul>
							</div>
						</li>

						<li><a href="{{url('/users')}}"><i class="lnr lnr-user"></i> <span>Costumer</span></a></li>


					</ul>
				</nav>
			</div>
		</div>
		<!-- END LEFT SIDEBAR -->
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					@yield('content')
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->
		<div class="clearfix"></div>
		<footer>
			<div class="container-fluid">
				<p class="copyright">&copy; 2017 <a href="https://www.themeineed.com" target="_blank">Theme I Need</a>. All Rights Reserved.</p>
			</div>
		</footer>
	</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->
	<script src="{{asset('admin/assets/vendor/jquery/jquery.min.js')}}"></script>
	<script src="{{asset('admin/assets/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('admin/assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
	<script src="{{asset('admin/assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js')}}"></script>
	<script src="{{asset('admin/assets/vendor/chartist/js/chartist.min.js')}}"></script>
	<script src="{{asset('admin/assets/scripts/klorofil-common.js')}}"></script>

	<script type="text/javascript">
	    $('#myModal').on('shown.bs.modal', function () {
	      $('#myInput').trigger('focus')
	    })
	</script>
</body>

</html>
