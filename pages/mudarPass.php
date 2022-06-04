
<?php session_start(); ?>
<?php include_once("../connection.php"); ?>

<!doctype html>
<html>
<head>
	<title>./dados</title>
	<link rel="icon" href="../images/iconSpeciala29441.ico">
	<meta charset="UTF-8">
	<link href="../style/adm.css" rel="stylesheet" type="text/css">
	<link href="../style/general.css" rel="stylesheet" type="text/css"><!---Pegar estilo próprio dapágina Registrar--->
	<link href="../style/general.css" rel="stylesheet" type="text/css"><!---Pegar estilo próprio dapágina Registrar--->
	<script src="../script/general.js"></script>
	<link href="../style/registrar.css" rel="stylesheet" type="text/css"><!---Pegar estilo próprio dapágina Registrar--->
	<link href="../style/navbar.css" rel="stylesheet" type="text/css"> <!---Pegar estilo da NavBar--->
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script><!--isso aqui é para pegar os estilos do SWEETALERTJS-->
	<script src="jquery-3.5.1.min.js"></script> <!---extenção para usar sweeralerts --->
	    <!-- <script src="https://kit.fontawesome.com/a076d05399.js"></script> isso aqui é para pegar os icones do FONTAWESOME, porem tava muito lento, entao usei o metodo abaixo-->
        <script type="text/javascript"> (function() { var css = document.createElement('link'); css.href = 'https://use.fontawesome.com/releases/v5.1.0/css/all.css'; css.rel = 'stylesheet'; css.type = 'text/css'; document.getElementsByTagName('head')[0].appendChild(css); })(); </script> <!---- metodo de usar fonts awesome mais rapido -->
	<script src="../script/sweetAlert.js"></script> <!---o codigo no sweetalert--->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
</head>

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
    ?>


<body >
	
                <ul class="ULline">
					<li class="LIelement"><a href="../USERpages/meusDados.php"><i class="fas fa-arrow-left" style="padding-right: 1rem;"></i>voltar</a></li>
				</ul>

<?php



if(!isset($_SESSION['validado'])){
    header('HTTP/1.0 403 Forbidden');
    header("Location: ../index.php");
    exit;
}


    $teste = $_SESSION['validado'];
    $result = mysqli_query($mysqli , "SELECT * FROM login WHERE username='$teste'");
if(empty($res = mysqli_fetch_array($result))){
    header('HTTP/1.0 403 Forbidden');
    header("Location: ../index.php");
    exit;
}



if ($mysqli){
    if(isset($_POST['submit'])) {

            $pass1 = $_POST['pass1'];//pass atual 
            $pass2 = $_POST['pass2'];//nova pass
            $pass3 = $_POST['pass3'];//rep nova pass

            $teste = $_SESSION['validado'];
            $result = mysqli_query($mysqli, "SELECT * FROM login where username='$teste' ")or die("Não foi possível neste momento executar o seu pedido.");
            $row = mysqli_fetch_assoc($result);
            
            if($row['password'] == md5($pass1)){
                
                if($pass2 == $pass3){

                    if($row['password'] == md5($pass2)){
                    alert("Atenção","impossivel mudar a senha para igual","info","../pages/mudarPass.php");
                        
                    }else{
                        $teste = $_SESSION['validado'];
                        $resulado=mysqli_query($mysqli, "UPDATE login SET password=md5('$pass2') WHERE username='$teste'");
                        session_destroy();
                        alert("Feito","Senhas mudadas com sucesso","success","../USERpages/login.php");
                    }
                }else{
                    
                    alert("Cuidado","Novas senhas não combinam","warning","../pages/mudarPass.php");
                    
                }

            }else{
                alert("Atenção","Senha invalida","warning","../pages/mudarPass.php");
                
            }

    } else {
        ?>
            <div class="login">
					<form class="login-form" enctype="multipart/form-data" method="post" action="">
						<legend>
							<h1 id="h1Animation">Mudar senha</h1>
							<div class="form-input-material">
								
								<div class="row">
									<div class="col">
										<h1></h1>
										<label>Senha atual<i class="fas fa-question-circle fa-xs" title="preencha com sua senha atual"></i>
											<input type="password" autofocus  name="pass1" class="Tinput" required>
										</label>
									</div>
								</div>
                                <div class="row">
									<div class="col">
										<h1></h1>
										<label>Nova Senha<i class="fas fa-question-circle fa-xs" title="deve conter no minimo 8 caracteres, uma letra maiuscula, uma letra minuscula e um caractere especial( @#$ )"></i>                                            <i  title="deve conter no minimo 8 caracteres, uma letra maiuscula, uma letra minuscula e um caractere especial( @#$ )"></i>
											<input type="password"  name="pass2" class="Tinput"  pattern="(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*\W+)(?=^.{8,50}$).*$"   required>
										</label>
									</div>
								</div>
                                <div class="row">
									<div class="col">
										<h1></h1>
										<label>Rep Nova<i class="fas fa-question-circle fa-xs" title="deve conter no minimo 8 caracteres, uma letra maiuscula, uma letra minuscula e um caractere especial( @#$ )"></i>
                                            <i  title="deve conter no minimo 8 caracteres, uma letra maiuscula, uma letra minuscula e um caractere especial( @#$ )"></i>
											<input type="password"   name="pass3" class="Tinput"pattern="(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*\W+)(?=^.{8,50}$).*$"   required>
										</label>
									</div>
								</div>
								<div class="row">
									<div class="col">
										<button type="submit" name="submit" id="submit">mudar</button>
									</div>
								</div>
							</div>
					</form>
					</legend>
				</div>
        <?php
    }
}else{
                session_destroy();
                alert("oops","Impossivel Ligar à Base de Dados","info","../index.php");
exit;
}
include("../pages/footer.html");
?>

</body>
</html>
