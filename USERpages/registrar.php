<?php session_start(); ?>
<?php include_once("../connection.php"); ?>

<!doctype html>
<html>
<head>
	<title>./registrar passo1</title>
	<link rel="icon" href="../images/iconSpeciala29441.ico">
	<meta charset="UTF-8">
	<link href="../style/general.css" rel="stylesheet" type="text/css">
	<script src="../script/SweetAlert.js"></script>
	<script src="../script/general.js"></script>
	<link href="../style/registrar.css" rel="stylesheet" type="text/css"><!---Pegar estilo próprio dapágina Registrar--->
	<link href="../style/navbar.css" rel="stylesheet" type="text/css"> <!---Pegar estilo da NavBar--->
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script><!--isso aqui é para pegar os estilos do SWEETALERTJS-->
	<script type="text/javascript"> (function() { var css = document.createElement('link'); css.href = 'https://use.fontawesome.com/releases/v5.1.0/css/all.css'; css.rel = 'stylesheet'; css.type = 'text/css'; document.getElementsByTagName('head')[0].appendChild(css); })(); </script> <!---- metodo de usar fonts awesome mais rapido -->
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
		function simpleAlert($mensagem){
			echo '<script>alert("'.$mensagem.'")</script>';
		}
		function reloadPage($title,$message,$icon, $local){
			echo '<script>alertJS("'.$title.'","'.$message.'","'.$icon.'")</script>';
		}
    ?>

    <?php
	if ($mysqli){ //********ver se tem ligação com a base de dados*******/

		if(isset($_POST['submit'])) {	 //*****************ver se tem instanciamento com o botao name=submit**************/
			
			$nome = $_POST['nome'];
			$email = $_POST['email'];
			$user = $_POST['username'];
			$pass1 = $_POST['pass1'];
			$pass2 = $_POST['pass2'];
			$sexo = $_POST['sexo'];
			$born = $_POST['born'];

			
			if($nome == "" || $email == "" || $user == "" || $pass1 == "" || $pass2 == "" || $sexo == "" || $born == "" ) { //***********************verificar se todos os campos foram preenchidos**********************/
	

				// alert("Atenção","todos os campos são de introdução obrigatória","info","registrar.php");
				simpleAlert("Todos os campos são de introdução obrigatória");
				header('Refresh: 1; URL=./registrar.php');


			}else{ 
					if($pass1 != $pass2){ 
				
						// alert("Senhas Invalidas","Senhas não combinam","warning","registrar.php");
						simpleAlert("Senhas não combinam");
						header('Refresh: 1; URL=./registrar.php');
					
					} else { //*********************verificar se usuario ou email nao esta em uso********************/

						$resultado = mysqli_query($mysqli, "SELECT * FROM login WHERE BINARY username='$user' OR email='$email'");
						$row = mysqli_fetch_assoc($resultado);
						
						if(is_array($row) && !empty($row)) {
							
							// reloadPage("Ocupado","este apelido ou email ja esta em uso","info");
							simpleAlert("Eesse Username ou Email ja esta em uso");
							header('Refresh: 1; URL=./registrar.php');
						
						}else{ // ***********************acumular dados na session para guardar no passo 3*************************

							$password = $pass1;
							$_SESSION['podeUsar'] = '1';
							$_SESSION['nome'] = $nome;
							$_SESSION['email'] = $email;
							$_SESSION['username'] = $user;
							$_SESSION['password'] = md5("$password");
							$_SESSION['sexo'] = $sexo;
							$_SESSION['born'] = $born;

							header('Refresh: 1; URL=./registrar2.php');

							}
						
						}
			}
				} else { //********************formulario registro************** */
	?>
       
	<body>

				
	<ul class="ULline">
		<li class="LIelement"><a href="../index.php"><i class="fas fa-arrow-left" style="padding-right: 1rem;" ></i>voltar</a></li>
	</ul>
						<div class="login">
							
							<form class="login-form" method="post" action="">
								<legend><h1 id="h1Animation">Registrar</h1>
								<div class="form-input-material">
								<div class="row">
									<div class="col">        
											<label>Nome Completo<i class="fas fa-question-circle fa-xs" title="Preencha com seu primeiro Nome"></i>
													<input type="text" class="Tinput" name="nome" id="nome" autofocus  required >
											</label>
										</div>
									</div>
									<div class="row">
										<div class="col">
											<label>Email<i class="fas fa-question-circle fa-xs" title="Preencha com um email válido"></i> 
												<input type="text" name="email" id="email" pattern="[A-Za-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" class="Tinput" required>
											</label>
										</div>
									</div>
									<div class="row">
										<div class="col">
											<label>Username<i class="fas fa-question-circle fa-xs" title="Deve conter de 3-20 caracteres e deve conter no minimo um caractere maiusculo, minusculo e numero"></i>
												<input type="text" name="username" id="username" pattern="^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=\S+$).{3,20}$" class="Tinput" required>
											</label>
										</div>
									</div>
									<div class="row">
										<div class="col">
											<label>Senha<i class="fas fa-question-circle fa-xs" title="deve conter no minimo 8 caracteres, uma letra maiuscula, uma letra minuscula e um caractere especial( @#$ )"></i>
												<input type="password" name="pass1" id="pass1" pattern="(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*\W+)(?=^.{8,50}$).*$" class="Tinput" required>
											</label>
										</div>
									<div class="col">
											<label id="P2">Rep. Senha<i class="fas fa-question-circle fa-xs" title="deve conter no minimo 8 caracteres, uma letra maiuscula, uma letra minuscula e um caractere especial( @#$ )"></i>
												<input type="password" name="pass2" id="pass2" pattern="(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*\W+)(?=^.{8,50}$).*$" class="Tinput" required>
											</label>
										</div>
									</div>
									<div class="row">
										<div class="col">
											<label>Sexo<i class="fas fa-question-circle fa-xs" title=""></i> <br><br>
												<input  type="radio" class="radio" style="margin:2%" name="sexo" value="masculino" id="sexo" required>Masculino
												<input  type="radio" class="radio" style="margin:2%" name="sexo" value="feminino" id="sexo" required>Feminino 
												<input  type="radio" class="radio" style="margin:2%" name="sexo" value="outro" id="sexo" required>outro
											</label>
										</div>
										<div class="col"> 
											<label>Data de Nascimento<i class="fas fa-question-circle fa-xs"></i>
												<input type="date" class="Tinput" name="born" required> 
											</label>
										</div>
									</div>

									<div class="row" style="padding-top:10%">
										<div class="col">
											<button type="submit" name="submit" id="submit">submeter</button>
										</div>
									</div>
								</div>
								<CENTER>Passo 1 de 3</CENTER>
								<h3 id="h1Animation">Dados pessoais</h3>

							</form>
							</legend>
						</div>
				</body>
	<?php
		}
	}else{

	}

	include("../pages/footer.html");
?>

</html>
