<?php

class Pessoa{
	public $nome;
	public $email;
	public $senha;
}

class Funcionario extends Pessoa{
	public $idFuncionario;
	public $cargo;
}

class Participante extends Pessoa{
	public $idParticipante;
	public $dataNascimento;
}

class Visitante extends Participante{
	public $cpf;
	public $rg;
	public $endereco;
}

class Aluno extends Participante{
	public $ra;
	public $idCurso;
	public $dataInicio;
	public $dataTermino;
	public $status;
	public static $historico = array();

	public function __toString(){
		return  "Nome do objeto: " . $this->nome;
	}

}

class Endereco{
	public $idEndereco;
	public $tipoLogradouro;
	public $logradouro;
	public $bairro;
	public $cep;
	public $numero;
	public $cidade;
	public $estado;
	public $complemento;

}

$endereco = new Endereco();
$endereco->idEndereco = 1;
$endereco->tipoLogradouro = 'rua';
$endereco->logradouro = 'Graúna da mata';
$endereco->bairro = 'Lago Azul';
$endereco->cep = '04851-500';
$endereco->numero = 171;
$endereco->cidade = 'São Paulo';
$endereco->estado = 'SP';
$endereco->complemento = '';

$aluno = new Aluno();
$aluno->nome = 'Wellington';
$aluno->endereco = $endereco;

var_dump($aluno);

?>