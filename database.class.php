<?php

	class Database{

		public function __construct(){

		}

		/**
		 * Prepara um resultado retornado por um select.
		 * @param String $result Resultado a ser tratado.
		 * @return Array Vetor de objetos, onde as propriedades são os nomes das colunas da tabela consultada.
		 */
		public function prepare( $result ){

			$recordsets = array();

			while( $row = mysql_fetch_object( $result ) ) {
				$recordsets[] = $row;
			}
			
			return $recordsets;
		}
	}
?>