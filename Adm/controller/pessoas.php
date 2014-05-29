<?php
	
	class Pessoa extends PessoaModel {
		
		public function __construct() {}
		
		public function listarTodos(){
			
			return $this->listarPessoas();
		}		
		
		
		public function incluir() {			
			$data_nasc = explode("/", $_POST["dataNascimento"]);
		    $data_nascimento_formatada = $data_nasc[2]."-".$data_nasc[1]."-".$data_nasc[0];
						
			$this->setNome(utf8_decode($_POST["nome"]));			
			$this->setSexo(utf8_decode($_POST["sexo"]));
			$this->setDataNascimento($data_nascimento_formatada);			
			$this->setTelefone(utf8_decode($_POST["telefone"]));
			$this->setCelular(utf8_decode($_POST["celular"]));
			$this->setEndereco(utf8_decode($_POST["endereco"]));
			$this->setNumero(utf8_decode($_POST["numero"]));
			$this->setComplemento(utf8_decode($_POST["complemento"]));
			$this->setBairro(utf8_decode($_POST["bairro"]));
			$this->setCep(utf8_decode($_POST["cep"]));
			$this->setCidade(utf8_decode($_POST["cidade"]));
			$this->setEstado(utf8_decode($_POST["estado"]));					
			
			
			$this->setUsuario(utf8_decode($_POST["usuario"]));
			$this->setEmail(utf8_decode($_POST["email"]));
			$this->setSenha(utf8_decode(md5($_POST["senha"])));
			$this->setNivel(utf8_decode($_POST["nivel"]));
			$this->setStatus(utf8_decode($_POST["status"]));
			
			$this->inserirLogin();			
			
			$resultado = $this->inserirPessoas();			
			return $resultado;		
		}
				
		
		public function alterar() {	
		
			$data_nasc = explode("/", $_POST["dataNascimento"]);
		    $data_nascimento_formatada = $data_nasc[2]."-".$data_nasc[1]."-".$data_nasc[0];		
			
			
			$this->setNome(utf8_decode($_POST["nome"]));			
			$this->setSexo(utf8_decode($_POST["sexo"]));
			$this->setDataNascimento($data_nascimento_formatada);			
			$this->setTelefone(utf8_decode($_POST["telefone"]));
			$this->setCelular(utf8_decode($_POST["celular"]));
			$this->setEndereco(utf8_decode($_POST["endereco"]));
			$this->setNumero(utf8_decode($_POST["numero"]));
			$this->setComplemento(utf8_decode($_POST["complemento"]));
			$this->setBairro(utf8_decode($_POST["bairro"]));
			$this->setCep(utf8_decode($_POST["cep"]));
			$this->setCidade(utf8_decode($_POST["cidade"]));
			$this->setEstado(utf8_decode($_POST["estado"]));
			$this->setUsuario(utf8_decode($_POST["usuario"]));
			$this->setEmail(utf8_decode($_POST["email"]));
			$this->setSenha(utf8_decode(md5($_POST["senha"])));
			$this->setNivel(utf8_decode($_POST["nivel"]));
			$this->setStatus(utf8_decode($_POST["status"]));			
			
			$resultado = $this->alterarPessoas();			
			return $resultado;		
		}	

		public function buscar($idPessoas) {

			$this->setIdPessoas($idPessoas);			
			$dados_pessoas = mysql_fetch_assoc($this->buscarPessoas());			
			$this->setNome($dados_pessoas["nome"]);			
			$this->setSexo($dados_pessoas["sexo"]);			
			$this->setDataNascimento($dados_pessoas["dataNascimento"]);			
			$this->setTelefone($dados_pessoas["telefone"]);
			$this->setCelular($dados_pessoas["celular"]);
			$this->setEndereco($dados_pessoas["endereco"]);
			$this->setNumero($dados_pessoas["numero"]);
			$this->setComplemento($dados_pessoas["complemento"]);
			$this->setBairro($dados_pessoas["bairro"]);
			$this->setCep($dados_pessoas["cep"]);
			$this->setCidade($dados_pessoas["cidade"]);
			$this->setEstado($dados_pessoas["estado"]);
			$this->setUsuario($dados_pessoas["usuario"]);
			$this->setEmail($dados_pessoas["email"]);
			$this->setSenha(md5($dados_pessoas["senha"]));
			$this->setNivel($dados_pessoas["nivel"]);	
			$this->setStatus($dados_pessoas["status"]);		          

		}
		
		public function excluir($idPessoas) {			
			$this->setIdPessoas($idPessoas);
			return $this->excluirPessoas();		
		}
	}
			
?>