
<html id="html">
<head>
	<title>./login</title>
	<link rel="icon" href="../images/iconSpeciala29441.ico">
	<meta charset="UTF-8">
	<link href="../style/general.css" rel="stylesheet" type="text/css">
	<link href="../style/login.css" rel="stylesheet" type="text/css">
	<link href="../style/navbar.css" rel="stylesheet" type="text/css">
	<script src="../script/SweetAlert.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script><!--isso aqui é para pegar os estilos do SWEETALERTJS-->
	<script type="text/javascript"> (function() { var css = document.createElement('link'); css.href = 'https://use.fontawesome.com/releases/v5.1.0/css/all.css'; css.rel = 'stylesheet'; css.type = 'text/css'; document.getElementsByTagName('head')[0].appendChild(css); })(); </script> <!---- metodo de usar fonts awesome mais rapido -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
</head>

<body>
	
<ul class="ULline" id="NavBarUL">
		<li class="LIelement" ><a href="../index.php" id="NavBarLI"><i class="fas fa-arrow-left" style="padding-right: 1rem;"  ></i>voltar</a></li>
</ul>

<script>

	function ThemeChange(){
		console.log("entrei na funciton");

		if(document.getElementById('form').classList.contains('light')){

			console.log("vou deixar colorido");
			document.getElementById('form').classList.remove('light'); //remova o "text" 
			document.getElementById('html').classList.remove('lightHTML'); //remova o "text" 
			document.getElementById('NavBarUL').classList.remove('light'); //remova o "text" 
			document.getElementById('NavBarLI').classList.remove('light'); //remova o "text" 


		}else{
			console.log("vou deixar claro");
			document.getElementById('form').classList.add('light');// e coloque "-visible" ficando class="-visible"
			document.getElementById('html').classList.add('lightHTML'); //remova o "text" 
			document.getElementById('NavBarUL').classList.add('light'); //remova o "text" 
			document.getElementById('NavBarLI').classList.add('light'); //remova o "text" 
		}
	}

</script>

<style>
	.light{
		color: none;
		color:#001833 !important;
		background-color:#FFFFFF;
	}
	.lightHTML{
		background: none;
		background-color:#e2dede ;
	}

</style>

<!-- ************************************************************************************* -->
<button onclick="ThemeChange()" >Theme</button>
<!-- ************************************************************************************* -->

<div class="login">
<form class="login-form" method="post" id="form" name="form" action="">
	<h1 >Login</h1>
  	
	<div class="form-input-material">
    	<label for="username">Username<i class="fas fa-question-circle fa-xs" title="Preencha com username criado no cadastro"></i></label><br>
		<input type="text" name="username" autofocus="on" id="username" class="Tinput" required>
  	</div>
  	
	<div class="form-input-material">
    	<label for="password" >Password<i class="fas fa-question-circle fa-xs" title="Preencha com sua senha"></i></label><br>
		<input type="password" name="password" id="password" class="Tinput" required>
  	</div>
			<a  id="child"   href="../pages/recoverPass.php">esqueceu a senha ?</a>
  	
	<button type="submit" name="submit" id="submit" class="submit"> <i style="padding-left:unset" class="fas fa-check fa-lg"></i> </button>

	<a href="./registrar.php">Não possui conta ? cadastra-se já</a>
</form>
</div>
</body>
</html>
