<?php

	class PessoaModel {
	
		//Declaração dos atributos
		private $idPessoas;
		private $nome;		
		private $sexo;
		private $dataNascimento;		
		private $telefone;
		private $celular;
		private $endereco;
		private $numero;
		private $complemento;
		private $bairro;
		private $cep;
		private $cidade;
		private $estado;
		
		
		//login	
		private $idLogin;
		private $usuario;
		private $email;
		private $senha;	
		private $nivel;	
		private $status;
		
		//Método Construtor
		public function __construct() {}
		
		//Encapsulamento -> Setters
	  		public function setIdPessoas($idPessoas) {
			$this->idPessoas = $idPessoas;
		}		
		public function setNome($nome) {
			$this->nome = $nome;
		}		
		
		public function setSexo($sexo){
			$this->sexo = $sexo;	
		}
		
		public function setDataNascimento($dataNascimento){
			$this->dataNascimento = $dataNascimento;	
		}		
		
		public function setTelefone($telefone){
			$this->telefone = $telefone;	
		}
		
		public function setCelular($celular){
			$this->celular = $celular;	
		}
		
		public function setEndereco($endereco){
			$this->endereco = $endereco;	
		}
		
		public function setNumero($numero){
			$this->numero = $numero;	
		}
		
		public function setComplemento($complemento){
			$this->complemento = $complemento;	
		}
		
		public function setBairro($bairro){
			$this->bairro = $bairro;	
		}
		
		public function setCep($cep){
			$this->cep = $cep;	
		}
		
		public function setCidade($cidade){
			$this->cidade = $cidade;	
		}
		
		public function setEstado($estado){
			$this->estado = $estado;	
		}
		
		//login
		public function setIdLogin($idLogin){
			$this->idLogin = $idLogin;	
		}
		
		public function setUsuario($usuario){
			$this->usuario = $usuario;	
		}
		
		public function setEmail($email){
			$this->email = $email;	
		}
		
		public function setSenha($senha){
			$this->senha = $senha;	
		}
		
		public function setNivel($nivel){
			$this->nivel = $nivel;	
		}
				
		public function setStatus($status) {
			$this->status = $status;
		}		
		
		//-> Getters
		
	 	public function getIdPessoas() {
			return $this->idPessoas;
		}		
		public function getNome() {
			return $this->nome;
		}		
		
		public function getSexo() {
			return $this->sexo;
		}	
		
		public function getDataNascimento() {
			return $this->dataNascimento;
		}		
		
		public function getTelefone() {
			return $this->telefone;
		}
		
		public function getCelular() {
			return $this->celular;
		}
		
		public function getEndereco() {
			return $this->endereco;
		}
		
		public function getNumero() {
			return $this->numero;
		}
		
		public function getComplemento() {
			return $this->complemento;
		}
		
		public function getBairro() {
			return $this->bairro;
		}
		
		public function getCep() {
			return $this->cep;
		}
		
		public function getCidade() {
			return $this->cidade;
		}
		
		public function getEstado() {
			return $this->estado;
		}		
		//login
		public function getIdLogin(){
			return $this->idLogin;	
		}
		
		public function getUsuario(){
			return $this->usuario;	
		}
		
		public function getEmail() {
			return $this->email;
		}
		
		public function getSenha() {
			return $this->senha;
		}
		
		public function getNivel() {
			return $this->nivel;
		}
			
		public function getStatus() {
			return $this->status;
		}	
		
	public function inserirPessoas() {			
		$query = "INSERT INTO pessoas (nome,sexo,dataNascimento,telefone,celular,
		 endereco,numero,complemento,bairro,cep,cidade,estado)
		  VALUES ('".$this->getNome()."',
				  '".$this->getSexo()."',
				  '".$this->getDataNascimento()."',					  
				  '".$this->getTelefone()."',
				  '".$this->getCelular()."',
				  '".$this->getEndereco()."',
				  '".$this->getNumero()."',
				  '".$this->getComplemento()."',
				  '".$this->getBairro()."',
				  '".$this->getCep()."',
				  '".$this->getCidade()."',
				  '".$this->getEstado()."')";	
		
		$resultado = DAO::abreConexao()->runQuery($query);			
		return $resultado;		
	}
	
	public function inserirLogin() {
	
		$query = "INSERT INTO login(usuario,email,senha,nivel,status)
				  VALUES('".$this->getUsuario()."',
						 '".$this->getEmail()."',
						 '".$this->getSenha()."',
						 '".$this->getNivel()."',
						 '".$this->getStatus()."')";
						 
		$resultado = DAO::abreConexao()->runQuery($query);			
		return $resultado;				 		
	}				
	
	public function alterarPessoas() {		
		$query = "UPDATE pessoas SET 
				  nome           = '".$this->getNome()."',			  		 
				  sexo           = '".$this->getSexo()."',
				  dataNascimento = '".$this->getDataNascimento()."',					 
				  telefone       = '".$this->getTelefone()."',
				  celular        = '".$this->getCelular()."',
				  endereco       = '".$this->getEndereco()."',
				  numero         = '".$this->getNumero()."',
				  complemento    = '".$this->getComplemento()."',
				  bairro         = '".$this->getBairro()."',
				  cep            = '".$this->getCep()."',
				  cidade         = '".$this->getCidade()."',
				  estado         = '".$this->getEstado()."'					  				 
			WHERE idPessoas      = '".$this->getIdPessoas()."'";

		$resultado = DAO::abreConexao()->runQuery($query);			
		return $resultado;		
	}
	
	public function alterarLogin(){		
		$query = "UPDATE login SET 
				 usuario = '".$this->getUsuario()."',
				 email   = '".$this->getEmail()."',
				 senha   = '".$this->getSenha()."',
				 nivel   = '".$this->getNivel()."',	
				 status  = '".$this->getStatus()."'
		   WHERE idLogin = '".$this->getIdLogin()."'";	
		   
		$resultado = DAO::abreConexao()->runQuery($query);			
		return $resultado;  
	}
	
	public function listarPessoas() {			
		$query = "SELECT p.idPessoas, p.nome, p.sexo,p.dataNascimento,p.telefone, p.celular,
		 p.endereco, p.bairro,p.numero, p.complemento,  p.cep, p.cidade, p.estado, l.idLogin,
		 l.usuario, l.email, l.senha, l.nivel, l.status
		FROM pessoas p
		INNER JOIN login l ON p.idPessoas = l.idLogin";			
		
		$resultado = DAO::abreConexao()->runQuery($query);			
		return $resultado;		
	}
	
	public function buscarPessoas() {		
		$query = "SELECT p.idPessoas, p.nome, p.sexo,p. dataNascimento,p.telefone, p.celular,
		 p.endereco, p.bairro,p.numero, p.complemento,  p.cep, p.cidade, p.estado, l.idLogin,
		 l.usuario, l.email, l.senha, l.nivel, l.status
		FROM pessoas p
		INNER JOIN login l ON p.idPessoas = l.idLogin
		
		WHERE p.idPessoas = '".$this->getIdPessoas()."'";
					
		$resultado = DAO::abreConexao()->runQuery($query);			
		return $resultado;		
	}		
		
	
	public function excluirPessoas() {	
		$query = "DELETE FROM pessoas where idPessoas = ". $this->getIdPessoas();				
		$resultado = DAO::abreConexao()->runQuery($query);
		
		$query = "DELETE FROM login where idPessoas = ". $this->getIdPessoas();				
		$resultado = DAO::abreConexao()->runQuery($query);			
		
		return $resultado;		
	}
		
	}
?>