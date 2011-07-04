
<?php doctype() ?>

<html>
<head>

<?php meta() ?>

<link rel="stylesheet" href="<?=base_url()?>public/css/tablecloth/tablecloth/tablecloth.css" type="text/css" />

</head>

<body>
	<h1> Pessoas: </h1>
	
	<div>
		<table>
			<thead>
				<tr>
					<th>Nome</th>
					<th>Estado Civil</th>
					<th>Sexo</th>
				</tr>
			</thead>
			<tbody>
			<?php if (count($pessoas) <= 0): ?>
					<tr>
						<td  colspan="3">Não existem dados cadastrados</td>
					</tr>
			<?php else: ?>
				<?php foreach ($pessoas as $pessoa): ?>
					<tr>
						<td><?=$pessoa->nome?></td>
						<td><?=$pessoa->estado_civil?></td>
						<td><?=$pessoa->sexo?></td>
						<td><?=anchor('pessoa/alterar/'.$pessoa->id, 'Editar', 'Editar registro')?></td>
						<td><?=anchor('pessoa/excluir/'.$pessoa->id, 'Excluir', 'Excluir registro')?></td>
					</tr>	
				<?php endforeach;?>
			<?php endif; ?>
			</tbody>
		</table>
		<br/>
		<?=anchor('pessoa/alterar', 'Cadastrar nova pessoa', 'Novo registro')?>
	</div>


</body>
</html>