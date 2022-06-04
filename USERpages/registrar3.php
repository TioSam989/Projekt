<?php session_start(); ?>
<?php include_once("../connection.php"); ?>
<!doctype html>
<html>

<head>
	<title>./registrar passo 3</title>
	<link rel="icon" href="../images/iconSpeciala29441.ico">
	<meta charset="UTF-8">
	<link href="../style/general.css" rel="stylesheet" type="text/css">
	<script src="../script/SweetAlert.js"></script>
	<script src="../script/general.js"></script>
	<link href="../style/registrar.css" rel="stylesheet" type="text/css">
	<link href="../style/navbar.css" rel="stylesheet" type="text/css">
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script type="text/javascript">(function() {var css = document.createElement('link');css.href = 'https://use.fontawesome.com/releases/v5.1.0/css/all.css';css.rel = 'stylesheet';css.type = 'text/css';document.getElementsByTagName('head')[0].appendChild(css);})();</script>
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
	function alert($title,$message,$icon, $local ){
		echo '<script>alertJS("'.$title.'","'.$message.'","'.$icon.'","'.$local.'")</script>';
	}
	function alertar($mensagem){
		echo '<script>console.log("' . $mensagem . '")</script>';
		
	}
	function alerto(){
		echo '<script>alert("trava")</script>';
	}

?>

<?php

$almofada = mysqli_query($mysqli, "SELECT * FROM turma ");

if($_SESSION['podeUsar'] == '2'){

	if($mysqli){
		
		if(isset($_POST['submit3'])){

			

			$nome_Turma = $_POST['turma'];
			$nome = $_SESSION['nome'];
			$email = $_SESSION['email'];
			$username = $_SESSION['username'];
			$password = $_SESSION['password'];
			$sexo = $_SESSION['sexo'];
			$born = $_SESSION['born'];
			$ficheiro_nome = $_SESSION['ficheiro_nome'];

			mysqli_query($mysqli,"insert into login(nome, email, username, password, sexo, born, ativo, ficheiro_nome, turma, code) values('$nome','$email','$username','$password','$sexo','$born', 'Z' ,'$ficheiro_nome','$nome_Turma','*****')") or die("Não foi possivel executar o pedido");
			alertar("Cadastro Feito, agora voce esta cadastrado com sucesso");
			// header('Refresh: 1; URL=../index.php');
			// simpleAlert("Cadastro feito com sucesso");
			header('Refresh: 1; URL=../index.php');
		
		}else{
			?>
				<!-- <body onload="alert('site em manutenção','Turmas em reparação/preparação','info','#')"> -->
				<body>
					
				<ul class="ULline">
					<li class="LIelement"><a href="./registrar2.php"><i class="fas fa-arrow-left" style="padding-right: 1rem;"></i>voltar</a></li>
				</ul>

				<div class="login">

					<form class="login-form" enctype="multipart/form-data" method="post" action="" id="opacity">
						<legend>
							<h1 id="h1Animation">Registrar</h1>
							<div class="form-input-material">

										
										<div class="row">
											<div class="col">
												<h1></h1>
												<label>Turmas<i class="fas fa-question-circle fa-xs"  title="As turmas mostradas abaixo são de acordo com a disponibilidade e regras da instituição"></i><br>
													<select class="Tinput" style="background-color:#333333;color:white" id="turmaSelect" name="turma" >
														<option style="color:var(--ltr-col-off);">Selecione</option>
															<?php 
																while($res = mysqli_fetch_array($almofada)) {		
																	echo "<option name='turma' value='".utf8_encode($res['sigla_Turma'])."'>".utf8_encode($res['nome_Turma'])."</option>";	
																}
															?>
													</select>
												</label>
											</div>
										</div>	
												
								<div class="row">
									<div class="col">
										<button type="submit" name="submit3" id="submit3" >submeter</button>
									</div>
								</div>
							</div>
							<CENTER>Passo 3 de 3</CENTER>
							<h3 id="h1Animation">Turma</h3>
					<button name="bruh" hidden id="bruh"></button>
					</form>
					</legend>
					
				</div>
				</body>
			<?php
		}
	}else{
		alert("Oops","impossivel ligar a base de dados","info","../index.php");
	}
}else{
	simpleAlert("Não pode pular os passos do cadastro");
	header('Refresh: 1; URL=./registrar.php');
}
?>
</html>