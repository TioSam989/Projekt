
<?php session_start(); ?>
<?php include_once("../connection.php"); ?>

<!doctype html>
<html>
<head>
	<title>./indexADM</title>
	<link rel="icon" href="../images/iconSpeciala29441.ico">
	<meta charset="UTF-8">
	<script src="../script/general.js"></script>
	<link href="../style/general.css" rel="stylesheet" type="text/css">
	<link href="../style/registrar.css" rel="stylesheet" type="text/css">
	<link href="../style/navbar.css" rel="stylesheet" type="text/css"> 
	<script src="../script/SweetAlert.js"></script> 
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script type="text/javascript"> (function() { var css = document.createElement('link'); css.href = 'https://use.fontawesome.com/releases/v5.1.0/css/all.css'; css.rel = 'stylesheet'; css.type = 'text/css'; document.getElementsByTagName('head')[0].appendChild(css); })(); </script> <!---- metodo de usar fonts awesome mais rapido -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">

</head>

	<?php //***script functions calls****/
		function warning($mensagem) {  //*********mensagem de aviso no meio da tela*********/
			echo '<script>alert("' . $mensagem . '")</script>';
			echo '<script>warning("' . $mensagem . '")</script>';
		}
		function success($mensagem) { //***************mensagem de sucesso no meio da tela***************/
			echo '<script>success("'.$mensagem.'")</script>';
		}
		function info($mensagem) { //***************mensagem de sucesso no meio da tela***************/
			echo '<script>info("'.$mensagem.'")</script>';
		}
		function console($mensagem){ //********da um console.log de alguma coisa/dado para mim********/
			echo '<script>console.log("'.$mensagem.'")</script>';
		}
		function alert($title,$message,$icon, $local ){
			echo '<script>alertJS("'.$title.'","'.$message.'","'.$icon.'","'.$local.'")</script>';
		}
    ?>



<?php
if($mysqli){
    if(isset($_SESSION['validado'])){
		if(($_SESSION['validado'] == 'admin' ) || ($_SESSION['validado'] == 'ADMIN' )) {

			?>
            <ul class="ULline">
				<li class="LIelement"><a href="./verUsers.php"><i class="fas fa-users" style="padding-right: 1rem;" ></i>Usuarios</a></li>
				<li class="LIelement" ><a href="../ADMpages/verTurmas.php"><i class="fas fa-chalkboard-teacher"></i> Turmas</a></li>
                <li class="LIelement"><a href="./mensagemADM.php"><i class="fas fa-comments" style="padding-right: 1rem;" ></i>Mensagens</a></li>
                <li class="LIelement"><a href="../pages/logout.php"><i class="fas fa-sign-out-alt" style="padding-right: 1rem;" ></i>Logout</a></li>
	        </ul>

			<div class="login">
				<div class="login-form">
					<legend>
					
					</legend>
				</div>
			</div>
			<?php
		}else{
	      header('Location: ../index.php');
		}
    }else{
      header('Location: ../index.php');
    }
}else{
    alert("Não foi possivel conectar a base de dados");
}
?>