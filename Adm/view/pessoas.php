<?php
	//inclusão das classes
	include_once("../model/dao.php");
	include_once("../model/pessoas.php");
	include_once("../controller/pessoas.php");
	
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
				echo "<script>window.location = 'painel.php';</script>";				
			} else {			
				echo "<script>alert('Erro ao cadastrar!')</script>";
			}				
		
		} elseif ($acao == "alterar") {  //Se a ação solicitada foi a alteração
			
			if ($pessoa->alterar()) {  //Verifica se o comando de alteração foi executado corretamente
				
				echo "<script>alert('Alterado com Sucesso!')</script>";
				echo "<script>window.location = 'painel.php';</script>";
			} else {
			
				echo "<script>alert('Erro ao alterar!')</script>";
			}			
		
		} elseif ($acao == "excluir") { //Se a ação selecionada for exclusão
		
			$retorno = $pessoa->excluir($codigo);
			
			if ($retorno) {  //Verifica se o comando de exclusão foi executado corretamente
				
				echo "<script>alert('Excluído com Sucesso!')</script>";
				echo "<script>window.location = 'painel.php';</script>";
			} else {
			
				echo "<script>alert('Erro ao excluir!')</script>";
			}			
		}
	}
?>
<div id="box_cadPessoa" class="box_home" style="display:none">
<h1>Cadastro de Pessoas</h1>
    <form name="form_pessoas" id="form_pessoas" method="post" action="pessoas.php" enctype="multipart/form-data" onsubmit="document.forms[0].campo.value=''">
        <input type="hidden" name="acao" id="acao" value="<?php echo ($codigo > 0) ? "alterar" : "incluir" ?>" />		
    
        
        <input type="hidden" name="id" id="id" value="<?php echo $pessoa->getIdPessoas() ?>" />		
        <p>
        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome" value="<?php echo $pessoa->getNome() ?>" />
        </p>
        <br />       
        
        <label for="sexo">Sexo</label>
        <input type="text" name="sexo" id="sexo" value="<?php echo $pessoa->getSexo() ?>" />
        <br />
        
        <label for="dataNascimento">Data Nascimento</label>
        <input type="text" name="dataNascimento" id="dataNascimento" value="<?php echo $pessoa->getDataNascimento() ?>" />
        <br />
        
        <label for="eamil">Email</label>
        <input type="text" name="email" id="email" value="<?php echo $pessoa->getEmail() ?>" />
       
        <br />
        
        <label for="eamil">Senha</label>
        <input type="password" name="senha" id="senha" value="<?php echo $pessoa->getSenha() ?>" />
        <br />
        
        <label for="telefone">Telefone</label>
        <input type="text" name="telefone" id="telefone" value="<?php echo $pessoa->getTelefone() ?>" />
        <br />
        
        <label for="celular">Celular</label>
        <input type="text" name="celular" id="celular" value="<?php echo $pessoa->getCelular() ?>" />
        <br />
        
        <label for="endereco">Endereco</label>
        <input type="text" name="endereco" id="endereco" value="<?php echo $pessoa->getEndereco() ?>" />
        <br />
        
        <label for="numero">Numero</label>
        <input type="text" name="numero" id="numero" value="<?php echo $pessoa->getNumero() ?>" />
        <br />
        
        <label for="complemento">Complemento</label>
        <input type="text" name="complemento" id="complemento" value="<?php echo $pessoa->getComplemento() ?>" />
        <br />
        
        <label for="bairro">Bairro</label>
        <input type="text" name="bairro" id="bairro" value="<?php echo $pessoa->getBairro() ?>" />
        <br />
        
        <label for="cep">Cep</label>
        <input type="text" name="cep" id="cep" value="<?php echo $pessoa->getCep() ?>" />
        <br />
        
        <label for="cidade">Cidade</label>
        <input type="text" name="cidade" id="cidade" value="<?php echo $pessoa->getCidade() ?>" />
        <br />
        
        <label for="estado">Estado</label>
        <input type="text" name="estado" id="estado" value="<?php echo $pessoa->getEstado() ?>" />
        <br />        
        
        <input type="hidden" name="status" id="status_ativo" value="A" <?php if ($pessoa->getStatus() == "A")  ?> />		
        <input type="submit" name="gravar" id="gravar" value="Gravar Dados" />
        
    </form>
</div>
<script>
jQuery(function($){
   $("#dataNascimento").mask("99/99/9999");
   $("#telefone").mask("(99) 9999-9999");
   $("#celular").mask("(99) 99999-9999");
   $("#cep").mask("99999-999");
});

</script>
<?php
	if (isset($_GET["id_olheiro"]) && $_GET["id_olheiro"]>0) {
?>

         
<script language="javascript" type="text/javascript">

$(document).ready(function() {
    $("#box_Olheiros").slideDown("slow");
});

</script>
<?php
}
?>