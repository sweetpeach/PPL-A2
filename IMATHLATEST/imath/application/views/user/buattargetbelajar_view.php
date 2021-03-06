<html>
    <head>        
	<title>Buat Target Belajar</title>
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
    <h1>Buat Target Belajar </h1> 
	<form method="POST" action="create"> 		
	Kelas 
		<select id = "pilihkelas" name ="idkelas">
		<?php foreach($kelas as $row):?>			
		<option value="<?php echo $row->idKelas?>"><?php echo $row->idKelas ?> </option>
		<?php endforeach?>
		</select>		
	<br>
	
	Materi
		<select id="pilihmateri" name ="idmateri">
		</select>
	<p>Banyak Soal <input type="number" name ="banyaksoal" required></p>
	<p>Nilai <select id = "pilihkelas" name ="targetnilai">
		<option value="70">70</option>
		<option value="80">80</option>
		<option value="90">90</option>
		<option value="100">100</option>
		</select>		
	<p>
		<input type="submit" value="Submit" />
		<a href = "<?php echo base_url()?>index.php/target_belajar"><button/>Batal</button></a>
	</p>
	
	</form>
	
    </body>
</html>

