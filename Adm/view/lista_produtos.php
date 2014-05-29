<?php
	//inclusão das classes
	include_once("../model/dao.php");
	include_once("../model/produtos.php");
	include_once("../controller/produtos.php");
	
	/**
	 * Cria um novo objeto da classe da brinquedo
	 * (localizada em => controller/brinquedo.php)
	 *
	 */
	$produtos = new Produto();
	
	/**	
	 * Solicita a Coleção de Dados à classe e armazena na variável: $lista_de_brinquedo
	 * Neste momento todos dados da tabela estão relacionados dentro da variável.
	 *
	 */
	$lista_de_produtos = $produtos->listarTodos();
?>
<div id="lProd" class="box_home" style="display:none">

	<table border="1" width="" align="left">
	<tr>
		<td>CODIGO</td>
		<td>TIPO</td>
        <td>DESCRICAO</td>
        <td>FOTO</td>       
		<td>AÇÃO</td>
	</tr>
	<?php		
		if (mysql_num_rows($lista_de_produtos) <= 0) {	
	?>
	<tr>
		<td colspan="4">Nenhum registro encontrado</td>
	</tr>
	<?php
		} else {			
			while ($array_produtos = mysql_fetch_assoc($lista_de_produtos)) {				
	?>	
	<tr>
		<td>        	
            <a href="produtos.php?codigo=<?php echo $array_produtos["id"] ?>">
				<?php echo $array_produtos["id"] ?>
            </a>
        </td>
		<td>			
			<?php echo utf8_encode($array_produtos["tipo"])?>			
		</td>   
        <td>			
			<?php echo utf8_encode($array_produtos["descricao"])?>		
		</td> 
        <td>			
			<?php echo utf8_encode($array_produtos["foto"])?>		
		</td>       
		<td>
			<a href="produtos.php?acao=excluir&amp;codigo=<?php echo $array_produtos["id"] ?>">Excluir</a>
		</td>
	</tr>
	<?php
			}
		}
	?>
	</table>
	
</div>
