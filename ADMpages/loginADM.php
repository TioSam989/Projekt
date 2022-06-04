<?php include_once('../connection.php'); ?>
<?php session_start();?>
<html>
<head>
	<title>./loginADM</title>
	<link rel="icon" href="../images/iconSpeciala29441.ico">
	<meta charset="UTF-8">
	<link href="../style/general.css" rel="stylesheet" type="text/css">
	<link href="../style/login.css" rel="stylesheet" type="text/css">
	<link href="../style/navbar.css" rel="stylesheet" type="text/css">
	<script src="../script/SweetAlert.js"></script> 
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script type="text/javascript"> (function() { var css = document.createElement('link'); css.href = 'https://use.fontawesome.com/releases/v5.1.0/css/all.css'; css.rel = 'stylesheet'; css.type = 'text/css'; document.getElementsByTagName('head')[0].appendChild(css); })(); </script> <!---- metodo de usar fonts awesome mais rapido -->
	<script src="../script/sweetAlert.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    
</head>

<body>
	
	

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


<?php
if($mysqli){
    if(isset($_POST['submit'])){
        $user = $_POST['username'];
        $pass = $_POST['password'];

        if($user == "" || $pass == ""){
            alert("Todos os campos precisam ser preenchidos");
            header('Refresh: 1; URL=./loginADM.php');
            die();
        }else{
            if(($user == "admin" && $pass == "admin")||($user == "ADMIN" && $pass == "ADMIN")){
				$_SESSION['validado'] = $user;
                alert("Entrando em modo administrador..");
                header('Refresh: 1; URL=./indexADM.php');
                die();
            }else{
                alert("Usuario ou senha incorretos");
                header('Refresh: 1; URL=./indexADM.php');
                die();

            }
        }

    }else{

        ?>


<ul class="ULline">
		<li class="LIelement"><a href="../index.php" ><i class="fas fa-arrow-left" style="padding-right: 1rem;" ></i>voltar</a></li>
	</ul>

<div class="login">
<form class="login-form" method="post" action="">
	<h1 >LoginADM</h1>
  	
	<div class="form-input-material">
    	<label for="username">Username<i class="fas fa-question-circle fa-xs" title="Preencha com username de ADM"></i></label><br>
		<input type="text" name="username" autofocus="on" id="username" class="Tinput" required>
  	</div>
  	
	<div class="form-input-material">
    	<label for="password" >Password<i class="fas fa-question-circle fa-xs" title="Preencha com sua senha de ADM"></i></label><br>
		<input type="password" name="password" id="password" class="Tinput" required>
  	</div>
  	
	<button type="submit" name="submit" id="submit" class="submit"> <i style="padding-left:unset" class="fas fa-check fa-lg"></i> </button>

</form>

</div>


        <?php
    }
}else{
    alert("Não foi possivel conectar a base de dados");
    header('Refresh: 1; URL=../index.php');
}
?>

</body>
</html>