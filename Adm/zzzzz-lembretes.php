<?php
// validação de email
if(trim($_POST["email"]) === '')  {
$emailError = 'Forgot to enter in your e-mail address.';
$hasError = true;
} else if (!preg_match("/^[[:alnum:]][a-z0-9_.-]*@[a-z0-9.-]+\.[a-z]{2,4}$/i", trim($_POST['email']))) {
$emailError = 'You entered an invalid email address.';
$hasError = true;
} else {
	$email = trim($_POST["email"]);	
	
}
//
 if($emailError != '') { ?>
<br /><span class="error"><?php echo $emailError;?></span>
<?php } 				
				
?>				

index.php

<?php
	include_once("model/dao.php");
	include_once("model/usuario.php");
	include_once("controller/usuario.php");
	include_once("header.php");

	if ($_POST){

		$email =  mysql_real_escape_string($_POST["email"]);
		$senha = mysql_real_escape_string($_POST["senha"]);
		
		if($email == "" && $senha == ""){
			echo '<div id="fechar">
				<div id="ms-war">E-mail e Senha não pode ser nulo, por favor verifique seu digitou corretamente!
				<a href="#" onClick="fechar();">X</a></div>
			</div>';
		}
		else if ($email == ""){
			echo '<div id="fechar">
				<div id="ms-war">E-mail não pode ser nulo, digite seu E-mail para entrar!
				<a href="#" onClick="fechar();">X</a></div>
			</div>';
		}
		else if ($senha == ""){
			echo '<div id="fechar">
				<div id="ms-war">Senha não pode ser nula, digite sua Senha para entrar!
				<a href="#" onClick="fechar();">X</a></div>
			</div>';		}
		else {
			$usuario = new Usuario();
			$login = $usuario->loginUsuario();
			if ($login){
				echo '<div id="fechar">
				<div id="ms-suc">Logou com sucesso, estamos redirecionando!
				<a href="#" onClick="fechar();">X</a></div>
			</div>';			
				echo "<script> location.href='view/painel.php'; </script>";				
			}
			else {
				echo '<div id="fechar">
				<div id="ms-war">E-mail e/ou Senha inválido! Certifique que digitou corretamente!
				<a href="#" onClick="fechar();">X</a></div>
			</div>';
			}
		}
	}

?><head>
	<meta charset="utf-8">
	<title>Teste de login</title>
    <link rel="stylesheet" type="text/css" href="../css/estilo.css">
</head>

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
</div>
<script> 
function fechar(){
document.getElementById('fechar').style.display = 'none';
document.getElementById('fechar').style.display = 'none';
}
</script>