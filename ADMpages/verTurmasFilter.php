<?php session_start(); ?>
<?php
include_once("../connection.php");
$result = mysqli_query($mysqli, "SELECT * FROM login ");
if( (!isset($_SESSION['validado'])) ){

	header('HTTP/1.0 403 Forbidden');
	header("Location: ../index.php");
	exit;

	if( ($_SESSION['validado'] != 'admin') && ($_SESSION['validado'] != 'ADMIN') ){

		
		header('HTTP/1.0 403 Forbidden');
		header("Location: ../index.php");
		exit;
	}
}
?>

<html>
<head>
	<title>./Ver Turmas</title>
	<link rel="icon" href="../images/iconSpeciala29441.ico">
	<meta charset="UTF-8">
	<link href="../style/adm.css" rel="stylesheet" type="text/css">
	<script src="../script/SweetAlert.js"></script> 
	<link href="../style/ADMgeneral.css" rel="stylesheet" type="text/css">
	<link href="../style/general.css" rel="stylesheet" type="text/css">
	<link href="../style/navbar.css" rel="stylesheet" type="text/css">
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script type="text/javascript">(function() {var css = document.createElement('link');css.href = 'https://use.fontawesome.com/releases/v5.1.0/css/all.css';css.rel = 'stylesheet';css.type = 'text/css';document.getElementsByTagName('head')[0].appendChild(css);})();</script>
	<script src="../script/sweetAlert.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
</head>

<?php
function warning($mensagem){  //*********mensagem de aviso no meio da tela*********/
	echo '<script>warning("' . $mensagem . '")</script>';
}
function success($mensagem){ //***************mensagem de sucesso no meio da tela***************/
	echo '<script>success("' . $mensagem . '")</script>';
}
function info($mensagem){ //***************mensagem de sucesso no meio da tela***************/
	echo '<script>info("' . $mensagem . '")</script>';
}
function console($mensagem){ //********da um console.log de alguma coisa/dado para mim********/
	echo '<script>console.log("' . $mensagem . '")</script>';
}
function alert($mensagem){
	echo '<script>alert("' . $mensagem . '")</script>';
}
function irPara($destino){
	session_destroy();
	header("Location:$destino");
}
?>
<body>
	<script>
		function mostrar(){
			alert("consegui");
		}
		function irPara(local, quem){
			alert(`voce vai para ${local}?${quem}`);
		}
		
	</script>


<?php
include("../pages/headerCLASS.html");
?>
	<div class="login">
		<form action="#" class="login-form">
		<div class="form-input-material">


		<?php

		if(!empty($res = mysqli_fetch_array($result))){

			$result = mysqli_query($mysqli, "SELECT * FROM  "); //colocar where sigla = %10{variavel via GET}%
			$local = "turma.php";


			while($res = mysqli_fetch_array($result)) {		

				$pprt = $res['sigla_Turma'];
				// $meh = "1,1";

				// echo "<div onclick='irPara('".$meh."')' style='background-image: linear-gradient(to right, #333333, transparent 100%),url(../images/".$res['sigla_Turma'].".jpg);' class='row meh lol a".$res['sigla_Turma']." '>";

				echo "<a href='../pages/turma.php?turma=$pprt'>";
				echo "<div style='background-image: linear-gradient(to right, #333333, transparent 100%),url(../images/".$res['sigla_Turma'].".jpg);' class='row meh lol a".$res['sigla_Turma']." '>";
				
				echo "<div class='row moh '>";
				echo "<div class='cow'>";
				echo "<label>".$res['nome_Turma']."";
				echo "<input type='text' value='".$res['nome_Turma']."' class='Tinput' disabled>";
				echo "</label>";
				echo "</div>";
				echo "</div>";
				
				echo "<div class='row moh'>";
				echo "<div class='cow'>";
				echo "<label>Sigla";
				echo "<input type='text' value='Turma ".$res['sigla_Turma']."' class='Tinput' disabled>";
				echo "</label>";
				echo "</div>";
				echo "</div>";
				
				echo "<div class='row moh'>";
				echo "<div class='cow'>";
				echo "<label>";
				echo "<input type='text' class='Tinput' disabled>";
				echo "</label>";
				echo "</div>";
				echo "</div>";
				
				echo "</div>";
				echo "</a>";
				
				echo "<hr class='hr3' />";
				
			}
			
		}else{
			echo "<center>";
			echo "<div class='row'>Nenhum usuario</div>";
			echo "</center>";
		}
			
			?>
		</div>
		</form>
		</div>
    <?php
		include("../pages/Footer.html");
?>	
</body>
</html>
