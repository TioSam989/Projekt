<?php include_once('../connection.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <title>recover pass</title>
    <link rel="icon" href="../images/iconSpeciala29441.ico">
	<meta charset="UTF-8">
	<link href="../style/general.css" rel="stylesheet" type="text/css">
	<link href="../style/login.css" rel="stylesheet" type="text/css">
	<link href="../style/navbar.css" rel="stylesheet" type="text/css">
	<script src="../script/SweetAlert.js"></script>
	<script src="../script/general.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script><!--isso aqui é para pegar os estilos do SWEETALERTJS-->
	<script type="text/javascript"> (function() { var css = document.createElement('link'); css.href = 'https://use.fontawesome.com/releases/v5.1.0/css/all.css'; css.rel = 'stylesheet'; css.type = 'text/css'; document.getElementsByTagName('head')[0].appendChild(css); })(); </script> <!---- metodo de usar fonts awesome mais rapido -->
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/emailjs-com@2/dist/email.min.js"></script>
    <script type="text/javascript">(function() {emailjs.init("user_cbdGbrdApr9V2gG85nEx2");})();</script>
    <!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css"> -->
</head>
<body onload="generatePass()">
<?php //***script functions calls****/
		function warning($mensagem) {  //*********mensagem de aviso no meio da tela*********/
			echo '<script>alert("' . $mensagem . '")</script>';
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
		function sendEmailWithJS($toMail, $toNome, $fromWho, $msg, $WhereGoAfter){
			echo '<script>sendMail("'.$toMail.'","'.$toNome.'","'.$fromWho.'","'.$msg.'","'.$WhereGoAfter.'")</script>';
		}
    ?>

<?php

if($mysqli){
	
	if(isset($_POST['submitChangePass'])){
		$usernameUSER = $_POST['usernameDB'];
		$resultUSER = mysqli_query($mysqli , "SELECT * FROM login WHERE username='$usernameUSER'");
		$raw = mysqli_fetch_assoc($resultUSER);

		if(!empty($raw)){
			$codigo = $_POST['code'];
			sendEmailWithJS($_POST['mailpara'],$res['nome'],"Gestao de contas","Para ativar sua conta use o seguinte codigo: $codigo", "../USERpages/login.php");
			$teste = $res['idLogin'];
			$resulado=mysqli_query($mysqli, "UPDATE login SET code = '$codigo' WHERE username='$usernameUSER'");
		}else{
			// alert("tente novamente", "username inexistente", "warning", "login.php");
			warning('username inexistente');
			header('Location: ../USERpages/login.php');

		}


	}

}else{
	session_destroy();
	alert("oops","Impossivel Ligar à Base de Dados","info","../index.php");
	exit;
}


?>
	  
<ul class="ULline">
	<li class="LIelement"><a href="../index.php" ><i class="fas fa-arrow-left" style="padding-right: 1rem;" ></i>voltar</a></li>
</ul>
	<div class="login">

	<form class="login-form" method="post" >

		<h1 >Recuperar conta</h1>
		
		<div class="form-input-material">
			<label for="email">Email<i class="fas fa-question-circle fa-xs" title="preencha com seu melhor email"></i></label><br>
			<input type="text" name="mailpara" id="mailto" autofocus="on" placeholder="Seu melhor email..." class="Tinput" required>
		</div>
		
		<div class="form-input-material">
			<label for="username">Username<i class="fas fa-question-circle fa-xs" title="preencha com o username da conta que deseja recuperar a senha"></i></label><br>
			<input type="text" name="usernameDB" id="usernameDB" class="Tinput" placeholder="Username da conta..." required>
		</div>

		<div hidden>
			<input type="text" name="code" id="code">        
		</div>
		
		<button type="submit" name="submitChangePass" id="submit" class="submit"> <i style="padding-left:unset" class="fas fa-check fa-lg"></i> </button>

	</form>

</div>
      </body>
      </html>






     
