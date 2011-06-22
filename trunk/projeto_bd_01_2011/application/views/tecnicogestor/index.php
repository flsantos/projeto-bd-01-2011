<?php doctype() ?>

<html>
<head>

<?php meta() ?>

</head>

<body>
	<h1> Tecnicos/Gestores: </h1>
	
	<div>
		<table>
			<thead>
				<tr>
					<th>Nome</th>
					<th>Email</th>
					<th>Cargo</th>
				</tr>
			</thead>
			<tbody>
			<?php if (count($tecnicogestores) <= 0): ?>
					<tr>
						<td  colspan="3">Não existem dados cadastrados</td>
					</tr>
			<?php else: ?>
				<?php foreach ($tecnicogestores as $tecnicogestor): ?>
					<tr>
						<td><?=$tecnicogestor->pessoa_nome?></td>
						<td><?=anchor('pessoa/alterar/'.$tecnicogestor->id, 'Editar', 'Editar registro')?></td>
						<td><?=anchor('pessoa/excluir/'.$tecnicogestor->id, 'Excluir', 'Excluir registro')?></td>
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