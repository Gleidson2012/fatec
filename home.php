<meta charset="utf-8">
<?php
	include_once "credenciais.php";
	include_once "connect.php";
	function __autoload( $class ){
		include $class . '.class.php';
	}

	$class  = Input::get('class');
	$method = Input::get('method');

	switch( $class ){
		case 'funcionario':
			if( class_exists(ucfirst($class))){
				$funcionario = new Funcionario();
				$funcionario->id = 1;
				$funcionario->nome = "Fulano";
				$funcionario->idade = 42;
				$funcionario->cargo = "Professor coordenador";
				$funcionario->rg = "11.111.111-11";
				$funcionario->ativo = true;
				if( method_exists($funcionario, $method) ){
					$evento = new Evento();
					$evento = Input::post();
					call_user_func(array($funcionario, $method), $evento);
				}
			}
			Logger::log("Cadastro de evento feito pelo funcionário {$funcionario->nome}");
			header("Location:". BASE_URL . '?flag=success' );
		break;

		case 'evento':
			if( class_exists(ucfirst($class)) ){
				$evento = new Evento();
				switch ($method) {
					case 'listar':
						if(method_exists($evento, $method))
						{
							$vetor = $evento->listar();
							$app = new App();
							$app->set_var('Eventos', $vetor);
							$app->set_var('titulo', 'Listagem de eventos');
							include 'listareventos.php';
						}
						break;
				}
			}
		break;
		default:
			Logger::log("Unauthorized access! IP:" . Input::get_user_ip());
			//header("Location:". BASE_URL );
	}
	

	//$funcionario->cadastrarEvento( $evento );
	//call_user_func(array($funcionario, 'cadastrarEvento'), $evento);
	//$resultado = $funcionario->getEvento(1);
	//$eventoUm = mysql_fetch_object( $resultado );
	//$eventoUm = mysql_fetch_array( $resultado );
	//var_dump($eventoUm);
	$evento = new Evento();
	
?>