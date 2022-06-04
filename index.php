<?php session_start(); ?>
<html>
<head>
	<title>./index</title>
	
	<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

	<link rel="icon" href="./images/iconSpeciala29441.ico">
	<meta charset="UTF-8">
	<link href="./style/general.css" rel="stylesheet" type="text/css">
	<link href="./style/registrar.css" rel="stylesheet" type="text/css">
	<link href="./style/navbar.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="./style/index.css">
	<link href="../style/registrar.css" rel="stylesheet" type="text/css"><!---Pegar estilo próprio dapágina Registrar--->
	<script src="./script/SweetAlert.js"></script>
	<script src="./script/general.js"></script>
	<script type="text/javascript"> (function() { var css = document.createElement('link'); css.href = 'https://use.fontawesome.com/releases/v5.1.0/css/all.css'; css.rel = 'stylesheet'; css.type = 'text/css'; document.getElementsByTagName('head')[0].appendChild(css); })(); </script> <!---- metodo de usar fonts awesome mais rapido -->

	

</head>

<body onload="slideShowImagesBox()" >

		<?php
	if(isset($_SESSION['validado'])) {			
		include("./connection.php");					
		if(($_SESSION['validado'] == 'admin') || ($_SESSION['validado'] == 'ADMIN')){
			header('Location: ./ADMpages/indexADM.php');
		}
		
		$teste = $_SESSION['validado'];
		$result = mysqli_query($mysqli , "SELECT username FROM login WHERE username='$teste'");
		
		if(!empty($res = mysqli_fetch_array($result))){
			header('Location: ./USERpages/indexUSER.php');
		}
		
		if(isset($_POST['deslogar'])) {
			session_destroy();
			header('Refresh: 1; URL=./index.php');
			die();		
		}
		
		?>																									
		<div class="big">
			<h1>YES, I'm logged</h1>
			<form method="post">
				<button name="deslogar">deslogar tudo</button>
			</form>
		</div>
		<?php	
	} else {
			include("./pages/header.html");
		?>

		
		<!-- slideShow -->
		<div>
			<div class="login-form">
				<div class="square">
					<div class="block" id="imgChanger" style="border-radius: 10px;background-image:url('../images/12PI.jpg')">
						<div class="centered" style="background-color:rgba(78, 75, 75, 0.158)">
							<h1 style=" display:inline;margin-right:1rem"> Gestão e turmas</h1><br>
						</div>
					</div>
				</div>
			</div>
		
		</div>
		<!-- /slideShow -->

		<!-- funcionalidades -->
		<div>

			<div class="login-form">
				<div >
					<span style="font-size:x-large;">Funcionalidades</span>
					<ul>
						<ol>Registro e login com possiveis alterações de dados</ol>
						<ol>Visualização de dados de forma pratica como alunos e turmas</ol>
						<ol>Visualização de horarios de diferentes turmas</ol>
						<ol>Mensagens para o administrador em privado e em anonimato</ol>
					</ul>
				</div>
			</div>

		</div>
		<!-- /funcionalidades -->

		<!-- colaboradores -->
		<div>

			<div class="login-form" style="padding:1rem;margin:0">
				<h1 style="margin:0;padding:1rem">Equipe</h1>
			</div>

			<div class="login" style="justify-content: center;align-items: flex-start">
				<div class="row" >
					<div class="login-form" >
						<div class="cow" style="text-align:center">
							<div class="container">
								<img src="" alt="">
							</div>
							<span class="titleCard">Davi Neves</span>
							<h3 >Gestão de tarefas</h3>					
							</div>
					</div>
					<div class="login-form">
						<div class="cow" style="text-align:center">
							<div class="container">
								<img src="" alt="">
							</div>
							<span class="titleCard">Barley Pity</span>
							<h3 >Front-end</h3>
						</div>
					</div>
					<div class="login-form">
						<div class="cow" style="text-align:center">
							<div class="container">
								<img src="" alt="">
							</div>
							<span class="titleCard">TioSam</span>
							<h3 >Designer</h3>
						</div>
					</div>
					<div class="login-form">
						<div class="cow" style="text-align:center">
							<div class="container">
								<img src="" alt="">
							</div>
							<span class="titleCard">cj</span>
							<h3 >Back-end e Servidores</h3>
						</div>
					</div>
				</div>
			</div>

		</div>
		<!-- /colaboradores -->
		
		<?php
	}
	include("./pages/footer.html");
	?>
</body>

</html>