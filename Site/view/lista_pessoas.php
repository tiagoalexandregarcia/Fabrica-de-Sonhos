<?php
	//inclusão das classes
	include_once("../model/dao.php");
	include_once("../model/pessoas.php");
	include_once("../controller/pessoas.php");
		
	/**
	 * Cria um novo objeto da classe da Pessoas
	 * (localizada em => controller/pessoas.php)
	 *
	 */
	$pessoa = new Pessoa();
	
	/**	
	 * Solicita a Coleção de Dados à classe e armazena na variável: $lista_de_pessoas
	 * Neste momento todos dados da tabela estão relacionados dentro da variável.
	 *
	 */
	$lista_de_pessoas = $pessoa->listarTodos();
?>
<html>
<head>
	<title>Listagem de Pessoas</title>
   <link rel="stylesheet" type="text/css" href="../css/estilo.css">
</head>
<div id="lPessoa" style="display:none">
	<table border="1" width="" align="left">
	<tr>
		<td>CODIGO</td>
		<td>NOME</td>
        <td>CPF</td>
        <td>RG</td>
        <td>SEXO</td>
        <td>DATA-NASCIMENTO</td>
        <td>EMAIL</td>
        <td>SENHA</td>
        <td>TELEFONE</td>
        <td>CELULAR</td>
        <td>ENDERECO</td>
        <td>NUMERO</td>
        <td>COMPLEMENTO</td>
        <td>BAIRRO</td>
        <td>CEP</td>
        <td>CIDADE</td>
        <td>ESTADO</td>
		<td>STATUS</td>
        <td>AÇÃO</td>
	</tr>
	<?php
		/**
		 * O comando mysql_num_rows é uma função do PHP para MySQL
		 * Esta função retorna um número inteiro com o total de registros
		 * relacionados em nossa coleção de dados.
		 * Link relacionado: http://www.php.net/manual/pt_BR/ref.mysql.php
		 *
		 */
		if (mysql_num_rows($lista_de_pessoas) <= 0) {	
	?>
	<tr>
		<td colspan="4">Nenhum registro encontrado</td>
	</tr>
	<?php
		} else {
			
			/**
			 * O comando mysql_fetch_assoc é uma função do PHP para MySQL
			 * Esta função converte cada linha da nossa coleção de dados em um 
			 * Array Associativo e posiciona o cursor na próxima linha
			 * até chegar na última linha da coleção de dados indicada.
			 * Link relacionado: http://php.net/manual/pt_BR/language.types.array.php
			 *
			 */
			while ($array_pessoas = mysql_fetch_assoc($lista_de_pessoas)) {
			
				/**
				 * Neste momento a variável $array_pessoas foi convertida em um array associativo
				 * onde seus indices são os nomes das colunas indicadas no SELECT criado na 
				 * classe PessoaModel.				 
				 *
				 */
	?>	
	<tr>
		<td>        	
            <a href="painel.php?codigo=<?php echo $array_pessoas["id"] ?>">
				<?php echo $array_pessoas["id"] ?>
            </a>
        </td>
		<td>			
			<?php echo utf8_encode($array_pessoas["nome"])?>			
		</td>   
        <td>			
			<?php echo utf8_encode($array_pessoas["cpf"])?>		
		</td>   
        <td>		
			<?php echo utf8_encode($array_pessoas["rg"])?>		
		</td> 
        <td>		
			<?php echo utf8_encode($array_pessoas["sexo"])?>		
		</td>  
        <td>        				
			<?php echo utf8_encode($array_pessoas["dataNascimento"])?>		
		</td> 
        <td>		
			<?php echo utf8_encode($array_pessoas["email"])?>			
		</td>
         <td>		
			<?php echo utf8_encode($array_pessoas["senha"])?>			
		</td> 
        <td>		
			<?php echo utf8_encode($array_pessoas["telefone"])?>			
		</td> 
        <td>			
			<?php echo utf8_encode($array_pessoas["celular"])?>
			
		</td> 
        <td>			
			<?php echo utf8_encode($array_pessoas["endereco"])?>			
		</td> 
        <td>
			
			<?php echo utf8_encode($array_pessoas["numero"])?>		
		</td>  
        <td>			
			<?php echo utf8_encode($array_pessoas["complemento"])?>			
		</td> 
        <td>
			
			<?php echo utf8_encode($array_pessoas["bairro"])?>			
		</td> 
        <td>
			
			<?php echo utf8_encode($array_pessoas["cep"])?>			
		</td> 
        <td>
			
			<?php echo utf8_encode($array_pessoas["cidade"])?>			
		</td>
        <td>
		
			<?php echo utf8_encode($array_pessoas["estado"])?>
		
		</td>  
		<td>
			<?php 
				/**
				 * Caso o valor de $array_pessoas["status"] for igual "A"
				 * então mostra "Ativo" senão "Inativo"
				 *
				 */
				echo ($array_pessoas["status"] == "A") ? "Ativo" : "Inativo" 
			?>
		</td>
        
		<td>
			<a href="pessoas.php?acao=excluir&codigo=<?php echo $array_pessoas["id"] ?>">Excluir</a>
		</td>
	</tr>
	<?php
			}
		}
	?>
	</table>
</div>