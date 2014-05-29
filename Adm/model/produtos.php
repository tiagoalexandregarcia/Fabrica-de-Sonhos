<?php
	class ProdutoModel{
		
		private $idProduto;
		private $tipo;
		private $descricao;
		private $foto;
		private $status;
		
		public function __construct (){}
		
		//----- SETTERS ------------>
		public function setIdProduto($idProduto){
			
			$this->idProduto = $idProduto;	
		}
		
		public function setTipo($tipo){
			
			$this->tipo = $tipo;	
		}
		
		public function setDescricao($descricao){
			
			$this->descricao = $descricao;	
		}
		
		public function setFoto($foto){
			
			$this->foto = $foto;	
		}
		
		public function setStatus($status){
			
			$this->status = $status;	
		}
		
		//----- SETTERS ------------>
		
		public function getIdProduto(){
			
			return $this->idProduto;	
		}
		
		public function getTipo(){
			
			return $this->tipo;	
		}
		
		public function getDescricao(){
			
			return $this->descricao;		
		}
		
		public function getFoto(){
			
			return $this->foto;		
		}
		
		public function getStatus(){
			
			return $this->status;		
		}
		
		public function inserirProdutos(){
			
			$query = "INSERT INTO produtos (tipo,descricao,foto,status) 
					VALUES('".$this->getTipo()."','".$this->getDescricao()."','".$this->getFoto()."','".$this->getStatus()."')";
			
			$resultado = DAO::abreConexao()->runQuery($query);
			return $resultado;	 
		}
		
		public function alterarProdutos(){
		
			$query = "UPDATE produtos SET 
					  tipo = '".$this->getTipo()."',
			  		  descricao  = '".$this->getDescricao()."',
					  foto = '".$this->getFoto()."',
					  status = '".$this->getStatus()."'					 
			    WHERE idProduto = '".$this->getIdProduto()."'";
				
			$resultado = DAO::abreConexao()->runQuery($query);
			return $resultado;	
		}
		
		public function listarProdutos(){
			
			$query = "SELECT idProduto, tipo, descricao, foto, status FROM produtos ORDER BY idProduto";
			
			$resultado = DAO::abreConexao()->runQuery($query);
			return $resultado;	
			
		}
		
		public function buscarProdutos() {
			
			
			$query = "SELECT * FROM produtos WHERE idProduto = '".$this->getIdProduto()."'";
			
			
			$resultado = DAO::abreConexao()->runQuery($query);			
			
			return $resultado;		
		}		
		
		public function excluirProdutos() {
		
			$query = "DELETE FROM produtos where idProduto = ". $this->getIdProduto();	
		
			
			$resultado = DAO::abreConexao()->runQuery($query);
			
			
			return $resultado;		
		}
		
	}
?>