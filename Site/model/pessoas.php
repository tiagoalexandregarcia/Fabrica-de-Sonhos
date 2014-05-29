<?php

	class PessoaModel {
	
		//Declaração dos atributos
		private $id;
		private $nome;
		private $cpf;
		private $rg;
		private $sexo;
		private $dataNascimento;
		private $email;
		private $senha;
		private $telefone;
		private $celular;
		private $endereco;
		private $numero;
		private $complemento;
		private $bairro;
		private $cep;
		private $cidade;
		private $estado;
		private $status;	
			
		
		//Método Construtor
		public function __construct() {}
		
		//Encapsulamento -> Setters
	  	public function setId($id) {
			$this->id = $id;
		}		
		public function setNome($nome) {
			$this->nome = $nome;
		}
		
		public function setCpf($cpf){
			$this->cpf = $cpf;	
		}
		
		public function setRg($rg){
			$this->rg = $rg;	
		}
		
		public function setSexo($sexo){
			$this->sexo = $sexo;	
		}
		
		public function setDataNascimento($dataNascimento){
			$this->dataNascimento = $dataNascimento;	
		}
		
		public function setEmail($email){
			$this->email = $email;	
		}
		
		public function setSenha($senha){
			$this->senha = $senha;	
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
		public function setStatus($status) {
			$this->status = $status;
		}		
		
		//-> Getters
		
	   	public function getId() {
			return $this->id;
		}		
		public function getNome() {
			return $this->nome;
		}
		
		public function getCpf() {
			return $this->cpf;
		}
		
		public function getRg() {
			return $this->rg;
		}
		
		public function getSexo() {
			return $this->sexo;
		}	
		
		public function getDataNascimento() {
			return $this->dataNascimento;
		}
		
		public function getEmail() {
			return $this->email;
		}
		
		public function getSenha() {
			return $this->senha;
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
			
		public function getStatus() {
			return $this->status;
		}		
		
		#Métodos de comunicação com banco de dados	
		
		//Método que inclui efetivamente os valores no banco de dados
		public function inserirPessoas() {
			
			//Comando SQL que será executado no banco de dados
			$query = "INSERT INTO pessoas (nome, cpf, rg, sexo, dataNascimento, email, senha, telefone, celular,
			 endereco, numero, complemento, bairro, cep, cidade, estado, status)
			  VALUES ('".$this->getNome()."',
			  		  '".$this->getCpf()."',
					  '".$this->getRg()."',
					  '".$this->getSexo()."',
					  '".$this->getDataNascimento()."',
					  '".$this->getEmail()."',
					  '".$this->getSenha()."',
					  '".$this->getTelefone()."',
					  '".$this->getCelular()."',
					  '".$this->getEndereco()."',
					  '".$this->getNumero()."',
					  '".$this->getComplemento()."',
					  '".$this->getBairro()."',
					  '".$this->getCep()."',
					  '".$this->getCidade()."',
					  '".$this->getEstado()."',	
			  		  '".$this->getStatus()."')";					
			
			//Executa a Query montada acima e armazena o retorno informado pelo banco
			$resultado = DAO::abreConexao()->runQuery($query);
			
			//Retorna o valor encontrado para quem fez a solicitação
			return $resultado;		
		}

		
		//Método que altera efetivamente os valores no banco de dados
		public function alterarPessoas() {
			
			//Comando SQL que será executado no banco de dados
			$query = "UPDATE pessoas SET 
					  nome = '".$this->getNome()."',
			  		  cpf  = '".$this->getCpf()."',
					  rg   = '".$this->getRg()."',
					  sexo = '".$this->getSexo()."',
					  dataNascimento = '".$this->getDataNascimento()."',
					  email = '".$this->getEmail()."',
					  senha = '".$this->getSenha()."',
					  telefone = '".$this->getTelefone()."',
					  celular = '".$this->getCelular()."',
					  endereco = '".$this->getEndereco()."',
					  numero = '".$this->getNumero()."',
					  complemento = '".$this->getComplemento()."',
					  bairro = '".$this->getBairro()."',
					  cep = '".$this->getCep()."',
					  cidade = '".$this->getCidade()."',
					  estado = '".$this->getEstado()."',	
			  		  status = '".$this->getStatus()."'					 
			    WHERE id = '".$this->getId()."'";
			
			//Executa a Query montada acima e armazena o retorno informado pelo banco
			$resultado = DAO::abreConexao()->runQuery($query);
			
			//Retorna o valor encontrado para quem fez a solicitação
			return $resultado;		
		}
		
		//Método que traz uma relação com todos os registros cadastrados no banco
		public function listarPessoas() {
			
			//Comando SQL que será executado no banco de dados
			$query = "SELECT id, nome, cpf, rg, sexo, dataNascimento, email, senha, telefone, celular,
			 endereco, numero, complemento, bairro, cep, cidade, estado, status FROM pessoas ORDER BY id";
			
			//Executa a Query montada acima e armazena o retorno informado pelo banco
			$resultado = DAO::abreConexao()->runQuery($query);
			
			//Retorna o valor encontrado para quem fez a solicitação
			return $resultado;		
		}				
		
		
		//Método que traz uma relação com apenas 1 registro do banco localizado através do codigo.
		public function buscarPessoas() {
			
			//Comando SQL que será executado no banco de dados
			$query = "SELECT * FROM pessoas WHERE id = '".$this->getId()."'";
			
			//Executa a Query montada acima e armazena o retorno informado pelo banco
			$resultado = DAO::abreConexao()->runQuery($query);
			
			//Retorna o valor encontrado para quem fez a solicitação
			return $resultado;		
		}		
			
		//Método que irá fazer a exclusão do registro selecionado através do código
		public function excluirPessoas() {
		
			$query = "DELETE FROM pessoas where id = ". $this->getId();	
		
			//Executa a Query montada acima e armazena o retorno informado pelo banco
			$resultado = DAO::abreConexao()->runQuery($query);
			
			//Retorna o valor encontrado para quem fez a solicitação
			return $resultado;		
		}
		
	}
?>