<?php
	//inclusão das classes
	include_once("../model/dao.php");
	include_once("../model/pessoas.php");
	include_once("../controller/pessoas.php");
	include_once("header2.php");
	
	$pessoa = new Pessoa();	
	
    //Verifica se foi passado algum tipo de Ação tanto por $_POST ou por $_GET
	$acao = (isset($_POST["acao"])) ? $_POST["acao"] : ((isset($_GET["acao"])) ? $_GET["acao"] : "");	
	
	//Verifica se foi passado algum código como parametro na URL
	$codigo = (isset($_GET["codigo"])) ? $_GET["codigo"] : 0;	
	
	//Verifica se foi passado algum código, ou seja, se deseja visualizar
	//um registro ou apenas abrir o formulário em branco.
	if ($codigo > 0) {
		
		$pessoa->buscar($codigo);	
	}		
	
	//Verifica se realmente foi passada alguma ação
	if ($acao != "") {
			
		if ($acao == "incluir") { //Se a ação solicitada foi a inclusão
			
			if ($pessoa->incluir()) { //Verifica se o comando de inclusão foi executado corretamente
				
				echo "<script>alert('Cadastrado com Sucesso!');</script>";
				echo "<script>window.location = 'home.php';</script>";				
			} else {			
				echo "<script>alert('Erro ao cadastrar!')</script>";
			}				
		
		} elseif ($acao == "alterar") {  //Se a ação solicitada foi a alteração
			
			if ($pessoa->alterar()) {  //Verifica se o comando de alteração foi executado corretamente
				
				echo "<script>alert('Alterado com Sucesso!')</script>";
				echo "<script>window.location = 'home.php';</script>";
			} else {
			
				echo "<script>alert('Erro ao alterar!')</script>";
			}			
		
		} elseif ($acao == "excluir") { //Se a ação selecionada for exclusão
		
			$retorno = $pessoa->excluir($codigo);
			
			if ($retorno) {  //Verifica se o comando de exclusão foi executado corretamente
				
				echo "<script>alert('Excluído com Sucesso!')</script>";
				echo "<script>window.location = 'home.php';</script>";
			} else {
			
				echo "<script>alert('Erro ao excluir!')</script>";
			}			
		}
	}
?><head>
	<title></title>
         <script type="text/javascript" src="../js/jquery.js"></script>
     <script type="text/javascript" src="../js/masked.js"></script>
     <script type="text/javascript" src="../js/jquery-validate.js"></script>
     <link rel="stylesheet" type="text/css" href="css/estilo.css"/>       
</head>
    <form name="form_pessoas" id="form_pessoas" method="post" action="pessoas.php" enctype="multipart/form-data" onsubmit="document.forms[0].campo.value=''">
    	<input type="hidden" name="acao" id="acao" value="<?php echo ($codigo > 0) ? "alterar" : "incluir" ?>" />        
        <input type="hidden" name="id" id="id" value="<?php echo $pessoa->getId() ?>" />		
        
        <div class="campo-form">
        	<input type="text" name="nome" id="nome" value="<?php echo $pessoa->getNome()?>" placeholder="Nome"/>        
        </div>                
        <div class="campo-form" style="width:242px;">
        <input type="text" name="rg" id="rg" value="<?php echo $pessoa->getRg()?>" placeholder="RG" />
        </div>
        <div class="campo-form" style="width:242px;margin-left:12px;">
        	<input type="text" name="cpf" id="verificaCPF" value="<?php echo $pessoa->getCpf()?>"placeholder="CPF" />
        </div>
        <select name="sexo" id="selected">        	        	
            <option value="F" selected="selected:<?php echo $pessoa->getSexo()?>">Feminino</option>
            <option value="M" selected="selected:<?php echo $pessoa->getSexo()?>">Masculino</option>
            <option value="A" selected="selected">Selecione</option>
        </select>         
       
        <div class="campo-form" style="width:303px; margin-left:15px;">
        <input type="text" name="dataNascimento" id="dataNascimento" value="<?php echo $pessoa->getDataNascimento() ?>" placeholder="Data Nascimento" />
        </div>                
        <div class="campo-form" style="width:242px;">
        <input type="text" name="telefone" id="telefone" value="<?php echo $pessoa->getTelefone()?>" placeholder="Telefone" />
        </div>        
        <div class="campo-form" style="width:242px; margin-left:12px;">
        <input type="text" name="celular" id="celular" value="<?php echo $pessoa->getCelular()?>" placeholder="Celular"/>
        </div>        
        <div class="campo-form" style="width:383px;">
        <input type="text" name="endereco" id="endereco" value="<?php echo $pessoa->getEndereco()?>" placeholder=" Endereco"/>
        </div>        
        <div class="campo-form" style="width:100px; margin-left:12px;">
        <input type="text" name="numero" id="numero" value="<?php echo $pessoa->getNumero() ?>" placeholder="Numero"/>
        </div>        
        <div class="campo-form" style="width:363px;">
       	  <input type="text" name="bairro" id="bairro" value="<?php echo $pessoa->getBairro()?>" placeholder="Bairro"/>       
        </div>        
        <div class="campo-form" style="width:120px; margin-left:12px;">
        	 <input type="text" name="complemento" id="complemento" value="<?php echo $pessoa->getComplemento()?>" placeholder="Complemento"/>
        </div>        
        <div class="campo-form" style="width:242px;">
        <input type="text" name="cep" id="cep" value="<?php echo $pessoa->getCep()?>"placeholder="Cep"/>
        </div>        
        <div class="campo-form" style="width:242px; margin-left:12px;">
        <input type="text" name="cidade" id="cidade" value="<?php echo $pessoa->getCidade()?>"placeholder="Cidade"/>
        </div>        
        <select name="estado" id="selected">        	
        	<option value="AC" selected="selected:<?php echo $pessoa->getEstado()?>">Acre</option>
            <option value="AL" selected="selected:<?php echo $pessoa->getEstado()?>">Alagoas</option>
            <option value="AP" selected="selected:<?php echo $pessoa->getEstado()?>">Amapá</option>
            <option value="AM" selected="selected:<?php echo $pessoa->getEstado()?>">Amazonas</option>
            <option value="BA" selected="selected:<?php echo $pessoa->getEstado()?>">Bahia</option>
            <option value="CE" selected="selected:<?php echo $pessoa->getEstado()?>">Ceará</option>
            <option value="DF" selected="selected:<?php echo $pessoa->getEstado()?>">Distrito Federal</option>
            <option value="ES" selected="selected:<?php echo $pessoa->getEstado()?>">Espírito Santo</option>
            <option value="GO" selected="selected:<?php echo $pessoa->getEstado()?>">Goiás</option>
            <option value="MA" selected="selected:<?php echo $pessoa->getEstado()?>">Maranhão</option>
            <option value="MT" selected="selected:<?php echo $pessoa->getEstado()?>">Mato Grosso</option>
            <option value="MS" selected="selected:<?php echo $pessoa->getEstado()?>">Mato Grosso Do SUL</option>
            <option value="MG" selected="selected:<?php echo $pessoa->getEstado()?>">Minas Gerais</option>
            <option value="PA" selected="selected:<?php echo $pessoa->getEstado()?>">Pará</option>
            <option value="PB" selected="selected:<?php echo $pessoa->getEstado()?>">Paraíba</option>
            <option value="PR" selected="selected:<?php echo $pessoa->getEstado()?>">Paraná</option>
            <option value="PE" selected="selected:<?php echo $pessoa->getEstado()?>">Pernambuco</option>
            <option value="PI" selected="selected:<?php echo $pessoa->getEstado()?>">Piauí</option>
            <option value="RJ" selected="selected:<?php echo $pessoa->getEstado()?>">Rio de Janeiro</option>
            <option value="RN" selected="selected:<?php echo $pessoa->getEstado()?>">Rio Grande do Norte</option>
            <option value="RS" selected="selected:<?php echo $pessoa->getEstado()?>">Rio Grande do Sul</option>
            <option value="RO" selected="selected:<?php echo $pessoa->getEstado()?>">Rondônia</option>
            <option value="RR" selected="selected:<?php echo $pessoa->getEstado()?>">Roraima</option>
            <option value="SC" selected="selected:<?php echo $pessoa->getEstado()?>">Santa Catarina</option>
            <option value="SP" selected="selected:<?php echo $pessoa->getEstado()?>">São Paulo</option>
            <option value="SE" selected="selected:<?php echo $pessoa->getEstado()?>">Sergipe</option>
            <option value="TO" selected="selected:<?php echo $pessoa->getEstado()?>">Tocantins</option>
            <option value="0" selected="selected">Selecione</option>
        </select>  
        
        <div class="campo-form" style="margin-left:10px; width:307px;">
        <input type="text" name="email" id="email" value="<?php echo $pessoa->getEmail()?>" placeholder="E-mail" />       
        </div>
        <div class="campo-form" style="width:242px;">        
        <input type="password" name="senha" id="senha" value="<?php echo $pessoa->getSenha()?>" placeholder="Senha"  onKeyUp="passwordStrength(this.value)" />
        </div> 
         <div class="campo-form" style="margin-left:10px; width:242px;">
			<div id="senha-desc">Senha não Digitada</div>
			<div id="passwordStrength" class="strength0"></div>
		</div>     
        <input type="hidden" name="status" id="status_ativo" value="A" <?php if ($pessoa->getStatus() == "A")  ?> />		
        <input type="submit" name="gravar" id="gravar" value="Gravar Dados" class="botao"/>
        
    </form>

<script>
jQuery(function($){
   $("#dataNascimento").mask("99/99/9999");
   $("#telefone").mask("(99) 9999-9999");
   $("#celular").mask("(99) 99999-9999");
   $("#cep").mask("99999-999");
   $("#verificaCPF").mask("999.999.999-99");
   $("#rg").mask("99.999.999-9");
});

  jQuery.validator.addMethod("verificaCPF", function(value, element) {
	  value = value.replace('.','');
	  value = value.replace('.','');
	  cpf = value.replace('-','');
	  while(cpf.length < 11) cpf = "0"+ cpf;
	  var expReg = /^0+$|^1+$|^2+$|^3+$|^4+$|^5+$|^6+$|^7+$|^8+$|^9+$/;
	  var a = [];
	  var b = new Number;
	  var c = 11;
	  for (i=0; i<11; i++){
		  a[i] = cpf.charAt(i);
		  if (i < 9) b += (a[i] * --c);
	  }
	  if ((x = b % 11) < 2) { a[9] = 0 } else { a[9] = 11-x }
	  b = 0;
	  c = 11;
	  for (y=0; y<10; y++) b += (a[y] * c--);
	  if ((x = b % 11) < 2) { a[10] = 0; } else { a[10] = 11-x; }
	  if ((cpf.charAt(9) != a[9]) || (cpf.charAt(10) != a[10]) || cpf.match(expReg)) return false;
	  return true;
  }, "Informe um CPF válido."); // Mensagem padrão

  $(document).ready(function(){				
	$("#form_pessoas").validate({				   
		rules:{
		cpf:{required: true, verificaCPF: true}
		},		
		messages:{
		cpf:{required: "Digite seu cpf", verificaCPF: "CPF inválido"},
		},						   
	});		
  });
 function passwordStrength(password)
{
	var desc = new Array();
	desc[0] = "Muito Fraca";
	desc[1] = "Fraca";
	desc[2] = "Boa";
	desc[3] = "Média";
	desc[4] = "Forte";
	desc[5] = "Muito Forte";
	var score   = 0;
	//se a senha maior do que 6 dão 1 ponto
	if (password.length > 6) score++;
	//se a senha tem tanto caracteres maiúsculos e minúsculos dar 1 ponto	
	if ( ( password.match(/[a-z]/) ) && ( password.match(/[A-Z]/) ) ) score++;
	//se a senha tem pelo menos um número de dar 1 ponto
	if (password.match(/\d+/)) score++;
	//se a senha tenha pelo menos um caracther especial dar 1 ponto
	if ( password.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/) )	score++;
	//se a senha maior que 12 dar outro 1 ponto
	if (password.length > 10) score++;
	 document.getElementById("senha-desc").innerHTML = desc[score];
	 document.getElementById("passwordStrength").className = "strength" + score;
}

</script>