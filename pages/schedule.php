<?php include_once("../connection.php"); ?>
<?php session_start(); ?>

<html id="html">
	<head>
		<title>./testes HTML</title>
		<link rel="icon" href="../images/iconSpeciala29441.ico">
		<meta charset="UTF-8">
		<link href="../style/general.css" rel="stylesheet" type="text/css">
		<script src="../script/SweetAlert.js"></script>
		<script src="../script/general.js"></script>
		<link href="../style/registrar.css" rel="stylesheet" type="text/css"><!---Pegar estilo próprio dapágina Registrar--->
		<link href="../style/navbar.css" rel="stylesheet" type="text/css"> <!---Pegar estilo da NavBar--->
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script><!--isso aqui é para pegar os estilos do SWEETALERTJS-->
		<script type="text/javascript"> (function() { var css = document.createElement('link'); css.href = 'https://use.fontawesome.com/releases/v5.1.0/css/all.css'; css.rel = 'stylesheet'; css.type = 'text/css'; document.getElementsByTagName('head')[0].appendChild(css); })(); </script> <!---- metodo de usar fonts awesome mais rapido -->
	</head>
	
<body>
	
<?php
	include("../pages/headerPERSONAL.html");
?>

<?php
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

	if($_SESSION['validado']){
		
		$teste = $_SESSION['validado'];
		
		$turma = mysqli_query($mysqli , "SELECT turma FROM login WHERE username='$teste'");
		$resTurma = mysqli_fetch_array($turma);
        
		$res1 = $resTurma['turma'];
		$dadosTurma = mysqli_query($mysqli , "SELECT id_Turma FROM turma WHERE sigla_turma='$res1'");
		$resDadosTurma = mysqli_fetch_array($dadosTurma);
        
		$res2 = $resDadosTurma['id_Turma'];
		$result = mysqli_query($mysqli , "SELECT * FROM schedule WHERE id_Turma='$res2' ");
        
		if(!empty($res = mysqli_fetch_array($result))){
            
?>

                                        <?php
                                        
                                        $mah =  mysqli_query($mysqli , "SELECT * FROM schedule WHERE id_Turma='$res2' AND weekDay='MONDAY' ");
                                        $meh =  mysqli_query($mysqli , "SELECT * FROM schedule WHERE id_Turma='$res2' AND weekDay='TUESDAY' ");
                                        $mih =  mysqli_query($mysqli , "SELECT * FROM schedule WHERE id_Turma='$res2' AND weekDay='WEDNESDAY' ");
                                        $moh =  mysqli_query($mysqli , "SELECT * FROM schedule WHERE id_Turma='$res2' AND weekDay='THURSDAY' ");
                                        $muh =  mysqli_query($mysqli , "SELECT * FROM schedule WHERE id_Turma='$res2' AND weekDay='FRIDAY' ");
            
                                        $seg = mysqli_fetch_array($mah);
                                        $ter = mysqli_fetch_array($meh);
                                        $qua = mysqli_fetch_array($mih);
                                        $qui = mysqli_fetch_array($moh);
                                        $sex = mysqli_fetch_array($muh);

                                        $diasDaSemana = ["seg","ter","qua","qui","sex"]; 

            
            
                                        ?>
<div class="login">

	<form class="login-form" enctype="multipart/form-data" method="post" action="" id="opacity" style="margin-top:1%" >
		<legend>
			<div class="form-input-material" style="padding:0%">
				<div style="text-align: center;margin-left: auto;margin-right: auto">
					<h1>Cronograma</h1>
				</div>
						<div class="row">
							<div class="col dia vermelho" style="margin-left:1rem;">
								<span>Segunda-Feira</span>
							</div>
							<div class="col dia azul">
								<span>Terça-Feira</span>
							</div>
							<div class="col dia verde">
								<span>Quarta-Feira</span>
							</div>
							<div class="col dia rosa">
								<span>Quinta-Feira</span>
							</div>
							<div class="col dia roxo">
								<span>Sexta-Feira</span>
							</div>
						</div>
					<div style="overflow-y:auto; height:28rem; border-radius:3%;resize:vertical;max-height:1010px;min-height:450px;">

					<div class="row">

						<?php
                        
                            $idColuna = ['A','B','C','D','E'];
                            for ($i=0; $i < 5; $i++) { 
                             
                                
                                ?>
                                <div class="col" id="<?php echo current($idColuna) ?>" style="padding:1rem">

<input type="text" value="8:15 - 9:15" class="Tinput hour " style="margin:0px;" disabled >
<div class="row day" >
    <h2 class="NameM">
    <?php
    

    $day = current($diasDaSemana);
    

    if(current($diasDaSemana) == "seg"){
        $day = $seg['1'];
    }else if(current($diasDaSemana) == "ter"){
        $day = $ter['1'];
    }else if(current($diasDaSemana) == "qua"){
        $day = $qua['1'];
    }else if(current($diasDaSemana) == "qui"){
        $day = $qui['1'];
    }else if(current($diasDaSemana) == "sex"){
        $day = $sex['1'];
    }

    $size = count(explode(" ", $day));

    if($day == ""){
        echo " - ";
    }else if($day == "LUNCH"){
        $icon = '<i style="color:yellow" class="fas fa-utensils"></i>';
        echo $icon;
    }else{
        
        if($size > 1){
            
            $day = explode(" ", $day);
            for ($index=0; $index < $size; $index++) { 
                if($index==$size-1){
                    echo $day["$index"];
                }else{
                    echo $day["$index"].'<span style="color:blue"> / </span>';
                }
            }
        }else{
            echo $day;
        }
    }
    ?>
    </h2>
    <span class="bola green"></span>
</div>

<input type="text" value="9:20 - 10:20" class="Tinput hour " style="margin:0px" disabled>
<div class="row day">
<h2 class="NameM">
    <?php
    

    $day = current($diasDaSemana);
    

    if(current($diasDaSemana) == "seg"){
        $day = $seg['2'];
    }else if(current($diasDaSemana) == "ter"){
        $day = $ter['2'];
    }else if(current($diasDaSemana) == "qua"){
        $day = $qua['2'];
    }else if(current($diasDaSemana) == "qui"){
        $day = $qui['2'];
    }else if(current($diasDaSemana) == "sex"){
        $day = $sex['2'];
    }

    $size = count(explode(" ", $day));

    if($day == ""){
        echo " - ";
    }else if($day == "LUNCH"){
        $icon = '<i style="color:yellow" class="fas fa-utensils"></i>';
        echo $icon;
    }else{
        
        if($size > 1){
            
            $day = explode(" ", $day);
            for ($index=0; $index < $size; $index++) { 
                if($index==$size-1){
                    echo $day["$index"];
                }else{
                    echo $day["$index"].'<span style="color:blue"> / </span>';
                }
            }
        }else{
            echo $day;
        }
    }
    ?>
    </h2>
    <span class="bola green"></span>

</div>
<input type="text" value="10:30 - 11:30" class="Tinput hour " style="margin:0px" disabled>

<div class="row day">
<h2 class="NameM">
    <?php
    

    $day = current($diasDaSemana);
    

    if(current($diasDaSemana) == "seg"){
        $day = $seg['3'];
    }else if(current($diasDaSemana) == "ter"){
        $day = $ter['3'];
    }else if(current($diasDaSemana) == "qua"){
        $day = $qua['3'];
    }else if(current($diasDaSemana) == "qui"){
        $day = $qui['3'];
    }else if(current($diasDaSemana) == "sex"){
        $day = $sex['3'];
    }

    $size = count(explode(" ", $day));

    if($day == ""){
        echo " - ";
    }else if($day == "LUNCH"){
        $icon = '<i style="color:yellow" class="fas fa-utensils"></i>';
        echo $icon;
    }else{
        
        if($size > 1){
            
            $day = explode(" ", $day);
            for ($index=0; $index < $size; $index++) { 
                if($index==$size-1){
                    echo $day["$index"];
                }else{
                    echo $day["$index"].'<span style="color:blue"> / </span>';
                }
            }
        }else{
            echo $day;
        }
    }
    ?>
    </h2>
    <span class="bola green"></span>

</div>
<input type="text" value="11:35 - 12:35" class="Tinput hour " style="margin:0px" disabled>

<div class="row day" >
<h2 class="NameM">
    <?php
    

    $day = current($diasDaSemana);
    

    if(current($diasDaSemana) == "seg"){
        $day = $seg['4'];
    }else if(current($diasDaSemana) == "ter"){
        $day = $ter['4'];
    }else if(current($diasDaSemana) == "qua"){
        $day = $qua['4'];
    }else if(current($diasDaSemana) == "qui"){
        $day = $qui['4'];
    }else if(current($diasDaSemana) == "sex"){
        $day = $sex['4'];
    }

    $size = count(explode(" ", $day));

    if($day == ""){
        echo " - ";
    }else if($day == "LUNCH"){
        $icon = '<i style="color:yellow" class="fas fa-utensils"></i>';
        echo $icon;
    }else{
        
        if($size > 1){
            
            $day = explode(" ", $day);
            for ($index=0; $index < $size; $index++) { 
                if($index==$size-1){
                    echo $day["$index"];
                }else{
                    echo $day["$index"].'<span style="color:blue"> / </span>';
                }
            }
        }else{
            echo $day;
        }
    }
    ?>
    </h2>
    <span class="bola green"></span>

</div>
<input type="text" value="12:45 - 13:45" class="Tinput hour " style="margin:0px" disabled>

<div class="row day">
<h2 class="NameM">
    <?php
    

    $day = current($diasDaSemana);
    

    if(current($diasDaSemana) == "seg"){
        $day = $seg['5'];
    }else if(current($diasDaSemana) == "ter"){
        $day = $ter['5'];
    }else if(current($diasDaSemana) == "qua"){
        $day = $qua['5'];
    }else if(current($diasDaSemana) == "qui"){
        $day = $qui['5'];
    }else if(current($diasDaSemana) == "sex"){
        $day = $sex['5'];
    }

    $size = count(explode(" ", $day));

    if($day == ""){
        echo " - ";
    }else if($day == "LUNCH"){
        $icon = '<i style="color:yellow" class="fas fa-utensils"></i>';
        echo $icon;
    }else{
        
        if($size > 1){
            
            $day = explode(" ", $day);
            for ($index=0; $index < $size; $index++) { 
                if($index==$size-1){
                    echo $day["$index"];
                }else{
                    echo $day["$index"].'<span style="color:blue"> / </span>';
                }
            }
        }else{
            echo $day;
        }
    }
    ?>
    </h2>    <span class="bola green"></span>

</div>
<input type="text" value="13:50 - 14:50" class="Tinput hour " style="margin:0px" disabled>

<div class="row day">
<h2 class="NameM">
    <?php
    

    $day = current($diasDaSemana);
    

    if(current($diasDaSemana) == "seg"){
        $day = $seg['6'];
    }else if(current($diasDaSemana) == "ter"){
        $day = $ter['6'];
    }else if(current($diasDaSemana) == "qua"){
        $day = $qua['6'];
    }else if(current($diasDaSemana) == "qui"){
        $day = $qui['6'];
    }else if(current($diasDaSemana) == "sex"){
        $day = $sex['6'];
    }

    $size = count(explode(" ", $day));

    if($day == ""){
        echo " - ";
    }else if($day == "LUNCH"){
        $icon = '<i style="color:yellow" class="fas fa-utensils"></i>';
        echo $icon;
    }else{
        
        if($size > 1){
            
            $day = explode(" ", $day);
            for ($index=0; $index < $size; $index++) { 
                if($index==$size-1){
                    echo $day["$index"];
                }else{
                    echo $day["$index"].'<span style="color:blue"> / </span>';
                }
            }
        }else{
            echo $day;
        }
    }
    ?>
    </h2>
    <span class="bola green"></span>

</div>
<input type="text" value="15:00 - 16:00" class="Tinput hour " style="margin:0px" disabled>

<div class="row day">
<h2 class="NameM">
    <?php
    

    $day = current($diasDaSemana);
    

    if(current($diasDaSemana) == "seg"){
        $day = $seg['7'];
    }else if(current($diasDaSemana) == "ter"){
        $day = $ter['7'];
    }else if(current($diasDaSemana) == "qua"){
        $day = $qua['7'];
    }else if(current($diasDaSemana) == "qui"){
        $day = $qui['7'];
    }else if(current($diasDaSemana) == "sex"){
        $day = $sex['7'];
    }

    $size = count(explode(" ", $day));

    if($day == ""){
        echo " - ";
    }else if($day == "LUNCH"){
        $icon = '<i style="color:yellow" class="fas fa-utensils"></i>';
        echo $icon;
    }else{
        
        if($size > 1){
            
            $day = explode(" ", $day);
            for ($index=0; $index < $size; $index++) { 
                if($index==$size-1){
                    echo $day["$index"];
                }else{
                    echo $day["$index"].'<span style="color:blue"> / </span>';
                }
            }
        }else{
            echo $day;
        }
    }
    ?>
    </h2>
    <span class="bola green"></span>

</div>
<input type="text" value="16:05 - 17:00" class="Tinput hour " style="margin:0px" disabled>

<div class="row day">
<h2 class="NameM">
    <?php
    

    $day = current($diasDaSemana);
    

    if(current($diasDaSemana) == "seg"){
        $day = $seg['8'];
    }else if(current($diasDaSemana) == "ter"){
        $day = $ter['8'];
    }else if(current($diasDaSemana) == "qua"){
        $day = $qua['8'];
    }else if(current($diasDaSemana) == "qui"){
        $day = $qui['8'];
    }else if(current($diasDaSemana) == "sex"){
        $day = $sex['8'];
    }

    $size = count(explode(" ", $day));

    if($day == ""){
        echo " - ";
    }else if($day == "LUNCH"){
        $icon = '<i style="color:yellow" class="fas fa-utensils"></i>';
        echo $icon;
    }else{
        
        if($size > 1){
            
            $day = explode(" ", $day);
            for ($index=0; $index < $size; $index++) { 
                if($index==$size-1){
                    echo $day["$index"];
                }else{
                    echo $day["$index"].'<span style="color:blue"> / </span>';
                }
            }
        }else{
            echo $day;
        }
    }
    ?>
    </h2>
    <span class="bola green"></span>

</div>
</div>
                                <?php
            next($idColuna);
            next($diasDaSemana);

                            }

                        ?>
									</div>
										
									</div>
						
								</div>
								
								<div class="row legendaCat" style="  display: flex;align-self: flex-end;" >
									<div class="rol cadaLeg">
										<span class="bola green"></span>
										<span>Havera aula</span>
									</div>
									<div class="rol cadaLeg">
										<span class="bola yellow"></span>
										<span>Aula adiada</span>
									</div>
									<div class="rol cadaLeg">
										<span class="bola red"></span>
										<span>Sem aula</span>
									</div>
									

					
			</form>
	</legend>
	
</div>

<?php 


		}	

	}else{
		header('Location: ../index.php');
	}

}else{
    alert("Não foi possivel conectar a base de dados");
}

?>

</body>
</html>