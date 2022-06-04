<?php session_start(); ?>
<?php
include_once("../connection.php");
$result = mysqli_query($mysqli, "SELECT * FROM login ");
if( (!isset($_SESSION['validado'])) ){

	header('HTTP/1.0 403 Forbidden');
	header("Location: ../index.php");
	exit;

	if( ($_SESSION['validado'] != 'admin') || ($_SESSION['validado'] != 'ADMIN') ){

		
		header('HTTP/1.0 403 Forbidden');
		header("Location: ../index.php");
		exit;
	}
}elseif( ( $_SESSION['validado'] == 'admin' ) || (  $_SESSION['validado'] == 'ADMIN'  ) ){
		header('HTTP/1.0 403 Forbidden');
		header("Location: ../index.php");
		exit;
}
?>
<!doctype html>
<html>
<head>
	<title>./turma</title>
	<link rel="icon" href="../images/iconSpeciala29441.ico">
	<meta charset="UTF-8">
	<link href="../style/general.css" rel="stylesheet" type="text/css">
	<link href="../style/ADMgeneral.css" rel="stylesheet" type="text/css">
	<script src="../script/SweetAlert.js"></script>
	<script src="../script/general.js"></script>
	<link href="../style/navbar.css" rel="stylesheet" type="text/css"> 
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script><!--isso aqui é para pegar os estilos do SWEETALERTJS-->
	<script type="text/javascript"> (function() { var css = document.createElement('link'); css.href = 'https://use.fontawesome.com/releases/v5.1.0/css/all.css'; css.rel = 'stylesheet'; css.type = 'text/css'; document.getElementsByTagName('head')[0].appendChild(css); })(); </script> <!---- metodo de usar fonts awesome mais rapido -->

	<link href="../style/adm.css" rel="stylesheet" type="text/css">
	<link href="../style/ADMgeneral.css" rel="stylesheet" type="text/css">
	<link href="../style/general.css" rel="stylesheet" type="text/css">
	<link href="../style/navbar.css" rel="stylesheet" type="text/css">
</head>

<?php
	$user = $_SESSION['validado'];
	$resultado = mysqli_query($mysqli , "SELECT * FROM login WHERE username='$user'");
	$SoTurma = mysqli_fetch_assoc($resultado);
	$turma = $SoTurma['turma'];
	
	$result = mysqli_query($mysqli, "SELECT * FROM turma WHERE sigla_Turma='$turma'");
	$dados = mysqli_fetch_assoc($result);
	$nome = $dados['nome_Turma'];

	echo '<script>console.log("user = '.$user.'")</script>';
	echo '<script>console.log("turma = '.$turma.'")</script>';
	echo '<script>console.log("nome = '.$nome.'")</script>';
	

?>

<body >

<?php
	include("../pages/headerPERSONAL.html");
?>

<form class="form-input-material">
	<div class="square" >
		<div class="block" style=";border-radius: 10px;background-image: url('../images/<?php echo $dados['sigla_Turma'] ?>.jpg');">
			<div class="centered" style="background-color:rgba(78, 75, 75, 0.158)">
				<h1 style=" display:inline;margin-right:1rem"><?php echo $dados['nome_Turma'] ?></h1><br>
			</div>
		</div>
	</div>
</form>

							
							<form class="login-form" method="post" style="border-top-left-radius:0;border-top-right-radius:0; " action="">
								<div class="form-input-material">
								<div class="row">
										<div class="col"> 
											<label>Nome da Turma<i class="fas fa-question-circle fa-xs"></i>
												<h4 class="Tinput"><?php echo $dados['nome_Turma'] ?></h4>
											</label>
										</div>
										<div class="col"> 
											<label>Sigla<i class="fas fa-question-circle fa-xs"></i>
												<h4 class="Tinput"><?php echo $dados['sigla_Turma'] ?></h4>
											</label>
										</div>
									</div>
									<div class="col"> 
										<label>Resumo<i class="fas fa-question-circle fa-xs"></i>
											<h4 class="Tinput"><?php echo $dados['resumo'] ?></h4>
										</label>
									</div>
									<div class="col"> 
										<label>Alunos<i class="fas fa-question-circle fa-xs"></i>
										
										<?php 
											$cv =  mysqli_query($mysqli, "SELECT * FROM login where turma='$turma'  ");
											$alunos = mysqli_fetch_assoc($cv);

											if(!empty($ros = mysqli_fetch_array($cv))){
											
												$cv =  mysqli_query($mysqli ,"SELECT * FROM login WHERE turma='$turma' and ativo='S'");
												$ada =  mysqli_query($mysqli ,"SELECT * FROM login WHERE turma='$turma' and ativo!='S'");
												
												echo "<div class='row geralzao'>";
												
												while($res = mysqli_fetch_array($ada)) {	
													$apelido = $res['username'];
													
													$nomeCompleto = $res['nome'];
													$meh = explode(" ",$nomeCompleto);
													$nome = $meh['0'];

													echo "<a >";
													echo "<div class='col'>";
													echo "<div class='container ban' style='width: 5rem;height: 5rem;'>";
													echo "<img onclick='mostrar()' class='gray' src='../images/".$res['ficheiro_nome']."'>";
													echo "</div>";
													echo "<center>";
													echo "<h3 style='text-elign:center; margin-bottom:0;margin-top:opx' class='Tinput'>$nome</h3>";
													echo "<h5 style='text-elign:center;margin-top:opx; border-top:0px; padding-top:0px' class='Tinput'>$apelido</h5>";
													echo "</center>";
													echo "</div>";
													echo "</a>";
												}
												while($res = mysqli_fetch_array($cv)) {	
													$apelido = $res['username'];
													
													$nomeCompleto = $res['nome'];
													$meh = explode(" ",$nomeCompleto);
													$nome = $meh['0'];

													echo "<a >";
													echo "<div class='col'>";
													echo "<div class='container' style='width: 5rem;height: 5rem;'>";
													echo "<img onclick='mostrar()' src='../images/".$res['ficheiro_nome']."'>";
													echo "</div>";
													echo "<center>";
													echo "<h3 style='text-elign:center; margin-bottom:0;margin-top:opx' class='Tinput'>$nome</h3>";
													echo "<h5 style='text-elign:center;margin-top:opx; border-top:0px; padding-top:0px' class='Tinput'>$apelido</h5>";
													echo "</center>";
													echo "</div>";
													echo "</a>";
												}
												
												
												
											}else{
												echo "<center>";
												echo "<div class='row ' ><h5 class='Tinput' style:text-align:left> Nenhum aluno</h5></div>";
												echo "</center>";
											}
											echo "</div>";
										?>
										</label>
									</div>

							</form>
							</legend>

</body>

</html>
