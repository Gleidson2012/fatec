<?
include_once "credenciais.php";
include_once 'input.class.php';
?>
<html>
<head>
	<meta charset="utf-8">
	<title>Fatec Eventos</title>
	<link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
	<?if(Input::get('flag'))
		{
			$message = new StdClass();
			switch (Input::get('flag')){
					case 'success':
						$message->text  = 'Evento cadastrado com sucesso.';
						$message->type = 'success';
						break;
					
					case 'error':
						$message->text = 'Erro ao cadastrar evento.';
						$message->type = 'error';
						break;
					default:
						$message->text  = 'Nenhuma ação efetuada.';
						$message->type = 'warning';
					//Nothing....
					;
				}	
		}
	?>
	<?if(!empty($message)):?>
	<div class="flash-message-<?=($message->type);?>">
		<?=$message->text;?>
	</div>
	<?endif;?>
	<div>
		<fieldset id="cadastroEventos">
			<legend>Cadastro de eventos</legend>
				<form method="post" action="<?=BASE_URL?>home.php?class=funcionario&method=cadastrarEvento">
					<div class="formField">
						<label for="nome">Nome</label>
						<input type="text" name="nome" id="nome"><br />
					</div>
					<div class="formField">
						<label for="data">Data</label>
						<input type="date" name="data" id="data"><br />
					</div>
					<div class="formField">
						<label for="horaInicio">Hora de início</label>
						<input type="time" name="horaInicio" id="horaInicio"><br />
					</div>
					<div class="formField">
						<label for="horaTermino">Hora de término</label>
						<input type="time" name="horaTermino" id="horaTermino"><br />
					</div>
					<div class="formField">
						<label for="visibilidade">Visibilidade</label>
						<select name="visibilidade" id="visibilidade">
							<option value="0">Visível para todos</option>
							<option value="1">Visível só para alunos</option>
							<option value="2">Visível só para alunos de A.D.S.</option>
							<option value="3">Visível só para alunos de G.E.</option>
							<option value="4">Visível só para alunos de Log.</option>
						</select><br />
					</div>
					<div class="formField">
						<label for="descricao">Descrição</label>
						<textarea name="descricao" id="descricao"></textarea><br />
					</div>
					<div class="formField">
						<label for="numeroVagas">Número de vagas</label>
						<input type="number" name="numeroVagas" id="numeroVagas"><br />
					</div>
					<div>
						<input type="submit" class="button" value="Cadastrar">
					</div>
				</form>
		</fieldset>
	</div>
</body>
</html>