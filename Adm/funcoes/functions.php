<?php
	function valEmail($email){
		if(preg_match('/^[a-z0-9_\.\-]+@[a-z0-9_\.\-]*[a-z0-9_\.\-]+\.[a-z]{2,4}$/',$email)){
			return true;
		}else{
			return false;
		}
	}
	/*if(!valEmail('asd@mjiu.com')){
		
		echo 'informe um email válido';
		
	}else{
		echo ' Email válido';
	}*/
	
	function validaCpf($cpf){	
	$cpf = preg_replace('/[^0-9]/','',$cpf);	
	$digitoA = 0;
	$digitoB = 0;	
	for($i = 0,  $x = 10; $i <= 8; $i++, $x--){
		$digitoA += $cpf[$i] * $x;		
	}
	for($i = 0,  $x = 11; $i <= 9; $i++, $x--){
		$digitoB += $cpf[$i] * $x;
		if(str_repeat($i,11) == $cpf){
			return false;
		}		
	}
	// ternário
	// digito A modulo(%) 11 menor que 2 = 0; se não 11 - digitoA%11
	$somaA = (($digitoA%11) <2 ) ? 0 : 11-($digitoA%11);
	$somaB = (($digitoB%11) <2 ) ? 0 : 11-($digitoB%11);		
	if($somaA != $cpf[9] || $somaB != $cpf[10]){		
		echo false;		
	}else{		
		return true;	}
}
if(isset($_POST['cpf']))
{// Adiciona o numero enviado na variavel $cpf_enviado, poderia ser outro nome, e executa a função acima
$cpf_enviado = validaCPF($_POST['cpf']);
// Verifica a resposta da função e exibe na tela
if($cpf_enviado == true)
echo "<script>window.location = '../controller/pessoas.php';</script>";
}else{
echo "CPF FALSO";
}
	
?>