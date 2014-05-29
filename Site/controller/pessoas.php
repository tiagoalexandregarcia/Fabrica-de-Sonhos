<?php
	//Cria a classe produto que herda caracteristicas da tabela ProdutoModel
	class Pessoa extends PessoaModel {

		//Método Construtor
		public function __construct() {}		
		
		#Métodos que solicitam informações da Model
		
		//Método de listagem
		public function listarTodos() {
			
			//Retorna a coleção de dados encontradas
			return $this->listarPessoas();		
		}	
		
		
		//Método de inclusão de dados
		public function incluir() {
			
			// Passa para os atributos os valores que foram submetidos através de post
			// Exceto o código pois é um campo auto-incremental.
			
			$data_nasc = explode("/", $_POST["dataNascimento"]);
		    $data_nascimento_formatada = $data_nasc[2]."-".$data_nasc[1]."-".$data_nasc[0];
						
			$this->setNome(utf8_decode($_POST["nome"]));
			$this->setCpf(utf8_decode($_POST["cpf"]));					
			$this->setRg(utf8_decode($_POST["rg"]));
			$this->setSexo(utf8_decode($_POST["sexo"]));
			$this->setDataNascimento($data_nascimento_formatada);			
			$this->setEmail(utf8_decode($_POST["email"]));
			$this->setSenha($_POST["senha"]);
			$this->setTelefone(utf8_decode($_POST["telefone"]));
			$this->setCelular(utf8_decode($_POST["celular"]));
			$this->setEndereco(utf8_decode($_POST["endereco"]));
			$this->setNumero(utf8_decode($_POST["numero"]));
			$this->setComplemento(utf8_decode($_POST["complemento"]));
			$this->setBairro(utf8_decode($_POST["bairro"]));
			$this->setCep(utf8_decode($_POST["cep"]));
			$this->setCidade(utf8_decode($_POST["cidade"]));
			$this->setEstado(utf8_decode($_POST["estado"]));
			$this->setStatus(utf8_decode($_POST["status"]));
			$this->setStatus(utf8_decode($_POST["foto"]));
			
			//Verifica qual foi o retorno da inclusão
			$resultado = $this->inserirPessoas();
			
			//Retorna o valor encontrado TRUE ou FALSE
			return $resultado;		
		}
		
		
		//Método de alteração de dados
		public function alterar() {
			
			//Passa para os atributos os valores que foram submetidos através de post
			$this->setId($_POST["id"]);	
			$this->setNome(utf8_decode($_POST["nome"]));
			$this->setCpf(utf8_decode($_POST["cpf"]));
			$this->setRg(utf8_decode($_POST["rg"]));
			$this->setSexo(utf8_decode($_POST["sexo"]));			
			$this->setDataNascimento(utf8_decode($_POST["dataNascimento"]));			
			$this->setEmail(utf8_decode($_POST["email"]));
			$this->setSenha(utf8_decode($_POST["senha"]));
			$this->setTelefone(utf8_decode($_POST["telefone"]));
			$this->setCelular(utf8_decode($_POST["celular"]));
			$this->setEndereco(utf8_decode($_POST["endereco"]));
			$this->setNumero(utf8_decode($_POST["numero"]));
			$this->setComplemento(utf8_decode($_POST["complemento"]));
			$this->setBairro(utf8_decode($_POST["bairro"]));
			$this->setCep(utf8_decode($_POST["cep"]));
			$this->setCidade(utf8_decode($_POST["cidade"]));
			$this->setEstado(utf8_decode($_POST["estado"]));
			$this->setStatus(utf8_decode($_POST["status"]));
			$this->setStatus(utf8_decode($_POST["foto"]));
			
			//Verifica qual foi o retorno da alteração
			$resultado = $this->alterarPessoas();
			
			//Retorna o valor encontrado TRUE ou FALSE
			return $resultado;		
		}
		
		
		//Método que captura o registro que deve ser excluído
		public function excluir($id) {
		
			//Seta o valor para o atributo código
			$this->setId($id);

			//executa o método excluirProduto() e retorna o 
			//valor devolvido pela classe Model: true ou false
			return $this->excluirPessoas();			
		}


		public function buscar($id) {

			$this->setId($id);			
			$dados_pessoas = mysql_fetch_assoc($this->buscarPessoas());			
			$this->setNome($dados_pessoas["nome"]);
			$this->setCpf($dados_pessoas["cpf"]);
			$this->setRg($dados_pessoas["rg"]);
			$this->setSexo($dados_pessoas["sexo"]);			
			$this->setDataNascimento($dados_pessoas["dataNascimento"]);			
			$this->setEmail($dados_pessoas["email"]);
			$this->setSenha($dados_pessoas["senha"]);
			$this->setTelefone($dados_pessoas["telefone"]);
			$this->setCelular($dados_pessoas["celular"]);
			$this->setEndereco($dados_pessoas["endereco"]);
			$this->setNumero($dados_pessoas["numero"]);
			$this->setComplemento($dados_pessoas["complemento"]);
			$this->setBairro($dados_pessoas["bairro"]);
			$this->setCep($dados_pessoas["cep"]);
			$this->setCidade($dados_pessoas["cidade"]);
			$this->setEstado($dados_pessoas["estado"]);
			$this->setStatus($dados_pessoas["status"]);
			$this->setStatus($dados_pessoas["foto"]);          

		}
	}
			
?>
