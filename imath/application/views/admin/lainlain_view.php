<html>
    <head>        
	<title>Dashboard Admin</title>
	<link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/imath.css" rel="stylesheet">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
 
 <!--========================== ADMIN NAVBAR ============================-->
    	<nav class="navbar navbar-default navbar-static-top">
		<div class="container" id="navbar">
			<div class="navbar-header" id="logobar">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
				</button>
				<a class="navbar-brand" href="<?php echo base_url();?>index.php">
					<img src="<?php echo base_url();?>assets/images/logo.png" height="42px" width="120px";>
				</a>
			</div>
		<!-- Navbar Atas -->
		<div id="navbar" class="navbar-collapse collapse">
			<ul class="nav navbar-nav navbar-right">
				<li><a href="<?php echo base_url()?>admin/dashboard"> DASHBOARD </a></li>
				<li><a href="<?php echo base_url()?>"> BERANDA</a></li>
				<li><a href="<?php echo base_url()?>autentikasi/logout"> LOG OUT </a></li>	
			</ul>
		</div>	<!--/.nav-collapse -->
	</div>      	
	
	<div class="container" id="iconbar">
        
		<ul class="navbar-nav navbar-left">
			<li class="space"><a href="<?php echo base_url()?>admin/daftar_kelas">KELAS</a></li>
			<li class="space"><a href="<?php echo base_url()?>admin/daftar_materi">MATERI</a></li>
			<li class="space"><a href="<?php echo base_url()?>admin/soal_latihan">SOAL LATIHAN</a></li>
			<li class="space"><a href="<?php echo base_url()?>admin/soal_tes">SOAL TES</a></li>
			<li class="space"><a href="<?php echo base_url()?>admin/anggota">DATA ANGGOTA</a></li>
			<li class="space"><a href="<?php echo base_url()?>admin/pesan">PESAN</a></li>
			<li class="space"><a href="<?php echo base_url()?>admin/lain_lain">LAIN-LAIN</a></li>
		</ul>
	</div>
	
</nav>
 <!--======================= END OF ADMIN NAVBAR ============================-->

    <div class="container contents">
    	<div class="titleText">
    	<h1> Dashboard Admin</h1>
    </div>
	<table class="table table-hover table-striped tableimath">
		<thead>
			<tr>
				<th class="col-md-4">Halaman</th>
				<th class="col-md-5"></th>				
				<th class="col-md-2">Tindakan</th>          
				<th class="col-md-1"></th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>
					Bantuan
				</td> <td></td>
				<td>
					<!-- Edit Button-->
					<a href="<?php echo base_url();?>admin/lain_lain/bantuan">
						      <img src="<?php echo base_url() ?>assets/images/editicon.png" width="50px" height="50px"></a>
				</td><td></td>
			</tr>
			<tr>
				<td>
					Tentang Kami
				</td> <td></td> 	
				<td>
					<!-- Edit Button-->
					<a href="<?php echo base_url();?>admin/lain_lain/tentang_kami">
						      <img src="<?php echo base_url() ?>assets/images/editicon.png" width="50px" height="50px"></a>
				</td><td></td>
			</tr>
			<tr>
				<td>
					Kebijakan Privasi
				</td> <td></td>
				<td>
					<!-- Edit Button-->
					<a href="<?php echo base_url();?>admin/lain_lain/kebijakan_privasi">
						      <img src="<?php echo base_url() ?>assets/images/editicon.png" width="50px" height="50px"></a>
				</td><td></td>
			</tr>      
		</tbody>
  	</table>
</div>

	<!-- ========================= Footer =============================-->
	<footer class="footer">
	      <div class="container">
	        <p class="text-muted">
	          <div class="row">
			<div class="col-md-3"><a class="footerColor" href="<?php echo base_url()."info/kebijakan_privasi"?>"><p>KEBIJAKAN PRIVASI</p></a></div>
			<div class="col-md-3"><a class="footerColor" href="<?php echo base_url()."info/tentang_kami"?>"><p>TENTANG KAMI</p></a></div>
			<div class="col-md-3"><a class="footerColor" href="<?php echo base_url()."info/hubungi_kami"?>"><p>HUBUNGI KAMI</p></a></div>
			<div class="col-md-3"><a class="footerColor" href="<?php echo base_url()."info/bantuan"?>"><p>BANTUAN</p></a></div>           
	        </div>
	        <div class="row">
	          <div class="col-md-12"><p class="footerColor">Copyright(c) 2015</p></div>
	        </div>
	        </p>
	      </div>
	</footer>
	<!-- ===================== END OF FOOTER ======================-->
	
    </body>
</html>
