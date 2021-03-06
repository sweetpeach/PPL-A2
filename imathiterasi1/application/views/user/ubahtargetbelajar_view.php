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
    </head>
    <body>


    <nav class="navbar navbar-default navbar-static-top">
      <div class="container" id="logobar">
        <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
        </button>
        <a class="navbar-brand" href="#">iMath</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">

          <ul class="nav navbar-nav navbar-right">
            <li><?php
				if($this->session->userdata('loggedin')) { 
					if($this->session->userdata('role') == "admin") {
						echo '<a href="'.base_url().'autentikasi/logout"> Logout </a>';
						echo '<br/>';
						echo '<a href="'.base_url().'admin/dashboard"> Dashboard Admin </a>';
					} else {
						echo '<a href="'.base_url().'autentikasi/logout"> Logout </a>';
					} 
				} else {
						echo '<a href="'.base_url().'autentikasi"> Login </a>';
				}
				?>	</li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
       <?php 
	//jika user telah login
	if($this->session->userdata('loggedin')) {
		echo '<div class="row">';
        echo '<div class="container" id="iconbar">';
        echo '<div class="row">';
		echo '<div class="col-md-2">';
		echo '<a href="'.base_url().'profil">';
		echo "Hello ".$this->session->userdata('username')." :)</a></div>";
		echo '<div class="col-md-2"> <img src="'.base_url().'assets/images/rapor.png" img size="height="20" width="20"><a href="'.base_url().'rapor"><button>RAPOR</button></a></div>';
		echo '<div class="col-md-2"> <img src="'.base_url().'assets/images/clock.png" img size="height="20" width="20"><a href="'.base_url().'target_belajar"><button>TARGET BELAJAR</button></a></div>';
		echo '<div class="col-md-2"> <img src="'.base_url().'assets/images/medali.png" img size="height="20" width="20"><a href="'.base_url().'prestasi"><button>PRESTASI</button></a></div>';
		echo '<div class="col-md-2"> <img src="'.base_url().'assets/images/game.png" img size="height="20" width="20"><a href="#"><button>PERMAINAN</button></a></div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
	}
	?>
</nav>
<div class="container contents">  
<div class="jumbotron targetbg">
		<div class="row">
			<div class="col-md-3">
				<img src="<?php echo base_url() ?>assets/images/clock.png" height="200" width="200">
			</div>
			<div class="col-md-9">
				<div class="row">
					<div class="col-md-8">
						  <h1>Ubah Target Belajar </h1>     <?php $id=$result[0]->idTargetBelajar;  ?>
					</div>
				</div>
				<div class="row">
					
				</div>
			</div>
		</div>
	</div>
<div class="container formiMath">    
   
	<form id="ubahtargetbelajar" method="POST" action="<?php echo base_url()?>index.php/target_belajar/simpanPerubahan/<?php echo $id?>" 
		onsubmit="return confirm('Kamu yakin ingin mengubah target belajar ini?');">
	<div class="row">
		<div class="col-md-3">
		Kelas
		</div>
		<div class="col-md-9">
			<select name = "kelas" id = "pilihkelas" onchange="showMateri(this.value)">
		<?php foreach($kelas as $row):?>			
		<option value="<?php echo $row->idKelas?>" name ="idkelas" <?php $idKelas=$row->idKelas; $kelasSelected = $result[0]->idKelas; if ($idKelas == $kelasSelected) echo "selected";?>><?php echo $row->idKelas ?> </option>		
		<?php endforeach?>		
		</select>
		</div>
	</div>	
	<div class="row">
		<div class="col-md-3">
			Materi
		</div>
		<div class="col-md-9">
			<select id="pilihmateri" name ="idmateri">
		</select>
		</div>
	</div>	
	<div class="row">
		<div class="col-md-3">
			Banyak Soal
		</div>
		<div class="col-md-9">
			<input type="number" name ="banyaksoal"  value="<?php echo $result[0]->banyakSoal ;?>">
		</div>
	</div>	
	<div class="row">
		<div class="col-md-3">
			Nilai
		</div>
		<div class="col-md-9">
			<select id = "pilihkelas" name ="targetnilai">
		<option value="70" <?php $targetnilai=$result[0]->targetNilai; if ($targetnilai ==70) echo "selected"?>>70</option>
		<option value="80" <?php $targetnilai=$result[0]->targetNilai; if ($targetnilai ==80) echo "selected"?>>80</option>
		<option value="90" <?php $targetnilai=$result[0]->targetNilai; if ($targetnilai ==90) echo "selected"?>>90</option>
		<option value="100" <?php $targetnilai=$result[0]->targetNilai; if ($targetnilai ==100) echo "selected"?>>100</option>
		</select>	
		</div>
	</div>
	<p><input class="buatButton" type="submit" value="Submit" />
		<a href = "<?php echo base_url()?>index.php/target_belajar"><button class="batalButton"/>Batal</button></a></p>
		</form>
	</div>
</div>

       <footer class="footer">
        <div class="container">
          <p class="text-muted">
            <div class="row">
            <div class="col-md-3"><a href="#"><p>KEBIJAKAN PRIVASI</p></a></div>
            <div class="col-md-3"><a href="#"><p>TENTANG KAMI</p></a></div>
            <div class="col-md-3"><a href="#"><p>HUBUNGI KAMI</p></a></div>
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