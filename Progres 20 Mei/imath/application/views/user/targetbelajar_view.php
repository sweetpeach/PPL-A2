<html>
    <head>        
	<title>Target Belajar - iMath</title>
	<!--<script src="https://code.jquery.com/jquery-1.11.2.min.js"></script>-->
	<script>
	function confirmDelete(url) {
		if (confirm("Kamu yakin ingin menghapus target belajar ini?")) {
			window.location.href = url;
		}		
	}
	</script>
	<script>
	jQuery(document).ready(function(){
	       function fetchMateri(idKelas) {	       
			var getUrl = window.location;
			var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
			var location = baseUrl + "/index.php/target_belajar/getNamaMateri/" + tb;
			$.getJSON(location, function(arrayMateri) {
				var content = '';
				arrayMateri.forEach(function (materi) {
					content += '<option value="' + materi.idMateri + '">' + materi.nama + '</option>';
				});
				$('#pilihmateri').html(content);
			});
	       }
		$("#pilihkelas").change(function() {	
			fetchMateri($("#pilihkelas").val());
	       });
	       $('#pilihkelas').change();
	     });
	</script>
	<link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>assets/css/imath.css" rel="stylesheet">
    </head>
	
    <body>
<!-- =========================  Navigation Bar iMath =========================== -->
    	<nav class="navbar navbar-default navbar-static-top">
	      <div class="container" id="navbar">
	        <div class="navbar-header" id="logobar">
	        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	          <span class="sr-only">Toggle navigation</span>
	        </button>
	        <a class="navbar-brand" href="<?php echo base_url();?>index.php"><img src="<?php echo base_url();?>assets/images/logo.png" height="42px" width="120px";></a>
	      </div>
<!-- Navbar Atas -->
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><?php
				if($this->session->userdata('loggedin')) { 
					if($this->session->userdata('role') == "admin") {
						echo '<a href="'.base_url().'admin/dashboard"> DASHBOARD ADMIN </a></li><li>';
						echo '<a href="'.base_url().'autentikasi/logout"> LOG OUT </a>';
					} else {
						echo '<a href="'.base_url().'autentikasi/logout"> LOG OUT </a>';
					} 
				} else {
						echo '<a href="'.base_url().'autentikasi"> LOG IN </a>';
				}
				?>	</li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>      
	<?php 
	//jika user telah login
	if($this->session->userdata('loggedin')) {
		
        echo '<div class="container" id="iconbar">';
        
		echo '<div class="col-md-2"><img src="'.base_url().'assets/images/home.png" img size="height="20" width="20"><a href="'.base_url().'">&nbspBERANDA</a></div>';
		echo '<div class="col-md-2"> <img src="'.base_url().'assets/images/rapor.png" img size="height="20" width="20"><a href="'.base_url().'rapor">&nbspRAPOR</a></div>';
		echo '<div class="col-md-2"> <img src="'.base_url().'assets/images/clock.png" img size="height="20" width="20"><a href="'.base_url().'target_belajar">&nbspTARGET BELAJAR</a></div>';
		echo '<div class="col-md-2"> <img src="'.base_url().'assets/images/medali.png" img size="height="20" width="20"><a href="'.base_url().'prestasi">&nbspPRESTASI</a></div>';
		echo '<div class="col-md-2"> <img src="'.base_url().'assets/images/game.png" img size="height="20" width="20"><a href="'.base_url().'permainan">&nbspPERMAINAN</a></div>';
		echo '<div class="col-md-2">';
		if($this->session->userdata('gender') =="Perempuan"){
			echo '<img src="'.base_url().'assets/images/girl.png" img size="height="20" width="20">';
		}
		else{
			echo '<img src="'.base_url().'assets/images/boy.png" img size="height="20" width="20">';
		}
		echo '<span class="weight"><a href="'.base_url().'profil"> Hai ';
		echo $this->session->userdata('namaPanggilan')."</a></span></div>";
		
		echo '</div>';
	}
	?>
</nav>
<!-- =========================  Navigation Bar iMath =========================== -->

<div class="container contents">      
      <div class="jumbotron dashboardUser">      
      		<div class="row">
      			<div class="col-md-4 white">
      				<img src="<?php echo base_url();?>assets/images/clock.png" height="200" width="200">
      			</div>
      			<div class="col-md-8 white2">
      				<h2 class="userDashboard">Target Belajar</h2><br>
				<div class="right">
					<a href=" <?php echo base_url();?>index.php/target_belajar/buatBaru"><button type = "submit" class="orangeButton"> Buat Baru</button></a>   
				</div>
      			</div>
      		</div>
    	</div> 
	<h1 class="tbelajar containerTB">Target Belajar</h1>
	<span id="tulisanBiru" class="weight"><?php echo $this->session->flashdata('messageTargetBelajar'); ?></span>
	<span id="tulisanBiru" class="weight"><?php echo $this->session->flashdata('deleteTargetBelajar'); ?></span>
	<div class="tbelajarPink">
	<div class="table-responsive">    	
    <table>
	<?php 
	for($i = 0; $i < $tbRow; $i++)
	{?>
	<tr>
	<td class="col-md-9">	
	 Menyelesaikan <?php echo $result[$i]->banyakSoal ?> soal latihan materi 
	 <?php echo $nama[$i]->nama?> 
	 <!--<?php echo $result[$i]->idMateri?> -->
	 kelas <?php $idKelas = $result[$i]->idKelas; echo substr($idKelas,4,5)." ".substr($idKelas, 0,2)?>  dengan target nilai <?php echo $result[$i]->targetNilai?>
	 <?php 
		if(!is_null($result[$i] ->targetWaktu)) //target waktunya ada
		{
			$totalDalamDetik = $result[$i] ->targetWaktu;
			$menit = $totalDalamDetik/60;			
			$floorMenit = floor($menit);
			$detik = $totalDalamDetik - ($floorMenit * 60);
			echo 'dalam waktu ';
			if($floorMenit > 0)
				echo $floorMenit.' menit ';			
			if($detik > 0)
				echo $detik.' detik';			
		}
	 ?>
	 (Dibuat: <?php echo $result[$i]->tanggal ?>)
	</td>
	<!-- Done Button-->
	<td class="col-md-3">
	<input value="<?php echo $result[$i]->idTargetBelajar ?>" id="tb" type="hidden">
	<a href="<?php echo base_url() ?>index.php/target_belajar/done/<?php echo $result[$i]->idTargetBelajar ?>">
                                    <img src="<?php echo base_url() ?>assets/images/doneicon.png" width="50px" height="50px"></a>
	
	<!-- Edit Button-->
	<a href="<?php echo base_url() ?>index.php/target_belajar/edit/<?php echo $result[$i]->idTargetBelajar ?>">
		<img src="<?php echo base_url() ?>assets/images/editicon.png" width="50px" height="50px">
	</a>	
	<!-- Hapus Button-->
	<button class="buttonDelete" type="submit"  onclick="return confirmDelete('<?php echo base_url() ?>index.php/target_belajar/delete/<?php echo $result[$i]->idTargetBelajar ?>');">
		<img src="<?php echo base_url() ?>assets/images/deleteicon.png" width="50px" height="50px" alt="submit">
	</button>	
	</td>
        <tr>
	<?php }?>	
	        
	</table>
</div>
</div>
<div class="row containerTB">
	<div class = "col-md-8"><h1 class="tBelajar"> History </h1></div>
	<div class="col-md-4">
		<button class="buttonDelete" type="submit" onclick="return confirmDelete('<?php echo base_url() ?>index.php/target_belajar/hapusHistory');"><h1 class="tBelajar" style="color: #ff3d78">Hapus History</h1></button>
	</div>
	</div>
		<div class="tbelajarBiru">
		<?php 
		for($i = 0; $i < $historyRow; $i++)
			{?>
			 Menyelesaikan <?php echo $history[$i]->banyakSoal ?> soal latihan materi 			 
			 <?php echo $namaHistory[$i]->nama?> 
			 kelas <?php $idKelas = $history[$i]->idKelas; echo substr($idKelas,4,5)." ".substr($idKelas, 0,2)?> 
			 dengan target nilai <?php echo $history[$i]->targetNilai?>
			  <?php 
				if(!is_null($history[$i] ->targetWaktu)) //target waktunya ada
				{
					$totalDalamDetik = $history[$i] ->targetWaktu;
					$menit = $totalDalamDetik/60;			
					$floorMenit = floor($menit);
					$detik = $totalDalamDetik - ($floorMenit * 60);
					echo 'dalam waktu ';
					if($floorMenit > 0)
						echo $floorMenit.' menit ';			
					if($detik > 0)
						echo $detik.' detik';			
				}
			 ?>
			 (Dibuat: <?php echo $history[$i]->tanggal ?>)
			</br></br>
		<?php } ?>
		</div>
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