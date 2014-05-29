<?php
	include_once("../model/dao.php");
	include_once("../model/usuario.php");
	include_once("../controller/usuario.php");
	include_once("header2.php");

	if ($_POST){

		$email = $_POST["email"];
		$senha = $_POST["senha"];

		if ($email == ''){

			echo "<script> alert('E-mail não preenchido'); </script>";

		}
		else if ($senha == ""){

			echo "<script> alert('Senha não preenchida'); </script>";
		}
		else {

			$usuario = new Usuario();

			$login = $usuario->loginUsuario();

			if ($login){

				echo "<script> alert('Logou com sucesso!'); </script>";				
				echo "<script> location.href='home.php'; </script>";
				
			}
			else {

				echo "<script> alert('E-mail ou senha inválido!'); </script>";
			}
		}
	}
?><head>
	<title></title>
  	<link rel="stylesheet" type="text/css" href="css/estilo.css"/>
</head>

<div class="foto"></div>
<div class="texto">
	<p>Um pouco de boa vontade e coração, você pode tranformar tristeza no mais puro sorriso! Acredite, doe.</p>
</div>
<div class="field">
	<h1>Fábrica de Sonhos</h1>
    <h2>Entre</h2>
    <form name="form_login" method="post">
        <div class="div-login">
            <input type="text" name="email" placeholder="Entre com seu E-mail"/>
        </div>
        <div class="div-login">
           <input type="password" name="senha" placeholder="Entre com sua Senha" />
        </div>       
        <input type="submit" value="Entre"class="botao" />
    </form>
    <p>__________<span>&nbsp;OU&nbsp;</span>__________ </p><!--/*20*/-->
    <a href="pessoas.php"><div class="cadastre">Cadastre - se</div></a>
    	
   
</div>
 
