<?php
	class Funcionario{
		public $nome;
		public $idade;
		public $cargo;
		public $rg;
		public $ativo;
		
		/**
		 * @param Object $evento Evento a ser cadastrado;
		 */	
		public function cadastrarEvento ( $evento ){

			$sql = "INSERT INTO eventos(nome, descricao, data, horaInicio, horaTermino, visibilidade, numeroVagas, status, foto)";
			$sql .= "VALUES('{$evento->nome}', '{$evento->descricao}', '{$evento->data}', '{$evento->horaInicio}', '{$evento->horaTermino}', {$evento->visibilidade}, {$evento->numeroVagas}, 1, '')";
			mysql_query( $sql );
		}
	}

?>