<?php session_start(); ?>
<?php
include_once("../connection.php");
$result = mysqli_query($mysqli, "SELECT * FROM turma ");
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

$resultado = mysqli_query($mysqli, "SELECT * FROM turma ");

if (isset($_POST['procura'])){
	$valor_a_procurar=$_POST['id'];
	$resultado = mysqli_query($mysqli, "SELECT * FROM turma where nome_Turma like'%".$valor_a_procurar."%' OR sigla_Turma LIKE'%".$valor_a_procurar."%' OR ano_Turma LIKE'%".$valor_a_procurar."%' ");
}


function destaca_caracteres($texto) {
	if (isset($_POST['procura'])){

		$caracteres_a_procurar = explode(" ", $_POST['id']);
		$conta_caracteres = count($caracteres_a_procurar);
		
		for($i=0;$i<$conta_caracteres;$i++) {
			$destacar_caracteres = $caracteres_a_procurar[$i];
			$texto = str_ireplace($caracteres_a_procurar[$i], $destacar_caracteres, $texto);
		}

		return $texto;
	}else{
		return $texto;
		
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
		<form action="#" method="POST" class="login-form">
		<div class="form-input-material">

		<center><h2>Turmas</h2></center>


		<div class='row'>
					<i class="fas fa-search fa-2x search" style="padding:2%;" ></i>
					<input type="text" name="id" style="caret-color:white" autofocus="on" class="Tinput" placeholder="Insira uma palavra-chave"/>
                	<input type="submit" name="procura" id="submit" value="procurar">
				</div>

		<?php

		$linha = mysqli_fetch_assoc($resultado);


		if(is_array($linha) && !empty($linha)){

			$result = mysqli_query($mysqli, "SELECT * FROM turma ");
			$local = "turma.php";


			while($linha) {		

				$pprt = $linha['sigla_Turma'];

				echo "<a href='../pages/turma.php?turma=$pprt'>";
				echo "<div style='background-image: linear-gradient(to right, #333333, transparent 100%),url(../images/".$linha['sigla_Turma'].".jpg);' class='row meh lol a".$linha['sigla_Turma']." '>";
				
				echo "<div class='row moh '>";
				echo "<div class='cow'>";
				echo "<label>".$linha['nome_Turma']."";
				echo "<input type='text' value='".$linha['nome_Turma']."' class='Tinput' disabled>";
				echo "</label>";
				echo "</div>";
				echo "</div>";
				
				echo "<div class='row moh'>";
				echo "<div class='cow'>";
				echo "<label>Sigla";
				echo "<input type='text' value='Turma ".$linha['sigla_Turma']."' class='Tinput' disabled>";
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
                $linha = mysqli_fetch_assoc($resultado);

				
			}
			
		}else{
			echo "<center>";
			echo "<div class='row'>Nenhuma Turma</div>";
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
