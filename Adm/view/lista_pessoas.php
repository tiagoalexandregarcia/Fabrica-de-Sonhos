<?php	
	include_once("../model/dao.php");
	include_once("../model/pessoas.php");
	include_once("../controller/pessoas.php");
	
	$pessoa = new Pessoa();	
	$lista_de_pessoas = $pessoa->listarTodos();
?>
<div id="lPessoa" class="box_home" style="display:none">
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
		if (mysql_num_rows($lista_de_pessoas) <= 0) {	
	?>
	<tr>
		<td colspan="4">Nenhum registro encontrado</td>
	</tr>
	<?php
		} else {		
			while ($array_pessoas = mysql_fetch_assoc($lista_de_pessoas)) {					
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