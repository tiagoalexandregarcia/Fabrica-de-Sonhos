<?php

	class UsuarioModel {


		private $email;
		private $senha;

		public function __construction(){}


		public function getEmail(){

			return $this->email;
		}
		public function setEmail($email){

			$this->email = $email;
		}

		public function getSenha(){

			return $this->senha;
		}
		public function setSenha($senha){

			$this->senha = $senha;
		}


		public function validaLogin(){

			$query = "select * from login 
			          where email = '". $this->getEmail() ."'
			          and senha = '". $this->getSenha() ."'";

			$retorno = DAO::abreConexao()->runQuery($query);

			return (mysql_num_rows($retorno) > 0);
		}

	}


?>