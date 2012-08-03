<?
	class Evento extends Database{
		public $nome;
		public $data;
		public $horaInicio;
		public $horaTermino;
		public $descricao;
		public $visibilidade;
		public $numeroVagas;
		public $status;

		public function listar(){
			$sql = "SELECT * FROM eventos";
			return $this->prepare( mysql_query( $sql ) );
		}

		public function get( $id ){
			$sql = "SELECT * FROM eventos WHERE idEvento = {$id}";
			return mysql_query( $sql );
		}
	}

?>