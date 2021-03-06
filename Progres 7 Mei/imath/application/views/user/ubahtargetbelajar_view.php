<html>
    <head>        
	<title>Ubah Target Belajar</title>
	<link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/imath.css" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-1.11.2.min.js"></script>
	<script>
	jQuery(document).ready(function(){
	       function fetchMateri(idKelas) {	       
			var getUrl = window.location;
			var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
			var location = baseUrl + "/index.php/target_belajar/materi/" + idKelas;
			//~ alert("Hi" + location);
			//var linkJSON = $(location).attr('href',toController);
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
	<script>
		function showTargetWaktu()
		{			
			document.getElementById("waktu").innerHTML = '<input name="menit" type="number" min="0" max="60"> menit <input name="detik" type="number" min="0" max="59"> detik';
		}
		
		function hideTargetWaktu()
		{						
			document.getElementById("waktu").innerHTML = '<input name="menit" type="hidden" value="0"> <input name="detik" type="hidden" value="0">';
		}
	</script>
    </head>
    <body>
<!-- Navbar Atas -->
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><?php
				if($this->session->userdata('loggedin')) { 
					if($this->session->userdata('role') == "admin") {
						echo '<a href="'.base_url().'admin/dashboard"> Dashboard Admin </a></li><li>';
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
		echo '<div class="col-md-2"> <img src="'.base_url().'assets/images/game.png" img size="height="20" width="20"><a href="'.base_url().'underconstruction">&nbspPERMAINAN</a></div>';
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
<!-- nav end -->

<div class="container contents">  

      <div class="jumbotron dashboardUser">      
      		<div class="row">
      			<div class="col-md-4 white">
      				<img src="<?php echo base_url();?>assets/images/clock.png" height="200" width="200">
      			</div>
      			<div class="col-md-8 white2">
      				<h2 class="userDashboard"> Ubah Target Belajar </h2><br><br>
				<?php $id=$result[0]->idTargetBelajar;  ?>
				<div class="right">
						<form id="ubahtargetbelajar" method="POST" action="<?php echo base_url()?>index.php/target_belajar/simpanPerubahan/<?php echo $id?>" 
						onsubmit="return confirm('Kamu yakin ingin mengubah target belajar ini?');">
					<button class="blueButton" type="submit">Simpan</button>
					<a href="<?php echo base_url()?>index.php/target_belajar"><button type="button" class="redButton">Batal</button></a>
				</div>
      			</div>
      		</div>
    	</div> 
	
	
<div class="container formiMath">    
	<div class="ungu fontt">	
		<div class="row">
			<div class="col-md-3">
			Kelas
			</div>
			<div class="col-md-9">
				<select class="noBorder tb" name = "kelas" id = "pilihkelas" onchange="showMateri(this.value)">
				<?php foreach($kelas as $row):?>			
					<option value="<?php echo $row->idKelas?>" name ="idkelas" <?php $idKelas=$row->idKelas; $kelasSelected = $result[0]->idKelas; if ($idKelas == $kelasSelected) echo "selected";?>><?php echo $row->idKelas ?> </option>		
				<?php endforeach?>		
				</select>
			</div>
		</div>	
		<div class="row">
			<div class="col-md-3">Materi	</div>
			<div class="col-md-9">
				<select class="noBorder tb" id="pilihmateri" name ="idmateri">	</select>
			</div>
		</div>	
		<div class="row">
			<div class="col-md-3">
				Banyak Soal
			</div>
			<div class="col-md-9">
				<input class="noBorder tb" min="1" max="100" type="number" name ="banyaksoal"  value="<?php echo $result[0]->banyakSoal ;?>">
			</div>
		</div>	
		<div class="row">
			<div class="col-md-3">
				Nilai
			</div>
			<div class="col-md-9">
				<select class="noBorder tb" id = "pilihkelas" name ="targetnilai">
				<option value="100" <?php $targetnilai=$result[0]->targetNilai; if ($targetnilai ==100) echo "selected"?>>100</option>
				<option value="90" <?php $targetnilai=$result[0]->targetNilai; if ($targetnilai ==90) echo "selected"?>>90</option>
				<option value="80" <?php $targetnilai=$result[0]->targetNilai; if ($targetnilai ==80) echo "selected"?>>80</option>		
				<option value="70" <?php $targetnilai=$result[0]->targetNilai; if ($targetnilai ==70) echo "selected"?>>70</option>		
			</select>	
			</div>
			</div>
			<div class="row">
				<div class="col-md-3">Target Waktu </div>
					<div class="col-md-9">
						<?php $targetwaktu=$result[0]->targetWaktu; ?>						
						<input type="radio" name="targetWaktu" value="ya" onclick="showTargetWaktu()" <?php if ($targetwaktu >0) echo 'checked = "checked"';?>>Ya<br>
												
						<input type="radio" name="targetWaktu" value="tidak" onclick="hideTargetWaktu()" <?php if ($targetwaktu == 0) echo 'checked = "checked"';?>>Tidak					
					<div id="waktu">
					<?php if ($targetwaktu >0)
					{
						$menit = $targetwaktu/60;			
						$floorMenit = floor($menit);
						$detik = $targetwaktu - ($floorMenit * 60);
						echo '<input name="menit" type="number" min="0" max="60"';
						if($floorMenit > 0)
							echo 'value="'.$floorMenit.'"> menit';
						echo '<input name="detik" type="number" min="0" max="59"';
						if($detik > 0)
							 echo 'value="'.$detik.'"> detik';
					}
					?>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	</form>
</div>	

       <footer class="footer">
	      <div class="container">
	        <p class="text-muted">
	          <div class="row">
	          <div class="col-md-3"><a href="#"><p>KEBIJAKAN PRIVASI</p></a></div>
	          <div class="col-md-3"><a href="#"><p>TENTANG KAMI</p></a></div>
	          <div class="col-md-3"><a href="<?php echo base_url()."hubungi_kami"?>"><p>HUBUNGI KAMI</p></a></div>
	          <div class="col-md-3"><a href="#"><p>BANTUAN</p></a></div>        
	        </div>
	        <div class="row">
	          <div class="col-md-12"><p>Copyright(c) 2015</p></div>
	        </div>
	        </p>
	      </div>
	    </footer>
    </body>
</html>