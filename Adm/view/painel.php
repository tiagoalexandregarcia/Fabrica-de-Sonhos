<?php include_once("../header.php");?>
<section class="content">
<?php include('pessoas.php'); ?>
<?php include('lista_pessoas.php'); ?>
<?php include('produtos.php'); ?>
<?php include('lista_produtos.php'); ?>
</section>
<script>
	$(document).ready(function(){
        
		$(".menu_principal").click(function(){			
			var id_click = $(this).attr('id');			
			$(".box_home").slideUp("fast");			
			$("#box_"+id_click).slideDown("slow");			
			return false;
		});		
		
    });
</script>