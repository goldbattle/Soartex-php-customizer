<?php
//check user login
session_start();
if (!$_SESSION['logged']) {
	header("Location: ../");
	exit ;
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Soartex Customizer 2.0v</title>
		<link rel="shortcut icon" href="../assets/img/favicon.ico"/>
		<!--Style Sheets-->
		<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap-responsive.min.css">
		<link rel="stylesheet" type="text/css" href="../assets/css/mainindex.css">
	</head>
	<body>
		<?php
		// Get data to display
		$string = file_get_contents("../data/data.json");
		$json_a = json_decode($string, true);
		?>
		<div class="container">
			<!--Page Header-->
			<div class="page-header">
				<h1><img src="../assets/img/soar.png"/> Soartex Fanver <small>Customizer ADMIN</small></h1>
			</div>
			<!--Main Form-->
			<!--Main Form-->
			<form action="./submit/SubmitTexture.php" method="post">
				<?php
				echo '<legend>Edit your Textures</legend>';
				// Tab
				echo '<label>Current Tab</label>';
				echo '<select class="span4" name="TabName">';
				echo '<option selected>' . $_GET['tab'] . '</option>';
				echo '</select>';
				// Texture
				echo '<label>Select Texture</label>';
				echo '<select class="span4" name="TextureName">';
				echo '<option selected>New Texture</option>';
				// Get current tab. Then get data containing textures
				foreach ($json_a[$_GET['tab']]['data'] as &$texture) {
					echo '<option>' . $texture['name'] . '</option>';
				}
				echo '</select>';
				echo '</br>';
				echo '<label>Texture Name/Rename Texture</label>';
				echo '<input class="span4" type="text" placeholder="Tab Name" name="TextureNameInput">';
				echo '</br>';

				//submit info
				echo '<button class="btn btn-success" type="submit" name="submitModify">Add</button>  ';
				echo '<button class="btn btn-danger" type="submit" name="submitDelete">Remove</button>';
				?>
			</form>
		</div>
		<!--JavaScript-->
		<script src="http://code.jquery.com/jquery.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
	</body>
</html>