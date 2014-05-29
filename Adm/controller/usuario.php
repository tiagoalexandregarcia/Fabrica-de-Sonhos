<?php

	class Usuario extends UsuarioModel {


		public function loginUsuario(){

			$this->setEmail(mysql_real_escape_string($_POST["email"]));
			$this->setSenha(mysql_real_escape_string(md5($_POST["senha"])));

			return $this->validaLogin();
		}

	}

?>