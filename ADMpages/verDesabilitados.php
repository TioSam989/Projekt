<?php session_start(); ?>
<?php
include_once("../connection.php");
$result = mysqli_query($mysqli, "SELECT * FROM login where ativo='Z'");
if( (!isset($_SESSION['validado'])) ){

	header('HTTP/1.0 403 Forbidden');
	header("Location: ../index.php");
	exit;

	if( ($_SESSION['validado'] != 'admin') && ($_SESSION['validado'] != 'ADMIN') ){

		
		header('HTTP/1.0 403 Forbidden');
		header("Location: ../index.php");
		exit;
	}
}

$resultado = mysqli_query($mysqli, "SELECT * FROM login where ativo='Z' ");

if (isset($_POST['procura'])){
	$valor_a_procurar=$_POST['id'];
	$resultado = mysqli_query($mysqli, "SELECT * FROM login where ativo='Z' AND nome like'%".$valor_a_procurar."%' OR email LIKE'%".$valor_a_procurar."%' OR username LIKE'%".$valor_a_procurar."%' OR turma LIKE'%".$valor_a_procurar."%' OR sexo LIKE'%".$valor_a_procurar."%' OR born LIKE'%".$valor_a_procurar."%'  ");
}


function destaca_caracteres($texto) {
	if (isset($_POST['procura'])){

		$caracteres_a_procurar = explode(" ", $_POST['id']);
		$conta_caracteres = count($caracteres_a_procurar);
		
		for($i=0;$i<$conta_caracteres;$i++) {
			$destacar_caracteres = $caracteres_a_procurar[$i];
			$texto = str_ireplace($caracteres_a_procurar[$i], $destacar_caracteres, $texto);
		}

		return $texto;
	}else{
		return $texto;
		
	}
}
?>

<html>
<head>
	<title>./Ver Users</title>
	<link rel="icon" href="../images/iconSpeciala29441.ico">
	<meta charset="UTF-8">
	<link href="../style/adm.css" rel="stylesheet" type="text/css">
	<script src="../script/SweetAlert.js"></script> 
	<link href="../style/ADMgeneral.css" rel="stylesheet" type="text/css">
	<link href="../style/general.css" rel="stylesheet" type="text/css">
	<link href="../style/navbar.css" rel="stylesheet" type="text/css">
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script type="text/javascript">(function() {var css = document.createElement('link');css.href = 'https://use.fontawesome.com/releases/v5.1.0/css/all.css';css.rel = 'stylesheet';css.type = 'text/css';document.getElementsByTagName('head')[0].appendChild(css);})();</script>
	<script src="../script/sweetAlert.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
</head>
<body>

    
<?php
	include("../pages/headerUSERS.html");
?>
	<div class="login">
        <form action="#" method="POST" class="login-form">
            <div class="form-input-material">

			<center><h2>Novos usuarios</h2></center>

                
                <div class='row'>
					<i class="fas fa-search fa-2x" style="padding:2%;" ></i>
					<input type="text" name="id" autofocus="on" class="Tinput" placeholder="Insira uma palavra-chave"/>
                	<input type="submit" name="procura" id="bruh" value="procurar">
				</div>
                
                <?php
            $linha = mysqli_fetch_assoc($resultado);
            if(is_array($linha) && !empty($linha)){
                
                while($linha) {	
                    $meh = $linha['username'];	
					
				echo "<div class='row meh'>";
				echo "<div class='row moh'>";
				echo "<div class='cow'>";
				echo "<a href='../pages/profile.php?username=".$linha['username']."'>";
				echo "<div onclick='redirect(1)' class='container'>";
				echo "<img  src='../images/".($linha['ficheiro_nome'])."'>";
				echo "<label>teste</label>";
				echo "</div>";
				echo "</div>";
				echo "</div>";
				
				echo "<div class='row moh'>";
				echo "<div class='cow'>";
				echo "<label>Nome";
				echo "<input type='text' value='".destaca_caracteres($linha['nome'])."' class='Tinput' disabled>";
				echo "</label>";
				echo "</div>";
				echo "</div>";
				
				echo "<div class='row moh'>";
				echo "<div class='cow'>";
				echo "<label>Email";
				echo "<input type='text' value='".destaca_caracteres($linha['email'])."' class='Tinput' disabled>";
				echo "</label>";
				echo "</div>";
				echo "</div>";
				
				echo "<div class='row moh'>";
				echo "<div class='cow'>";
				echo "<label>Username";
				echo "<input type='text' value='".destaca_caracteres($linha['username'])."' class='Tinput' disabled>";
				echo "</label>";
				echo "</div>";
				echo "</div>";
				
				echo "<div class='row moh'>";
				echo "<div class='cow'>";
				echo "<label>Nascimento";
				echo "<input type='text' value='".destaca_caracteres($linha['born'])."' class='Tinput' disabled>";
				echo "</label>";
				echo "</div>";
				echo "</div>";
				
				echo "<div class='row moh'>";
				echo "<div class='cow'>";
				echo "<label>Sexo";
				echo "<input type='text' value='".destaca_caracteres($linha['sexo'])."' class='Tinput' disabled>";
				echo "</label>";
				echo "</div>";
				echo "</div>";
				
				echo "<div class='row moh'>";
				echo "<div class='cow'>";
				echo "<label>ativo";
				$id=$linha['idLogin'];
				if ((utf8_decode($linha['ativo'])=='N') || (utf8_decode($linha['ativo'])=='Z')){
					echo "<div class='row'><input type='text' class='Tinput' disabled value='N'><br><button>"."<a class='activate' href=\"ativar.php?id=$id\" onClick=\"return confirm('Tem a certeza que quer ativar esse usuario ?')\">ativar</a>"."</button></div>";	
				}else{
					echo "<div class='row'><input type='text' class='Tinput' disabled value='".utf8_encode($linha['ativo'])."'>"."<br><button>"."<a class='deactivate' href=\"desativar.php?id=$id\" onClick=\"return confirm('Tem a certeza que quer desativar esse usuario ?')\">desativar</a>"."</button></div>";	
				}
				echo "</label>";
				echo "</a>";

				echo "</div>";
				echo "</div>";
				
				echo "</div>";

                $linha = mysqli_fetch_assoc($resultado);
				// echo "<hr class='hr3' />";

			}
			
		}else{
			echo "<center>";
			echo "<div class='row'>Nenhum usuario</div>";
			echo "</center>";
		}
			
			?>
		</div>
		</form>
		</div>

</center>
</body>
</html>











