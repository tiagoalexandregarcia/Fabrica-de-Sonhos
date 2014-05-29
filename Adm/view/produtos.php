<?php
	include_once("../model/dao.php");
	include_once("../model/produtos.php");
	include_once("../controller/produtos.php");
	
	$produtos = new Produto();
	
	 //Verifica se foi passado algum tipo de Ação tanto por $_POST ou por $_GET
	$acao = (isset($_POST["acao"])) ? $_POST["acao"] : ((isset($_GET["acao"])) ? $_GET["acao"] : "");	
	
	//Verifica se foi passado algum código como parametro na URL
	$codigo = (isset($_GET["codigo"])) ? $_GET["codigo"] : 0;	
	
	//Verifica se foi passado algum código, ou seja, se deseja visualizar
	//um registro ou apenas abrir o formulário em branco.
	if ($codigo > 0) {
		
		$produtos->buscar($codigo);	
	}	
	
	//Verifica se realmente foi passada alguma ação
	if ($acao != "") {
			
		if ($acao == "incluir") { //Se a ação solicitada foi a inclusão
			
			if ($produtos->incluir()) { //Verifica se o comando de inclusão foi executado corretamente
				
				echo "<script>alert('Cadastrado com Sucesso!');</script>";
				echo "<script>window.location = 'painel.php';</script>";
			} else {
			
				echo "<script>alert('Erro ao cadastrar!')</script>";
			}
				
		
		} elseif ($acao == "alterar") {  //Se a ação solicitada foi a alteração
			
			if ($produtos->alterar()) {  //Verifica se o comando de alteração foi executado corretamente
				
				echo "<script>alert('Alterado com Sucesso!')</script>";
				echo "<script>window.location = 'painel.php';</script>";
			} else {
			
				echo "<script>alert('Erro ao alterar!')</script>";
			}			
		
		} elseif ($acao == "excluir") { //Se a ação selecionada for exclusão
		
			$retorno = $produtos->excluir($codigo);
			
			if ($retorno) {  //Verifica se o comando de exclusão foi executado corretamente
				
				echo "<script>alert('Excluído com Sucesso!')</script>";
				echo "<script>window.location = 'painel.php';</script>";
			} else {
			
				echo "<script>alert('Erro ao excluir!')</script>";
			}			
		}
	}	
?>
<div id="cadProd" class="box_home" style="display:none">
<h1>Cadastro de Produtos</h1>
<form name="form_roupas" method="post" action="produtos.php" enctype="multipart/form-data">
	<input type="hidden" name="acao" id="acao" value="<?php echo ($codigo > 0) ? "alterar" : "incluir" ?>" />
	<fieldset style="width:500px;">
    	<input type="hidden" name="id" id="id" value="<?php echo $produtos->getId();?>"/>
        <label for="tipo">Tipo:</label>
        <input type="text" name="tipo" id="tipo" value="<?php echo $produtos->getTipo();?>"/>
        <br />
        
        <label for="foto">Foto:</label>
        <input type="file" name="foto" id="foto" value="<?php echo $produtos->getFoto();?>"/>
        <br />
        
        <input type="hidden" name="status" id="status" value="<?php echo $produtos->getStatus();?>"/>
        <label for="descricao">Descrição:</label>
        <textarea name="descricao" id="" style="width:300px;"><?php echo $produtos->getDescricao();?></textarea>
    </fieldset>
    <br />
    <input type="submit" name="enviar" value="Gravar" onclick="reset();"/>
</form>
</div>
<script>
document.form_pessoas.reset();
</script>
