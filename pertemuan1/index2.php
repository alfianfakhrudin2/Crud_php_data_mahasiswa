<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Dashboard</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css"> 
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> 
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script> 
    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fuzzy+Bubbles&display=swap" rel="stylesheet">
	<style type="text/css">
		.wrapper{	
			width: 950px; margin: 0 auto;
		}
		.page-header h2{
			margin-top: 0;
		}
		table tr td:last-child a{
			margin-right: 10px;
		}
        thead{
            background:#5F6F94;
            color: whitesmoke;
        }
        tbody{
            background: #F6FBF4;
        }
	</style> 
	<script type="text/javascript"> 
		$(document).ready(function() {
			$('[data-toggle="tooltip"]').tooltip(); 
		}); 
	</script> 
</head>
<body>
	<div class="wrapper">
		<div class="container-fluid"> 
			<div class="row"> 
				<div class="col-md-12"> 
					<div class="page-header clearfix">
						<h2 style="font-family: 'Fuzzy Bubbles', cursive;" class="pull-left">Data Mahasiswa Univ.Tadika Mesra</h2>
						<a href="create.php" class="btn pull-right" style="color: #06283D; font-size: 15px; background:#B1B2FF;"><b>Tambah Mahasiswa</b></a> 
					</div> 
					<?php 
		            // Include koneksi file
					require_once "koneksi.php";
                    
					$sql = "SELECT *, (tugas + uts + uas) / 3 AS nilai_akhir FROM mahasiswa";
					$i = 1;
					if($result = mysqli_query($conn, $sql)) { 
						if (mysqli_num_rows($result) > 0){ 
							echo "<table class='table table-bordered table-striped'>"; 
								echo "<thead>"; 
									echo "<tr>";
										echo "<th>No</th>";
										echo "<th>Nim</th>";
										echo "<th>Nama</th>"; 
										echo "<th>Nilai Tugas</th>"; 
										echo "<th>Nilai UTS</th>";
										echo "<th>Nilai UAS</th>"; 
										echo "<th>Nilai Akhir</th>"; 
										echo "<th>Action</th>"; 
									echo "</tr>"; 
								echo "</thead>"; 
								echo "<tbody>";
								while ($row = mysqli_fetch_array($result)){
									echo "<tr>";
										echo "<td>" . $i++ . "</td>";
										echo "<td>" . $row['NIM'] . "</td>"; 
										echo "<td>" . $row['Nama'] . "</td>"; 
										echo "<td>" . $row['Tugas'] . "</td>"; 
										echo "<td>" . $row['UTS'] . "</td>";
										echo "<td>" . $row['UAS'] . "</td>"; 
										echo "<td>" . number_format($row['nilai_akhir'], 0, '.', '') . "</td>"; 
										echo "<td>";
											echo "<a href='read.php?NIM=". $row['NIM'] ."' tittle='View Record' data-toogle='tooltip'><span class='btn btn-success glyphicon glyphicon-eye-open'></span></a>";
											echo "<a href='update.php?id=". $row['NIM'] ."' title='Ubah Data' data-toggle='tooltip'><span class='btn btn-info glyphicon glyphicon-pencil'></span></a>"; 
											echo "<a href='delete.php?NIM=". $row['NIM'] ."' title='Hapus Data' data-toggle='tooltip'><span class='btn btn-danger glyphicon glyphicon-trash'></span></a>"; 
										echo "</td>"; 
									echo "</tr>";
								}
								echo "</tbody>"; 
							echo "</table>"; 
							mysqli_free_result($result); 
						} else {
						echo "<p class='lead'><em>Tidak ada data mahasiswa. </em></p>";
					} 
				} else {
					echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
				}
					
					mysqli_close($conn);
				?> 
				</div>
			</div>
		</div>
	</div>
</body>
</html>