<html>
<head>
	<title><?=App::get_var('titulo');?></title>
	<link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
<table id="events">
	<tr>
		<td class="eventNameTitle">Nome</td>
		<td class="eventDescriptionTitle">Descrição</td>
		<td class="eventDataTitle">Data</td>
	</tr>
	<?foreach(App::get_var('Eventos') as $evento):?>
		<tr id="eventData">
			<td><?=$evento->nome;?></td>
			<td><?=$evento->descricao;?></td>
			<td><?=$evento->data;?></td>
		</tr>
	<?endforeach;?>
</table>
</body>
</html>