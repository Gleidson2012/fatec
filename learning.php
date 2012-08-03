<meta charset="utf-8">
<?php


class Veiculo{

	public $marca;
	public $nome;
	protected $ano;
	private $cor;
	private $dono;
	private $velocidade;
	public static $quantidade = 0;

	public function __construct( $marca = '', $nome = '', $ano = ''){
		echo '<br>Instanciando um novo objeto da classe: ' . __CLASS__ . '<br>';
		$this->marca = $marca;
		$this->nome = $nome;
		$this->ano = $ano;
		$this->velocidade = 0;
		self::$quantidade++;
	}

	public function acelerar( $kmh )
	{
		if( is_numeric( $kmh ) && $kmh > 0 )
		{
			$this->velocidade += $kmh;	
		}
	}

	public function desacelerar($kmh)
	{
		if ( is_numeric($kmh) && $kmh > 0 && $this->velocidade >= $kmh )
		{
			$this->velocidade -= $kmh;
		}
	}

	private function _pintar( $cor )
	{
		$this->cor = $cor;
	}


	public function paint( $cor )
	{
		if( is_string($cor)  && !empty($cor) )
		{
			$this->_pintar( $cor );
		}
	}

	public function vender( $comprador )
	{
		$this->dono = $comprador;
	}

	public function getAno()
	{

		if(!empty( $this->ano) )
		{
			return $this->ano;
		}
	}

	public function setAno( $ano )
	{
		if( is_numeric($ano) && !empty($ano) )
		{
			$this->ano = $ano;
		}
	}

	public function getVelocidade()
	{
		return $this->velocidade . ' km/h';
	}

	public function getCor()
	{
		if( !empty($this->cor) )
		{
			return $this->cor;
		}
	}

	public static function getQuantidade(){
		return self::$quantidade;
	}

} // Fim da classe...

//Herança!
class Motocicleta extends Veiculo{

	public $nomePiloto;

	public function __construct ( $cilindrada = 0) 
	{
		$this->cilindrada = $cilindrada;
		echo 'Instanciando um novo objeto da classe: ' . __CLASS__ . '<br>';	
	}
}


echo "Quantidade:" .  Veiculo::$quantidade;

$veiculo1 = new Veiculo( 'Fiat', 'Palio', '2000');

echo "Quantidade:" .  Veiculo::$quantidade . '<br>';

echo 'Nome do ve&iacute;culo:' . $veiculo1->nome . '<br>';
echo 'Marca do ve&iacute;culo:' . $veiculo1->marca . '<br>';
echo 'Ano do ve&iacute;culo:' . $veiculo1->getAno() . '<br>';
echo 'Ano do ve&iacute;culo:' . $veiculo1->getAno() . '<br>';


echo "Velocidade: " . $veiculo1->getVelocidade() . '<br>';
$veiculo1->acelerar( 'Guilherme' );
echo "Velocidade: " . $veiculo1->getVelocidade() . '<br>';
$veiculo1->desacelerar( 8 );
echo "Velocidade: " . $veiculo1->getVelocidade() . '<br>';

$veiculo1->paint( 'amarela' );

$veiculo2 = new Veiculo('Volkswagen');
echo "Quantidade:" .  Veiculo::$quantidade . '<br>';
$veiculo3 = new Veiculo('Ferrari');
echo 'Cor do veículo: ' . $veiculo1->getCor() . '<br>';
echo 'Quantidade de veículos: ' . Veiculo::$quantidade;
var_dump( $veiculo1 );
var_dump( $veiculo2 );
var_dump( $veiculo3 );
//Um método estático, é aquele, que eu não preciso usar diretamente de um obj.
echo "Usando o método estático, quantidade:" . Veiculo::getQuantidade() .'<br>';

echo 'Propriedade static do objeto $veiculo1 :' . $veiculo1::$quantidade . '<br>';
echo 'Propriedade static do objeto $veiculo2 :' . $veiculo2::$quantidade . '<br>';
echo 'Propriedade static do objeto $veiculo3 :' . $veiculo3::$quantidade . '<br>';

//Encapsulamento Ok
//Herança        Ok
//Abstração      Ok
//Polimorfismo   Ok


/*
Abstração trata-se do conceito de dar ênfase primeiramente
em partes mais relevantes, e posteriormente em partes menos relevantes.

Pessoa
Funcionario
Participante
Aluno
Visitante

Funcionario extends Pessoa
Participante extends Pessoa
Aluno extends Participante
Visitante extends Participante

*/


Interface Cinematica{
	 function acelerar( $kmh = 0 );
	 function desacelerar( $kmh = 0 );
	 function parar();
}

class Pessoa implements Cinematica{

	public $velo;

	public function acelerar( $kmh = 0){
		$this->velo += $kmh;
	}

	public function desacelerar( $kmh = 0){

	}

	public function parar(){

	}
}

class MotoDeCorrida extends Motocicleta{

	public function __construct($cilindrada){
		echo 'Instanciando um novo objeto da classe: ' . __CLASS__ . '<br>';		
		$this->cilindrada = $cilindrada;
	}
}

$moto_corrida = new MotoDeCorrida(300);

var_dump( get_class_methods('Pessoa') ); 


class Conta{

	public $saldo;
	public $proprietario;

	public function __construct($saldo){
		$this->saldo = $saldo;
	}

	public function depositar( $quantia = 0){
		$this->saldo += $quantia;
	}

	public function retirar( $quantia = 0)
	{
		if( $this->saldo >= $quantia )
		{
			$this->saldo -= $quantia;
		}
	}

}

class ContaPoupanca extends Conta{

	//Sobreposição do método Conta::depositar "Overloading"
	public function depositar( $quantia = 0)
	{
		$this->saldo += $quantia * 1.2;
	}

}
	
$conta = new Conta( 500.00 );
$contaPoup = new ContaPoupanca( 500.00 );
$conta->depositar( 100.00 );
$contaPoup->depositar( 100.00 );

echo "Saldo da Conta (Corrente) : " .  $conta->saldo;
echo '<br>';
echo "Saldo da Conta (Poupança) : " . $contaPoup->saldo;

?>