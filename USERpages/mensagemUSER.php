
<?php session_start(); ?>
<?php include_once("../connection.php"); ?>

<!doctype html>
<html>
<head>
	<title>./mensagens</title>
	<link rel="icon" href="../images/iconSpeciala29441.ico">
	<meta charset="UTF-8">
	<link href="../style/adm.css" rel="stylesheet" type="text/css">
	<script src="../script/SweetAlert.js"></script> 
	<script src="../script/general.js"></script>
	<link href="../style/general.css" rel="stylesheet" type="text/css"><!---Pegar estilo próprio dapágina Registrar--->
	<link href="../style/registrar.css" rel="stylesheet" type="text/css"><!---Pegar estilo próprio dapágina Registrar--->
	<link href="../style/navbar.css" rel="stylesheet" type="text/css"> <!---Pegar estilo da NavBar--->
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script><!--isso aqui é para pegar os estilos do SWEETALERTJS-->
	<script type="text/javascript"> (function() { var css = document.createElement('link'); css.href = 'https://use.fontawesome.com/releases/v5.1.0/css/all.css'; css.rel = 'stylesheet'; css.type = 'text/css'; document.getElementsByTagName('head')[0].appendChild(css); })(); </script> <!---- metodo de usar fonts awesome mais rapido -->
	<script src="../script/sweetAlert.js"></script> <!---o codigo no sweetalert--->
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
		function alert($mensagem){
			echo '<script>alert("'.$mensagem.'")</script>';
		}
    ?>



<?php
if($mysqli){
    if(isset($_SESSION['validado']) ){
        
?>

<head>
	<title>./mensagens</title>
	<link rel="icon" href="../images/iconSpeciala29441.ico">
	<meta charset="UTF-8">
	<link href="../style/adm.css" rel="stylesheet" type="text/css">
	<script src="../script/SweetAlert.js"></script> 
	<script src="../script/general.js"></script>
	<link href="../style/general.css" rel="stylesheet" type="text/css"><!---Pegar estilo próprio dapágina Registrar--->
	<link href="../style/registrar.css" rel="stylesheet" type="text/css"><!---Pegar estilo próprio dapágina Registrar--->
	<link href="../style/navbar.css" rel="stylesheet" type="text/css"> <!---Pegar estilo da NavBar--->
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script><!--isso aqui é para pegar os estilos do SWEETALERTJS-->
	<script type="text/javascript"> (function() { var css = document.createElement('link'); css.href = 'https://use.fontawesome.com/releases/v5.1.0/css/all.css'; css.rel = 'stylesheet'; css.type = 'text/css'; document.getElementsByTagName('head')[0].appendChild(css); })(); </script> <!---- metodo de usar fonts awesome mais rapido -->
	<script src="../script/sweetAlert.js"></script> <!---o codigo no sweetalert--->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">

</head>
			
			
			<ul class="ULline">
				<li class="LIelement"><a href="./meusDados.php"><i class="fas fa-address-card" style="padding-right: 1rem;" ></i>meus dados</a></li>
                <li class="LIelement"><a href="./myClass.php"><i class="fas fa-chalkboard-teacher" style="padding-right: 1rem;" ></i>Turma</a></li>
                <li class="LIelement"><a href="./mensagemUSER.php"><i class="fas fa-comments" style="padding-right: 1rem;" ></i>Mensagens</a></li>
                <li class="LIelement"><a href="../pages/schedule.php"><i class="fas fa-chalkboard" style="padding-right: 1rem;" ></i>cronograma</a></li>
                <li class="LIelement"><a href="../pages/logout.php"><i class="fas fa-sign-out-alt" style="padding-right: 1rem;" ></i>Logout</a></li>
	        </ul>

			<form method="post">
				
				
				<div class="row divisao-lados">
					
					<div class="row " >
						<div class="">
							<div class="login-form dark division-top">
								<div class="row moh ">
									<i class="far fa-comments"></i><input type="text" class="Tinput titleText" style="border:none; margin:0;padding-top:0" value="conversas" disabled>
								</div>
							</div>
							
							<div class="login-form division-bottom" style="padding:2rem">
								<div class="col " name="adminChat">
									<div class="row moh list">
										<a href="./adminMessage.php" name="adminMessage">
										<div class="row">
											<i class="fas fa-users-cog"></i><input type="text"  class="Tinput titleText" style="border:none; margin:0;padding-top:0" value="Admin" disabled>
										</div>
									</a>
								</div>
								
								<div class="row moh list" >
									<a href="./generalMessage.php" name="generalMessage">	
										<div class="row">
											<i class="fas fa-user-friends"></i><input type="text" class="Tinput titleText" style="border:none; margin:0;padding-top:0" value="Chat geral" disabled>
										</div>	
									</a>
								</div>
							</div>
							
						</div>
					</div>
				</div>
				
				<div>
					<?php
						include('./generalMessage.php'); 
					?>	
			</div>
		</div>
		
	</form>
		
		
		
		<?php

}else{
	header('Location: ./indexADM.php');
    }
}else{
    alert("Não foi possivel conectar a base de dados");
}
?>