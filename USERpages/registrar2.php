<?php session_start(); ?>
<?php include_once("../connection.php"); ?>
<!doctype html>
<html>

<head>
	<title>./registrar passo 2</title>
	<link rel="icon" href="../images/iconSpeciala29441.ico">
	<meta charset="UTF-8">
	<link href="../style/general.css" rel="stylesheet" type="text/css">
	<script src="../script/SweetAlert.js"></script>
	<script src="../script/general.js"></script>
	<link href="../style/registrar.css" rel="stylesheet" type="text/css">
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
function alert($title,$message,$icon, $local ){
	echo '<script>alertJS("'.$title.'","'.$message.'","'.$icon.'","'.$local.'")</script>';
}

?>

<?php
if($_SESSION['podeUsar'] == '1'){
	
	if ($mysqli) {
		console($_SESSION['username']);
		console($_SESSION['podeUsar']);
		
		if(isset($_POST['submit2'])){
			console("pelo menos sei que alguem apertou o submit");
			$nome = $_SESSION['username'];
			$legenda =  "Loading";
			if(($_FILES['nome_imagem']['type']== 'image/jpeg')
			||($_FILES['nome_imagem']['type']== 'image/gif')
			||($_FILES['nome_imagem']['type']== 'image/png')
			&&($_FILES['nome_imagem']['error'] == 0)){
				$ficheiro_nome = rand(1000,100000)."-".$_FILES['nome_imagem']['name'];
				move_uploaded_file($_FILES['nome_imagem']['tmp_name'],"../images/". $ficheiro_nome);
			}else{
				$ficheiro_nome ='default.jpg';
			}
			$_SESSION['nomeIMG'] = $nome;
			$_SESSION['legendaIMG'] = $legenda;
			$_SESSION['ficheiro_nome'] = $ficheiro_nome;
			$_SESSION['podeUsar'] = '2';

			header('Refresh: 1; URL=./registrar3.php');

		}else{
	?>
			<body onload="alertJS('Aviso!','depois de muitos testes cheguei na conclusão que a função de mudar imagem usando Promise[js] não é tão responsiva dentro do HTDOCS quanto fora... não é minha culpa','info','#')">
				<ul class="ULline">
					<li class="LIelement"><a href="./registrar.php"><i class="fas fa-arrow-left" style="padding-right: 1rem;"></i>voltar</a></li>
				</ul>
				<div class="login">
					<form class="login-form" enctype="multipart/form-data" method="post" action="">
						<legend>
							<h1 id="h1Animation">Registrar</h1>
							<div class="form-input-material">
								<div class="row">
									<div class="cow">
										<div class="container">
											<img src="../images/default.jpg" id="output_image" alt="preview da imagem">
										</div>
										<div class="row">
											<div class="col">
												<h1></h1>
												<label>Selecione uma imagem<i class="fas fa-question-circle fa-xs"  title="Selecione uma imagem no formato de JPEG, JPG, GIF e PNG com chances de erro ..."></i><br>
												<input type="file" autocomplete="off"  class="Tinput" accept="image/png,image/gif,image/jpeg"  id="nome_imagem" name="nome_imagem" onchange="preview_image(event)" />
												</label>
											</div>
										</div>		
									</div>
								</div>
								<div class="row">
									<div class="col">
										<h1></h1>
										<label>Username<i class="fas fa-question-circle fa-xs" title="Para mudar volte para a pagina anterior"></i>
											<input type="text" value="<?php echo $_SESSION['username'] ?>" disabled name="username" class="Tinput" required>
										</label>
									</div>
								</div>
								<div class="row">
									<div class="col">
										<button type="submit" name="submit2" id="submit2">submeter</button>
									</div>
								</div>
							</div>
							<CENTER>Passo 2 de 3</CENTER>
							<h3 id="h1Animation">Monte seu Perfil</h3>
					</form>
					</legend>
				</div>
			</body>
	<?php
		}
	} else {
		alert("Impossivel Ligar à Base de Dados.");
		exit;
	}
	include("../pages/footer.html");
}else{
	alert("Opa","Não pode pular os passos do cadastro","info","registrar.php");
}
?>
</html>