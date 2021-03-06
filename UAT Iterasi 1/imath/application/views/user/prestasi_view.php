<html>
    <head>        
	<title>Prestasi - iMath</title>
	<script src="https://code.jquery.com/jquery-1.11.2.min.js"></script>
	<script>
	function showMateri(id, username)
	{
		alert("Hai" + username);
		fetchMateri(id, username);
	}
	</script>
	<script>
	
	       function fetchMateri(idKelas, username) {	       
			var getUrl = window.location;
			var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
			var location = baseUrl + "/index.php/target_belajar/materi/" + idKelas;			
			var location2 = baseUrl + "/index.php/prestasi/materi/" + username;	
			//alert("Hi" + location2);
			//var linkJSON = $(location).attr('href',toController);
			var i = 0;
			var temp = [];
			$.getJSON(location2, function(arrayMateri) {
				alert("halo");				
				arrayMateri.forEach(function (medali) {
					 temp[i] = medali.idMateri;
					 i = i + 1;
				});				
			});
			
			var j = 0;
			$.getJSON(location, function(arrayMateri) {				
				var content = '';
				arrayMateri.forEach(function (materi) {
					for(var j = 0; j < temp.length; j++)
					{
						if(temp[j] == materi.idMateri)
						{							
							content += materi.nama + '<img src="' + baseUrl + '/assets/images/medali.png" height="200" width="200"><br>';
						}
					}
				});
				$('#materi').html(content);
			});
	       }
	     
	</script>	
	<link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>assets/css/imath.css" rel="stylesheet">
    </head>
	
    <body>
<!-- Navigation Bar iMath -->
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
		echo '<div class="row">';
        echo '<div class="container" id="iconbar">';
        echo '<div class="row">';
        echo '<div class="col-md-2"></div>';
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
		echo '</div>';
		echo '</div>';
	}
	?>
</nav>
<!-- nav end -->
<div class="container contents">      
      <div class="jumbotron dashboardUser">      
      		<div class="row">
      			<div class="col-md-4 white">
      				<img src="<?php echo base_url();?>assets/images/medali.png" height="200" width="200">
      			</div>
      			<div class="col-md-8 white2">
      				<h1 class="tBelajar">Prestasi</h1><br><br>				
      			</div>
      		</div>
    	</div> 
	<button class="orangeButton">Medali</button>
	<button class="orangeButton" onclick="showSertifikat">Sertifikat</button>
	<br><br>
	Kelas	
	<?php foreach($kelas as $row):?>
		<?php 				
				$idKelas = $row->idKelas;
		?>
		<button class="circle buttonDelete" onclick="showMateri('<?php echo $idKelas;?>', '<?php echo $this->session->userdata('username')?>')">
			<?php 				
				echo substr($idKelas,4,5);
			?>
		</button>
	<?php endforeach ?>
	<div>			
	
	</div>	
	<span id="materi"></span>
	<span id="sertifikat"></span>
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