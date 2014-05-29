<?php
	class Produto extends ProdutoModel{
		
		public function __construct(){}
		
		public function listarTodos(){
			
			return $this->listarProdutos();
		}
		
		public function incluir(){
			
			$this->setTipo(utf8_decode($_POST["tipo"]));
			$this->setDescricao(utf8_decode($_POST["descricao"]));
			$this->setStatus(utf8_decode($_POST["status"]));
			$foto = $this->setStatus($_FILE["foto"]);
			
			if (!empty($foto["name"])) {
	 
				// Largura máxima em pixels
				$largura = 150;
				// Altura máxima em pixels
				$altura = 180;
				// Tamanho máximo do arquivo em bytes
				$tamanho = 1000;
		 
				// Verifica se o arquivo é uma imagem
				if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $foto["type"])){
				   $error[1] = "Isso não é uma imagem.";
				} 
		 
				// Pega as dimensões da imagem
				$dimensoes = getimagesize($foto["tmp_name"]);
		 
				// Verifica se a largura da imagem é maior que a largura permitida
				if($dimensoes[0] > $largura) {
					$error[2] = "A largura da imagem não deve ultrapassar ".$largura." pixels";
				}
		 
				// Verifica se a altura da imagem é maior que a altura permitida
				if($dimensoes[1] > $altura) {
					$error[3] = "Altura da imagem não deve ultrapassar ".$altura." pixels";
				}
		 
				// Verifica se o tamanho da imagem é maior que o tamanho permitido
				if($foto["size"] > $tamanho) {
					$error[4] = "A imagem deve ter no máximo ".$tamanho." bytes";
				}
		 
				// Se não houver nenhum erro
				if (count($error) == 0) {
		 
					// Pega extensão da imagem
					preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);
		 
					// Gera um nome único para a imagem
					$nome_imagem = md5(uniqid(time())) . "." . $ext[1];
		 
					// Caminho de onde ficará a imagem
					$caminho_imagem = "uploads/" . $nome_imagem;
		 
					// Faz o upload da imagem para seu respectivo caminho
					move_uploaded_file($foto["tmp_name"], $caminho_imagem);
		 
					
				}
		 
				// Se houver mensagens de erro, exibe-as
				if (count($error) != 0) {
					foreach ($error as $erro) {
						echo $erro . "<br />";
					}
				}
			}

 
			
			
			$resultado = $this->inserirProdutos();
			return $resultado;	
		}
		
		public function alterar(){
			$this->setId(utf8_decode($_POST["id"]));
			$this->setTipo(utf8_decode($_POST["tipo"]));
			$this->setDescricao(utf8_decode($_POST["descricao"]));
			$this->setStatus(utf8_decode($_POST["status"]));
			
			$resultado = $this->alterarProdutos();
			return $resultado;		
		}
		
		public function buscar($id){
			$this->setId($id);
			$busca_Produtos = mysql_fetch_assoc($this->buscarProdutos());
			$this->setTipo($busca_Produtos["tipo"]);
			$this->setDescricao($busca_Produtos["descricao"]);
			$this->setStatus($busca_Produtos["status"]);	
		}		
		
		public function excluir($id){
				$this->setId($id);
				return $this->excluirProdutos();
		}
	}
?>