<?php

	class Usuario extends UsuarioModel {


		public function loginUsuario(){

			$this->setEmail($_POST["email"]);
			$this->setSenha(md5($_POST["senha"]));
			
			return $this->validaLogin();
		}
		
		
	}

?>