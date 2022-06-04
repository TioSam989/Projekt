
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

        $teste = $_SESSION['validado'];
        $result = mysqli_query($mysqli , "SELECT username FROM login WHERE username='$teste'");
        
        if(!empty($res = mysqli_fetch_array($result))){
			
			$teste = $_SESSION['validado'];
			$result = mysqli_query($mysqli, "SELECT * FROM login where username='$teste' ");
			$res = mysqli_fetch_array($result);

			?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Testes php</title>
</head>
<body onload="changeImage()">


<ul class="ULline">
				<li class="LIelement"><a href="./meusDados.php"><i class="fas fa-address-card" style="padding-right: 1rem;" ></i>meus dados</a></li>
                <li class="LIelement"><a href="./myClass.php"><i class="fas fa-chalkboard-teacher" style="padding-right: 1rem;" ></i>Turma</a></li>
                <li class="LIelement"><a href="./mensagemUSER.php"><i class="fas fa-comments" style="padding-right: 1rem;" ></i>Mensagens</a></li>
                <li class="LIelement"><a href="../pages/schedule.php"><i class="fas fa-chalkboard" style="padding-right: 1rem;" ></i>cronograma</a></li>
                <li class="LIelement"><a href="../pages/logout.php"><i class="fas fa-sign-out-alt" style="padding-right: 1rem;" ></i>Logout</a></li>
	        </ul>

            <script>
                    const imgs = [''];
                    var clicks = 0;

                    
                    function changeImage() {
                    
                        
                    }   
                    function clicked(){
                        if(clicks>2){
                            clicks = 0;
                        }
                    setTimeout(function(){ document.getElementById("myImg").src = `${imgs[index]}`; }, 3000);
                    document.getElementById("myImg").src = imgs[clicks];
                    clicks++;
                }
            </script>

                <div>
                    <img src="https://www.hypeness.com.br/1/2018/11/PicaPau_horizontal.jpg" onclick="clicked()" id="myImg" style="max-width:800px" height="auto">
                </div>
            
    
</body>
</html>

			<?php
		}else{
	      header('Location: ../index.php');
		}
    
}else{
    alert("Não foi possivel conectar a base de dados");
}
?>