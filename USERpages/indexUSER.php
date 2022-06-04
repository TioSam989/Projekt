
<?php session_start(); ?>
<?php include_once("../connection.php"); ?>

<!doctype html>
<html>
<head>
	<title>./index User</title>
	<link rel="icon" href="../images/iconSpeciala29441.ico">
	<meta charset="UTF-8">
	<link href="../style/adm.css" rel="stylesheet" type="text/css">
	<script src="../script/SweetAlert.js"></script> 
	<script src="../script/general.js"></script>
	<link href="../style/general.css" rel="stylesheet" type="text/css"><!---Pegar estilo próprio dapágina Registrar--->
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

	<style>
		.login-form{
			margin:1%;
		}
	</style>

<?php
if($mysqli){

	

    if(isset($_SESSION['validado'])){
		

		
        $teste = $_SESSION['validado'];
        $result = mysqli_query($mysqli , "SELECT username FROM login WHERE username='$teste'");
        
        if(!empty($res = mysqli_fetch_array($result))){
			
			$teste = $_SESSION['validado'];
			$result = mysqli_query($mysqli, "SELECT * FROM login where username='$teste' ");
			$res = mysqli_fetch_array($result);

			?>

            <ul class="ULline">
				<li class="LIelement"><a href="./meusDados.php"><i class="fas fa-address-card" style="padding-right: 1rem;" ></i>meus dados</a></li>
                <li class="LIelement"><a href="./myClass.php"><i class="fas fa-chalkboard-teacher" style="padding-right: 1rem;" ></i>Turma</a></li>
                <li class="LIelement"><a href="./mensagemUSER.php"><i class="fas fa-comments" style="padding-right: 1rem;" ></i>Mensagens</a></li>
                <li class="LIelement"><a href="../pages/schedule.php"><i class="fas fa-chalkboard" style="padding-right: 1rem;" ></i>cronograma</a></li>
                <li class="LIelement"><a href="../pages/logout.php"><i class="fas fa-sign-out-alt" style="padding-right: 1rem;" ></i>Logout</a></li>
	        </ul>

			<div class="row">
				<div  class="login-form index-box" style="max-width:60%;" >
					<div class="row moh">
						<div class="cow">
							<h1><i class="fas fa-comments" ></i>chat</h1>
							<h3>Use nosso sistema de chat para poder se comunicar com o administrador e com os colegas de classe</h3>

						</div>
					</div>
				</div>

				<div  class="login-form index-box" style="height:100%;width:18%; padding:3%; margin-top:8%" >
					<div class="row moh">
						<div class="cow">
							<h2 style="text-align:center">Perfil<i class="fas fa-user"></i></h2>
							
							<div class="container" style="width: 6rem;height: 6rem;">
                                    <img src="../images/<?php echo $res['ficheiro_nome'] ?>" >
							</div>

							<input class="Tinput" style="margin:0;text-align:center;border:none;color:white" type="text" value="<?php echo $res['username'] ?>" disabled>
							<input class="Tinput" style="margin:0;text-align:center;border:none;color:white" type="text" value="<?php echo $res['email'] ?>" disabled>

						</div>
					</div>
				</div>
			</div>			
			
			<div class="row" style="align-items:end">


			<div  class="login-form index-box" style="max-width:60%;" >
					<div class="row moh">
						<div class="cow">
							<h2 style="text-align:center">segurança<i class="fas fa-shield-alt"></i></h2>
						</div>
				</div>
					<div class="row moh">
						
						<div class="cow">
							<h3>Seus dados estarão sempre seguros conosco, não houve nenhum vazamento nem acessos indesejados desde o inicio <i class="far fa-laugh-wink"></i></h3>

						</div>
					</div>
					

				</div>
				
				<div  class="login-form index-box" style="height:100%;width:18%; padding:3%; margin-top:0%; align-items:end;" >
					<div class="row moh">
						<div class="cow">
							<h2 style="text-align:center">Dicas</h2>
							<center>
							<i class="fas fa-lightbulb fa-5x" style="color:yellow"></i>
							</center>

							<h3>não compartilhe suas credenciais com colegas de classe ou qualquer outra pessoa de fora, nao nos responsabilizamos por falta de cuidado</h3>

						</div>
					</div>
				</div>
				
			</div>
			<div class="cow">
			<div  class="login-form index-box" style="max-width:60%;" >
					<div class="row moh">
						<div class="cow">
							<h2 style="text-align:center">Funcionalidades<i class="fas fa-shield-alt"></i></h2>
						</div>
				</div>
					<div class="row moh">
						
						<div class="cow">
							<h3>Seus dados estarão sempre seguros conosco, não houve nenhum vazamento nem acessos indesejados desde o inicio <i class="far fa-laugh-wink"></i></h3>

						</div>
					</div>
					

				</div>
			
			
<div class="row">
				
				<div  class="login-form index-box" style="height:100%;width:18%; padding:3%; margin-top:0%; align-items:end;" >
					<div class="row moh">
						<div class="cow">
							<h2 style="text-align:center">Parcerias</h2>
							<div class="container">
								<img src="https://pngimage.net/wp-content/uploads/2018/06/norton-png-1.png" alt="">
							</div>
							<h3>Sistema de segurança fornecidos pela Norton </h3>
							<h5>Link: <a href="https://pt.norton.com/" style="color:orange">Norton Security</a></h5>
							
						</div>
					</div>
				</div>

				<div  class="login-form index-box" 
				="height:100%;width:18%; padding:3%; margin-top:0%; align-items:end;" >
					<div class="row moh">
						<div class="cow">
							<h2 style="text-align:center">Parcerias</h2>
							<div class="container">
								<img src="https://pngimage.net/wp-content/uploads/2018/06/norton-png-1.png" alt="">
							</div>
							<h3>Sistema de segurança fornecidos pela Norton </h3>
							<h5>Link: <a href="https://pt.norton.com/" style="color:orange">Norton Security</a></h5>
							
						</div>
					</div>
				</div>
				<div  class="login-form index-box" style="height:100%;width:18%; padding:3%; margin-top:0%; align-items:end;" >
					<div class="row moh">
						<div class="cow">
							<h2 style="text-align:center">Parcerias</h2>
							<div class="container">
								<img src="https://pngimage.net/wp-content/uploads/2018/06/norton-png-1.png" alt="">
							</div>
							<h3>Sistema de segurança fornecidos pela Norton </h3>
							<h5>Link: <a href="https://pt.norton.com/" style="color:orange">Norton Security</a></h5>
							
						</div>
					</div>
				</div>
				<div  class="login-form index-box" style="height:100%;width:18%; padding:3%; margin-top:0%; align-items:end;" >
					<div class="row moh">
						<div class="cow">
							<h2 style="text-align:center">Parcerias</h2>
							<div class="container">
								<img src="https://pngimage.net/wp-content/uploads/2018/06/norton-png-1.png" alt="">
							</div>
							<h3>Sistema de segurança fornecidos pela Norton </h3>
							<h5>Link: <a href="https://pt.norton.com/" style="color:orange">Norton Security</a></h5>
							
						</div>
					</div>
				</div>

</div>				
				
				
			</div>
			<div class="cow">
			<div  class="login-form index-box" style="max-width:60%;" >
					<div class="row moh">
						<div class="cow">
							<h2 style="text-align:center">Funcionalidades<i class="fas fa-shield-alt"></i></h2>
						</div>
				</div>
					<div class="row moh">
						
						<div class="cow">
							<h3>Seus dados estarão sempre seguros conosco, não houve nenhum vazamento nem acessos indesejados desde o inicio <i class="far fa-laugh-wink"></i></h3>

						</div>
					</div>
					

				</div>
			
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