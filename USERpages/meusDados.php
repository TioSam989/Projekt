
<?php session_start(); ?>
<?php include_once("../connection.php"); ?>

<!doctype html>
<html>
<head>
	<title>./dados</title>
	<link rel="icon" href="../images/iconSpeciala29441.ico">
	<meta charset="UTF-8">
	<link href="../style/adm.css" rel="stylesheet" type="text/css">
	<script src="../script/SweetAlert.js"></script>
	<link href="../style/general.css" rel="stylesheet" type="text/css"><!---Pegar estilo próprio dapágina Registrar--->
	<script src="../script/general.js"></script>
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
		function alert($title,$message,$icon, $local ){
			echo '<script>alertJS("'.$title.'","'.$message.'","'.$icon.'","'.$local.'")</script>';
		}
		
    ?>



<?php
if($mysqli){

    
    if(isset($_SESSION['validado'])){
        
        $teste = $_SESSION['validado'];
        $result = mysqli_query($mysqli , "SELECT * FROM login WHERE username='$teste'");
        
        if(!empty($res = mysqli_fetch_array($result))){
        
			include("../pages/headerPERSONAL.html");
		
		?>

            <div class="login">
							
							<form class="login-form" method="post" action="">
                                <legend><h1 id="h1Animation">Meus dados</h1>
								
                                <div class="container">
                                    <img src="../images/<?php echo $res['ficheiro_nome'] ?>" >
                                </div>
								<div class="form-input-material">
								<div class="row">
									<div class="col">        
											<label>Nome Completo<i class="fas fa-question-circle fa-xs" title="Preencha com seu primeiro Nome"></i>
													<input type="text" class="Tinput" name="nome" id="nome" value="<?php echo $res['nome'] ?>" disabled>
											</label>
										</div>
									</div>
									<div class="row">
										<div class="col">
											<label>Email<i class="fas fa-question-circle fa-xs" title="Preencha com um email válido"></i> 
												<input type="text" name="email" id="email" pattern="[A-Za-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" class="Tinput" value="<?php echo $res['email'] ?>" disabled>
											</label>
										</div>
									</div>
									<div class="row">
										<div class="col">
											<label>Username<i class="fas fa-question-circle fa-xs" title="Deve conter de 3-20 caracteres e deve conter no minimo um caractere maiusculo, minusculo e numero"></i>
												<input type="text" name="username" id="username" value="<?php echo $res['username'] ?>" pattern="^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=\S+$).{3,20}$" class="Tinput" disabled>
											</label>
										</div>
									</div>
									
									<div class="row">
										<div class="col">
											<label>Sexo<i class="fas fa-question-circle fa-xs" title="" value="<?php echo $res['sexo'] ?>"></i> <br><br>
												<input type="text"  value="<?php echo $res['sexo'] ?>" class="Tinput" disabled>
											</label>
										</div>
										<div class="col"> 
											<label>Data de Nascimento<i class="fas fa-question-circle fa-xs"></i>
												<input type="date" class="Tinput" value="<?php echo $res['born'] ?>"  name="born" disabled> 
											</label>
										</div>
									</div>

									<center>
										<label  style="background-color:blue" class="big-btn">
											<a href="./alterarMeusDados.php" style="margin:2rem;display:block;padding:0.5rem" disabled> <i class="fas fa-paint-brush"></i> Mudar Dados</a>
										</label>
										<label  style="background-color:red" class="big-btn">
											<a href="../pages/mudarPass.php"  style="display:block;padding:0.5rem"> <i class="fas fa-key"></i> Mudar Password</a>
										</label>
                                </center>

							</form>
							</legend>
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