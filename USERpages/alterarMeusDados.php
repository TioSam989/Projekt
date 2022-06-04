
<?php session_start(); ?>
<?php include_once("../connection.php"); ?>

<!doctype html>
<html style="filter: grayscale(100%);">
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
		function alert($mensagem){
			echo '<script>alert("'.$mensagem.'")</script>';
		}
    ?>



<?php
if($mysqli){
	
	if(isset($_POST['submit'])){
		
		$nome = $_POST['nome'];
		$email = $_POST['email'];
		$username = $_POST['username'];
		$sexo = $_POST['sexo'];
		$born = $_POST['born'];

		mysqli_query($mysqli,"UPDATE login ('nome', 'email', 'username',  'sexo', 'born') VALUES ('$nome','$email','$username','$sexo','$born') WHERE idLogin='$id'");


		// $resulado=mysqli_query($mysqli, "UPDATE login SET ('nome', 'email', 'username', 'ficheiro_nome', 'sexo', 'born') VALUES ('$nome','$email','$username','$ficheiro','$sexo','$born') WHERE idLogin='$id'");
		// $resulado=mysqli_query($mysqli, "UPDATE login ('nome', 'email', 'username',  'sexo', 'born') VALUES ('$nome','$email','$username','$sexo','$born') WHERE idLogin='$id'");
		header('HTTP/1.0 403 Forbidden');
		header("Location: ../index.php");		
	}
    
	
	$teste = $_SESSION['validado'];
	$result = mysqli_query($mysqli , "SELECT * FROM login WHERE username='$teste'");
	
	if(!empty($res = mysqli_fetch_array($result))){
        $id=$res['idLogin'];
			include("../pages/headerPERSONAL.html");
		
		?>

            <div class="login">
							
							<form class="login-form" method="post" id="myform" action="">
                                <legend><h1 id="h1Animation">Meus dados</h1>
                                <div class="container">
                                    <img src="../images/<?php echo $res['ficheiro_nome'] ?>" >
                                </div>

								

								<div class="form-input-material">
								<div class="row">
									<div class="col">        
											<label>Nome Completo<i class="fas fa-question-circle fa-xs" title="Preencha com seu primeiro Nome"></i><i style="margin-left:93%; color:aqua" title="voce pode mudar esse campo" class="fas fa-paint-brush"></i>
													<input type="text" class="Tinput" name="nome" id="nome" value="<?php echo $res['nome'] ?>" >
											</label>
										</div>
									</div>
									<div class="row">
										<div class="col">
											<label>Email<i class="fas fa-question-circle fa-xs" title="Preencha com um email válido"></i> <i style="margin-left:93%; color:aqua" title="voce pode mudar esse campo" class="fas fa-paint-brush"></i>
												<input type="text" name="email" id="email" pattern="[A-Za-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" class="Tinput" value="<?php echo $res['email'] ?>" >
											</label>
										</div>
									</div>
									<div class="row">
										<div class="col">
											<label>Username<i class="fas fa-question-circle fa-xs" title="Deve conter de 3-20 caracteres e deve conter no minimo um caractere maiusculo, minusculo e numero"></i><i style="margin-left:93%; color:aqua" title="voce pode mudar esse campo" class="fas fa-paint-brush"></i>
												<input type="text" name="username" id="username" value="<?php echo $res['username'] ?>" pattern="^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=\S+$).{3,20}$" class="Tinput" >
											</label>
										</div>
									</div>
									
									<div class="row">
										<div class="col">
										<label>Sexo<i class="fas fa-question-circle fa-xs" title=""></i><i style="margin-left:90%; color:aqua" title="voce pode mudar esse campo" class="fas fa-paint-brush"></i> <br><br>
												<input  type="radio" class="radio" style="margin:2%" name="sexo" value="masculino" id="sexo" required>Masculino
												<input  type="radio" class="radio" style="margin:2%" name="sexo" value="feminino" id="sexo" required>Feminino 
												<input  type="radio" class="radio" style="margin:2%" name="sexo" value="outro" id="sexo" required>outro
											</label>
										</div>
										<div class="col"> 
											<label>Data de Nascimento<i class="fas fa-question-circle fa-xs"></i><i style="margin-left:90%; color:aqua" title="voce pode mudar esse campo" class="fas fa-paint-brush"></i>
												<input type="date" class="Tinput" value="<?php echo $res['born'] ?>"  name="born"  > 
											</label>
										</div>
									</div>

                                <center>
                                    <!-- <label  style="background-color:green" class="big-btn">
										<a  onclick="document.getElementById('myform').submit()" id="submit" style="display:block;padding:0.5rem" name="submit" > <i class="fas fa-check"></i> confirmar</a>
									</label> -->

									<button style="background-color:green;text-decoration:none;border-radius:1rem;width:100%;display:block;padding:0.5rem" type="submit" name="submit" id="submit" >Confirmar</button>

									<label  style="background-color:red" class="big-btn">
										<a href="meusDados.php"  style="margin:3rem;display:block;padding:0.5rem"> <i class="far fa-times-circle"></i> cancelar</a>
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
    alert("Não foi possivel conectar a base de dados");
}
?>