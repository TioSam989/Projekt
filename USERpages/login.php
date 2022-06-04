<?php include_once('../connection.php'); ?>
<?php session_start(); ?>
<html>

<head>
	<title>./login</title>
	<link rel="icon" href="../images/iconSpeciala29441.ico">
	<meta charset="UTF-8">
	<link href="../style/general.css" rel="stylesheet" type="text/css">
	<link href="../style/login.css" rel="stylesheet" type="text/css">
	<link href="../style/navbar.css" rel="stylesheet" type="text/css">
	<script src="../script/SweetAlert.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<!--isso aqui é para pegar os estilos do SWEETALERTJS-->
	<script type="text/javascript">
		(function() {
			var css = document.createElement('link');
			css.href = 'https://use.fontawesome.com/releases/v5.1.0/css/all.css';
			css.rel = 'stylesheet';
			css.type = 'text/css';
			document.getElementsByTagName('head')[0].appendChild(css);
		})();
	</script>
	<!---- metodo de usar fonts awesome mais rapido -->
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">

</head>

<body>



	<?php
	function warning($mensagem)	{  //*********mensagem de aviso no meio da tela*********/
		echo '<script>warning("' . $mensagem . '")</script>';
	}
	function success($mensagem)	{ //***************mensagem de sucesso no meio da tela***************/
		echo '<script>success("' . $mensagem . '")</script>';
	}
	function info($mensagem) { //***************mensagem de sucesso no meio da tela***************/
		echo '<script>info("' . $mensagem . '")</script>';
	}
	function console($mensagem)	{ //********da um console.log de alguma coisa/dado para mim********/
		echo '<script>console.log("' . $mensagem . '")</script>';
	}
	function alert($title, $message, $icon, $local)	{
		echo '<script>alertJS("' . $title . '","' . $message . '","' . $icon . '","' . $local . '")</script>';
	}

	?>

	<?php
	if ($mysqli) {

		if(isset($_POST['submit2'])){
			$code = $_POST['code1'].$_POST['code2'].$_POST['code3'].$_POST['code4'].$_POST['code5'];

			echo '<script>console.log("'.$code.'")</script>';

			$result = mysqli_query($mysqli, "SELECT * FROM login WHERE code='$code'") or die("Não foi possível neste momento executar o seu pedido.");

			$raw = mysqli_fetch_assoc($result); //alguem com esses dados

			if (!empty($raw)) {
				$usernameCode = $raw['username'];
				$codigoResult=mysqli_query($mysqli, "UPDATE login SET code='*****' WHERE username='$usernameCode'");

				$_SESSION['validado'] = $raw['username'];
				alert("Logado", "Logado com sucesso", "success", "recPass.php");

			}else{
				alert("tente novamente", "codigo inexistente", "warning", "login.php");
				
			}
			
		}
		if (isset($_POST['submitLOGIN'])) {
			$user = mysqli_real_escape_string($mysqli, $_POST['username']);
			$pass = mysqli_real_escape_string($mysqli, $_POST['password']);

			$pass = md5($pass);

			if ($user == "" || $pass == "") {
				alert("Atenção", "Todos os campos são de introdução obrigatória", "warning", "login.php");
			} else {

				$result = mysqli_query($mysqli, "SELECT * FROM login WHERE username='$user' AND password='$pass'") or die("Não foi possível neste momento executar o seu pedido.");
				$ativo = mysqli_query($mysqli, "SELECT * FROM login WHERE ativo='S' AND username='$user' ") or die("Não foi possível neste momento executar o seu pedido.");

				$row = mysqli_fetch_assoc($result); //alguem com esses dados
				$sera = mysqli_fetch_assoc($ativo); //alguem com esses dados porem conta nao ativa

				if (is_array($row) && !empty($row)) {

					if (is_array($sera) && !empty($sera)) {
					
						if($row['code'] != '*****'){

							alert("Conta pausada", "sua conta esta passando por mudanças, fale com o ADM", "info", "../index.php");

						}else{

							
							$validuser = $row['username'];
							
							$_SESSION['validado'] = $user;
							alert("Logado", "Logado com sucesso", "success", "indexUSER.php");
						}

					} else {
						alert("Aviso", "Fale com o Administrador para ativar sua conta", "info", "../index.php");
					}
				} else {

					alert("Cuidado", "Username ou Palavra Pass errados", "warning", "login.php");
				}
			}
		} else {
	?>

			<ul class="ULline">
				<li class="LIelement"><a href="../index.php"><i class="fas fa-arrow-left" style="padding-right: 1rem;"></i>voltar</a></li>
			</ul>

			<div class="login" style="min-height: 60vh;">
				<form class="login-form" method="post" action="">
					<h1>Login</h1>

					<div class="form-input-material">
						<label for="username">Username<i class="fas fa-question-circle fa-xs" title="Preencha com username criado no cadastro"></i></label><br>
						<input type="text" name="username" autofocus="on" id="username" class="Tinput" required>
					</div>

					<div class="form-input-material">
						<label for="password">Password<i class="fas fa-question-circle fa-xs" title="Preencha com sua senha"></i></label><br>
						<input type="password" name="password" id="password" class="Tinput" required>
						<!-- <i class="far fa-eye-slash"></i> -->

					</div>
					<a id="child" href="../pages/recoverPass.php">esqueceu a senha ?</a>

					<button type="submit" name="submitLOGIN" id="submit" class="submit"> <i style="padding-left:unset" class="fas fa-check fa-lg"></i> </button>

					<a href="./registrar.php">Não possui conta ? cadastra-se já</a>
				</form>

			</div>

			<div class="login" style="min-height: 0vh;">
				<form class="login-form" method="post" style="padding:3%" action="">
					<h2>Usar Codigo</h2>


					<div class="form-input-material">
						<input type="text" style="background-color:rgb(73, 70, 70); height: 3rem; width: 2rem;text-align:center" maxlength="1" name="code1" id="code1"  class="Tinput" placeholder="*"   required>
						<input type="text" style="background-color:rgb(73, 70, 70); height: 3rem; width: 2rem;text-align:center" maxlength="1" name="code2" id="code2"  class="Tinput" placeholder="*"   required>
						<input type="text" style="background-color:rgb(73, 70, 70); height: 3rem; width: 2rem;text-align:center" maxlength="1" name="code3" id="code3"  class="Tinput" placeholder="*"   required>
						<input type="text" style="background-color:rgb(73, 70, 70); height: 3rem; width: 2rem;text-align:center" maxlength="1" name="code4" id="code4"  class="Tinput" placeholder="*"   required>
						<input type="text" style="background-color:rgb(73, 70, 70); height: 3rem; width: 2rem;text-align:center" maxlength="1" name="code5" id="code5"  class="Tinput" placeholder="*"   required>
						<button type="submit" name="submit2" id="submit2" class="BTNenviar"> enviar </button>
					</div>


				</form>

			</div>
	<?php
		}
	} else {
		warning("Impossivel Ligar à Base de Dados.");
		exit;
	}

	include("../pages/footer.html");
	?>

</body>

</html>